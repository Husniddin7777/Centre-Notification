<?php

namespace App\Http\Resources\Notification;

use App\Models\Notification;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Notification $this */

        return [
            'id' => $this->id,
            'email' => $this->email,
            'message' => $this->message,
            'status' => $this->status,
            'created_at' => $this->created_at
        ];

    }
}
