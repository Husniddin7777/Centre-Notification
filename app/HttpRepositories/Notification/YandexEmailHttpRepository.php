<?php

namespace App\HttpRepositories\Notification;

use App\DTOs\Notifications\StoreNotificationsDTO;
use App\Mail\SendNotification;
use Illuminate\Support\Facades\Mail;

class YandexEmailHttpRepository implements EmailHttpRepositoryInterface
{

    public function sendNotification(StoreNotificationsDTO $storeNotificationsDTO): void
    {
        $message = $storeNotificationsDTO->getMessage();

        Mail::to($storeNotificationsDTO->getEmail())->send(new SendNotification($message));
    }
}
