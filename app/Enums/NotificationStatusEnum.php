<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static self SUCCESSED()
 * @method static self NOT_SUCCESSED()
 */

class NotificationStatusEnum extends Enum
{
    private const SUCCESSED = 'Successed';
    private const NOT_SUCCESSED = 'Not successed';
}
