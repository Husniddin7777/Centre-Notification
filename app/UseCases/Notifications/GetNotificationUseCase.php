<?php

namespace App\UseCases\Notifications;

use App\Models\Notification;
use App\Services\Chart\ChartFormatter;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GetNotificationUseCase
{
    public function __construct(
        private ChartFormatter $chartFormatter
    ) {
    }

    public function execute(string $date, string $type)
    {
        $dateCarbon = Carbon::parse($date);

        $notifications = Notification::query()
            ->select(DB::raw("count(id) as count"));

        if ($type == 'yearly') {
            $notifications->addSelect([
                DB::raw("date_format(created_at, '%Y-%m') as date")
            ])->whereYear('created_at', '=', $dateCarbon->year);

        } elseif($type == 'monthly') {
            $notifications->addSelect([
                DB::raw("date_format(created_at, '%Y-%m-%d') as date")
            ])->whereMonth('created_at', '=', $dateCarbon->month);
        }

        $items = $notifications->groupBy('date')->pluck('count', 'date');

        return $this->chartFormatter->generateChart($items, $date, $type);
    }
}
