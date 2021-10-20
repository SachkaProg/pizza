<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'status',
        'total',
        'name',
        'phone',
        'city',
        'house',
        'apartment',
        'floor',
        'intercom',
        'korpus',
        'entrance',
        'comment',
        'callback'
    ];
}
