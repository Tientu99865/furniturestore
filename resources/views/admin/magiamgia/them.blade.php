@extends('admin/layout/index')
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
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Thêm mã giảm giá</h4>
                        <form class="forms-sample" method="post" action="admin/magiamgia/them">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên mã giảm giá <span style="color: red">*</span></label>
                                <input type="text" value=""
                                       name="name" class="form-control" id="exampleInputName1" placeholder="Tên mã giảm giá" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Code giảm giá <span style="color: red">*</span></label>
                                <input type="text" value=""
                                       name="code" class="form-control" id="exampleInputName1" placeholder="Code" />
                            </div>
                            <div class="form-group">
                                <label>Số tiền giảm giá<span style="color: red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">Giá</span>
                                    </div>
                                    <input type="text" class="form-control" name="dis_price" placeholder="..." aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm mã giảm giá</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
