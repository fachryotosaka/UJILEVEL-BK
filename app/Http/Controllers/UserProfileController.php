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

    public function deletePhoto(User $user)
    {
        $user->deleteProfilePhoto();
        return redirect()->back();
    }
}
