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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách chức vụ</h4>

                        <p>Có tất cả <b><?php $count = DB::table('roles')->count(); echo $count?></b> chức vụ</p><br>

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
                                            Tên chức vụ
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 100px;">
                                            Quyền
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center"
                                            style="width: 50px;"><a href="admin/chucvu/them"><input
                                                    class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button"
                                                    type="button" title="Thêm chức vụ"></a></th>
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
                                    @foreach($roles as $role)
                                        <?php
                                        $stt += 1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 50px;"><?php echo $stt;?></td>
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 100px;"><span class="btn btn-primary">{{$role->name}}</span></td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                                                @if($role->getPermissionNames()->isEmpty())
                                                    <span class="btn btn-danger">Chưa có quyền</span>
                                                @else
                                                    @foreach($role->getPermissionNames() as $permission)
                                                        <span>{{$permission}} -- </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                style="width: 50px;">
                                                <a href="admin/chucvu/sua/{{$role->id}}"><input
                                                        class="jsgrid-button jsgrid-edit-button" type="button"
                                                        title="Sửa"></a>
                                                <a href="admin/chucvu/xoa/{{$role->id}}"><input
                                                        class="jsgrid-button jsgrid-delete-button" type="button"
                                                        title="Xóa"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container">
                                <ul class="pagination" style="margin-top: 50px;">
                                    {!! $roles->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
