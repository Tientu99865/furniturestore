@extends('admin/layout/index')
@section('title')
    Danh sách Admin
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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Danh sách tài khoản
                            admin</h4>

                        <p>Có tất cả <b><?php $count = DB::table('users')->count(); echo $count?></b> tài khoản admin
                        </p><br>

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
                                            Họ & Tên
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 150px;">
                                            Email
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 100px;">
                                            Chức vụ
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center"
                                            style="width: 50px;">Hoạt động
                                        </th>
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
                                    @foreach($user as $u)
                                        <?php
                                        $stt += 1;
                                        ?>
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 50px;"><?php echo $stt;?></td>
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 100px;">{{$u->name}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center"
                                                style="width: 150px;">{{$u->email}}</td>
                                            <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                                                @if($u->getRoleNames()->isEmpty())
                                                    <span class="btn btn-danger">Chưa có chức vụ</span>
                                                @else

                                                    @foreach($u->getRoleNames() as $userRole)
                                                        <span class="btn btn-primary"
                                                              style="margin-bottom: 5px;">{{$userRole}}</span>
                                                    @endforeach
                                                @endif

                                            </td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                style="width: 50px;">
                                                <a href="admin/users/themchucvu/{{$u->id}}"><input
                                                        class="jsgrid-button jsgrid-update-button" type="button"
                                                        title="Thêm chức vụ"></a>
                                                <a href="admin/users/xoa/{{$u->id}}"><input
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
                                    {!! $user->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
