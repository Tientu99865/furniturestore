@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_01.jpeg" alt="About Us">
            </div>
            @if (session('warning'))
                <span class="alert alert-warning help-block">
                            <strong>{{ session('warning') }}</strong>
                        </span>
            @endif
            <div class="pageintro-body">
                <h1 class="pageintro-title">Tài khoản của bạn</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-70 py-tn-40">
        @if(count($errors) > 0)
            <div class='card card-inverse-warning' style='color:red;' id='context-menu-access'>
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
            <div class='card card-inverse-success' style='color:#28a745;' id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('ThongBao')}}
                    </p>
                </div>
            </div>
        @elseif(session('Loi'))
            <div class='card card-inverse-warning' style="color: red;" id='context-menu-access'>
                <div class='card-body'>
                    <p class='card-text' style='text-align: center;'>
                        {{session('Loi')}}
                    </p>
                </div>
            </div>
        @endif
            <div class="row">
                <!-- Login -->
                <div class="col-lg-6 ">
                    <div class="au-form-body p-r-lg-15 p-r-xl-15">
                        <h2 class="au-form-title form-title-border">Đăng nhập</h2>
                        <fieldset class="m-t-40">
                            <form action="tai-khoan/dang-nhap " method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group au-form require">
                                    <label>Địa chỉ Email</label>
                                    <input type="email" name="email" value="">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Mật Khẩu</label>
                                    <input type="password" name="password" required>
                                </div>
                                <div class="form-group au-form">
                                    <button type="submit">Đăng nhập</button>
{{--                                    <div class="form-checkbox m-l-18 m-t-tn-10 m-l-tn-0">--}}
{{--                                        <input type="checkbox">--}}
{{--                                        <label>Remember me</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-forgot w-100 m-t-10">--}}
{{--                                        <a href="#">Lost your password?</a>--}}
{{--                                    </div>--}}
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
                <!-- End Login -->

                <!-- Register -->
                <div class="col-lg-6">
                    <div class="au-form-body p-r-lg-15 p-r-xl-15">
                        <h2 class="au-form-title  form-title-border">Đăng ký</h2>
                        <fieldset class="m-t-40">
                            <form action="tai-khoan/dang-ky" method="post" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group au-form require">
                                    <label>Họ & tên bạn</label>
                                    <input type="text" name="name">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Số điện thoại</label>
                                    <input type="number" name="phone_number">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Địa chỉ</label>
                                    <input type="address" name="address">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Địa chỉ Email</label>
                                    <input type="email" name="email">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="re_password">
                                </div>
                                <div class="form-group au-form">
                                    <button type="submit">Đăng ký</button>
                                    <div class="w-100 m-t-10 hidden">.</div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
                <!-- End Register -->
            </div>
        </div>
    </section>
@endsection

