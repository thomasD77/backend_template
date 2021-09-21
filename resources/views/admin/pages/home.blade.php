<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero Content -->
<div class="bg-primary-dark">
    <div class="content content-full text-center pt-7 pb-5">
        <h1 class="h2 text-white mb-2">
            Home Page Builder
        </h1>
        <h2 class="h4 fw-normal text-white-75">
            Here you can Build & Change the Content of your Home Page!
        </h2>
    </div>
</div>
<!-- END Hero Content -->

<!-- Page Content -->
<div class="bg-body-extra-light">
    <div class="content">
        <div class="row items-push justify-content-center">
                {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\HomePageController@update',$credential->id],'files'=>true])!!}
                <div class="row">

                    <div class="mb-4">
                        <label class="form-label" for="input_1">Input 1</label>
                        <input type="text" class="form-control" name="input_1"
                               value="{{ $credential->input_1 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 1</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_1" >{{ $credential->text_1 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_2">Input 2</label>
                        <input type="text" class="form-control" name="input_2"
                               value="{{ $credential->input_2 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 2</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_2" >{{ $credential->text_2 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_3">Input 3</label>
                        <input type="text" class="form-control" name="input_3"
                               value="{{ $credential->input_3 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 3</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_3" >{{ $credential->text_3 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_4">Input 4</label>
                        <input type="text" class="form-control" name="input_4"
                               value="{{ $credential->input_4 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 4</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_4" >{{ $credential->text_4 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_5">Input 5</label>
                        <input type="text" class="form-control" name="input_5"
                               value="{{ $credential->input_5 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 5</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_5" >{{ $credential->text_5 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_6">Input 6</label>
                        <input type="text" class="form-control" name="input_6"
                               value="{{ $credential->input_6 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 6</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_6" >{{ $credential->text_6 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_7">Input 7</label>
                        <input type="text" class="form-control" name="input_7"
                               value="{{ $credential->input_7 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 7</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_7" >{{ $credential->text_7 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_8">Input 8</label>
                        <input type="text" class="form-control" name="input_8"
                               value="{{ $credential->input_8 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_9">Text 8</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_8" >{{ $credential->text_8 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_9">Input 9</label>
                        <input type="text" class="form-control" name="input_9"
                               value="{{ $credential->input_9 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 9</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_9" >{{ $credential->text_9 }}</textarea>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label" for="input_10">Input 10</label>
                        <input type="text" class="form-control" name="input_10"
                               value="{{ $credential->input_10 }}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="text_1">Text 10</label>
                        <textarea class="form-control js-ckeditor5-classic"  name="text_10" >{{ $credential->text_10 }}</textarea>
                    </div>




{{--                <div class="mb-4">--}}
{{--                    <label class="form-label">Company Logo</label>--}}
{{--                    <div class="mb-4">--}}
{{--                        @if($photo)--}}
{{--                            <input type="hidden" name="photo" value="{{$photo->id}}">--}}
{{--                        @endif--}}
{{--                        <img class="rounded" height="150" width="150" src="{{$photo ? asset('images/form_credentials') . $photo->file : 'http://placehold.it/62x62'}}" alt="{{$credential->firstname}}">--}}
{{--                    </div>--}}
{{--                    <div class="form-group mb-4">--}}
{{--                        <label class="form-label" for="frontend-contact-email">New Logo? </label>--}}
{{--                        <input type="file" class="form-control" id="frontend-contact-tagline" name="company_logo">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="mb-4">
                    <button type="submit" class="btn btn-alt-primary">
                        <i class="fa fa-paper-plane me-1 opacity-50"></i> Save
                    </button>
                </div>
                </form>
                {!! Form::close() !!}
            </div>
    </div>
</div>
<!-- END Page Content -->


<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>

<?php $one->get_js('js/plugins/ckeditor5-classic/build/ckeditor.js'); ?>

<!-- Page JS Helpers (CKEditor 5 plugins) -->
    <script>One.helpersOnLoad(['js-ckeditor5']);</script>

    <!-- Page JS Plugins -->
<?php $one->get_js('js/plugins/cropperjs/cropper.min.js'); ?>


<?php require '../resources/inc/_global/views/footer_end.php'; ?>
