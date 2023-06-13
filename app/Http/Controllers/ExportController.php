<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //EXPORT

    public function export(){
        return Excel::download(new UserExport, 'user.xlsx');
    }
    
}
