<div class="block-content block-content-full overflow-scroll">
    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
    <table class="table table-striped table-hover table-vcenter fs-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Registered</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($bookings)
            @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id ? $booking->id : 'No ID'}}</td>
                    <td>{{$booking->client ? $booking->client->firstname : 'No firstname'}} {{""}} {{$booking->client ? $booking->client->lastname : 'No lastname'}}</td>
                    <td>@foreach($booking->services as $service)
                            <li>
                                {{$service->name ? $service->name : 'No Service'}}
                            </li>
                        @endforeach</td>
                    <td>{{$booking->date ? $booking->date : 'No Date'}}</td>
                    <td>
                        <span class="badge badge rounded-pill p-2 {{$booking->status->color}}">
                            {{$booking->status ? $booking->status->name : 'No Status'}}
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Reset booking" wire:click="unArchiveBooking({{$booking->id}})"><i class="si si-refresh "></i></button>
                            <a href="{{route('bookings.show', $booking->id)}}">
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit booking">
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

