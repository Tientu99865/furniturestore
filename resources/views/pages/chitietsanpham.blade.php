@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_03.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">{{$product->name}}</h1>
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
                                    <form action="shopping/them/{{$product->id}}" method="post">
                                        @csrf
                                        <h3 class="name">{{$product->name}}</h3>
                                        <p class="price">
                                            @if(count($import_invoice)>0)
                                                {{number_format($import_invoice[0]->selling_price, 0, ',', '.')}}
                                            @endif
                                            <b> VNĐ</b></p>
                                        <div class="product-button">
                                            <div class="quantity">
                                        <span class="sub">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                                <input type="number" name="qty" value="1">
                                                <span class="add">
                                            <i class="fa fa-angle-up"></i>
                                        </span>
                                            </div>
                                            <input type="submit" class="add-to-cart" value="Thêm vào giỏ
                                                hàng">
                                        </div>
                                        <div class="product-available">
                                            <span>Kho hàng :</span>
                                            <?php
                                            if ($product['quantity'] == 0) {
                                                echo "<span style='color: red'>Hết Hàng</span>";
                                            } else {
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
                                    </form>
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
                                    <h5 class="title">Bình luận</h5>
                                    <p>There are no reviews yet.</p>
                                    <p class="text-bigger">Be the first to review “Cloud Wall Clock”</p>
                                    <div class="comment-place">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea cols="30" rows="7">Nội dung bình luận</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Your Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" placeholder="Your Email">
                                                </div>
                                                <div class="col-md-12 m-t-40">
                                                    <button>Bình luận</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="port-title justify-content-center text-center">
                            <h2 class="title">Sản phẩm liên quan</h2>
                            <div class="title-border mx-auto m-b-70"></div>
                        </div>
                        <div class="related-products">
                            <div class="related-wrap" style="display: flex">
                                @foreach($products as $product)
                                    <div class="owl-item active" style="width: 290px;">
                                        <div class="col-md-12">
                                            <div class="grid-product">
                                                <div class="image bg-lightblue">
                                                    <img src="images/mark/mark_product.png"
                                                         style="background-image: url(upload/sanpham/tieude/{{$product->image}});background-size: cover"
                                                         alt="{{$product->name}}">
                                                    <div class="addcart">
                                                        <a href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                                <div class="name">{{$product->name}}</div>
                                                <div
                                                    class="price"> {{number_format($product->selling_price, 0, ',', '.')}}
                                                    VNĐ
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="page-sidebar">
                        <div class="page-sidebar-item">
                            <div class="sidebar-item__heading">
                                <h3 class="title">Tìm kiếm sản phẩm</h3>
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
