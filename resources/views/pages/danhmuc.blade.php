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
                                    @if($product->promoted_price != 0)
                                        <?php
                                        $percent = round(($product->promoted_price / $product->selling_price) * 100);
                                        ?>
                                        <div class="discount-product">
                                            <span>-{{$percent}}%</span>
                                        </div>
                                    @endif
                                    <div class="product-body">
                                        <a href="chi-tiet-san-pham/{{$product->id}}" class="name">{{$product->name}}</a>
                                        @if($product->promoted_price != 0)
                                            <p class="price"
                                               style="text-decoration: line-through;">{{number_format($product->selling_price, 0, ',', '.')}}
                                                VNĐ</p>
                                            <p class="price">{{number_format($product->selling_price-$product->promoted_price, 0, ',', '.')}}
                                                VNĐ</p>
                                        @else
                                            <p class="price">{{number_format($product->selling_price, 0, ',', '.')}}
                                                VNĐ</p>
                                        @endif
                                        <div class="product-button">
                                            @if($product->quantity == 0)
                                                <p class="add-to-cart">Hết hàng</p>
                                            @else
                                                <a href="shopping/them/{{$product->id}}" class="add-to-cart">Add to
                                                    cart</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $products->links() }}
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
                                <h3 class="title">Sản phẩm bán chạy</h3>
                                <div class="title-border m-b-30"></div>
                            </div>
                            <div class="sidebar-item__body">
                                <ul class="sidebar-bestsell">
                                    @foreach($bestProducts as $bestProduct)
                                        <li class="item">
                                            <div class="image">
                                                <a href="chi-tiet-san-pham/{{$bestProduct->id}}">
                                                    <img src="images/mark/mark-best-product.png" style="background-image: url('upload/sanpham/tieude/{{$bestProduct->image}}');background-size: cover;width: 100%" alt="{{$bestProduct->name}}">
                                                </a>
                                            </div>
                                            <div class="detail">
                                                <a href="chi-tiet-san-pham/{{$bestProduct->id}}" class="name">{{$bestProduct->name}}</a>
                                                <p class="price">{{number_format($bestProduct->selling_price-$bestProduct->promoted_price, 0, ',', '.')}}
                                                        VNĐ</p>
                                            </div>
                                        </li>
                                    @endforeach
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
