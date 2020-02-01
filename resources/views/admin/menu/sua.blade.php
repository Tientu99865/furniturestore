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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Sửa menu : {{$menu->name}}</h4>
                        <form class="forms-sample" method="post" action="admin/menu/sua/{{$menu->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên menu <span style="color: red">*</span></label>
                                <input type="text" value="{{$menu->name}}"
                                       name="name" class="form-control" id="exampleInputName1" placeholder="Tên danh mục" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Đường dẫn (URL) </label>
                                <input type="text" value="{{$menu->url}}"
                                       name="url" class="form-control" id="exampleInputName1" placeholder="URL" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Điền vị trí </label>
                                <input type="text" value="{{$menu->position}}"
                                       name="position" class="form-control" id="exampleInputName1" placeholder="Điền vị trí cho menu" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
