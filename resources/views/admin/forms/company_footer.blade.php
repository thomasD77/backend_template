<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero Content -->
<div class="bg-primary-dark">
    <div class="content content-full text-center pt-7 pb-5">
        <h1 class="h2 text-white mb-2">
            Company Credentials.
        </h1>
        <h2 class="h4 fw-normal text-white-75">
            Here you can change your Company Info that customers will see on your website!
        </h2>
    </div>
</div>
<!-- END Hero Content -->

<!-- Page Content -->
<div class="bg-body-extra-light">
    <div class="content">
        <div class="row items-push justify-content-center">
            <div class="col-md-10 col-xl-5">
                <form class="row mb-0" name="contactformulier"
                      action="{{action('App\Http\Controllers\AdminCompanyCredentialsController@store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label" for="frontend-contact-firstname">Firstname</label>
                                <input type="text" class="form-control" name="company_firstname"
                                       placeholder="Enter your firstname..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label" for="frontend-contact-lastname">Lastname</label>
                                <input type="text" class="form-control" name="company_lastname"
                                       placeholder="Enter your lastname..">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Company Name</label>
                        <input type="text" class="form-control" name="company_name"
                               placeholder="Enter your Company Name..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Address </label>
                        <input type="text" class="form-control" name="company_address"
                               placeholder="Enter your Address..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Zip </label>
                        <input type="number" class="form-control" name="company_zip" placeholder="Enter your Zip..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">City </label>
                        <input type="text" class="form-control" name="company_city" placeholder="Enter your City..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Country </label>
                        <input type="text" class="form-control" name="company_country"
                               placeholder="Enter your Country..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Phone </label>
                        <input type="text" class="form-control" name="company_phone" placeholder="Enter your Phone..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Mobile </label>
                        <input type="text" class="form-control" name="company_mobile" placeholder="Enter your Mobile..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Email</label>
                        <input type="email" class="form-control" name="company_email" placeholder="Enter your email..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Tag Line </label>
                        <input type="text" class="form-control" name="company_tagline"
                               placeholder="Enter your tagline..">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-msg">Remarks</label>
                        <textarea class="form-control" name="company_remarks" rows="7"
                                  placeholder="Enter your remarks.."></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="frontend-contact-email">Company Logo </label>
                        <input type="file" class="form-control" id="frontend-contact-tagline" name="company_logo">
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-paper-plane me-1 opacity-50"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>

