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
        @endif

        <div class="row grid-margin">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Thêm nơi sản xuất</h4>
                        <form class="forms-sample" method="post" action="admin/noisanxuat/them">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên nơi sản xuất <span style="color: red">*</span></label>
                                <input type="text" value=""
                                       name="name" class="form-control" id="exampleInputName1" placeholder="Tên nơi sản xuất" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm nơi sản xuất</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
