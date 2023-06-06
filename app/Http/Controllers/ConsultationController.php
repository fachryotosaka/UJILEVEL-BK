<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    public function requestSchedule(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $student = User::findOrFail(Auth::user()->id);
        $teacher = User::findOrFail($request->input('teacher_id'));

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

        // Create the request schedule
        $consultation = new Consultation();
        $consultation->title = $request->input('title');
        $consultation->description = $request->input('description');
        $consultation->status = 'waiting';
        $consultation->save();

        $consultation->users()->attach($consultation, ['student_id' => $student->id, 'teacher_id' => $teacher->id]);

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
                $consultation->student_name = $student->name;
                return $consultation;
            });
    
            $consultations = $consultations->merge($consultationsForStudent);
        }

        return view('dashboard.teacher.Request Table.requestT', compact('consultations'));
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
                $teacher = User::find($teacherId);
                $consultation->teacher_name = $teacher->name;
            }
        } elseif ($user->role === 'teacher') {
            // Retrieve the consultations associated with the teacher
            $students = User::where('role', 'student')->get();
            $consultations = collect();
            
            foreach ($students as $student) {
                $consultationsForStudent = $student->consultations()
                ->where('teacher_id', $user->id)
                ->whereIn('status', ['decline', 'finished'])
                ->withPivot('student_id')
                ->get();

                $consultationsForStudent = $consultationsForStudent->map(function ($consultation) use ($student) {
                    $consultation->student_name = $student->name;
                    return $consultation;
                });
        
                $consultations = $consultations->merge($consultationsForStudent);
            }
        }

        return view('dashboard.shared.Archive Table.archiveT', compact('consultations'));
    }

    public function requestForm(Request $request, $id, $action = null)
    {
        $consultation = Consultation::findOrFail($id);

        foreach ($consultation->users as $item) {
            $studentId = $item->pivot->student_id;
            $student = User::find($studentId);
        }

        return view('dashboard.teacher.Request Table.requestForm', compact('consultation', 'student', 'action'));
    }

    public function acceptRequest(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'time' => 'required',
            'date' => 'required',
            'place' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $consultation->time = $request->input('time');
        $consultation->date = $request->input('date');
        $consultation->place = $request->input('place');
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
            'reason' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $consultation->reason = $request->input('reason');
        $consultation->status = 'decline';
        $consultation->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
        ]);
    }
}
