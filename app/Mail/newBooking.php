<?php

namespace App\Mail;

use App\Models\Location;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newBooking extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    public $location;
    public $services;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        //
        $this->booking = $booking;

        $location = Location::findOrFail($this->booking->location_id);
        $this->location = $location;

        $services = $this->booking->services()->get()->pluck('name')->toArray();
        $this->services = $services;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newBooking');
    }
}
