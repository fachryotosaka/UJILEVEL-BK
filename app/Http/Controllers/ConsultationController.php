<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Consultation;
use App\Models\ConsultationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    public function requestSchedule(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'time' => 'required',
            'date' => 'required',
            'place' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if(Auth::user()->role === 'student' && $request->input('students_id') == null){
            $student = User::findOrFail(Auth::user()->id);
            $teacher = User::findOrFail($request->input('teacher_id'));
        } 
        elseif(Auth::user()->role === 'student' && $request->input('students_id') != null) {
            $students = User::findOrFail($request->input('students_id'));
            $teacher = User::findOrFail($request->input('teacher_id'));
        } 
        elseif(Auth::user()->role === 'teacher' && $request->input('student_id') != null) {
            $student = User::findOrFail($request->input('student_id'));
            $teacher = User::findOrFail(Auth::user()->id);
        } 
        elseif(Auth::user()->role === 'teacher' && $request->input('students_id') != null) {
            $students = User::findOrFail($request->input('students_id'));
            $teacher = User::findOrFail(Auth::user()->id);
        } 
        else {
            $teacher = User::findOrFail(Auth::user()->id);
        }


        if ($request->input('students_id') != null) {
            // Check if the student already has a consultation
            foreach ($students as $student) {
                if ($student->consultations()
                            ->where('student_id', $student->id)
                            ->whereIn('status',  ['waiting', 'approve'])
                            ->exists()) {
                    return response()->json([
                        'status' => 'Already make request',
                        'message' => 'Lu jangan spam ye',
                    ]);
                }
            }
        } elseif($request->input('student_id') != null) {
            // Check if the student already has a consultation
            if ($student->consultations()
                        ->where('student_id', $student->id)
                        ->whereIn('status',  ['waiting', 'approve'])
                        ->exists()) {
                return response()->json([
                    'status' => 'Already make request',
                    'message' => 'Lu jangan spam ye',
                ]);
            }
        }

        // Create the request schedule
        $consultation = new Consultation();
        $consultation->service_id = $request->input('service_id');
        $consultation->title = $request->input('title');
        $consultation->description = $request->input('description');
        $consultation->time = $request->input('time');
        $consultation->date = $request->input('date');
        $consultation->place = $request->input('place');
        $consultation->status = 'waiting';
        $consultation->save();

        if ($request->input('service_id') == 5) {
            // Set student_id as null for service_id 5
            $consultation->users()->attach($consultation, ['student_id' => null, 'teacher_id' => $teacher->id]);
        } else {
            $studentIds = $request->students_id != null ? implode(',', $request->students_id) : $student->id;
            $consultation->users()->attach($consultation, ['student_id' => $studentIds, 'teacher_id' => $teacher->id]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $consultation
        ]);
    }

    public function archiveSchedule()
    {

        $user = Auth::user();

        // Check if the user is a student or a teacher
        if ($user->role === 'student') {
            // Retrieve the consultations associated with the student
            $classroomId = $user->classroom_id;
        
            // Get the teacher
            $teacher = User::where('role', 'teacher')
                            ->where('classroom_id', $classroomId)
                            ->first();
        
            $teacherCounseling = $teacher->teacherConsultations;
        
            $consultationsWithNullStudent = $teacherCounseling->filter(function ($consultation) {
                return $consultation->pivot->student_id === null;
            });
        
            $studentId = $user->id;
            $studentConsultations = Consultation::whereHas('users', function ($query) use ($studentId) {
                $query->whereRaw("FIND_IN_SET($studentId, student_id)");
            })->get();
        
            $consultations = $consultationsWithNullStudent->concat($studentConsultations);
        
            // Assign the teacher and service names to the consultations
            $consultations = $consultations->map(function ($consultation) use ($teacher) {
                $consultationService = $consultation->service_id;
                $service = ConsultationService::find($consultationService);
                $consultation->teacher_name = $teacher->name;
                $consultation->service_name = $service->name;
                return $consultation;
            });

        } elseif ($user->role === 'teacher') {
            // Retrieve the consultations associated with the teacher
            $students = User::where('role', 'student')->get();
            $consultations = collect();
            $teacherCounseling = $user->teacherConsultations;
            
            foreach ($students as $student) {
                $consultationsForStudent = $student->consultations()
                    ->where('teacher_id', $user->id)
                    ->withPivot('student_id')
                    ->get();
            
                $consultationsForStudent = $consultationsForStudent->map(function ($consultation) {
                    $consultationService = $consultation->service_id;
                    $consultation->service_name = ConsultationService::where('id', $consultationService)->pluck('name')->first();
                    return $consultation;
                });
            
                $consultations = $consultations->concat($consultationsForStudent);
            }

            if ($teacherCounseling->isNotEmpty()) {
                foreach ($teacherCounseling as $consultation) {
                    $consultationService = $consultation->service_id;
    
                    // Get the teacher and service information
                    $service = ConsultationService::find($consultationService);
    
                    $consultationsWithNullStudent = $teacherCounseling->filter(function ($consultation) {
                        $filteredConsultation = $consultation->pivot->student_id === null;
                        return $filteredConsultation ?? null;
                    });
    
                    $consultation->service_name = $service->name;
                }
                $consultations = $consultations->concat($consultationsWithNullStudent);
            }


        } elseif($user->role === 'classroom_teacher') {
            // Retrieve the consultations associated with the teacher
            $students = User::where('role', 'student')->get();
            $classroomId = $user->classroom_id;
            $consultations = collect();
            // Get the teacher and service information
            $teacher = User::where('role', 'teacher')
                            ->where('classroom_id', $classroomId)
                            ->first();

            $teacherCounseling = $teacher->teacherConsultations;
            
            foreach ($students as $student) {
                $consultationsForStudent = $student->consultations()
                    ->where('teacher_id', $teacher->id)
                    ->withPivot('student_id')
                    ->get();
            
                $consultationsForStudent = $consultationsForStudent->map(function ($consultation) {
                    $consultationService = $consultation->service_id;
                    $consultation->service_name = ConsultationService::where('id', $consultationService)->pluck('name')->first();
                    return $consultation;
                });
            
                $consultations = $consultations->concat($consultationsForStudent);
            }

            if ($teacherCounseling->isNotEmpty()) {
                foreach ($teacherCounseling as $consultation) {
                    $consultationService = $consultation->service_id;
    
                    // Get the teacher and service information
                    $service = ConsultationService::find($consultationService);
    
                    $consultationsWithNullStudent = $teacherCounseling->filter(function ($consultation) {
                        $filteredConsultation = $consultation->pivot->student_id === null;
                        return $filteredConsultation ?? null;
                    });
    
                    $consultation->service_name = $service->name;
                }
                $consultations = $consultations->concat($consultationsWithNullStudent);
            }
        }
        
        $groupedConsultations = $consultations->groupBy('id')->map(function ($group) {
            $studentIds = $group->pluck('pivot.student_id')->first();
            $numbers = explode(",", $studentIds);
            $numbers = array_map('intval', $numbers);
            $studentsData = User::whereIn('id', $numbers)->pluck('name')->toArray();
            
            return implode(', ', $studentsData);
        });
        
        $consultations = $consultations->unique('id');

        return view('dashboard.shared.Archive Table.archiveT', compact('consultations', 'groupedConsultations'));
    }

    public function requestForm(Request $request, $id)
    {
        $consultation = Consultation::with('users')->findOrFail($id);

        $studentIds = $consultation->users[0]->pivot->student_id;
        $numbers = explode(",", $studentIds);
        $numbers = array_map('intval', $numbers);
        $students = User::whereIn('id', $numbers)->get();

        return view('dashboard.teacher.Request Form.requestForm', compact('consultation', 'students'));
    }

    public function acceptRequest($id)
    {
        $consultation = Consultation::findOrFail($id);

        $consultation->status = 'approve';
        $consultation->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
        ]);
    }

    public function declineRequest(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'time' => 'required',
            'date' => 'required',
            'place' => 'required',
            'reason' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $consultation->time = $request->input('time');
        $consultation->date = $request->input('date');
        $consultation->place = $request->input('place');
        $consultation->reason = $request->input('reason');
        $consultation->status = 'revised';
        $consultation->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
        ]);
    }
}
