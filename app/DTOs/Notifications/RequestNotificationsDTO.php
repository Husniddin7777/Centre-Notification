<?php

namespace App\DTOs\Notifications;

class RequestNotificationsDTO
{
    public function __construct(
        private string $date,
        private string $type
    ) {
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            date: $data['date'],
            type: $data['type']
        );
    }
}
