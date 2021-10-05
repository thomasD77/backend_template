<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class Bookings extends Component
{
    public function render()
    {
        $bookings = Booking::paginate(15);
        return view('livewire.bookings', compact('bookings'));
    }
}
