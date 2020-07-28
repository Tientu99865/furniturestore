@extends('admin/layout/index')
@section('title')
    Danh sách danh mục
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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách danh mục</h4>

                        <p>Có tất cả <b><?php $count = DB::table('categories')->count(); echo $count?></b> danh mục</p>
                        <br>

                        <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 50px;">
                                            #
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 100px;">
                                            Tên danh mục
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 150px;">
                                            Danh mục cha
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 100px;">
                                            Vị trí
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center"
                                            style="width: 50px;"><a href="admin/danhmuc/them"><input
                                                    class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button"
                                                    type="button" title="Thêm danh mục"></a></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-grid-body" style="height: 307.625px;">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <?php
                                    $stt = 0
                                    ?>
                                    @foreach($categories as $cat)
                                        <?php
                                        $stt += 1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 50px;"><?php echo $stt;?></td>
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 100px;">{{$cat->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 150px;">
                                                @if($cat->parent_id)
                                                    <p class="btn btn-primary">{{$cat->category->name}}</p>
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 100px;">{{$cat->position}}</td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                style="width: 50px;">
                                                <a href="admin/danhmuc/sua/{{$cat->id}}"><input
                                                        class="jsgrid-button jsgrid-edit-button" type="button"
                                                        title="Sửa"></a>
                                                <a href="admin/danhmuc/xoa/{{$cat->id}}"><input
                                                        class="jsgrid-button jsgrid-delete-button" type="button"
                                                        onclick="return confirm('Bạn có muốn xoá danh mục này không?')"
                                                        title="Xóa"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container">
                                <ul class="pagination" style="margin-top: 50px;">
                                    {!! $categories->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
