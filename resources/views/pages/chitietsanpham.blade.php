@extends('layout/index')
@section('head')
    <link rel="stylesheet" href="vendor\nouislider\nouislider.min.css">
    <link rel="stylesheet" href="vendor\slide100\slide100.css">
@endsection
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_03.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">{{$product->name}}</h1>
{{--                <nav class="pageintro-breadcumb">--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="#">Home</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
            </div>
        </div>
    </section>
    <section>
        <div class="container p-b-90 p-t-100">
            <div class="row">
                <div class="col-md-9">
                    <div class="product-detail">
                        <div class="shop-product p-t-25">
                            <div class="row" style="width: 100%;">
                                <div class="col-xl-6 slide100-01" id="slide100-01">
                                    <div class="main_pic">
                                        {{FurnitureStoreProductImages::main_pic($images)}}
                                    </div>
                                    <div class="list_images">
                                        {{FurnitureStoreProductImages::sub_pic($images)}}
                                    </div>
                                </div>
                                <div class="col-xl-6 product-body">
                                    <h3 class="name">{{$product->name}}</h3>
                                    <p class="price">
                                        @if(count($import_invoice)>0)
                                            {{number_format($import_invoice[0]->selling_price, 0, ',', '.')}}
                                        @endif
                                        <b> VNĐ</b></p>
                                    <p class="product-color">
                                        <span class="color beige"></span>
                                        <span class="color black"></span>
                                    </p>
                                    <div class="product-button">
                                        <div class="quantity">
                                        <span class="sub">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                            <input type="number" value="1">
                                            <span class="add">
                                            <i class="fa fa-angle-up"></i>
                                        </span>
                                        </div>
                                        <a href="#" class="add-to-cart">Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-available">
                                        <span>Kho hàng :</span>
                                        <?php
                                        if ($product['quantity'] == 0){
                                            echo "<span style='color: red'>Hết Hàng</span>";
                                        }else{
                                            echo "<span style='color: #e4c7a2'>Còn Hàng</span>";
                                        }
                                        ?>
                                    </div>
                                    <div class="product-categories">
                                        <span class="text-black">Danh mục:</span>
                                        <a href="#" style="color: #e4c7a2;">{{$product->categories->name}}</a>
                                    </div>
                                    <div class="product-categories">
                                        <span class="text-black">Nơi sản xuất:</span>
                                        <span style="color: #e4c7a2;">{{$product->manufacture->name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="au-tabs">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#description-tab" class="active show">Mô tả chi tiết</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#additional-tab">Thông tin thêm </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#review-tab">Bình luận (0)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="description-tab" class="tab-pane active">
                                    {!! $product->content !!}
                                </div>
                                <div id="additional-tab" class="tab-pane">
                                    <table class="product-additionnal">
                                        <tbody>
                                        <tr>
                                            <th>Cân nặng</th>
                                            <td>{{$product->weight}} kg</td>
                                        </tr>
                                        <tr>
                                            <th>Kích thước (Chiều dài x Chiều rộng x Chiều cao)</th>
                                            <td>{{$product->dimensions}} cm</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="review-tab" class="tab-pane">
                                    <h5 class="title">REVIEWS</h5>
                                    <p>There are no reviews yet.</p>
                                    <p class="text-bigger">Be the first to review “Cloud Wall Clock”</p>
                                    <div class="comment-rating">
                                        <strong>Your Rating </strong>
                                        <div class="au-rating">
                                            <form>
                                                <input id="star-1" type="radio" name="star">
                                                <label for="star-1"></label>
                                                <input id="star-2" type="radio" name="star">
                                                <label for="star-2"></label>
                                                <input id="star-3" type="radio" name="star">
                                                <label for="star-3"></label>
                                                <input id="star-4" type="radio" name="star">
                                                <label for="star-4"></label>
                                                <input id="star-5" type="radio" name="star">
                                                <label for="star-5"></label>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="comment-place">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea cols="30" rows="7">Your Message</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Your Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" placeholder="Your Email">
                                                </div>
                                                <div class="col-md-12 m-t-40">
                                                    <button>Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="port-title justify-content-center text-center">
                            <h2 class="title">related products</h2>
                            <div class="title-border mx-auto m-b-70"></div>
                        </div>
                        <div class="related-products">
                            <div class="owl-carousel row owl-loaded owl-drag"
                                 data-responsive="{&quot;0&quot;:{&quot;items&quot;:&quot;1&quot;},&quot;576&quot;:{&quot;items&quot;:&quot;1&quot;},&quot;768&quot;:{&quot;items&quot;:&quot;2&quot;}, &quot;992&quot;:{&quot;items&quot;:&quot;3&quot;} }">


                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 870px;">
                                        <div class="owl-item active" style="width: 290px;">
                                            <div class="col-md-12">
                                                <div class="grid-product">
                                                    <div class="image bg-lightblue">
                                                        <img src="images\product_07.png" alt="Chair">
                                                        <div class="addcart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="name">Pendant Shade</div>
                                                    <div class="price">$20.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item active" style="width: 290px;">
                                            <div class="col-md-12">
                                                <div class="grid-product">
                                                    <div class="image bg-lightblue">
                                                        <img src="images\product_11.png" alt="Chair">
                                                        <div class="addcart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="name">Portable Speaker</div>
                                                    <div class="price">$42.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item active" style="width: 290px;">
                                            <div class="col-md-12">
                                                <div class="grid-product">
                                                    <div class="image bg-lightblue">
                                                        <img src="images\product_34.png" alt="Chair">
                                                        <div class="addcart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="name">Teako Teapot</div>
                                                    <div class="price">$28.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-nav disabled">
                                    <div class="owl-prev"><span class="fa fa-chevron-left"><span></span></span></div>
                                    <div class="owl-next"><span class="fa fa-chevron-right"></span></div>
                                </div>
                                <div class="owl-dots disabled">
                                    <div class="owl-dot active"><span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="page-sidebar">
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">Search</h3>
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

                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">filter by price</h3>
                                <div class="title-border m-b-30"></div>
                            </div>
                            <div class="sidebar-item__body m-b-8">
                                <div class="sidebar-filter-price">
                                    <div id="filter-price"></div>
                                    <div class="filter-range">
                                        <div class="filter-range-value">
                                            Filter:
                                            <span id="filter-price-value-lower">$100</span>
                                            <span> - </span>
                                            <span id="filter-price-value-upper">$500</span>
                                        </div>
                                        <div class="filter-button">
                                            <a href="#">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">categories</h3>
                                <div class="title-border m-b-24"></div>
                            </div>
                            <div class="sidebar-item__body">
                                <ul class="sidebar-list">
                                    <li>
                                        <a href="#">Sofa</a>
                                        <span class="number">35</span>
                                    </li>
                                    <li>
                                        <a href="#">Chair</a>
                                        <span class="number">18</span>
                                    </li>
                                    <li>
                                        <a href="#">Decor</a>
                                        <span class="number">12</span>
                                    </li>
                                    <li>
                                        <a href="#">Lamp</a>
                                        <span class="number">22</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">shop by color</h3>
                                <div class="title-border m-b-24"></div>
                            </div>
                            <div class="sidebar-item__body">
                                <ul class="sidebar-list sidebar-color">
                                    <li>
                                        <a href="#">
                                            <span class="color black"></span>
                                            Black
                                        </a>
                                        <span class="number">35</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="color blue"></span>
                                            Blue
                                        </a>
                                        <span class="number">20</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="color gray"></span>
                                            gray
                                        </a>
                                        <span class="number">08</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="color green"></span>
                                            green
                                        </a>
                                        <span class="number">12</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="color red"></span>
                                            red
                                        </a>
                                        <span class="number">34</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="color beige"></span>
                                            beige
                                        </a>
                                        <span class="number">16</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="color yellow"></span>
                                            yellow
                                        </a>
                                        <span class="number">29</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">SHOP BY SIZE</h3>
                                <div class="title-border m-b-24"></div>
                            </div>
                            <div class="sidebar-item__body">
                                <ul class="sidebar-list">
                                    <li>
                                        <a href="#">XS</a>
                                        <span class="number">22</span>
                                    </li>
                                    <li>
                                        <a href="#">S</a>
                                        <span class="number">14</span>
                                    </li>
                                    <li>
                                        <a href="#">M</a>
                                        <span class="number">31</span>
                                    </li>
                                    <li>
                                        <a href="#">L</a>
                                        <span class="number">48</span>
                                    </li>
                                    <li>
                                        <a href="#">XL</a>
                                        <span class="number">36</span>
                                    </li>
                                    <li>
                                        <a href="#">XLL</a>
                                        <span class="number">25</span>
                                    </li>
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
                                            <img src="images\wishlist_product_01.png" alt="">
                                        </div>
                                        <div class="detail">
                                            <a href="#" class="name">Crackle Plates</a>
                                            <span class="price">$22.00</span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images\wishlist_product_02.png" alt="">
                                        </div>
                                        <div class="detail">
                                            <a href="#" class="name">Floor Lamp</a>
                                            <span class="price">$48.00</span>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images\wishlist_product_03.png" alt="">
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
@section('javascript')
    <!-- Plugin -->
    <script src="vendor\jquery\jquery.min.js"></script>
    <script src="vendor\easing\jquery.easing.min.js"></script>
    <script src="vendor\bootstrap\js\bootstrap.min.js"></script>
    <script src="vendor\slick\slick.js"></script>
    <script src="vendor\slide100\slide100.js"></script>
    <script src="vendor\lightcase\lightcase.js"></script>
    <script src="vendor\owlcarousel\dist\owl.carousel.min.js"></script>
    <!-- Customize -->
    <script src="js\config-slick.min.js"></script>
    <script src="js\config-owl-carousel.min.js"></script>
    <script src="js\theme.min.js"></script>
    <script src="js\config-lightcase.min.js"></script>
    <script src="js\config-slide100.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.main_pic').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.list_images'
            });
            $('.list_images').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.main_pic',
                centerMode: true,
                focusOnSelect: true
            });
        });
    </script>
@endsection
