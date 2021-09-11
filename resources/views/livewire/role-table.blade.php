<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            Roles
        </h3>
    </div>
    <div class="block-content block-content-full overflow-scroll">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
        <table class="table table-striped table-hover table-vcenter  fs-sm">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="d-none d-sm-table-cell" >Name</th>
                <th class="d-none d-sm-table-cell" >Created</th>
                <th class="d-none d-sm-table-cell" >Updated</th>
                <th class="d-none d-sm-table-cell text-center" >Actions</th>
            </tr>
            </thead>
            <tbody>

            @if($roles)
                @foreach($roles as $role)
                    <tr>
                        <td class="text-center">{{$role->id ? $role->id : 'No ID'}}</td>
                        <td>{{$role->name ? $role->name : 'No Role'}}</td>
                        <td>{{$role->created_at->diffForHumans()}}</td>
                        <td>{{$role->updated_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$role->id}}">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button wire:click="removeRole({{$role->id}})" type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remove Client">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                        {{--                        <!-- Modal -->--}}
                        {{--                        <div class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                        {{--                            <div class="modal-dialog">--}}
                        {{--                                <div class="modal-content">--}}
                        {{--                                    <div class="modal-header">--}}
                        {{--                                        <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>--}}
                        {{--                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="modal-body text-left">--}}
                        {{--                                        {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminRolesController@update',$role->id],--}}
                        {{--                                            'files'=>false])!!}--}}
                        {{--                                        <div class="form-group mb-3">--}}
                        {{--                                            {!! Form::label('Name', 'Name:',['class'=>'mb-3']) !!}--}}
                        {{--                                            {!! Form::text('name',$role->name,['class'=>'form-control']) !!}--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="form-group mr-1 mb-3">--}}
                        {{--                                            {!! Form::submit('Update Role',['class'=>'btn btn-secondary']) !!}--}}
                        {{--                                        </div>--}}
                        {{--                                        {!! Form::close() !!}--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div wire:ignore.self class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header ">
                                        <h5 class="modal-title d-flex align-items-center text-dark" id="exampleModalLabel">Edit Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="submitFormRole({{$role->id}})">
                                            <div class="modal-body">
                                                <div  class="row">
                                                    <div class="col-12">

                                                        <input id="input1"
                                                               type="text"
                                                               class="form-control my-1 styleinput"
                                                               aria-label="Username"
                                                               aria-describedby="basic-addon1"
                                                               wire:model="role_name"
                                                               placeholder="{{$role->name}}"
                                                        >
                                                        @error('name')
                                                        <p class="text-danger"> {{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-dark">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script>
                            window.addEventListener('closeModal', event => {
                                $("#exampleModal{{$role->id}}").modal('hide');
                            })
                        </script>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>




