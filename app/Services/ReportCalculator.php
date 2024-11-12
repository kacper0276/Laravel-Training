<?php

namespace App\Services;

use Carbon\Carbon;

class ReportCalculator
{
    private $data2024;
    private $data2023;
    private $data2024W1;
    private $avgVisitors;

    public function __construct(array $data2024, array $data2023, array $data2024W1, array $avgVisitors)
    {
        $this->data2024 = $data2024;
        $this->data2023 = $data2023;
        $this->data2024W1 = $data2024W1;
        $this->avgVisitors = $avgVisitors;
    }

    public function calculateTotal(array $data): int
    {
        return array_sum($data);
    }

    public function calculatePercentageDifference($current, $previous): string
    {
        if ($previous == 0) {
            return 'N/A';
        }

        $difference = (($current - $previous) / $previous) * 100;
        return round($difference) . '%';
    }

    public function calculateTotals($currentDay): array
    {
        $total2024 = $total2024W1 = $total2023 = $totalAvgVisitors = 0;

        foreach ($this->data2024 as $day => $value) {
            if (array_search($day, array_keys($this->data2024)) <= array_search($currentDay, array_keys($this->data2024))) {
                $total2024 += $this->data2024[$day];
                $total2024W1 += $this->data2024W1[$day];
                $total2023 += $this->data2023[$day];
                $totalAvgVisitors += $this->avgVisitors[$day];
            }
        }

        return [
            '2024' => $total2024,
            '2024W1' => $total2024W1,
            '2023' => $total2023,
            'diff_2024_2023' => $this->calculatePercentageDifference($total2024, $total2023),
            'diff_2024_2024W1' => $this->calculatePercentageDifference($total2024, $total2024W1),
            'avgVisitors' => $totalAvgVisitors,
            'diff_2024_avg' => $this->calculatePercentageDifference($total2024, $totalAvgVisitors),
        ];
    }

    public function calculateDailyDifferences($currentDay): array
    {
        $results = [];
        $daysOfWeek = array_keys($this->data2024);

        foreach ($this->data2024 as $day => $visitors2024) {
            $isPastOrCurrentDay = array_search($day, $daysOfWeek) <= array_search($currentDay, $daysOfWeek);

            if ($isPastOrCurrentDay) {
                $visitors2024W1 = $this->data2024W1[$day] ?? 0;
                $visitors2023 = $this->data2023[$day] ?? 0;
                $avgVisitors = $this->avgVisitors[$day] ?? 0;

                $results[$day] = [
                    '2024' => $visitors2024,
                    '2024W1' => $visitors2024W1,
                    '2023' => $visitors2023,
                    'diff_2024_2023' => $this->calculatePercentageDifference($visitors2024, $visitors2023),
                    'diff_2024_2024W1' => $this->calculatePercentageDifference($visitors2024, $visitors2024W1),
                    'avgVisitors' => $avgVisitors,
                    'diff_2024_avg' => $this->calculatePercentageDifference($visitors2024, $avgVisitors),
                ];
            } else {
                $results[$day] = [
                    '2024' => null,
                    '2024W1' => null,
                    '2023' => $this->data2023[$day],
                    'diff_2024_2023' => null,
                    'diff_2024_2024W1' => null,
                    'avgVisitors' => null,
                    'diff_2024_avg' => null,
                ];
            }
        }

        return $results;
    }
}
