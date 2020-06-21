@extends('admin/layout/index')
@section('title')
    Sửa hoá đơn nhập
@endsection
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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Sửa hoá đơn nhập của sản phẩm : <b>{{$invoice->products->name}}</b></h4>
                        <form class="forms-sample" method="post" action="admin/giaodich/hoadonnhap/sua/{{$invoice->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Hoá đơn nhập của sản phẩm <span style="color: red">*</span></label>
                                <select name="pro_id" aria-controls="order-listing" class="form-control">
                                    <option value="{{$invoice->pro_id}}">{{$invoice->products->name}}</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Giá nhập <span style="color: red">*</span></label>
                                <input type="text" value="{{$invoice->import_price}}"
                                       name="import_price" class="form-control" id="exampleInputName1" placeholder="Giá nhập của sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Giá bán <span style="color: red">*</span></label>
                                <input type="number" value="{{$invoice->selling_price}}"
                                       name="selling_price" class="form-control" id="exampleInputName1" placeholder="Giá bán của sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Giá khuyến mại <span style="color: red">*</span></label>
                                <input type="number" value="{{$invoice->promoted_price}}"
                                       name="promoted_price" class="form-control" id="exampleInputName1" placeholder="Giá khuyến mại của sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Số lượng <span style="color: red">*</span></label>
                                <input type="text" value="{{$invoice->quantity}}"
                                       name="quantity" class="form-control" id="exampleInputName1" placeholder="Nhập số lượng nhập của sản phẩm" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Sửa hoá đơn nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
