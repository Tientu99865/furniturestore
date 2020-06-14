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
            @elseif(session('LoiDangNhap'))
                <div class='card card-inverse-warning' style="color: red;" id='context-menu-access'>
                    <div class='card-body'>
                        <p class='card-text' style='text-align: center;'>
                            {{session('LoiDangNhap')}}
                        </p>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="au-form-body p-r-lg-15 p-r-xl-15">
                        <h2 class="au-form-title form-title-border">Cài lại mật khẩu</h2>
                        <fieldset class="m-t-40">
                            <form action="" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
{{--                                value="{{$email ?? old('email')}}--}}
                                <div class="form-group au-form require">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password" required>
                                </div>
                                <div class="form-group au-form require">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="re_password" required>
                                </div>
                                <div class="form-group au-form">
                                    <button type="submit">Lưu thay đổi</button>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

