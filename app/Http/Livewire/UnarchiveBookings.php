<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class UnarchiveBookings extends Component
{
    public function unArchiveBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->archived = 0;
        $booking->update();
    }

    public function render()
    {
        $bookings = Booking::where('archived', 1)
            ->latest()
            ->paginate(20);

        return view('livewire.unarchive-bookings', compact('bookings'));
    }

}
