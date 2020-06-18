<header>
    <div class="header-wrapper">
        <!-- Desktop Menu -->
        <div class="header-wrapper-desktop d-none d-lg-block">
            <div class="header header-style-1">
                @if(session('ThongBao'))
                    <div class='card card-inverse-success' style='color:#28a745;' id='context-menu-access'>
                        <div class='card-body'>
                            <p class='card-text' style='text-align: center;'>
                                {{session('ThongBao')}}
                            </p>
                        </div>
                    </div>
                @elseif(session('Loi'))
                    <div class='card card-inverse-warning' style="color: red;" id='context-menu-access'>
                        <div class='card-body'>
                            <p class='card-text' style='text-align: center;'>
                                {{session('Loi')}}
                            </p>
                        </div>
                    </div>
                @endif
                <div class="header-main">
                    <div class="header__logo">
                        <a href="/">
                            <img src="images\Logo\logo.png" alt="Lyrae">
                        </a>
                    </div>
                    <nav class="header__navbar">
                        <ul class="navbar-menu">
                            <li><a href="/">Trang chủ</a></li>
                            {{FurnitureStoreShowCategoriesMulti::showcategories($categories)}}
                            <li><a href="lienhe">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <div class="header__button">
                        <ul>
                            <li class="header-search">
                                <div class="search-button">
                                    <img src="images\icon\header-search.png" alt="Search">
                                </div>
                                <div class="search-input" style="display: none;">
                                    <input type="text" placeholder="Start typing here...">
                                    <a href="#"></a>
                                </div>
                            </li>
                            <li class="header-shop-cart">
                                <div class="shop-cart-button">
                                    <img src="images\icon\header-cart.png" alt="Cart">
                                        <span class="amount">{{Cart::count()}}</span>
                                </div>
                                <div class="shop-cart">
                                    <ul class="shop-cart__list">
                                        @foreach($productsCart as $productCart)
                                            <li class="item">
                                                <div class="item-image">
                                                    <img src="upload/sanpham/tieude/{{$productCart->options->image}}" alt="{{$productCart->name}}">
                                                </div>
                                                <div class="item-detail">
                                                    <p class="name">{{$productCart->name}}</p>
                                                    <p class="price">{{number_format($productCart->price,0,',','.')}} VNĐ</p>
                                                    <p class="amount">x{{$productCart->qty}}</p>
                                                </div>
                                                <span class="remove"></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="checkout m-t-26">
                                        <p>Subtotal
                                            <span class="sub-total">$481.000</span>
                                        </p>
                                        <p>Total
                                            <span class="total">$481.000</span>
                                        </p>
                                        <a href="shopping/danh-sach">Giỏ hàng</a>
                                    </div>
                                </div>
                            </li>
                            <li class="header-bar">
                                @if(Auth::guard('customers')->check())
                                    <div class="bar-button" data-toggle="modal">
                                        <img src="images\icon\user-icon.png" alt="Bar">
                                    </div>
                                    <div class="navbar-dropdown-cus">
                                        <ul>
                                            <li style="font-weight: bold">{{Auth::guard('customers')->user()->name}}</li>
                                            <li><a href="#">Quản lý tài khoản</a></li>
                                            <li><a href="#">Quản lý giỏ hàng</a></li>
                                            <li><a href="tai-khoan/dang-xuat">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="bar-button" data-toggle="modal">
                                        <a href="tai-khoan/index"><img src="images\icon\user-icon.png" alt="Bar"></a>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Desktop Menu -->

        <!-- Mobile Menu -->
        <div class="header-wrapper-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="header-mobile__logo">
                    <img src="images/icon/logo_01.png" alt="Lyrae">
                </div>
                <div class="header-mobile__button">
                        <span class="humburger-box">
                            <span class="hamburger__inner"></span>
                        </span>
                </div>
            </div>
            <nav class="header-mobile__navbar">
                <ul>
                    <li>
                        <a href="#">Home</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index-1.html">Homepage_v1</a>
                            </li>
                            <li>
                                <a href="index2.html">Homepage_v2</a>
                            </li>
                            <li>
                                <a href="index3.html">Homepage_v3</a>
                            </li>
                            <li>
                                <a href="index4.html">Homepage_v4</a>
                            </li>
                            <li>
                                <a href="index5.html">Homepage_v5</a>
                            </li>
                            <li>
                                <a href="index6.html">Homepage_v6</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="#">Page</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="my-account.html">My Account</a>
                            </li>
                            <li>
                                <a href="forget-password.html">Forget Password</a>
                            </li>
                            <li>
                                <a href="coming-soon.html">Cooming Soon</a>
                            </li>
                            <li>
                                <a href="404.html">404 Error</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="shop-list.html">Shop 1</a>
                            </li>
                            <li>
                                <a href="shop-list-nosidebar.html">Shop 2</a>
                            </li>
                            <li>
                                <a href="product-detail.html">Product Detail 1</a>
                            </li>
                            <li>
                                <a href="product-detail-nosidebar.html">Product Detail 2</a>
                            </li>
                            <li>
                                <a href="shop-cart.html">Shop Cart</a>
                            </li>
                            <li>
                                <a href="wishlist.html">Wish List</a>
                            </li>
                            <li>
                                <a href="checkout.html">Check Out</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">blog</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="blog-grid-1.html">Blog Grid 1</a>
                            </li>
                            <li>
                                <a href="blog-grid-2.html">Blog Grid 2</a>
                            </li>
                            <li>
                                <a href="blog-list.html">Blog List</a>
                            </li>
                            <li>
                                <a href="blog-detail.html">Blog Single</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu -->
    </div>
</header>
