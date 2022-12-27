<?php

namespace App\Filters\Notification;

use App\Filters\AbstractExactFilter;
use Illuminate\Database\Eloquent\Builder;

class QFilter extends AbstractExactFilter
{
    public function filter(Builder $builder, mixed $value): void
    {
        if($value) {
            $builder->where('email', 'LIKE', "%{$value}%");
        }
    }

    public function getBindingName(): string
    {
        return 'q';
    }
}
