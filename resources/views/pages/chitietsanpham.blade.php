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
                                    @if($product->promoted_price != 0)
                                        <?php
                                        $percent = round(($product->promoted_price / $product->selling_price) * 100);
                                        ?>
                                        <div class="discount-product">
                                            <span>-{{$percent}}%</span>
                                        </div>
                                    @endif
                                    <div class="list_images">
                                        {{FurnitureStoreProductImages::sub_pic($images)}}
                                    </div>
                                </div>
                                <div class="col-xl-6 product-body">
                                    <form action="shopping/them/{{$product->id}}" method="post">
                                        @csrf
                                        <h3 class="name">{{$product->name}}</h3>
                                        @if($product->promoted_price)
                                            <p class="price" style="text-decoration: line-through;">{{number_format($product->selling_price, 0, ',', '.')}}
                                                VNĐ</p>
                                            <p class="price">{{number_format($product->selling_price-$product->promoted_price, 0, ',', '.')}}
                                                VNĐ</p>
                                        @else
                                            <p class="price">{{number_format($product->selling_price, 0, ',', '.')}}
                                                VNĐ</p>
                                        @endif
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
                                            @if($product->quantity == 0)
                                                <p class="add-to-cart">Hết hàng</p>
                                            @else
                                                <input type="submit" class="add-to-cart" value="Thêm vào giỏ
                                                hàng">
                                            @endif
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
                                            <a href="danhmuc/{{$product->categories->id}}" style="color: #e4c7a2;">{{$product->categories->name}}</a>
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
                                    <?php
                                    $count_cmt = count($comments);
                                    ?>
                                    <a data-toggle="tab" href="#review-tab">Bình luận ({{$count_cmt}})</a>
                                </li>
                            </ul>
                            <div class="tab-content" style="overflow: hidden">
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
                                    <div class="comment">
                                        @foreach($comments as $comment)
                                            @if($comment->parent_id == null)
                                                <div class="cus_comment">
                                                    <div class="cus_cmt">
                                                        <b>{{$comment->customers->name}}</b>
                                                        <div class="comment-content" style="margin-top: 10px">
                                                            {{$comment->content}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach($comments as $subComment)
                                                    @if($comment->id == $subComment->parent_id)
                                                        @if($subComment->user_id)
                                                            <div class="cus_comment" style="width: 90%;float: right">
                                                                <div class="cus_cmt">
                                                                    <b style="color: #3a34f6">Admin
                                                                        : {{$subComment->users->name}}</b>
                                                                    <div class="comment-content"
                                                                         style="margin-top: 10px">
                                                                        {{$subComment->content}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif($subComment->customer_id)
                                                            <div class="cus_comment" style="width: 90%;float: right">
                                                                <div class="cus_cmt">
                                                                    <b>{{$subComment->customers->name}}</b>
                                                                    <div class="comment-content"
                                                                         style="margin-top: 10px">
                                                                        {{$subComment->content}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                    @if(Auth::guard('customers')->check())
                                        <h5 class="title">Bình luận</h5>
                                        <div class="comment-place">
                                            <form action="binhluan/{{$product->id}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea cols="30" name="comment" rows="7"
                                                                  placeholder="Nội dung bình luận"></textarea>
                                                    </div>
                                                    <div class="col-md-12 m-t-40">
                                                        <button type="submit">Bình luận</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <h5 style="color: red;float: right">Bạn phải <a href="tai-khoan/index">đăng
                                                nhập</a> thì mới
                                            có thể bình luận sản phẩm này.</h5>
                                    @endif
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
                                                    @if($product->promoted_price != 0)
                                                        <?php
                                                        $percent = round(($product->promoted_price / $product->selling_price) * 100);
                                                        ?>
                                                        <div class="discount-product">
                                                            <span>-{{$percent}}%</span>
                                                        </div>
                                                    @endif
                                                    <input type='number' name='qty' value='1' hidden>
                                                    <div class="addcart">
                                                        <a href='shopping/them/{{$product->id}}'>Thêm vào giỏ hàng</a>
                                                    </div>
                                                </div>
                                                <div class="name">{{$product->name}}</div>
                                                @if($product->promoted_price)
                                                    <div class="price" style="text-decoration: line-through;"> {{number_format($product->selling_price, 0, ',', '.')}}
                                                        VNĐ
                                                    </div>
                                                    <div class="price"> {{number_format($product->selling_price-$product->promoted_price, 0, ',', '.')}}
                                                        VNĐ
                                                    </div>
                                                @else
                                                    <div class="price"> {{number_format($product->selling_price, 0, ',', '.')}}
                                                        VNĐ
                                                    </div>
                                                @endif
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
