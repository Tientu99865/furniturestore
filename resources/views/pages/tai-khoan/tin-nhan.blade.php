@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_01.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">Tin nhắn liên hệ</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-70 py-tn-40">
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-form-body p-r-lg-15 p-r-xl-15">
                        <h2 class="au-form-title  form-title-border" style="margin-bottom: 30px;">Tin nhắn liên hệ</h2>
                        <div class="comment">
                            @foreach($contacts as $contact)
                                <div class="cus_comment">
                                    <div class="cus_cmt">
                                        <b>{{$contact->customer->name}}</b>
                                        <div class="comment-content" style="margin-top: 10px">
                                            {{$contact->content}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($replys as $reply)
                                <div class="cus_comment" style="width: 90%;float: right">
                                    <div class="cus_cmt">
                                        <b style="color: #3a34f6">Admin : {{$reply->user->name}}</b>
                                        <div class="comment-content"
                                             style="margin-top: 10px">
                                            {{$reply->content}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="title">Trả lời</h5>
                        <div class="comment-place">
                            <form action="tra-loi" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                                        <textarea cols="30" name="msg" rows="7"
                                                                  placeholder="Nội dung liên hệ"></textarea>
                                    </div>
                                    <div class="col-md-12 m-t-40">
                                        <button type="submit">Trả lời</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

