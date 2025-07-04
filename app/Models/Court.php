<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $table = 'courts';
    protected $fillable = ['court_name', 'price', 'picture'];
    public $timestamps = false;
}

