<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="admin/trangchu"><img src="admin_asset/images/logo/logo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="admin/trangchu"><img src="admin_asset/images/logo/logo.png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle"  href="admin/lienhe/index"  aria-expanded="false">
                    <i class="mdi mdi-email-outline mx-0"></i>
{{--                    <span class="count"></span>--}}
                </a>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="admin_asset/images/person-icon.png" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    @if(Auth::guard('web')->check())
                        <a class="dropdown-item">
                            <i class="mdi mdi-account text-primary"></i>
                            {{Auth::guard('web')->user()->name}}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin/dangxuat">
                            <i class="mdi mdi-logout text-primary"></i>
                            Đăng xuất
                        </a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- partial -->
