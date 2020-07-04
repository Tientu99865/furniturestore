<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết đơn hàng - PDF</title>
</head>
<body>
<div class="card-body">
    <div style="text-align: center;">
         <h2 class="card-title">Chi Tiết Đơn Hàng</h2>
    </div>
    <p class="card-description">
        Họ & Tên khách hàng : <b>{{$invoice->customer->name}}</b>
    </p>
    <p class="card-description">
        Số điện thoại : <b>{{$invoice->customer->phone_number}}</b>
    </p>
    <p class="card-description">
        Địa chỉ Email : <b>{{$invoice->customer->email}}</b>
    </p>
    <p class="card-description">
        Địa chỉ giao hàng : <b>{{$invoice->customer->address}}</b>
    </p>
    <p class="card-description">
        Ghi chú : <b>{{$invoice->note}}</b>
    </p>
    <div style="text-align: center">
        <h2>Danh sách đơn hàng</h2>
    </div>
    <div class="table-responsive">
        <hr>
        <table class="table" style="width: 100%;">
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productOrders as $productOrder)
                <tr>
                    <th>{{$productOrder->product->name}}</th>
                    <th>{{$productOrder->quantity}}</th>
                    <th>{{number_format($productOrder->product->selling_price,0,',','.')}} VNĐ</th>
                    <th>{{number_format($productOrder->total,0,',','.')}} VNĐ</th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-xl-6">
            <table style="width: 100%;line-height: 40px;">
                <tr>
                    <th>Phí Ship</th>
                    <th>30.000 VNĐ</th>
                </tr>
                <tr>
                    <th>Mã khuyến mại</th>
                    <th>
                        @if($invoice->discount_code)
                            {{$invoice->discount_code}}
                        @else
                            Không có
                        @endif
                    </th>
                </tr>
                <tr>
                    <th>Tổng tiền</th>
                    <th style="font-size: 20px;color: red">{{number_format($invoice->total_cost,0,',','.')}}
                        VNĐ
                    </th>
                </tr>
            </table>
        </div>

        <div class="col-xl-6"></div>
    </div>
    <div style="text-align: center;margin-top: 50px">
        <hr>
        <p>***Cảm ơn quý khách đã tin tưởng và mua sản phẩm của chúng tôi!***</p>
        <hr>
    </div>
    <div class="sign" style="width: 100%;margin-top: 50px">
        <div class="admin" style="float: left;margin-left: 50px">
            Chủ cửa hàng
        </div>
        <div class="customer" style="float: right;margin-right: 50px;">
            Khách hàng
        </div>
    </div>
</div>
</body>
</html>
