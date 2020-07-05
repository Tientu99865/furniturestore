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
                        <h2 class="au-form-title  form-title-border">Thay đổi mật khẩu</h2>
                        <fieldset class="m-t-40">
                            <form action="thay-doi-mat-khau" method="post" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group au-form require">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" name="password">
                                </div>
                                <div class="form-group au-form require">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="re_password">
                                </div>
                                <div class="form-group au-form">
                                    <button type="submit">Thay đổi mật khẩu</button>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

