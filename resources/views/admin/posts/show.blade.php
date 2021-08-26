<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero Content -->
<div class="bg-primary-dark">
    <div class="content content-full text-center pt-7 pb-6">
        <h1 class="h2 text-white mb-2">
            The latest posts only for you.
        </h1>
        <h2 class="h4 fw-normal text-white-75 mb-0">
            Feel free to explore and read.
        </h2>
    </div>
</div>
<!-- END Hero Content -->

<!-- Page Content -->
<div class="content content-boxed">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Story -->
            <div class="push">
                <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.php">

                    <div id="carouselExampleControls" class="carousel slide mb-md-5" data-bs-ride="carousel" data-innterval="100">
                        <div class="carousel-inner">
                            @foreach($post->photos as $photo)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img class="d-block w-100"  src="{{$photo ? asset('images/posts') . $photo->file : 'http://placehold.it/62x62'}}" alt="{{$post->title}}">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="block-content">
                    <h4 class="mb-1">
                        {{ $post->title }}
                    </h4>
                    <p class="fs-sm fw-medium mb-2">
                        <span class="text-primary">{{  $post->postcategory->name }}</span>
                    </p>
                    <p class="fs-sm text-muted">
                        {!! $post->body  !!}
                    </p>
                    <p class="fs-sm fw-medium mb-2">
                        <span class="text-primary">{{  $post->user ? $post->user->name : 'No Author' }}</span><span class="text-muted mx-4">{{ $post->created_at->diffForHumans() }}</span>
                    </p>
                    </div>
                </a>
            </div>
            <!-- END Story -->
        </div>
    </div>
</div>
<!-- END Page Content -->

<!-- Page Content -->
<div class="content">
    <!-- Discussion -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Post with all Comments!</h3>
            <div class="block-options">
                <a class="btn-block-option me-2" href="#forum-reply-form">
                    <i class="far fa-comment"></i> Comment
                </a>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-borderless">
                <tbody>
                @foreach($post->comments->where('reply_id', null) as $comment)
                <tr class="bg-body-dark mt-5">
                    <td class="d-none d-sm-table-cell"></td>
                    <td class="fs-sm text-muted">
                        <a class="fw-semibold" href="be_pages_generic_profile.php">{{ $comment->user->name }} on <span class="text-muted ms-4">{{ $comment->created_at->diffForHumans() }}</span></a>
                    </td>
                </tr>
                <tr>
                    <td class="d-none d-sm-table-cell text-center" style="width: 140px;">

                        <img class="rounded-circle" height="62" width="62" src="{{ $comment->user->avatar ? asset('/') . $comment->user->avatar->file : 'http://placehold.it/62x62'  }}" alt="">

                        <p class="fs-sm fw-medium mt-3">{{ $comment->user->posts->count() . 'Posts' }}</p>
                    </td>
                    <td>
                        {!! $comment->body !!}
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="fs-sm text-muted">There is only one way to avoid criticism: do nothing, say nothing, and be nothing.</p>
                            <button type="button" class="btn btn-alt-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-large"><i class="fa fa-reply me-1"></i>Reply</button>
                        </div>
                    </td>
                </tr>

                <table class="table table-borderless row">
                    <tbody class="col-lg-10 offset-lg-1">
                    @foreach($post->comments->where('reply_id', $comment->id) as $commentReply)
                        <tr class="bg-body-light mt-5">
                            <td class="d-none d-sm-table-cell"></td>
                            <td class="fs-sm text-muted">
                                <a class="fw-semibold" href="be_pages_generic_profile.php">{{ $commentReply->user->name }} on <span class="text-muted ms-4">{{ $commentReply->created_at->diffForHumans() }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-sm-table-cell text-center" style="width: 140px;">

                                <img class="rounded-circle" height="62" width="62" src="{{ $commentReply->user->avatar ? asset('/') . $commentReply->user->avatar->file : 'http://placehold.it/62x62'  }}" alt="">

                                <p class="fs-sm fw-medium mt-3">{{ $commentReply->user->posts->count() . 'Posts' }}</p>
                            </td>
                            <td>
                                {!! $commentReply->body !!}
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p class="fs-sm text-muted">There is only one way to avoid criticism: do nothing, say nothing, and be nothing.</p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>



                <!-- Large Block Modal -->
                <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="block block-rounded block-transparent mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Place your comment reply here...</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content fs-sm">
                                    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminCommentController@storeReply']) !!}
                                    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                                    {{ Form::hidden('comment_id', $comment->id) }}
                                    {{ Form::hidden('post_id', $post->id) }}
                                    {!! Form::button('<i class="fa fa-reply me-1"></i>Reply',['type'=>'submit','class'=>'btn btn-alt-primary my-3']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Large Block Modal -->
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- END Discussion -->

    <!-- Comment -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Please share your thoughts with us!</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-borderless">
                <tbody>
                <tr class="table-active" id="forum-reply-form">
                    <td class="d-none d-sm-table-cell"></td>
                    <td class="fs-sm text-muted">
                        <a class="fw-semibold" href="be_pages_generic_profile.php"><?php echo Auth::user()->name ?></a> type your comment
                    </td>
                </tr>
                <tr>
                    <td class="d-none d-sm-table-cell text-center">
                        <p>
                            <img class="rounded-circle" height="62" width="62" src="<?php echo Auth::user()->avatar ? asset('/') . Auth::user()->avatar->file : 'http://placehold.it/62x62' ?>" alt="">

                        </p>
                        <p class="fs-sm fw-medium"><?php echo (Auth::user()->posts->count() . " " . 'Posts') ?></p>
                    </td>
                    <td>
                        {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminCommentController@store']) !!}
                        <div class="form-group  mb-4">
                            {!! Form::textarea('body',null,['class'=>'form-control', 'id'=>'js-ckeditor5-classic']) !!}
                            @error('body')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
                            {{ Form::hidden('post_id', $post->id) }}
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="form-group mr-1">
                                {!! Form::button('<i class="far fa-comment me-1 opacity-50"></i> Comment',['type'=>'submit','class'=>'btn btn-alt-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Discussion -->
</div>
<!-- END Page Content -->






<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $one->get_js('js/plugins/ckeditor5-classic/build/ckeditor.js'); ?>

<!-- Page JS Helpers (CKEditor 5 plugins) -->
<script>One.helpersOnLoad(['js-ckeditor5']);</script>


<?php require '../resources/inc/_global/views/footer_end.php'; ?>
