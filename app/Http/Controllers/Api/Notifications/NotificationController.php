<?php

namespace App\Http\Controllers\Api\Notifications;

use App\DTOs\Notifications\StoreNotificationsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Notification\SendNotificationRequest;
use App\Jobs\Notification\SendNotificationJob;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function store(SendNotificationRequest $request)
    {
       $storeNotificationDTO = StoreNotificationsDTO::fromArray($request->validated());

       SendNotificationJob::dispatch($storeNotificationDTO->getEmail(), $storeNotificationDTO->getMessage());

       return new JsonResponse(['message' => 'Смс отправляется']);
    }

}
