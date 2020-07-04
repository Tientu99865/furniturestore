@extends('admin/layout/index')
@section('title')
    Thống kê doanh thu
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
        @endif
        <div class="row grid-margin">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div style="text-align: center;margin-bottom: 50px">
                            <h1>Quản lý doanh thu</h1>
                        </div>
                        <div>
                            <form action="admin/thongke/filter" method="get">
                                @csrf
                                <p style="float: left;padding-top: 10px;">Tháng :</p>
                                <div style="float: left;margin:0 15px">
                                    <select name="month" aria-controls="order-listing" class="form-control">
                                        <option value="01">1</option>
                                        <option value="02">2</option>
                                        <option value="03">3</option>
                                        <option value="04">4</option>
                                        <option value="05">5</option>
                                        <option value="06">6</option>
                                        <option value="07">7</option>
                                        <option value="08">8</option>
                                        <option value="09">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>

                                <p style="float: left;padding-top: 10px;">Năm :</p> <input type="number"
                                                                                           style="float: left; width: 100px;margin: 0 15px"
                                                                                           class="form-control"
                                                                                           value="{{$year}}"
                                                                                           name="year">

                                <button type="submit" class="btn btn-primary mr-2">Lọc</button>
                            </form>
                        </div>
                        <div style="margin: 20px 0;color: #3a34f6">
                            <h4>Doanh thu tháng <b>{{$month}}</b>-{{$year}}</h4>
                        </div>

                        <div style="display: flex;justify-content: center">
                            <?php
                            $revenue = 0;
                            $funds = 0;
                            ?>
                            @foreach($invoices as $invoice)
                                @foreach($invoice->invoice_details as $invoiceDetails)
                                    <?php
                                    $revenue += $invoiceDetails->total;
                                    $funds += $invoiceDetails->product->import_price * $invoiceDetails->quantity;
                                    ?>
                                @endforeach
                            @endforeach
                            <?php
                            $profit = $revenue - $funds;
                            ?>
                            <span style="float: left;padding-top: 10px;">Doanh thu : <span
                                    style="color: red">{{number_format($revenue, 0, ',', '.')}}</span> VNĐ</span>
                            <span style="float: left;padding-top: 10px;margin: 0 100px;">Tiền vốn : <span
                                    style="color: red">{{number_format($funds, 0, ',', '.')}}</span> VNĐ</span>
                            <span style="float: left;padding-top: 10px;">Lãi gộp : <span
                                    style="color: red">{{number_format($profit, 0, ',', '.')}}</span> VNĐ</span>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table mt-3 border-top">
                                <thead>
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng bán</th>
                                    <th>Số lượng tồn kho</th>
                                    <th>Giá nhập</th>
                                    <th>Giá bán</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    @foreach($invoice->invoice_details as $invoiceDetails)
                                        <tr>
                                            <td>{{$invoiceDetails->product->id}}</td>
                                            <td>{{$invoiceDetails->product->name}}</td>
                                            <td>{{$invoiceDetails->quantity}}</td>
                                            <td>{{$invoiceDetails->product->quantity}}</td>
                                            <td>{{number_format($invoiceDetails->product->import_price, 0, ',', '.')}} VNĐ</td>
                                            <td>
                                                {{number_format($invoiceDetails->product->selling_price, 0, ',', '.')}} VNĐ
                                            </td>
                                            <td>
                                                {{number_format($invoiceDetails->total, 0, ',', '.')}} VNĐ
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                            <nav>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
