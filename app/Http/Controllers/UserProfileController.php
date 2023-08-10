<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show(Request $request)
    {
        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    function addProfilePhoto(Request $request) {
        $user = auth()->user();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $user->updateProfilePhoto($photo);

            return response()->json(['message' => 'Profile photo updated']);
        }

        return response()->json(['message' => 'No photo was uploaded'], 400);
    }

    public function deleteProfilePhoto()
    {
        $user = auth()->user();

        if ($user->profile_photo_path) {
            $user->deleteProfilePhoto();
            return response()->json(['message' => 'Profile photo deleted successfully']);
        }

        return response()->json(['message' => 'No profile photo found for the user'], 404);
    }


}