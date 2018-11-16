<?php

namespace StatusLogger\Tests;

use Illuminate\Database\Eloquent\Model;
use StatusLogger\Traits\HasStatus;

class Order extends Model
{
    use HasStatus;

    protected $table = 'orders';

    protected $guarded = [];
}
