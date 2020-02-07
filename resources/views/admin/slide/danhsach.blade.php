@extends('admin/layout/index')
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
                    <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách các ảnh slide</h4>
                    <p>Có tất cả <b><?php $count = DB::table('slides')->count(); echo $count?></b> ảnh slide</p><br>
                    <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                            <table class="jsgrid-table">
                                <tbody><tr class="jsgrid-header-row">
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 30px;">
                                        #
                                    </th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                        Tên slide
                                    </th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 200px;">
                                        Ảnh slide
                                    </th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                        link
                                    </th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                        Mô tả
                                    </th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">
                                        Ngày đăng
                                    </th>
                                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><a href="admin/slide/them"><input class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Thêm slide"></a></th>
                                </tr>
                                </tbody></table>
                        </div>
                        <div class="jsgrid-grid-body" style="height: 307.625px;">

                            <table class="jsgrid-table">
                                <tbody>
                                <?php
                                $stt = 0
                                ?>
                                @foreach($slide as $sl)
                                    <?php
                                    $stt+=1;
                                    ?>
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 30px;"><?php echo $stt;?></td>
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><p>{{$sl->name}}</p>
                                        </td>
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 200px;">
                                            <a href="upload/slide/{{$sl->image}}">
                                                <img src="upload/slide/{{$sl->image}}" style="width:200px;height:150px;border-radius: 0%;" alt="">
                                            </a>
                                        </td>
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><p>{{$sl->link}}</p>
                                        </td>
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><p>{{$sl->content}}</p>
                                        </td>
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$sl->created_at}}</td>
                                        <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                                            <a href="admin/slide/sua/{{$sl->id}}"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Sửa"></a>
                                            <a href="admin/slide/xoa/{{$sl->id}}"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Xóa"></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="jsgrid-pager-container" >
                            <ul class="pagination" style="margin-top: 50px;">
                                {!! $slide->links() !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
