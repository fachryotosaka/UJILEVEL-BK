<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\ConsultationService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Casts\Attribute;

class editScheduleMobile extends Controller
{
    public function show(Request $request)
    {
        return response()->json([
            'success' => true,
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function updateprofile(Request $request, $id)
    {

        $user = User::findOrFail($id);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the user
        $user->name = $request->input('name');
        // $user->email = $request->input('email');

        if($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        
        $user->save();

        // $user->classroomName = $classroomName;

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diedit!',
            'data'    => $user
        ]);
      }
}
