@extends('admin/layout/index')
@section('title')
    Quản lý đơn hàng
@endsection
@section('content')
    <div class="content-wrapper">
        @if(session('ThongBao'))
            <div class='card card-inverse-success' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('ThongBao')}}
                    </p>
                </div>
            </div>
        @elseif(session('Loi'))
            <div class='card card-inverse-warning' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('Loi')}}
                    </p>
                </div>
            </div>
        @endif
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin đơn hàng</h4>
                        <div class="table-responsive mt-2">
                            <table class="table mt-3 border-top">
                                <thead>
                                <tr>
                                    <th>Mã hoá đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Tổng tiền</th>
                                    <th>Trang thái</th>
                                    <th>Xử lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)

                                    <tr
                                        @if($invoice->verify == 1 || $invoice->verify == 0)
                                            class="bg-light"
                                        @endif
                                    >
                                        <td>{{$invoice->id}}</td>
                                        <td>{{$invoice->customer->name}}</td>
                                        <td>{{$invoice->customer->phone_number}}</td>
                                        <td>{{number_format($invoice->total_cost,0,',','.')}} VNĐ</td>
                                        <td>
                                            @if($invoice->verify == 1)
                                                <div class="badge badge-success badge-fw">Đã xác nhận</div>
                                            @elseif($invoice->verify == 0)
                                                <div class="badge badge-warning badge-fw">Chưa xác nhận</div>
                                            @elseif($invoice->verify == 2)
                                                <div class="badge badge-primary badge-fw">Đã giao hàng</div>
                                            @endif
                                            @if($invoice->paid == 1)
                                                <div class="badge badge-success badge-fw">Đã thanh toán</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="admin/giaodich/hoadonban/dathanhtoan/{{$invoice->id}}"><i
                                                    class="mdi mdi-playlist-check menu-icon" title="Đã thanh toán"
                                                    style="font-size: 30px"></i></a>
                                            <a href="admin/giaodich/hoadonban/dagiaohang/{{$invoice->id}}"><i
                                                    class="mdi mdi-truck-delivery menu-icon" title="Đã giao hàng"
                                                    style="font-size: 30px"></i></a>
                                            <a href="admin/giaodich/hoadonban/huydonhang/{{$invoice->id}}"><i
                                                    class="mdi mdi-delete menu-icon" onclick="return confirm('Bạn có muốn huỷ đơn hàng này không?')" title="Huỷ đơn hàng"
                                                    style="font-size: 30px"></i></a>
                                            <a href="admin/giaodich/hoadonban/chitiethoadonban/{{$invoice->id}}"><i
                                                    class="mdi mdi-pencil-box-outline menu-icon"
                                                    title="Chi tiết đơn hàng" style="font-size: 30px"></i></a>
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
