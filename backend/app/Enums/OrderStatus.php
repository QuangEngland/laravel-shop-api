<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const COMPLETED = 'completed';
    const CANCELED = 'canceled';
}
