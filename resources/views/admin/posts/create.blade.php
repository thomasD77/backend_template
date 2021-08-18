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
          <img class="rounded-circle border border-white border border-3" height="80" width="80" src="{{Auth::user()->avatar ? asset('/') . Auth::user()->avatar->file : 'http://placehold.it/62x62'}}" alt="{{Auth::user()->name}}">
      </div>
      <h1 class="h2 text-white mb-0">Add Post</h1>
      <h2 class="h4 fw-normal text-white-75">
          <?php echo Auth::user()->name; ?>
      </h2>
      <a class="btn btn-alt-secondary" href="{{route('posts.index')}}">
        <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Posts
      </a>
    </div>
  </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
  <!-- User Profile -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">New Post</h3>
    </div>
    <div class="block-content">
          <div class="row push">

          <div class="col-12">

              {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminPostController@store','files'=>true]) !!}

              <div class="col-6 form-group mb-4">
                  {!! Form::label('title', 'Title:') !!}
                  {!! Form::text('title',null,['class'=>'form-control']) !!}
              </div>
              <div class="col-6 form-group  mb-4">
                  {!! Form::label('Select Category:') !!}
                  {!! Form::select('postcategories[]',$postcategories,null,['class'=>'form-control'])!!}
              </div>

              <div class="col-6 form-group mb-4">
                  {!! Form::label('Select Publish Date:') !!}
                  <input id="datePost" name="datePost" type="date" class="form-control"
                         placeholder="Select date submission" data-inline="month" data-enable-time="false">
              </div>


              <div class="form-group  mb-4">
                  {!! Form::label('body', 'Description:') !!}
                  {!! Form::textarea('body',null,['class'=>'form-control']) !!}
              </div>

              <div class="mb-4">
                  <label class="form-label">Photo</label>
                  <div class="form-group mb-4">
                      {!! Form::label('photo_id', 'Choose a new photo:') !!}
                      {!! Form::file('photo_id',['class'=>'form-control']) !!}
                  </div>
              </div>

              <div class="d-flex justify-content-between">
                  <div class="form-group mr-1">
                      {!! Form::submit('Create',['class'=>'btn btn-alt-primary']) !!}
                  </div>
                  {!! Form::close() !!}
              </div>

          </div>
        </div>
      </div>
  </div>
  <!-- END User Profile -->


<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
