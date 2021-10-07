<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $one->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-primary-dark" style="background-image: url({{asset('images/general/banner6.png')}}); background-size: cover  ; background-repeat: no-repeat ">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="rounded-circle border border-white border border-3" height="80" width="80" src="{{Auth::user() ? asset('/') . Auth::user()->avatar->file : 'http://placehold.it/62x62'}}" alt="{{Auth::user()->name}}">
            </div>
            <h1 class="h2 text-white mb-0">Create Client</h1>
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

    <!-- Client Profile -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Booking Profile</h3>
        </div>
        <div class="block-content">
            <div class="row push">
                <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                        Here you can create a new Booking.
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                    {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminBookingController@store'],
                        'files'=>false])
                   !!}

                    <div class="form-group mb-4">
                        {!! Form::label('client','Select Client:', ['class'=>'form-label']) !!}
                        {!! Form::select('client_id',$clients,null,['class'=>'form-control', 'placeholder'=>'select...'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('service','Select Service:', ['class'=>'form-label']) !!}
                        {!! Form::select('services[]',$services,null,['class'=>'form-control', 'placeholder'=>'select...', 'multiple'=>'multiple'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('location','Select Location:', ['class'=>'form-label']) !!}
                        {!! Form::select('location_id',$locations,null,['class'=>'form-control', 'placeholder'=>'select...'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('date','Select Date:',['class'=>'form-label']) !!}
                        {!! Form::date('date',null ,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('timeslot','Select Timeslot(s):', ['class'=>'form-label']) !!}
                        {!! Form::select('timeslots[]',$timeslots,null,['class'=>'form-control', 'placeholder'=>'select...', 'multiple'=>'multiple'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('bookingStatus','Select Status:', ['class'=>'form-label']) !!}
                        {!! Form::select('status_id',$statuses,null,['class'=>'form-control', 'placeholder'=>'select...'])!!}
                    </div>

                    <div class="form-group  mb-4">
                        {!! Form::label('remarks', 'Remarks:') !!}
                        {!! Form::textarea('remarks',null,['class'=>'form-control']) !!}
                    </div>

                    <button type="button" class="btn btn-alt-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-vcenter">Save</button>
                    <!-- Vertically Centered Block Modal -->
                    <div class="modal" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="block block-rounded block-transparent mb-0">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Submit Booking</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content fs-sm">
                                        <p>Hello,</p>
                                        <p>You are about to Submit your booking.</p>
                                        <p>First, we have an important question for you.</p>
                                        <p>Would you like to let your Client know that you just created this booking?</p>
                                        <p>Then press this button</p>
                                        <div class="form-group mr-1 mb-3">
                                            <button name="button_submit" value="sendMail" type="submit" class="btn btn-alt-primary">Save & Send Email</button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-end bg-body">
                                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="button_submit" value="noMail" class="btn btn-alt-primary">Submit</button>
                                        <p class="text-muted"><small>this submit will only store date, NO e-mail will be send*</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Vertically Centered Block Modal -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- END Client Profile -->

    </div>
<!-- END Page Content -->


<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $one->get_js('js/plugins/es6-promise/es6-promise.auto.min.js'); ?>
<?php $one->get_js('js/plugins/sweetalert2/sweetalert2.min.js'); ?>

<!-- Page JS Code -->
<?php $one->get_js('js/pages/be_comp_dialogs.min.js'); ?>

<?php require '../resources/inc/_global/views/footer_end.php'; ?>
