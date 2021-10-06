<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_from',
        'time_to'
    ];

    //Veel op Veel relaties

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_timeslot');
    }
}
