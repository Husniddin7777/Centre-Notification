<?php

namespace App\DTOs\Notifications;

class StoreNotificationsDTO
{
    public function __construct(
        private string $email,
        private string $message
    ) {
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            email: $data['email'],
            message: $data['message']
        );
    }
}
