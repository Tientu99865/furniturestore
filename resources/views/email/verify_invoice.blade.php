<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoá đơn</title>
    <base href="{{asset('')}}">
    <!-- Plugin -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Customize -->
    <link rel="stylesheet" href="css/theme.min.css">
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-12" style="margin:20px 0;">
                <h2>Chi tiết hoá đơn</h2>
            </div>
            <div class="col-xl-6 invoice-form">
                <div class="invoice-form__title" style="font-weight: bold;font-size: 20px;margin-bottom: 20px">Người
                    gửi
                </div>
                <div class="invoice-form__content" style="line-height: 10px">
                    <p>Cửa hàng : Furniture Store</p>
                    <p>Địa chỉ : Đại học Giao thông vận tải</p>
                    <p>Số điện thoại: 0358828585</p>
                </div>
            </div>

            <div class="col-xl-12" style="margin: 20px 0;">
                <div class="row">
                    <div class="col-xl-12" style="font-weight: bold;font-size: 20px;margin-bottom: 20px">
                        Chuyển hàng tới
                    </div>
                    <div class="col-xl-6" style="line-height: 10px">
                        <p>Tên khách hàng : {{$customer->name}}</p>
                        <p>Địa chỉ : {{$customer->address}}</p>
                        <p>Số điện thoại : {{$customer->phone_number}}</p>
                        <p>Ghi chú : {{$invoice->note}}</p>
                    </div>
                    <div class="col-xl-6" style="line-height: 10px">
                        <p>Thời gian đặt hàng: {{$invoice->created_at}}</p>
                        <p>Hình thức thanh toán: Giao hàng</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <hr>
                <table style="width: 100%;line-height: 40px;text-align: center">
                    <tr>
                        <th>Stt</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    $stt = 0;
                    $total_cost = 0;
                    ?>
                    @foreach($products as $product)
                        <?php
                        $stt++;
                        ?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{number_format($product->price,0,',','.')}} VNĐ</td>
                            <td>{{$product->qty}}</td>
                            <td>{{number_format($product->price*$product->qty,0,',','.')}} VNĐ</td>
                        </tr>
                    @endforeach
                </table>
                <hr>
                <div class="row">
                    <div class="col-xl-6"></div>
                    <div class="col-xl-6">
                        <table style="text-align: center;width: 100%;line-height: 40px;">
                            <tr>
                                <th>Tổng tiền</th>
                                <th style="font-size: 20px;color: red">{{number_format($invoice->total_cost,0,',','.')}} VNĐ</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12" style="text-align: center">
                        <hr>
                        <span style="font-weight: bold">Cảm ơn quý khách đã tin tưởng và mua sản phẩm của chúng tôi.Bạn hãy click <a
                                href="{{ $route }}">vào đây</a> để xác nhận hoá đơn của mình .Xin cảm ơn!</span>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

