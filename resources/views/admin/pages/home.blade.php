<?php use Brian2694\Toastr\Facades\Toastr;require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero Content -->
<div class="bg-primary-dark" style="background-image: url({{asset('images/general/banner6.png')}}); background-size: cover  ; background-repeat: no-repeat ">
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


                    <div class="mb-4">
                        <label class="form-label">Photo 1</label>
                        @if(isset($photos[0]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[0] ? asset('images/form_credentials') . $photos[0]->file   : 'http://placehold.it/62x62'}}" alt="photo">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_1">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Photo 2</label>
                        @if(isset($photos[1]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[1] ? asset('images/form_credentials') . $photos[1]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_2">
                        </div>
                    </div>


                    <div class="mb-4">
                        <label class="form-label">Photo 3</label>
                        @if(isset($photos[2]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[2] ? asset('images/form_credentials') . $photos[2]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_3">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Photo 4</label>
                        @if(isset($photos[3]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[3] ? asset('images/form_credentials') . $photos[3]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_4">
                        </div>
                    </div>


                    <div class="mb-4">
                        <label class="form-label">Photo 5</label>
                        @if(isset($photos[4]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[4] ? asset('images/form_credentials') . $photos[4]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_5">
                        </div>
                    </div>



                    <div class="mb-4">
                        <label class="form-label">Photo 6</label>
                        @if(isset($photos[5]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[5] ? asset('images/form_credentials') . $photos[5]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_6">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Photo 7</label>
                        @if(isset($photos[6]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[6] ? asset('images/form_credentials') . $photos[6]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_7">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Photo 8</label>
                        @if(isset($photos[7]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[7] ? asset('images/form_credentials') . $photos[7]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_8">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Photo 9</label>
                        @if(isset($photos[8]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[8] ? asset('images/form_credentials') . $photos[8]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_9">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Photo 10</label>
                        @if(isset($photos[9]))
                        <div class="mb-4">
                            <img class="rounded" height="150" width="150" src="{{$photos[9] ? asset('images/form_credentials') . $photos[9]->file : 'http://placehold.it/62x62'}}" alt="{{$credential->id}}">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="frontend-contact-email">New Photo? </label>
                            <input type="file" class="form-control" id="frontend-contact-tagline" name="photo_10">
                        </div>
                    </div>


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

