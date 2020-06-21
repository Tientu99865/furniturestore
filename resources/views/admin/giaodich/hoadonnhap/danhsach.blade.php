@extends('admin/layout/index')
@section('title')
    Danh sách hoá đơn nhập
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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách hoá đơn nhập</h4>

                        <p>Có tất cả <b><?php $count = DB::table('import_invoice')->count(); echo $count?></b> hoá đơn nhập</p><br>

                        <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tbody><tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">
                                            #
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Tên người nhập
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Tên sản phẩm
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Giá nhập
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Giá bán
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Giá khuyến mại
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">
                                            SL
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Tổng tiền
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Ngày nhập
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><a href="admin/giaodich/hoadonnhap/them"><input class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Thêm hoá đơn nhập"></a></th>
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="jsgrid-grid-body" style="height: 307.625px;">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <?php
                                    $stt = 0
                                    ?>
                                    @foreach($invoices as $invoice)
                                        <?php
                                        $stt+=1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><?php echo $stt;?></td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$invoice->users->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$invoice->products->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{number_format($invoice->import_price, 0, ',', '.')}} VNĐ</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{number_format($invoice->selling_price, 0, ',', '.')}} VNĐ</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{number_format($invoice->promoted_price, 0, ',', '.')}} VNĐ</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">{{$invoice->quantity}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                                                <?php
                                                    $total_price = $invoice->import_price*$invoice->quantity;
                                                ?>
                                                {{number_format($total_price, 0, ',', '.')}} VNĐ
                                            </td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$invoice->created_at}}</td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                                                <a href="admin/giaodich/hoadonnhap/sua/{{$invoice->id}}"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Sửa"></a>
                                                <a href="admin/giaodich/hoadonnhap/xoa/{{$invoice->id}}"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Xóa"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container" >
                                <ul class="pagination" style="margin-top: 50px;">
                                    {!! $invoices->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
