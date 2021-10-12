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
                    @php
                        $client = \App\Models\User::where('id', $booking->client_id)->first();
                    @endphp
                    <td>{{$client ? $client->name : 'No name'}}</td>
                    <td>@foreach($booking->services as $service)
                            <li>
                                {{$service->name ? $service->name : 'No Service'}}
                            </li>
                        @endforeach</td>
                    <td>
                        {{$booking->date ? $booking->date : 'No Date'}}
                        <div>
                            <span class="badge badge rounded-pill text-white bg-dark">{{ $booking->startTime }}</span>
                            <span class="badge badge rounded-pill text-white bg-dark">{{ $booking->endTime }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge rounded-pill p-2 {{$booking->status->color}}">
                            {{$booking->status ? $booking->status->name : 'No Status'}}
                        </span>
                    </td>
                    <td>
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

