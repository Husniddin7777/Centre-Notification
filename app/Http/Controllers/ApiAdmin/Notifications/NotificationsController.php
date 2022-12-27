<?php

namespace App\Http\Controllers\ApiAdmin\Notifications;

use App\DTOs\Notifications\RequestNotificationsDTO;
use App\Filters\Notification\QFilter;
use App\Http\Requests\Notification\GetNotificationRequest;
use App\Http\Resources\Notification\NotificationResource;
use App\Models\Notification;
use App\UseCases\Notifications\GetNotificationUseCase;
use Illuminate\Http\Request;

class NotificationsController
{
    public function index(Request $request)
    {
        $notifications = Notification::query()
            ->filterRequest($request, [QFilter::class])
            ->paginate(10);

        return NotificationResource::collection($notifications);
    }

    public function showChart(
        GetNotificationRequest $request,
        GetNotificationUseCase $getNotificationUseCase
    ) {
        $requestNotificationsDTO = RequestNotificationsDTO::fromArray($request->validated());
        return $getNotificationUseCase->execute(
            $requestNotificationsDTO->getDate(),
            $requestNotificationsDTO->getType()
        );
    }
}
