@extends('admin/layout/index')
@section('title')
    Quản lý bình luận
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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Quản lý bình luận</h4><br>

                        <div id="js-grid" class="jsgrid" style="position: relative; height: 500px; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 50px;">
                                            Sản phẩm
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 100px;">
                                            Khách hàng bình luận
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable"
                                            style="width: 150px;">
                                            Nội dung
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
                                    @foreach($comments as $comment)
                                        @if($comment->customer_id)
                                            @if($comment->parent_id == 0)
                                                <tr class="jsgrid-row">
                                                    <td class="jsgrid-cell jsgrid-align-center"
                                                        style="width: 50px;"><a
                                                            href="upload/sanpham/tieude/{{$comment->products->image}}"><img
                                                                src="upload/sanpham/tieude/{{$comment->products->image}}"
                                                                alt=""></a>{{$comment->products->name}}</td>
                                                    <td class="jsgrid-cell jsgrid-align-center"
                                                        style="width: 100px;">{{$comment->customers->name}}</td>
                                                    <td class="jsgrid-cell jsgrid-align-center"
                                                        style="width: 150px;">{{$comment->content}}</td>
                                                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                        style="width: 50px;">
                                                        <a href="admin/quanlybinhluan/traloi/{{$comment->id}}"><input
                                                                class="jsgrid-button jsgrid-insert-button" type="button"
                                                                title="Trả lời bình luận"></a>
                                                        <a href="admin/quanlybinhluan/xoa/{{$comment->id}}"><input
                                                                class="jsgrid-button jsgrid-delete-button" type="button"
                                                                onclick="return confirm('Bạn có muốn xoá bình luận này không?')"
                                                                title="Xóa"></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="jsgrid-pager-container">
                                <ul class="pagination" style="margin-top: 50px;">
                                    {{--                                    {!! $user->links() !!}--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
