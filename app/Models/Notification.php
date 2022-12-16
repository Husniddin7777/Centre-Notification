<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id,
 * @property string $email,
 * @property string $phone,
 * @property string $message
 */

class Notification extends Model
{
    use HasFactory;
}
