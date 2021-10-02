@extends('layouts.backend')

@section('content')

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Dashboard
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Welcome {{Auth::user()->name}}, everything looks great.
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">App</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row row-deck">
            <div class="col-md-6 col-xl-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Welcome</h3>
                    </div>
                    <div class="block-content fs-sm text-muted">
                        <p>
                            We’ve put everything together, so you can start working on your Laravel project as soon as possible! OneUI assets are integrated and work seamlessly with Laravel Mix, so you can use the npm scripts as you would in any other Laravel project.
                        </p>
                        <p>
                            Feel free to use any examples you like from the full HTML version to build your own pages.
                        </p>
                        <p>
                            <strong>Wish you all the best and happy coding!</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Company</h3>
                    </div>
                    <div class="block-content fs-sm text-muted">
                        <p>{{ $company->companyName }}</p>
                        <p>{{ $company->firstname }}</p>
                        <p>{{ $company->lastname }}</p>
                        <p>{{ $company->email }}</p>
                        <p>{{ $company->mobile }}</p>
                        <p>{{ $company->tagline }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Logo</h3>
                    </div>
                    <div class="block-content d-flex justify-content-center align-items-center">
                        @if($photos)
                            @php
                                $photo = \App\Models\Photo::where('credential_id', $company->id)->first()
                            @endphp

                            @if($photo)
                                <input type="hidden" name="photo" value="{{$photo->id}}">
                            @endif
                        @endif
                        <img class="rounded" height="250" width="250" src="{{$photo ? asset('images/form_credentials') . $photo->file : 'http://placehold.it/62x62'}}" alt="{{$company->firstname}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

@endsection
