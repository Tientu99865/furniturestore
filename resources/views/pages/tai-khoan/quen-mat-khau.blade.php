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
        <div class="container py-90 py-tn-40">
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
            <p>Quên mật khẩu? Vui lòng nhập địa chỉ email của bạn </p>
            <div class="form-account py-0">
                <form action="tai-khoan/quen-mat-khau" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group au-form m-b-20">
                        <div class="form-resetpass">
                            <label class="m-b-15">Địa chỉ email</label>
                            <input type="text" name="email">
                        </div>

                    </div>
                    <div class="form-group au-form m-b-10">
                        <button class="btn btn-black text-uppercase btn-small">Lấy lại mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

