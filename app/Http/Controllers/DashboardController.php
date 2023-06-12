<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        switch (Auth::user()->role) {
            case 'admin':
                return View('dashboard.admin.home');
                break;

            case 'teacher':
                return View('dashboard.teacher.Counseling Teacher.home');
                break;

            case 'classroom_teacher':
                return View('dashboard.teacher.Classroom Teacher.home');
                break;

            case 'student':
                return View('dashboard.student.home');
                break;
        }
    }
}
