<?php

namespace App\Exports;

use App\Models\User;
use App\Models\VulnerabilityType;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Font;

class UserExport implements FromView, WithHeadings, WithStyles, ShouldAutoSize, WithCustomStartCell
{
    /**
     * @return View
     */
    public function view(): View
    {
        $users = null;
        if (Auth::user()->role === 'teacher' || Auth::user()->role === 'classroom_teacher') {
            $users = User::with('vulnerabilities')
                ->where('role', 'student')
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

        return view('dashboard.shared.Vulnerability Table.Excel.excel', [
            'excel' => $data
        ]);
    }

    public function headings(): array
    {
        return ["ID", "NAME", "EMAIL", "VULNERABILITIES"];
    }

    public function styles($sheet)
    {
        $sheet->getStyle('1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '4351FF',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $users = User::where('role', 'student')->get();

        foreach ($users as $index => $user) {
            $row = $index + 2; // Start from row 2

            $sheet->getStyle('A' . $row . ':D' . $row)->applyFromArray([
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => $row % 2 === 0 ? 'EFEFEF' : 'F7F7F7',
                    ],
                ],
            ]);
        }
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function export()
    {
        $users = User::where('role', 'student')->get();

        Excel::store(new UserExport, 'users.xlsx');
    }
}
