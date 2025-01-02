<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Guest extends Model
{
    protected $fillable = [
        'name',
        'description',
        'rank',
        'arrival_time',
        'departure_time',
        'status', // Add the 'status' field here
    ];
}