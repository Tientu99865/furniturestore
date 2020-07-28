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
