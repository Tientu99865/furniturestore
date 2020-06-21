@extends('admin/layout/index')
@section('title')
    Danh sách sản phẩm
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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách sản phẩm</h4>

                        <p>Có tất cả <b><?php $count = DB::table('products')->count(); echo $count?></b> sản phẩm</p><br>

                        <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 30px;">
                                            #
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 120px;">
                                            Sản phẩm thuộc danh mục
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 150px;">
                                            Tên sản phẩm
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Ảnh
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                            Tình trạng
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 100px;"><a href="admin/sanpham/them"><input class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Thêm sản phẩm"></a></th>
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="jsgrid-grid-body" style="height: 307.625px;">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <?php
                                    $stt = 0
                                    ?>
                                    @foreach($product as $pro)
                                        <?php
                                        $stt+=1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 30px;">{{$stt}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 120px;">{{$pro->categories->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 150px;">{{$pro->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><a href="upload/sanpham/tieude/{{$pro->image}}"><img src="upload/sanpham/tieude/{{$pro->image}}" style="    width: 50px;height: 50px;border-radius: 0%;" alt=""></a></td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                                                <?php
                                                    $n = DB::table('import_invoice')->where('pro_id',$pro->id)->count();;
                                                    $quantity_total = 0;
                                                ?>
                                                @for($i = 0; $i < $n; $i++)
                                                    <?php $quantity_total += $pro->import_invoice[$i]->quantity; ?>
                                                @endfor
                                                @if($quantity_total == 0)
                                                    <label class="badge badge-danger">Hết hàng</label>
                                                @else
                                                    <label class="badge badge-success">Còn hàng</label>
                                                @endif
                                            </td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 100px;">
                                                <a href="admin/sanpham/chitiet/{{$pro->id}}"><input class="jsgrid-button jsgrid-clear-filter-button" type="button" title="Xem chi tiết"></a>
                                                <a href="admin/sanpham/sua/{{$pro->id}}"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Sửa"></a>
                                                <a href="admin/sanpham/xoa/{{$pro->id}}"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Xóa"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container" >
                                <ul class="pagination" style="margin-top: 50px;">
                                    {!! $product->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
