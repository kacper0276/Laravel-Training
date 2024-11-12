<?php

namespace App\Http\Controllers;

use App\Services\ReportCalculator;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function generateDailyFootfallReport(Request $request)
    {
        $data2024 = [
            'Monday' => 5737,
            'Tuesday' => 8399,
            'Wednesday' => 8950,
            'Thursday' => 8893,
            'Friday' => 11273,
            'Saturday' => 14798,
            'Sunday' => 9936,
        ];

        $data2024W1 = [
            'Monday' => 4301,
            'Tuesday' => 7391,
            'Wednesday' => 8932,
            'Thursday' => 9117,
            'Friday' => 11325,
            'Saturday' => 15110,
            'Sunday' => 10020,
        ];

        $data2023 = [
            'Monday' => 7485,
            'Tuesday' => 8710,
            'Wednesday' => 7253,
            'Thursday' => 8017,
            'Friday' => 10770,
            'Saturday' => 14475,
            'Sunday' => 12411,
        ];

        $avgVisitors = [
            'Monday' => 7011,
            'Tuesday' => 7702,
            'Wednesday' => 7883,
            'Thursday' => 8438,
            'Friday' => 10547,
            'Saturday' => 15953,
            'Sunday' => 11574,
        ];

        $events2024 = [
            'Monday' => 0,
            'Tuesday' => 2,
            'Wednesday' => 1,
            'Thursday' => 0,
            'Friday' => 3,
            'Saturday' => 4,
            'Sunday' => 2,
        ];

        $currentDay = Carbon::now()->format('l');
        $calculator = new ReportCalculator($data2024, $data2023, $data2024W1, $avgVisitors);

        $totals = $calculator->calculateTotals($currentDay);
        $dailyDifferences = $calculator->calculateDailyDifferences($currentDay);

        $data = [
            'date' => Carbon::now()->format('d-m-Y'),
            'week' => Carbon::now()->weekOfYear,
            'rows' => $dailyDifferences,
            'totals' => $totals,
        ];

        $pdf = Pdf::loadView('pdf.pdf', $data);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('daily_footfall_report_' . $data['date'] . '.pdf');
    }
}
