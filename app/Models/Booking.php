<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // app/Models/Booking.php

public function court()
{
    return $this->belongsTo(Court::class);
}


   protected $fillable = [
    'court_id',
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


    protected $dates = ['start_time', 'end_time'];




}
