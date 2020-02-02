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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Sửa danh mục : {{$categories->name}}</h4>
                        <form class="forms-sample" method="post" action="admin/danhmuc/sua/{{$categories->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Chọn danh mục cha <span style="color: red">*</span></label>
                                <select name="parent_id" aria-controls="order-listing" class="form-control">
                                    <option value="">--</option>
                                    @foreach($categories->all() as $cat)
                                        <option
                                            @if($categories->parent_id == $cat->id)
                                                {{'selected'}}
                                            @endif
                                            value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tên danh mục <span style="color: red">*</span></label>
                                <input type="text" value="{{$categories->name}}"
                                       name="name" class="form-control" id="exampleInputName1" placeholder="Tên danh mục" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
