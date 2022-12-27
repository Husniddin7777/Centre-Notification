<?php

namespace App\Filters\Notification;

use App\Filters\AbstractFilters;

class NotificationFilters extends AbstractFilters
{
    protected array $filters = [
        QFilter::class,
    ];

    protected function getRequestBindings(): array
    {
        $bindings = [];

        foreach ($this->filters as $filterName) {
            $filterBindingName = (new $filterName)->getBindingName();

            $bindings[$filterBindingName] = $filterName;
        }

        return $bindings;
    }
}
