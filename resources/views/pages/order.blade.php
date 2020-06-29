@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_02.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">Thanh toán</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container p-t-100 p-b-45">

            <form method="post" action="thanhtoan">
            <div class="row">
                <div class="col-md-6">
                    <div class="au-form-body p-b-0">
                        <h2 class="au-form-title form-title-border m-b-37">Thông tin khách hàng</h2>

                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group au-form require">
                                        <label>Họ & Tên Khách Hàng</label>
                                        <input type="text" value="{{Auth::guard('customers')->user()->name}}"
                                               name="name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group au-form require">
                                        <label>Số Điện Thoại</label>
                                        <input type="number" value="{{Auth::guard('customers')->user()->phone_number}}"
                                               name="phone_number">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group au-form">
                                        <label>Địa chỉ email</label>
                                        <input type="text" value="{{Auth::guard('customers')->user()->email}}"
                                               name="email">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group au-form require">
                                        <label>Địa chỉ giao hàng</label>
                                        <input type="text" value="{{Auth::guard('customers')->user()->address}}"
                                               name="address">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="au-form-body">
                        <h2 class="au-form-title form-title-border m-b-37">Thông Tin Bổ Sung</h2>
                        <div class="form-group au-form">
                            <label style="float: left">Ghi chú đơn hàng (tuỳ chọn)</label><br><br>
                            <textarea cols="70" rows="9" name="note"
                                      style="color: black;border: 1px solid #e5e5e5;font-size: 13px;padding: 10px 20px;"
                                      placeholder="Ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="au-form-body">
                        <h2 class="au-form-title form-title-border m-b-37">Đơn hàng của bạn</h2>
                        <table class="checkout-bill">
                            <tbody>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Thành Tiền</th>
                            </tr>
                            <?php
                            $products = \Cart::content();
                            ?>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div style="display: flex;align-items: center">
                                            <div class="item-image">
                                                <img src="images/mark/mark_product_cart.png"
                                                     style="background-image: url(upload/sanpham/tieude/{{$product->options->image}});background-size: cover;"
                                                     alt="{{$product->name}}">
                                            </div>
                                            <input type="number" name="product_id" value="{{$product->id}}" hidden>
                                            <input type="number" name="quantity" value="{{$product->qty}}" hidden>
                                            <div class="item-detail" style="padding-left: 15px;padding-top: 5px;">
                                                <span class="name">{{$product->name}}</span>
                                                <span class="amount" style="color: red;">x{{$product->qty}}</span>
                                                <p class="price"
                                                   style="font-weight: bold">{{number_format($product->price,0,',','.')}}
                                                    VNĐ</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" name="total" value="{{$product->price*$product->qty}}" hidden>
                                    <span id="total-{{$product->id}}"
                                          style="font-weight: bold">{{number_format($product->price*$product->qty,0,',','.')}}</span>
                                        VNĐ
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Phí giao hàng</td>
                                <td>30.000 VNĐ</td>
                            </tr>
                            <tr class="total">
                                <td>Tổng Tiền</td>
                                <td style="font-size: 25px;color: red">
                                    <?php
                                    $total = str_replace(',', '', \Cart::subtotal()) + 30000;
                                    ?>
                                    <span id="totalAll">{{number_format($total,0,',','.')}} </span><span> VNĐ</span>
                                        <input type="number" name="total_cost" value="{{$total}}" hidden>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="submit" name="submit" class="process-button m-t-50 float-right" value="Đặt Hàng">

                    </div>

                </div>
            </div>

            </form>
        </div>
    </section>
@endsection

