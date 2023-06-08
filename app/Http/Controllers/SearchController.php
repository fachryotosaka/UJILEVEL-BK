<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use App\Models\ConsultationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function findClass(Request $request)
    {
        $data = [];
  
        if($request->filled('q')){
            $data = Classroom::select("name", "id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
    
        return response()->json($data);
    }
    public function findUser(Request $request)
    {
        $data = [];

        // $data = User::select("name", "id")->get()->take(2);
  
        if($request->filled('q')){
            $data = User::select("name", "id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
    
        return response()->json($data);
    }

    public function findStudent(Request $request)
    {
        $data = [];

        // $data = User::select("name", "id")->get()->take(2);
  
        if($request->filled('q')){
            $data = User::select("name", "id")
                        ->where('role', 'student')
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
    
        return response()->json($data);
    }

    public function resultUser($id)
    {

        $user = User::findOrFail($id);

        // Get the classroom name
        if ($user->classroom_id) {
            $classroom = Classroom::find($user->classroom_id);
            $classroomName = $classroom ? $classroom->name : null;
        } else {
            $classroomName = 'No Class';
        }

        $user->classroomName = $classroomName;

        return response()->json($user);
    }

    public function getTeacher()
    {
        // Retrieve users with role "teacher" and classroom_id = 1
        $teacher = User::select('id', 'name')
                    ->where('role', 'teacher')
                    ->where('classroom_id', Auth::user()->classroom_id)
                    ->get();

        return response()->json($teacher);
    }

    public function getCounselingService()
    {
        $service = ConsultationService::select('id', 'name')
                            ->get();

        return response()->json($service);
    }
}
