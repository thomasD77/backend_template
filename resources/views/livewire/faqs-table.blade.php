<div class="mb-4 col-6">
    <div>
        <form wire:submit.prevent="submit" method="POST" class="row mb-0 ">
            <div class="input-group border border-1 px-0">
                <button  class="btn btn-alt-primary">
                    <i class="fa fa-plus"></i>
                </button>
                <input wire:model="question"
                       type="text" class="form-control form-control-alt" id="example-group3-input3-alt2" name="question" placeholder="New Faq">
                <button  type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>


<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            Faqs
        </h3>
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
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$faq->id}}">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button wire:click="removeFaq({{$faq->id}})" type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Remove Client">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$faq->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Faq</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-left">
                                        {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminFaqController@update',$faq->id],
                                            'files'=>false])!!}
                                        <div class="form-group mb-3">
                                            {!! Form::label('question', 'Question:',['class'=>'mb-3']) !!}
                                            {!! Form::text('question',$faq->question,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group mb-3">
                                        {!! Form::label('answer', 'Answer:',['class'=>'mb-3']) !!}
                                            {!! Form::textarea('answer',$faq->answer,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group mr-1 mb-3">
                                            {!! Form::submit('Update Faq',['class'=>'btn btn-secondary']) !!}
                                        </div>
                                        {!! Form::close() !!}
{{--                                        <form wire:submit.prevent="updateFaq({{$faq->id}})" method="POST" class="row mb-0 ">--}}
{{--                                            <div class="input-group border border-1 px-0">--}}
{{--                                                <input wire:model="question" type="text" class="form-control form-control-alt" id="example-group3-input3-alt2" placeholder="{{$faq->question}}" name="question">--}}
{{--                                            </div>--}}
{{--                                            <div class="input-group border border-1 px-0">--}}
{{--                                                <input wire:model="answer" type="text" class="form-control form-control-alt" id="example-group3-input3-alt2" name="answer" placeholder="{{$faq->answer}}">--}}
{{--                                            </div>--}}
{{--                                                <button  type="submit" class="btn btn-secondary">--}}
{{--                                                    Submit--}}
{{--                                                </button>--}}
{{--                                        </form>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>





