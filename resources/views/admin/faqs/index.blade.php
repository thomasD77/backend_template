@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">DataTable</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Faqs
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Faqs
                </h3>
                <a href="{{route('faqs.create')}}"><button data-bs-toggle="tooltip" title="New Faq" class="btn btn-alt-primary"><i class="fa fa-plus"></i></button></a>
            </div>
            <div class="block-content block-content-full overflow-scroll">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-striped table-hover table-vcenter  fs-sm">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="d-none d-sm-table-cell" >Question</th>
                        <th class="d-none d-sm-table-cell" >Created</th>
                        <th class="d-none d-sm-table-cell" >Updated</th>
                        <th class="d-none d-sm-table-cell text-center" >Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($faqs)
                        @foreach($faqs as $faq)
                            <tr>
                                <td class="text-center">{{$faq->id ? $faq->id : 'No ID'}}</td>
                                <td>{{$faq->question ? $faq->question : 'No question'}}</td>
                                <td>{{$faq->created_at->diffForHumans()}}</td>
                                <td>{{$faq->updated_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <!-- Button trigger modal -->
                                        <a href="{{route('faqs.edit', $faq->id)}}"><button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit Faq">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button></a>
                                        <a href="{{route('faqs.delete', $faq->id)}}"><button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remove Faq">
                                                <i class="fa fa-fw fa-times"></i>
                                        </button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $faqs->links()  !!}
        </div>
    </div>
    <!-- END Page Content -->
@endsection
