<?php

namespace App\Services\Chart;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class ChartFormatter
{
    public function generateChart(Collection $items, string $date, string $type)
    {
        $dateCarbon = Carbon::parse($date);

        $start = 1;

        if ($type == 'yearly') {
            $finish = 12;

            for ($i = $start; $i <= $finish; $i++) {
                $dateFormat = $dateCarbon->month($i)->format('Y-m');

                if ($items->has($dateFormat) === false) {
                    $items[$dateFormat] = 0;
                }
            }

        } elseif ($type == 'monthly') {
            $finish = $dateCarbon->daysInMonth;

            for ($i = $start; $i <= $finish; $i++) {
                $dateFormat = $dateCarbon->day($i)->format('Y-m-d');

                if ($items->has($dateFormat) === false) {
                    $items[$dateFormat] = 0;
                }
            }
        }

        return $items->sortKeys();
    }
}
