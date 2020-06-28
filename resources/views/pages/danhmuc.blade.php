@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_03.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">{{$category->name}}</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container p-t-100 p-b-70">
            <div class="row">
                <div class="col-md-9">
                    <div class="shop-list">
                        <div class="shop-list-heading">
                            <div class="number-product">
                                Danh mục <b>{{$category->name}}</b> hiện có
                                <b>{{FurnitureStoreCount::count($category->products)}}</b> sản phẩm
                            </div>
                        </div>
                        <div class="shop-list-body shop-grid">
                            @foreach($products as $product)
                                <div class="shop-product">
                                    <div class="product-image">
                                        <a href="chi-tiet-san-pham/{{$product->id}}">
                                            <img src="images/mark/mark_product.png"
                                                 style="background-image: url(upload/sanpham/tieude/{{$product->image}});background-size: cover"
                                                 alt="{{$product->name}}">
                                        </a>
                                    </div>
                                    <div class="product-body">
                                        <a href="chi-tiet-san-pham/{{$product->id}}" class="name">{{$product->name}}</a>
                                        <p class="price">{{number_format($product->selling_price, 0, ',', '.')}} VNĐ</p>
                                        {{--                                        <p class="product-color">--}}
                                        {{--                                            <span class="color beige"></span>--}}
                                        {{--                                            <span class="color gray"></span>--}}
                                        {{--                                        </p>--}}
                                        {{--                                        <p class="description">Nor again is there anyone who loves or pursues or desires--}}
                                        {{--                                            to obtain pain of itself, because--}}
                                        {{--                                            it is pain, but because occasionally circumstances occur in which toil and--}}
                                        {{--                                            pain can--}}
                                        {{--                                            procure him some great pleasure.</p>--}}
                                        <div class="product-button">
                                            <a href="#" class="add-to-cart">Add to cart</a>
                                            <a href="#" class="add-to-wishlist"></a>
                                        </div>
                                        <div class="product-rating" data-star="4"><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $products->links() }}
{{--                        <nav class="border-bottom-1 border-top-1">--}}
{{--                            <ul class="au-panigation">--}}
{{--                                <li class="panigation-item">--}}
{{--                                    <a href="#" class="panigation-link">--}}
{{--                                        <i class="fa fa-angle-left"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="panigation-item">--}}
{{--                                    <span>Pages:</span>--}}
{{--                                </li>--}}
{{--                                <li class="panigation-item active">--}}
{{--                                    <a href="#" class="panigation-link">01</a>--}}
{{--                                </li>--}}
{{--                                <li class="panigation-item">--}}
{{--                                    <a href="#" class="panigation-link">02</a>--}}
{{--                                </li>--}}
{{--                                <li class="panigation-item">--}}
{{--                                    <span>...</span>--}}
{{--                                </li>--}}
{{--                                <li class="panigation-item">--}}
{{--                                    <a href="#" class="panigation-link">06</a>--}}
{{--                                </li>--}}
{{--                                <li class="panigation-item">--}}
{{--                                    <a href="#" class="panigation-link">07</a>--}}
{{--                                </li>--}}
{{--                                <li class="panigation-item">--}}
{{--                                    <a href="#" class="panigation-link">--}}
{{--                                        <i class="fa fa-angle-right"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="page-sidebar">
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">Tìm kiếm</h3>
                                <div class="title-border m-b-30"></div>
                            </div>
                            <div class="sidebar-item__body m-b-8">
                                <div class="sidebar-search">
                                    <input type="text">
                                    <span>
                                        <img src="images\icon\search.png" alt="Search">
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{--                        <div class="page-sidebar-item">--}}
                        {{--                            <div class="sidebar-item__heading">--}}
                        {{--                                <h3 class="title">Lọc theo giá</h3>--}}
                        {{--                                <div class="title-border m-b-30"></div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="sidebar-item__body m-b-8">--}}
                        {{--                                <div class="sidebar-filter-price">--}}
                        {{--                                    <div id="filter-price" class="noUi-target noUi-ltr noUi-horizontal">--}}
                        {{--                                        <div class="noUi-base">--}}
                        {{--                                            <div class="noUi-connects">--}}
                        {{--                                                <div class="noUi-connect"--}}
                        {{--                                                     style="transform: translate(0%, 0px) scale(0.782609, 1);"></div>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="noUi-origin"--}}
                        {{--                                                 style="transform: translate(-100%, 0px); z-index: 5;">--}}
                        {{--                                                <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0"--}}
                        {{--                                                     role="slider" aria-orientation="horizontal" aria-valuemin="0.0"--}}
                        {{--                                                     aria-valuemax="78.3" aria-valuenow="0.0"--}}
                        {{--                                                     aria-valuetext="8.00"></div>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="noUi-origin"--}}
                        {{--                                                 style="transform: translate(-21.7391%, 0px); z-index: 4;">--}}
                        {{--                                                <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0"--}}
                        {{--                                                     role="slider" aria-orientation="horizontal" aria-valuemin="0.0"--}}
                        {{--                                                     aria-valuemax="100.0" aria-valuenow="78.3"--}}
                        {{--                                                     aria-valuetext="80.00"></div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="filter-range">--}}
                        {{--                                        <div class="filter-range-value">--}}
                        {{--                                            Filter:--}}
                        {{--                                            <span id="filter-price-value-lower">$8.00</span>--}}
                        {{--                                            <span> - </span>--}}
                        {{--                                            <span id="filter-price-value-upper">$80.00</span>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="filter-button">--}}
                        {{--                                            <a href="#">Filter</a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">Danh mục</h3>
                                <div class="title-border m-b-24"></div>
                            </div>
                            <div class="sidebar-item__body">
                                <ul class="sidebar-list">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="danhmuc/{{$category->id}}">{{$category->name}}</a>
                                            <span class="number">{{count($category->products)}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">Best seller</h3>
                                <div class="title-border m-b-30"></div>
                            </div>
                            <div class="sidebar-item__body">
                                <ul class="sidebar-bestsell">
                                    <li class="item">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images\wishlist_product_01.png" alt="#">
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <a href="#" class="name">Crackle Plates</a>
                                            <span class="price">$22.00</span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images\wishlist_product_02.png" alt="#">
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <a href="#" class="name">Floor Lamp</a>
                                            <span class="price">$48.00</span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images\wishlist_product_03.png" alt="#">
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <a href="#" class="name">Wooden Fan</a>
                                            <span class="price">$25.00</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </section>
@endsection
