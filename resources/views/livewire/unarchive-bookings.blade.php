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
                    @php
                        $client = \App\Models\User::where('id', $booking->client_id)->first();
                    @endphp
                    <td>{{$client ? $client->name : 'No name'}}</td>
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
                            <button type="button" class="btn btn-sm btn-alt-danger ms-4 rounded" data-bs-toggle="modal" data-bs-target="#modal-block-small"><i class="far fa-calendar-alt"></i></button>
                            <!-- Small Block Modal -->
                            <div class="modal" id="modal-block-small" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="block block-rounded block-transparent mb-0">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">Are You Sure?</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content fs-sm text-center">
                                                <p>With this button you will delete the Booking date in your Google Calendar</p>
                                                {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminBookingController@destroy', $booking->id],'files'=>false])!!}
                                                <div class="d-flex justify-content-center">
                                                    <div class="form-group mr-1 mb-3">
                                                        <button type="submit" class=" btn btn-alt-primary push" data-bs-toggle="tooltip" title="Delete Google Calendar"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Small Block Modal -->
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



