@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_02.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">Giỏ hàng</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container p-t-100 p-b-30 py-tn-30">
            <div class="row m-t-20">
                <div class="col-md-12">
                    <table class="table-shop">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <div class="table-shop-product">
                                        <div class="image">
                                            <img src="upload/sanpham/tieude/{{$product->options->image}}" style="width: 100px;" alt="Product 1">
                                        </div>
                                        <div class="name">{{$product->name}}</div>
                                    </div>
                                </td>
                                <td>
                                    {{number_format($product->price,0,',','.')}} VNĐ
                                </td>
                                <td>
                                    <div class="quantity">
                                        <span class="sub">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                        <input type="number" value="{{$product->qty}}">
                                        <span class="add">
                                            <i class="fa fa-angle-up"></i>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    {{number_format($product->qty * $product->price,0,',','.')}} VNĐ
                                </td>
                                <td>
                                    <a href="">
                                        <img src="images\icon\close.png" alt="Close">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="table-button">
                                    <a href="#">Tiếp tục mua hàng</a>
                                    <a href="#">Cập nhật giỏ hàng </a>
                                    <a href="#">Thanh toán</a>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </section>
@endsection
