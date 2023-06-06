<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentTController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = null;
        if(Auth::user()->role === 'teacher'){
            $users = User::where('role', 'student')
                ->where('classroom_id', Auth::user()->classroom_id)
                ->paginate(10);
        } elseif(Auth::user()->role === 'admin') {
            $users = User::where('role', 'student')
            ->paginate(10);
        }
        return view('dashboard.shared.Student Table.studentT', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'student';
        $user->classroom_id = $request->input('classroom_id');
        $user->save();

        // Get the classroom name
        if ($user->classroom_id) {
            $classroom = Classroom::find($user->classroom_id);
            $classroomName = $classroom ? $classroom->name : null;
        } else {
            $classroomName = 'No Class';
        }

        $user->classroomName = $classroomName;

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $user
        ]);

        // Redirect or perform additional actions as needed
        // return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Student',
            'data'    => $user
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->role = 'student';

        $user->classroom_id = $request->input('classroom_id');
        if($user->classroom_id) {
            $classroom = Classroom::find($user->classroom_id);
            $classroomName = $classroom ? $classroom->name : null;
        }else {
            $classroomName = 'No Class';
        }
        
        $user->save();

        $user->classroomName = $classroomName;

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diedit!',
            'data'    => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete post by ID
        User::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
            
    }
}
