<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'user_id',
        'client_id',
        'bookingStatus_id',
        'date'
    ];

    // Een op Veel relaties
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bookingStatus()
    {
        return $this->belongsTo(BookingStatus::class);
    }

    //Veel op Veel relaties
    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_service');
    }




}
