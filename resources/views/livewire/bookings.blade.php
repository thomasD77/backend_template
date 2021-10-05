<div>
    <table class="table table-striped table-hover table-vcenter fs-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Client</th>
            <th scope="col">Service</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($bookings)
            @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id ? $booking->id : 'No ID'}}</td>
                    <td>{{$booking->client ? $booking->client->firstname : 'No firstname'}}{{$booking->client ? $booking->client->lastname : 'No lastname'}}</td>
                    <td>@foreach($booking->services as $service)
                            {{$service->name ? $service->name : 'No Service'}}
                        @endforeach</td>
                    <td>{{$booking->date ? $booking->date : 'No Date'}}</td>
                    <td>{{$booking->status ? $booking->status->name : 'No Status'}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('bookings.edit', $booking->id)}}">
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit booking">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                            </a>
                            <button class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Archive booking" wire:click="archiveBooking({{$booking->id}})"><i class="fa fa-archive"></i></button>
                            <a href="{{route('bookings.show', $booking->id)}}">
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Show booking">
                                    <i class="far fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {!! $bookings->links()  !!}
</div>

