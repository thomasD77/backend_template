<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class Bookings extends Component
{
    public function archiveBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->archived = 1;
        $booking->update();
    }

    public function render()
    {
        $bookings = Booking::where('archived', 0)
            ->latest()
            ->paginate(20);


        return view('livewire.bookings', compact('bookings'));
    }
}
