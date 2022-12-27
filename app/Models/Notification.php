<?php

namespace App\Models;

use App\Filters\Notification\NotificationFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $status
 * @property Carbon $created_at
 */

class Notification extends Model
{
    use HasFactory;

    public function scopeFilterRequest(Builder $builder, Request $request, array $filters = []): Builder
    {
        return (new NotificationFilters($request, $builder))->execute($filters);
    }
}
