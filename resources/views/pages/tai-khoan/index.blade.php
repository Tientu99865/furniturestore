@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_01.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">Tài khoản của bạn</h1>
                <nav class="pageintro-breadcumb">
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="#">Home</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">My Account</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-70 py-tn-40">
            <div class="row">
                <!-- Login -->
                <div class="col-lg-6 ">
                    <div class="au-form-body p-r-lg-15 p-r-xl-15">
                        <h2 class="au-form-title form-title-border">Đăng nhập</h2>
                        <fieldset class="m-t-40">
                            <form>
                                <div class="form-group au-form require">
                                    <label>Địa chỉ Email</label>
                                    <input type="email">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Mật Khẩu</label>
                                    <input type="password">
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
                            <form action="tai-khoan/dang-ky" method="post">
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
                                    <input type="address">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Địa chỉ Email</label>
                                    <input type="email">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Mật khẩu</label>
                                    <input type="password">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="re_password">
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

