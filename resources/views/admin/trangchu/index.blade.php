@extends('admin/layout/index')
@section('title')
    Trang chủ
@endsection
@can('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Tổng sản phẩm</h6>
                        <h2 class="mb-0">{{$countProducts}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Tổng nhân viên</h6>
                        <h2 class="mb-0">{{$countUsers}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Tổng người dùng</h6>
                        <h2 class="mb-0">{{$countCustomers}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-info text-white text-center card-shadow-info">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Tổng đơn hàng</h6>
                        <h2 class="mb-0">{{$countInvoices}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hoá đơn bán</h4>
                        <div class="table-responsive mt-2">
                            <table class="table mt-3 border-top">
                                <thead>
                                <tr>
                                    <th>Mã hoá đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Tổng tiền</th>
                                    <th>Thời gian đặt hàng</th>
                                    <th>Trang thái</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->id}}</td>
                                        <td>{{$invoice->customer->name}}</td>
                                        <td>{{$invoice->customer->phone_number}}</td>
                                        <td>{{number_format($invoice->total_cost,0,',','.')}} VNĐ</td>
                                        <td>{{$invoice->created_at}}</td>
                                        <td>
                                            @if($invoice->verify == 1)
                                                <div class="badge badge-success badge-fw">Đã xác nhận</div>
                                            @else
                                                <div class="badge badge-warning badge-fw">Chưa xác nhận</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="admin/giaodich/hoadonban/chitiethoadonban/{{$invoice->id}}"><button type="button" class="btn btn-outline-primary btn-fw">Xem chi tiết</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                            <nav>
                                {!! $invoices->links() !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
@section('content')
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center;font-size: 27px">Chào mừng bạn đến trang chủ quản trị của
                            Furniture Store</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endcan
