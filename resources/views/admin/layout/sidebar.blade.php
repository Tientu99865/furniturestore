<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="admin/trangchu">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">Trang chủ</span>
            </a>
        </li>
        @can('view categories','add categories')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                   aria-controls="ui-basic">
                    <i class="mdi mdi-puzzle-outline menu-icon"></i>
                    <span class="menu-title">Quản lý danh mục</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        @can('add categories')
                            <li class="nav-item"><a class="nav-link" href="admin/danhmuc/them">Thêm danh mục</a></li>
                        @endcan
                        @can('add categories')
                            <li class="nav-item"><a class="nav-link" href="admin/danhmuc/danhsach">Danh sách danh
                                    mục</a></li>
                        @endcan

                    </ul>
                </div>
            </li>
        @endcan
        @can('view products','add products')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false"
                   aria-controls="editors">
                    <i class="mdi mdi-pencil-box-outline menu-icon"></i>
                    <span class="menu-title">Quản lý sản phẩm</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="editors">
                    <ul class="nav flex-column sub-menu">
                        @can('add products')
                            <li class="nav-item"><a class="nav-link" href="admin/sanpham/them">Thêm sản phẩm</a></li>
                        @endcan
                        @can('view products')
                            <li class="nav-item"><a class="nav-link" href="admin/sanpham/danhsach">Danh sách sản
                                    phẩm</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        @can('view slides','add slides')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false"
                   aria-controls="ui-advanced">
                    <i class="mdi mdi-bullseye-arrow menu-icon"></i>
                    <span class="menu-title">Quản lý slides</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-advanced">
                    <ul class="nav flex-column sub-menu">
                        @can('add slides')
                            <li class="nav-item"><a class="nav-link" href="admin/slide/them">Thêm slide</a></li>
                        @endcan
                        @can('view slides')
                            <li class="nav-item"><a class="nav-link" href="admin/slide/danhsach">Danh sách slide</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        @can('view users')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                    <i class="mdi mdi-comment-account-outline menu-icon"></i>
                    <span class="menu-title">Quản lý tài khoản</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="admin/users/danhsachadmin">Danh sách Admin</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="admin/users/danhsachnguoidung">Danh sách người
                                dùng</a></li>
                    </ul>
                </div>
            </li>
        @endcan
        @can('add roles','view roles')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                   aria-controls="general-pages">
                    <i class="mdi mdi-codepen menu-icon"></i>
                    <span class="menu-title">Quản lý chức vụ</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav flex-column sub-menu">
                        @can('add roles')
                            <li class="nav-item"><a class="nav-link" href="admin/chucvu/them"> Thêm chức vụ </a></li>
                        @endcan
                        @can('view roles')
                            <li class="nav-item"><a class="nav-link" href="admin/chucvu/danhsach"> Danh sách chức
                                    vụ </a></li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        @can('view comments')
            <li class="nav-item">
                <a class="nav-link" href="admin/quanlybinhluan/danhsach">
                    <i class="mdi mdi-bell-ring-outline menu-icon"></i>
                    <span class="menu-title">Quản lý bình luận</span>
                </a>
            </li>
        @endcan
        @can('view invoices')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#invoice-pages" aria-expanded="false"
                   aria-controls="general-pages">
                    <i class="mdi mdi-playlist-check menu-icon"></i>
                    <span class="menu-title">Quản lý giao dịch</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="invoice-pages">
                    <ul class="nav flex-column sub-menu">
                        @can('view import invoices')
                            <li class="nav-item"><a class="nav-link" href="admin/giaodich/hoadonnhap/danhsach"> Hoá đơn
                                    nhập </a></li>
                        @endcan
                        @can('view orders')
                            <li class="nav-item"><a class="nav-link" href="admin/giaodich/hoadonban/danhsach"> Hoá đơn
                                    bán </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        @can('add discount codes','view discount codes')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
                    <i class="mdi mdi-map-marker-outline menu-icon"></i>
                    <span class="menu-title">Quản lý mã giảm giá</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="maps">
                    <ul class="nav flex-column sub-menu">
                        @can('add discount codes')
                            <li class="nav-item"><a class="nav-link" href="admin/magiamgia/them">Thêm mã giảm giá</a>
                            </li>
                        @endcan
                        @can('view discount codes')
                            <li class="nav-item"><a class="nav-link" href="admin/magiamgia/danhsach">Danh sách mã giảm
                                    giá</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        @can('add made in','view made in')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                    <span class="menu-title">Quản lý nơi sản xuất</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        @can('add made in')
                            <li class="nav-item"><a class="nav-link" href="admin/noisanxuat/them"> Thêm nơi sản
                                    xuất </a></li>
                        @endcan
                        @can('view made in')
                            <li class="nav-item"><a class="nav-link" href="admin/noisanxuat/danhsach"> Danh sách nơi sản
                                    xuất </a></li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
    </ul>
</nav>
