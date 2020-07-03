@extends('admin/layout/index')
@section('title')
    Trả lời bình luận
@endsection
@section('content')
    <div class="content-wrapper">
        @if(count($errors) > 0)
            <div class='card card-inverse-warning' id='context-menu-access'>
                <div class='card-body'>
                    @foreach($errors->all() as $err)
                        <p class='card-text' style='text-align: center;'>
                            {{$err}}
                        </p>
                    @endforeach
                </div>
            </div>
        @endif

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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="admin/quanlybinhluan/traloi/{{$comment->id}}"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="card-title">Sản phẩm : <b>{{$comment->products->name}}</b></h6>
                                    <div class="img" style="margin-bottom: 30px;">
                                        <img src="images/mark/mark_product.png"
                                             style="background-image: url('upload/sanpham/tieude/{{$comment->products->image}}');background-size: cover"
                                             alt="">
                                    </div>
                                    <div id="dragula-right" class="py-2">
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media">
                                                    <i class="mdi mdi-account icon-sm align-self-center mr-3"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">{{$comment->customers->name}}</h6>
                                                        <p class="mb-0 text-muted">
                                                            {{$comment->content}}
                                                        </p>
                                                        <div class="time_cmt" style="float: right">
                                                            {{$comment->created_at}}
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="admin/quanlybinhluan/xoa/{{$comment->id}}">x</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($replys as $reply)
                                        <div id="dragula-right" style="margin-left: 30px" class="py-2">
                                            <div class="card rounded border mb-2">
                                                <div class="card-body p-3">
                                                    @if($reply->user_id)
                                                        <div class="media">
                                                            <i class="mdi mdi-account-star icon-sm align-self-center mr-3"></i>
                                                            <div class="media-body">
                                                                <h6 class="mb-1">Admin : {{$reply->users->name}}</h6>
                                                                <p class="mb-0 text-muted">
                                                                    {{$reply->content}}
                                                                </p>
                                                                <div class="time_cmt" style="float: right">
                                                                    {{$reply->created_at}}
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <a href="admin/quanlybinhluan/xoa/{{$reply->id}}">x</a>
                                                            </div>
                                                        </div>
                                                    @elseif($reply->customer_id)
                                                        <div class="media">
                                                            <i class="mdi mdi-account icon-sm align-self-center mr-3"></i>
                                                            <div class="media-body">
                                                                <h6 class="mb-1">{{$reply->customers->name}}</h6>
                                                                <p class="mb-0 text-muted">
                                                                    {{$reply->content}}
                                                                </p>
                                                                <div class="time_cmt" style="float: right">
                                                                    {{$reply->created_at}}
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <a href="admin/quanlybinhluan/xoa/{{$reply->id}}">x</a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Nội dung trả lời<span style="color: red">*</span></label>

                                        <textarea class="form-control" name="comment" id="editor1" rows="4"></textarea>
                                    </div>
                                    <input type="text" name="pro_id" value="{{$comment->products->id}}" hidden>
                                    <input type="submit" class="btn btn-primary mr-2" name="submit"
                                           value="Trả lời bình luận">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
