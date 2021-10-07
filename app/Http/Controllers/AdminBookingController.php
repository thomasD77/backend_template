<?php

namespace App\Http\Controllers;

use App\Mail\newBooking;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Location;
use App\Models\Service;
use App\Models\Status;
use App\Models\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = Booking::paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::pluck( 'lastname','id')->all();

        $services = Service::pluck('name', 'id')
            ->all();
        $locations = Location::pluck('name', 'id')
            ->all();
        $timeslots = Timeslot::pluck('time_from', 'id')
            ->all();
        $statuses = Status::pluck('name', 'id')
            ->all();

        return view('admin.bookings.create', compact('clients', 'services', 'locations', 'timeslots', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $booking = new Booking();
        $booking->location_id = $request->location_id;
        $booking->client_id = $request->client_id;
        $booking->user_id = Auth::user()->id;
        $booking->status_id = $request->status_id;
        $booking->date = $request->date;
        $booking->remarks = $request->remarks;

        $booking->save();

        /**wegschrijven van de tussentabel**/
        $booking->services()->sync($request->services, false);
        $booking->timeslots()->sync($request->timeslots, false);


        if($request->button_submit == 'sendMail')
        {
            $client = Client::findOrFail($booking->client_id);
            Mail::to($client->email)->send(new newBooking($booking));
        }

        return redirect('/admin/bookings');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $booking = Booking::findOrFail($id);

        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $booking = Booking::findOrFail($id);

        $clients = Client::pluck( 'lastname','id')->all();

        $services = Service::pluck('name', 'id')
            ->all();
        $locations = Location::pluck('name', 'id')
            ->all();
        $timeslots = Timeslot::pluck('time_from', 'id')
            ->all();
        $statuses = Status::pluck('name', 'id')
            ->all();

        return view('admin.bookings.edit', compact('clients', 'services', 'locations', 'timeslots', 'statuses', 'booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $booking = Booking::findOrFail($id);
        $booking->location_id = $request->location_id;
        $booking->client_id = $request->client_id;
        $booking->user_id = Auth::user()->id;
        $booking->status_id = $request->status_id;
        $booking->date = $request->date;
        $booking->remarks = $request->remarks;

        $booking->update();

        /**wegschrijven van de tussentabel**/
        $booking->services()->sync($request->services, true);
        $booking->timeslots()->sync($request->timeslots, true);

        return redirect('/admin/bookings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function archive()
    {
        $bookings = Booking::where('archived', 1)
            ->latest()
            ->paginate(20);
        return view('admin.bookings.archive', compact('bookings'));
    }
}
