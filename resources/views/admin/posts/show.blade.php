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
                        <span class="text-primary">{{  $post->user->name }}</span><span class="text-muted mx-4">{{ $post->created_at->diffForHumans() }}</span>
                    </p>
                    </div>
                </a>
            </div>
            <!-- END Story -->
        </div>
    </div>
</div>
<!-- END Page Content -->


<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
