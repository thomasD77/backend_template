<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-image" style="background-image: url('http://localhost/backend_template/public/media/photos/photo10@2x.jpg');">
    <div class="bg-primary-dark-op">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="rounded-circle border border-white border border-3" height="80" width="80" src="{{Auth::user() ? asset('/') . Auth::user()->avatar->file : 'http://placehold.it/62x62'}}" alt="{{Auth::user()->name}}">
            </div>
            <h1 class="h2 text-white mb-0">Update Client</h1>
            <h2 class="h4 fw-normal text-white-75">
                <?php echo Auth::user()->name; ?>
            </h2>
            <a class="btn btn-alt-secondary" href="{{ asset('/dashboard') }}">
                <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">

    <!-- Client Profile -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Client Profile</h3>
        </div>
        <div class="block-content">
            <div class="row push">
                <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                        Here you can Update your Happy Client.
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                    {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminClientController@update', $client->id],
                        'files'=>false])
                   !!}
                    <div class="form-group mb-4">
                        {!! Form::label('firstname','First Name:',['class'=>'form-label']) !!}
                        {!! Form::text('firstname',$client->firstname ,['class'=>'form-control']) !!}

                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('lastname','Last Name:',['class'=>'form-label']) !!}
                        {!! Form::text('lastname',$client->lastname ,['class'=>'form-control']) !!}

                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('email','E-mail:', ['class'=>'form-label']) !!}
                        {!! Form::text('email',$client->email,['class'=>'form-control']) !!}

                    </div>

                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                        {!! Form::label('loyal','Select Loyalty:', ['class'=>'form-label']) !!}
                        <a data-bs-toggle="tooltip" title="New Loyalty" class="btn btn-alt-primary mb-1" href="{{route('loyals.index')}}"><i class="fa fa-plus"></i></a>
                        </div>
                        {!! Form::select('loyal_id',$loyals,$client->loyal->id,['class'=>'form-control'])!!}
                    </div>

                    <div class="form-group mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                        {!! Form::label('source','Select Source:', ['class'=>'form-label']) !!}
                        <a data-bs-toggle="tooltip" title="New Source" class="btn btn-alt-primary mb-1" href="{{route('sources.index')}}"><i class="fa fa-plus"></i></a>
                        </div>
                        {!! Form::select('source_id',$sources,$client->source->id,['class'=>'form-control'])!!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('remarks','Remarks:',['class'=>'form-label']) !!}
                        {!! Form::textarea('remarks',$client->remarks ,['class'=>'form-control']) !!}
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
    <!-- END Client Profile -->

    <!-- Address Information -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Address Information</h3>
        </div>

        @if($client->address == null)
            <div class="block-content">
            <div class="row push">
                <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                        Create Address information for your Happy Client.
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">

                    {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminAddressesController@store', $client->id]]) !!}

                    <div class="d-none">
                        {!! Form::text('client',$client->id ,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('company','Company (Optional):',['class'=>'form-label']) !!}
                        {!! Form::text('company',null,['class'=>'form-control']) !!}
                        @error('company')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('streetAddress1','Street Address 1:',['class'=>'form-label']) !!}
                        {!! Form::text('streetAddress1',null,['class'=>'form-control']) !!}
                        @error('streetAddress1')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('streetAddress2','Street Address 2 (Optional):',['class'=>'form-label']) !!}
                        {!! Form::text('streetAddress2',null,['class'=>'form-control']) !!}
                        @error('streetAddress2')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('city','City:',['class'=>'form-label']) !!}
                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                        @error('city')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('postalCode','Postal Code:',['class'=>'form-label']) !!}
                        {!! Form::text('postalCode',null,['class'=>'form-control']) !!}
                        @error('postalCode')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('VAT','VAT Number:',['class'=>'form-label']) !!}
                        {!! Form::text('VAT',null,['class'=>'form-control']) !!}
                        @error('VAT')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-group mr-1">
                            <button type="submit" class="btn btn-alt-primary">Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="block-content">
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            Update Address information for your Happy Client.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">

                        {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminAddressesController@update', $client->address]]) !!}

                        <div class="form-group mb-4">
                            {!! Form::label('company','Company (Optional):',['class'=>'form-label']) !!}
                            {!! Form::text('company',$client->address->company,['class'=>'form-control']) !!}
                            @error('company')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            {!! Form::label('streetAddress1','Street Address 1:',['class'=>'form-label']) !!}
                            {!! Form::text('streetAddress1',$client->address->streetAddress1,['class'=>'form-control']) !!}
                            @error('streetAddress1')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            {!! Form::label('streetAddress2','Street Address 2 (Optional):',['class'=>'form-label']) !!}
                            {!! Form::text('streetAddress2',$client->address->streetAddress2,['class'=>'form-control']) !!}
                            @error('streetAddress2')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            {!! Form::label('city','City:',['class'=>'form-label']) !!}
                            {!! Form::text('city',$client->address->city,['class'=>'form-control']) !!}
                            @error('city')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            {!! Form::label('postalCode','Postal Code:',['class'=>'form-label']) !!}
                            {!! Form::text('postalCode',$client->address->postalCode,['class'=>'form-control']) !!}
                            @error('postalCode')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            {!! Form::label('VAT','VAT Number:',['class'=>'form-label']) !!}
                            {!! Form::text('VAT',$client->address->VAT,['class'=>'form-control']) !!}
                            @error('VAT')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
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
        @endif
        <!-- END Address Information -->

    </div>
    <!-- END Page Content -->


<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
