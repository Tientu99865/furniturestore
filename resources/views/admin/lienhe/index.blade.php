@extends('admin/layout/index')
@section('title')
    Liên hệ
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="email-wrapper wrapper">
            <div class="row align-items-stretch">
                <div class="mail-sidebar d-none d-lg-block col-md-2 pt-3 bg-white">
                    <div class="menu-bar">
                        <ul class="menu-items">
{{--                            <li class="compose mb-3">--}}
{{--                                <button class="btn btn-primary btn-block">Compose</button>--}}
{{--                            </li>--}}
                            <li class="active"><a href="#"><i class="mdi mdi-email-outline"></i> Hộp thư đến</a>
                                <?php $count = DB::table('contacts')->where('status','0')->count();?>
                                <span class="badge badge-pill badge-danger">{{$count}}</span>
                            </li>
                            <li><a href="#"><i class="mdi mdi-share"></i> Đã gửi</a><span
                                    class="badge badge-pill badge-success">8</span></li>
                        </ul>
                    </div>
                </div>
                <div class="mail-list-container col-md-3 pt-4 pb-4 border-right bg-white" style="height: inherit;">
{{--                    <div class="border-bottom pb-4 mb-3 px-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <input class="form-control w-100" type="search" placeholder="Search mail" id="Mail-rearch">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @foreach($contacts as $contact)
                        <div class="mail-list
                            @if($contact->status == 0)
                                new_mail
                            @endif
                            ">
                            <div class="content">
                                <a href="#">
                                    <p class="sender-name">{{$contact->customer->name}}</p>
                                    <p class="message_text">{{ Illuminate\Support\Str::limit($contact->content, 30) }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mail-view d-none d-md-block col-md-9 col-lg-7 bg-white">
                    <div class="row">
                        <div class="col-md-12 mb-4 mt-4">
                            <div class="btn-toolbar">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                            class="mdi mdi-delete text-primary"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="message-body">
                        <div class="sender-details">
                            <img class="img-sm rounded-circle mr-3" src="../../../../images/faces/face11.jpg" alt="">
                            <div class="details">
                                <p class="msg-subject">
                                    Weekly Update - Week 19 (May 8, 2017 - May 14, 2017)
                                </p>
                                <p class="sender-email">
                                    Sarah Graves
                                    <a href="#">itsmesarah268@gmail.com</a>
                                    &nbsp;<i class="mdi mdi-account-multiple-plus"></i>
                                </p>
                            </div>
                        </div>
                        <div class="message-content">
                            <p>Hi Emily,</p>
                            <p>This week has been a great week and the team is right on schedule with the set deadline.
                                The team has made great progress and achievements this week. At the current rate we will
                                be able to deliver the product right on time and meet the quality that is expected of
                                us. Attached are the seminar report held this week by our team and the final product
                                design that needs your approval at the earliest.</p>
                            <p>For the coming week the highest priority is given to the development for <a
                                    href="../../../../../../index.html" target="_blank">http://www.urbanui.com/</a> once
                                the design is approved and necessary improvements are made.</p>
                            <p><br><br>Regards,<br>Sarah Graves</p>
                        </div>
                        <div class="attachments-sections">
                            <ul>
                                <li>
                                    <div class="thumb"><i class="mdi mdi-file-pdf"></i></div>
                                    <div class="details">
                                        <p class="file-name">Seminar Reports.pdf</p>
                                        <div class="buttons">
                                            <p class="file-size">678Kb</p>
                                            <a href="#" class="view">View</a>
                                            <a href="#" class="download">Download</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb"><i class="mdi mdi-file-image"></i></div>
                                    <div class="details">
                                        <p class="file-name">Product Design.jpg</p>
                                        <div class="buttons">
                                            <p class="file-size">1.96Mb</p>
                                            <a href="#" class="view">View</a>
                                            <a href="#" class="download">Download</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

