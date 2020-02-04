
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Original URL: http://www.urbanui.com/serein/template/demo/vertical-default-light/pages/samples/login-2.html
    Date Downloaded: 11/30/2018 1:56:42 PM !-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Đăng nhập quyền Admin</title>
    <base href="{{asset('')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin_asset/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.addons.css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin_asset/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="admin_asset/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        @if(count($errors) > 0)
                            <div class='card card-inverse-warning' id='context-menu-access'>
                                <div class='card-body'>
                                    @foreach($errors->all() as $err)
                                        <p class='card-text' style='text-align: center;'>
                                            {{$err}}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if(session('Loi'))
                            <div class='card card-inverse-warning' id='context-menu-access'>
                                <div class='card-body'>
                                    <p class='card-text' style='text-align: center;'>
                                        {{session('Loi')}}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div class="brand-logo">
                            <a href="admin/dangnhap"><img src="admin_asset/images/logo.svg" alt="logo" /></a>
                        </div>
                        <h4>Đăng nhập quyền admin</h4>
                        <form class="pt-3" method="post" action="admin/dangnhap">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg border-left-0" placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Mật khẩu</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" />
                                </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" />
                                        Lưu đăng nhập
                                    </label>
                                </div>
                                <a href="admin/dangky" class="auth-link text-black" style="color: #0d4dff">Đăng ký tài khoản</a>
                            </div>
                            <div class="my-3">
                                <input type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Đăng nhập">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="admin_asset/vendors/js/vendor.bundle.base.js"></script>
<script src="admin_asset/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="admin_asset/js/off-canvas.js"></script>
<script src="admin_asset/js/hoverable-collapse.js"></script>
<script src="admin_asset/js/template.js"></script>
<script src="admin_asset/js/settings.js"></script>
<script src="admin_asset/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>
