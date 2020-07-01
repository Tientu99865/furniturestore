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
                    @if(Cart::count() == 0)
                        Hiện tại chưa có sản phẩm nào trong giỏ hàng của bạn! Quay lại <a href="/">trang chủ</a>
                    @else
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
                                                <img src="upload/sanpham/tieude/{{$product->options->image}}"
                                                     style="width: 100px;" alt="Product 1">
                                            </div>
                                            <div class="name">{{$product->name}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" id="price-{{$product->id}}" value="{{$product->price}}"
                                               hidden>
                                        <span>{{number_format($product->price,0,',','.')}}</span> VNĐ
                                    </td>
                                    <td>
                                        <div class="quantity">
                                        <span class="sub">
                                            <i class="fa fa-angle-down btn cart-minus-1" id="{{$product->id}}"></i>
                                        </span>

                                            <input type="number" min="1" id="quantity-{{$product->id}}" readonly
                                                   value="{{$product->qty}}">

                                            <span class="add">
                                            <i class="fa fa-angle-up btn cart-plus-1" id="{{$product->id}}"></i>
                                        </span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="totalProduct" id="total-hidden-{{$product->id}}"
                                           hidden>{{$product->price*$product->qty}}</p>
                                        <span
                                            id="total-{{$product->id}}">{{number_format($product->price*$product->qty,0,',','.')}}</span>
                                        VNĐ
                                    </td>
                                    <td>
                                        <a href="shopping/xoa/{{$product->rowId}}">
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
                                        <a href="/">Tiếp tục mua hàng</a>
                                        <a href="thanhtoan">Thanh toán</a>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </section>
    @if(Cart::count() == 0)
    @else
        <section>
            <div class="container p-b-100">
                <div class="row">
                    <div class="col-md-6 p-r-lg--30 p-r-xl-30 m-t-30">
                        <div class="shop-total">
                            <div class="shop-total-heading">
                                <h3 class="title">Mã giảm giá</h3>
                                <div class="title-border-3 m-b-30"></div>
                            </div>
                            <div class="shop-total-body">
                                <p>Nếu bạn có mã giảm giá hãy nhập vào đây.</p>
                                <form action="shopping/magiamgia" method="post">
                                    @csrf
                                    <div class="form-group au-form m-b-40">
                                        <input type="text" name="discount_code"
                                               @if($discount)
                                                   value="{{$discount[0]->code}}"
                                               @else
                                                   value=""
                                               @endif

                                               placeholder="Mã giảm giá">
                                    </div>
                                    <div class="form-group au-form m-b-0">
                                        <button type="submit">Áp dụng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-l-lg-30 p-l-xl-30 m-t-30">
                        <div class="shop-total">
                            <div class="shop-total-heading">
                                <h3 class="title">Tổng tiền</h3>
                                <div class="title-border-3 m-b-30"></div>
                            </div>
                            <div class="shop-total-body">


                                @if($total_after_discount)
                                    <p class="sub-total">Mã giảm giá
                                        <span>{{$discount[0]->code}}</span>
                                    </p>
                                    <p class="sub-total">Số tiền giảm
                                        <span>{{number_format($discount[0]->dis_price,0,',','.')}} VNĐ</span>
                                    </p>
                                    <p class="total">Tổng cộng
                                        <span> VNĐ</span><span
                                            id="totalAll">{{number_format($total_after_discount,0,',','.')}} </span>
                                    </p>
                                @else
                                    <p class="total">Tổng cộng
                                        <?php
                                        $total = str_replace(',', '', \Cart::subtotal());
                                        ?>
                                        <span> VNĐ</span><span id="totalAll">{{number_format($total,0,',','.')}} </span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@section('javascript')
    <script>
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        }

        $(document).ready(function () {
            var totalProduct = document.getElementsByClassName('totalProduct');
            var totalAll = 0;
            for (var i = 0; i < totalProduct.length; i++) {
                totalAll += parseInt(totalProduct[i].textContent);
            }
            $(".cart-minus-1").click(function () {
                var id = $(this).attr('id');
                var value = $("#quantity-" + id).val() - 1;
                if (value < 1) {
                    value.val(1);
                }
                // $('input[id=quantity]').val(value);
                var price = $("#price-" + id).val();
                var total = value * price;
                $('#total-' + id).text(formatNumber(total));
                totalAll -= parseInt($("#price-" + id).val());
                $('#totalAll').text(formatNumber(totalAll))
            })
            $(".cart-plus-1").click(function () {
                var id = $(this).attr('id');
                var value = parseInt($("#quantity-" + id).val()) + 1;
                if (value < 1) {
                    value.val(1);
                }
                // $('input[id=quantity]').val(value);
                var price = $("#price-" + id).val();
                var total = value * price;
                $('#total-' + id).text(formatNumber(total));
                totalAll += parseInt($("#price-" + id).val());
                $('#totalAll').text(formatNumber(totalAll))
            })

        })

    </script>
@endsection
