<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\VulnerabilityType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function view()
    {
        $users = null;
        if (Auth::user()->role === 'teacher' || Auth::user()->role === 'classroom_teacher') {
            $users = User::with('vulnerabilities')->where('role', 'student')
                ->where('classroom_id', Auth::user()->classroom_id)
                ->paginate(10);
        }

        $data = collect();

        if (!is_null($users)) {
            foreach ($users as $user) {
                $vulnerabilityData = [];

                foreach ($user->vulnerabilities as $vulnerability) {
                    $vulnerabilityData[] = $vulnerability->vulnerability_type;
                }

                $vulnerabilityTypeIds = collect($vulnerabilityData)
                    ->flatMap(function ($vulnerability) {
                        return explode(',', $vulnerability);
                    })
                    ->map(function ($vulnerabilityTypeId) {
                        return intval($vulnerabilityTypeId);
                    })
                    ->toArray();

                $vulnerabilityNames = VulnerabilityType::whereIn('id', $vulnerabilityTypeIds)
                    ->pluck('name')
                    ->toArray();

                $user->vulnerability_name = implode(', ', $vulnerabilityNames);

                $data->push([
                    'ID' => $user->id,
                    'NAME' => $user->name,
                    'EMAIL' => $user->email,
                    'VULNERABILITIES' => $user->vulnerability_name,
                ]);
            }
        }

        $pdf = PDF::loadView('licencie_structure.show', compact('data'));
        return $pdf->download('invoice.pdf');

    }
}
