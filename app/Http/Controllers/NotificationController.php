<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Mail\SendNotification;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendNotification(NotificationRequest $request)
    {
        $email = $request->input('email');
        $messages = $request->input('message');

        Mail::to($email)->send(new SendNotification($messages));

        $notification = new Notification();
        $notification->email = $email;
        $notification->message = $messages;
        $notification->save();

        if (!$notification) {
            return response()->json(['message' => 'История не сохронилось!'], 404);
        }
        return $notification;
    }
}
