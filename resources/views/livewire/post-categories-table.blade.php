<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            Post Categories
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
            @if($postcategories)
                @foreach($postcategories as $postcategory)
                    <tr>
                        <td class="text-center">{{$postcategory->id ? $postcategory->id : 'No ID'}}</td>
                        <td>{{$postcategory->name ? $postcategory->name : 'No postcategory'}}</td>
                        <td>{{$postcategory->created_at->diffForHumans()}}</td>
                        <td>{{$postcategory->updated_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-alt-secondary"   data-bs-toggle="modal" data-bs-target="#exampleModal{{$postcategory->id}}" title="Edit Client">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button wire:click="removeCategory({{$postcategory->id}})" type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remove Client">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                                <div wire:ignore.self class="modal fade" id="exampleModal{{$postcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                                <h5 class="modal-title d-flex align-items-center text-dark" id="exampleModalLabel">Edit postcategory</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form wire:submit.prevent="submitFormpostcategory({{$postcategory->id}})">
                                                    <div class="modal-body">
                                                        <div  class="row">
                                                            <div class="col-12">
                                                                <input id="input1" name="name" type="text" class="form-control my-1 styleinput" placeholder="{{$postcategory->name}}" aria-label="Username" aria-describedby="basic-addon1" wire:model="name">
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

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Launch demo modal
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminPostCategoryController@update',$postcategory->id],
                                                    'files'=>false])!!}
                                                <div class="form-group">
                                                    {!! Form::label('Name', 'Name:') !!}
                                                    {!! Form::text('name',$postcategory->name,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="form-group mr-1">
                                                    {!! Form::submit('Update Category',['class'=>'btn btn-primary']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>




