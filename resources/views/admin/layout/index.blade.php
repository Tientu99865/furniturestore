
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <base href="{{asset('')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin_asset/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin_asset/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="admin_asset/images/favicon.png" />

    <script src="admin_asset/ckeditor/ckeditor.js"></script>
</head>

<body>
<div class="container-scroller">

    @include('admin/layout/header')

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin/layout/sidebar')
        <!-- partial -->
        <div class="main-panel">

        @yield('content')

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="admin_asset/vendors/js/vendor.bundle.base.js"></script>
<script src="admin_asset/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="admin_asset/js/off-canvas.js"></script>
<script src="admin_asset/js/hoverable-collapse.js"></script>
<script src="admin_asset/js/template.js"></script>
<script src="admin_asset/js/settings.js"></script>
<script src="admin_asset/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="admin_asset/js/dashboard.js"></script>
<!-- End custom js for this page-->

@yield('script')


</body>

</html>
