<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

   protected $fillable = [
    'court',
    'customer_name',
    'phone_number',
    'start_time',
    'end_time',
    'price',
    'booking_code',
    'status',
];



    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];
}
