<?php

namespace App\UseCases\Notifications;

use App\DTOs\Notifications\StoreNotificationsDTO;
use App\Enums\NotificationStatusEnum;
use App\HttpRepositories\Notification\EmailHttpRepositoryInterface;
use App\Mail\SendNotification;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use Exception;

class StoreNotificationsUseCase
{
    public function execute(string $email, string $message): void
    {
        $notification = new Notification();
        $notification->email = $email;
        $notification->message = $message;

        try {
            Mail::to($email)->send(new SendNotification($message));

            $notification->status = NotificationStatusEnum::SUCCESSED()->getValue();

        } catch (Exception $e) {
            $notification->status = NotificationStatusEnum::NOT_SUCCESSED()->getValue();
        }

        $notification->save();
    }
}
