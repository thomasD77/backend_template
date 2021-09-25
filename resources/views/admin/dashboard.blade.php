@extends('layouts.backend')

@section('content')
    <style type="text/css">
        body,h1,h2,p{
            margin: 0px;
            padding: 0px;
        }
        .container{
            width:800px;
            margin: 0px auto;
            text-align: justify;
        }
        #main{
            width: 100%;
            height: 100vh;
            background: #0008;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }
        #pop-up{
            text-align: center;
            background: #ffffff;
            box-sizing: border-box;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
    </style>
    <div id="main">
        <div id="pop-up">
            <div class="modal-header d-flex justify-content-between">
                <h1>This is our title.</h1>
                <button id='close-btn' class="btn btn-dark"><i class="fa fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque deleniti ratione ab quos, ad
                    tempora, qui rem in debitis. Officiis aperiam quisquam eum explicabo recusandae officia commodi
                    consequuntur pariatur, voluptate hic inventore quidem necessitatibus laudantium labore eaque
                    reprehenderit animi et!</p>
            </div>
            <div class="modal-footer mb-3">
                Here we ask for action
            </div>
        </div>
    </div>
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
                        <h3 class="block-title">Block Title</h3>
                    </div>
                    <div class="block-content fs-sm text-muted">
                        <p>
                            ...
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Block Title</h3>
                    </div>
                    <div class="block-content fs-sm text-muted">
                        <p>
                            ...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- jquery cdn for POPUP -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{--    Javascript for POPUP--}}
    <script src="{{ asset('js/plugins/popup/popup.js') }}"></script>
@endsection
