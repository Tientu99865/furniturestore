@extends('admin/layout/index')
@section('title')
    Liên hệ
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
        <div class="email-wrapper wrapper">
            <div class="row align-items-stretch">
                <div class="mail-sidebar d-none d-lg-block col-md-2 pt-3 bg-white" style="    padding: 20px;">
                    <div class="menu-bar">
                        <ul class="menu-items">
                            {{--                            <li class="compose mb-3">--}}
                            {{--                                <button class="btn btn-primary btn-block">Compose</button>--}}
                            {{--                            </li>--}}
                            <li class="active"><a href="admin/lienhe/index"><i class="mdi mdi-email-outline"></i> Hộp thư đến</a>
                                <?php $count = DB::table('contacts')->where('status', '0')->where('user_id',null)->count();?>
                                <span class="badge badge-pill badge-danger">{{$count}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mail-list-container col-md-3 pt-4 pb-4 border-right bg-white" style="height: inherit;">
                    @foreach($contacts as $contact)
                        <div class="mail-list
                            @if($contact->status == 0)
                            new_mail
                            @endif
                            ">
                            <div class="content">
                                <a href="admin/lienhe/chitiet/{{$contact->id}}">
                                    <p class="sender-name">{{$contact->customer->name}}</p>
                                    <p class="message_text">{{ Illuminate\Support\Str::limit($contact->content, 30) }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mail-view d-none d-md-block col-md-9 col-lg-7 bg-white">

                    @if($contact_details == null)
                        <div class="message-body">

                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="btn-toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                class="mdi mdi-delete text-primary"></i><a href="admin/lienhe/xoa/{{$contact_details->id}}">Xoá</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="message-body">
                            <div class="sender-details">
                                <div class="details">
                                    <p class="msg-subject">
                                        {{$contact_details->customer->name}} - ({{$contact_details->created_at}})
                                    </p>
                                    <p class="sender-email">
                                        <a href="#">{{$contact_details->customer->email}}</a>
                                        &nbsp;<i class="mdi mdi-account-multiple-plus"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="message-content">
                                {{$contact_details->content}}
                            </div>
                            <hr>
                            <div class="attachments-sections" style="margin-bottom: 20px">
                                @foreach($replys as $reply)
                                    <div id="dragula-right" style="margin-left: 30px" class="py-2">
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                @if($reply->user_id)
                                                    <div class="media">
                                                        <i class="mdi mdi-account-star icon-sm align-self-center mr-3"></i>
                                                        <div class="media-body">
                                                            <h6 class="mb-1">Admin : {{$reply->user->name}}</h6>
                                                            <p class="mb-0 text-muted">
                                                                {{$reply->content}}
                                                            </p>
                                                            <div class="time_cmt" style="float: right">
                                                                {{$reply->created_at}}
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="admin/lienhe/xoa/{{$reply->id}}">x</a>
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
                                                            <a href="admin/lienhe/xoa/{{$reply->id}}">x</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <form action="admin/lienhe/traloi/{{$contact_details->id}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleTextarea1">Nội dung trả lời<span style="color: red">*</span></label>

                                    <textarea class="form-control" name="msg" id="editor1" rows="4"></textarea>
                                </div>
                                <input type="text" name="contact_id" value="" hidden>
                                <input type="submit" class="btn btn-primary mr-2" name="submit"
                                       value="Trả lời">
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

