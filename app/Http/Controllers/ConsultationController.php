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

        if(Auth::user()->role === 'student'){
            $student = User::findOrFail(Auth::user()->id);
            $teacher = User::findOrFail($request->input('teacher_id'));
        } elseif(Auth::user()->role === 'teacher' && $request->input('student_id') != null) {
            $student = User::findOrFail($request->input('student_id'));
            $teacher = User::findOrFail(Auth::user()->id);
        } elseif(Auth::user()->role === 'teacher' && $request->input('students_id') != null) {
            $students = User::findOrFail($request->input('students_id'));
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
        } else {
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

        if($request->students_id != null){
            foreach ($request->students_id as $studentId) {
                $consultation->users()->attach($consultation, ['student_id' => $studentId, 'teacher_id' => $teacher->id]);
            }
        } else {
            $consultation->users()->attach($consultation, ['student_id' => $student->id, 'teacher_id' => $teacher->id]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $consultation
        ]);
    }

    public function getRequest()
    {
        $user = Auth::user();

        // Retrieve the consultations associated with the teacher
        $students = User::where('role', 'student')->get();
        $consultations = collect();
        
        foreach ($students as $student) {
            $consultationsForStudent = $student->consultations()
                ->where('teacher_id', $user->id)
                ->whereIn('status', ['waiting', 'approve'])
                ->withPivot('student_id')
                ->get();
        
            $consultationsForStudent = $consultationsForStudent->map(function ($consultation) use ($student) {
                $consultationService = $consultation->service_id;
                $consultation->service_name = ConsultationService::where('id', $consultationService)->pluck('name')->first();
                return $consultation;
            });
        
            $consultations = $consultations->merge($consultationsForStudent);
        }
        
        $groupedConsultations = $consultations->groupBy('id')->map(function ($group) {
            $students = [];
        
            foreach ($group as $student) {
                $student_id = $student->pivot->student_id; // Access the pivot data
                $studentData = User::where('id', $student_id)->pluck('name')->first();
        
                $students[] = $studentData;
            }
        
            return $students;
        });

        $consultations = $consultations->unique('id');
                
        return view('dashboard.teacher.Request Table.requestT', compact('consultations', 'groupedConsultations'));
    }

    public function archiveSchedule()
    {

        $user = Auth::user();

        // Check if the user is a student or a teacher
        if ($user->role === 'student') {
            // Retrieve the consultations associated with the student
            $consultations = $user->consultations;
            // Get the teacher name for each consultation
            foreach ($consultations as $consultation) {
                $teacherId = $consultation->pivot->teacher_id;
                $consultationService = $consultation->service_id;
                $teacher = User::find($teacherId);
                $consultation->teacher_name = $teacher->name;
                $consultation->service_name = ConsultationService::where('id', $consultationService)->pluck('name')->first();
            }

        } elseif ($user->role === 'teacher') {
            // Retrieve the consultations associated with the teacher
            $students = User::where('role', 'student')->get();
            $consultations = collect();
            
            foreach ($students as $student) {
                $consultationsForStudent = $student->consultations()
                    ->where('teacher_id', $user->id)
                    ->whereIn('status', ['revised', 'finished'])
                    ->withPivot('student_id')
                    ->get();
            
                $consultationsForStudent = $consultationsForStudent->map(function ($consultation) use ($student) {
                    $consultationService = $consultation->service_id;
                    $consultation->service_name = ConsultationService::where('id', $consultationService)->pluck('name')->first();
                    return $consultation;
                });
            
                $consultations = $consultations->concat($consultationsForStudent);
            }
        }
        
        $groupedConsultations = $consultations->groupBy('id')->map(function ($group) {
            $students = [];
        
            foreach ($group as $student) {
                $student_id = $student->pivot->student_id; // Access the pivot data
                $studentData = User::where('id', $student_id)->pluck('name')->first();
        
                $students[] = $studentData;
            }
        
            return $students;
        });

        $consultations = $consultations->unique('id');
        

        return view('dashboard.shared.Archive Table.archiveT', compact('consultations', 'groupedConsultations'));
    }

    public function requestForm(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);

        $students = [];

        foreach ($consultation->users as $item) {
            $studentId = $item->pivot->student_id;
            $student = User::find($studentId);
            $students[] = $student;
        }

        return view('dashboard.teacher.Request Table.requestForm', compact('consultation', 'students'));
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
