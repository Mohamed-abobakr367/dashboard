<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Canceled = 'canceled';
}
