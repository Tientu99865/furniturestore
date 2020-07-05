@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_01.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">Thông tin cá nhân</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-70 py-tn-40">
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-form-body p-r-lg-15 p-r-xl-15">
                        <h2 class="au-form-title  form-title-border">Thông tin của bạn</h2>
                        <fieldset class="m-t-40">
                            <form action="thong-tin-tai-khoan" method="post" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group au-form require">
                                    <label>Họ & tên bạn</label>
                                    <input type="text" value="{{Auth::guard('customers')->user()->name}}" name="name">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Số điện thoại</label>
                                    <input type="number" value="{{Auth::guard('customers')->user()->phone_number}}" name="phone_number">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Địa chỉ</label>
                                    <input type="address" value="{{Auth::guard('customers')->user()->address}}" name="address">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Địa chỉ Email</label>
                                    <input type="email" value="{{Auth::guard('customers')->user()->email}}" name="email" readonly>
                                </div>
                                <div class="form-group au-form">
                                    <button type="submit">Thay đổi thông tin</button>
                                    <a href="thay-doi-mat-khau" class="pass">Thay đổi mật khẩu</a>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

