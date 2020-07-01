@extends('admin/layout/index')
@section('title')
    Chi tiết hoá đơn bán
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chi Tiết Hóa Đơn</h4>
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

                        <div class="table-responsive">
                            <table class="table">
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
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-icon-text">
                            <a href="admin/giaodich/hoadonban/pdf/{{$invoice->id}}" style="color:white;">In Hóa Đơn</a>
                            <i class="mdi mdi-printer btn-icon-append"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
