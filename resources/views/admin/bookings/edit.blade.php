<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-primary-dark" style="background-image: url({{asset('images/general/banner6.png')}}); background-size: cover  ; background-repeat: no-repeat ">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="rounded-circle border border-white border border-3" height="80" width="80" src="{{Auth::user() ? asset('/') . Auth::user()->avatar->file : 'http://placehold.it/62x62'}}" alt="{{Auth::user()->name}}">
            </div>
            <h1 class="h2 text-white mb-0">Update Booking</h1>
            <h2 class="h4 fw-normal text-white-75">
                <?php echo Auth::user()->name; ?>
            </h2>
            <a class="btn btn-alt-secondary" href="{{ asset('/dashboard') }}">
                <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Dashboard
            </a>
        </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">

    <!-- booking Profile -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Booking Profile</h3>
        </div>
        <div class="block-content">
            <div class="row push">
                <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                        Here you can Update your Booking.
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                    {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminBookingController@update', $booking->id],
                        'files'=>false])
                   !!}

                    <div class="form-group mb-4">
                        {!! Form::label('client','Select Client:', ['class'=>'form-label']) !!}
                        {!! Form::select('client_id',$clients, $booking->client->id ,['class'=>'form-control'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('service','Select Service:', ['class'=>'form-label']) !!}
                        {!! Form::select('services[]',$services,$booking->services->pluck('id')->toArray(),['class'=>'form-control', 'multiple'=>'multiple'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('location','Select Location:', ['class'=>'form-label']) !!}
                        {!! Form::select('location_id',$locations,$booking->location->id,['class'=>'form-control'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('date','Select Date:',['class'=>'form-label']) !!}
                        {!! Form::date('date',$booking->date ,['class'=>'form-control']) !!}
                    </div>



                    <div class="form-group mb-4">
                        {!! Form::label('timeslot','Select Timeslot(s):', ['class'=>'form-label']) !!}
                        {!! Form::select('timeslots[]',$timeslots,$booking->timeslots->pluck('id')->toArray(),['class'=>'form-control', 'multiple'=>'multiple'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('bookingStatus','Select Status:', ['class'=>'form-label']) !!}
                        {!! Form::select('status_id',$statuses,$booking->status->id,['class'=>'form-control'])!!}
                    </div>

                    <div class="form-group  mb-4">
                        {!! Form::label('remarks', 'Remarks:') !!}
                        {!! Form::textarea('remarks',$booking->remarks,['class'=>'form-control']) !!}
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-group mr-1">
                            <button type="submit" class="btn btn-alt-primary">Update</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END booking Profile -->


<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
