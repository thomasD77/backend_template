<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero Content -->
<div class="bg-primary-dark">
    <div class="content content-full text-center pt-7 pb-5">
        <h1 class="h2 text-white mb-2">
            Components
        </h1>
        <h2 class="h4 fw-normal text-white-75">
            Here you can Build & Change the Components!
        </h2>
    </div>
</div>
<!-- END Hero Content -->

<!-- Page Content -->
<div class="bg-body-extra-light">
    <div class="content">
        <div class="row items-push justify-content-center">
            <div class="section w-100">
                <h2>Google Maps</h2>
                <p class="my-1">We search for address in Google Maps, click the "share" button.</p>
                <p class="my-1">We can choose the option "Embed a map". Copy this iframe HTML code in your project.</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2515.1628446178706!2d3.201859651658176!3d50.92070456114867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c337734b4e039f%3A0x7afc46a51ccc3b5b!2sRoeselaarsestraat%20214%2C%208870%20Izegem!5e0!3m2!1sen!2sbe!4v1632469803441!5m2!1sen!2sbe"
                    width="1000" height="550" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
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

