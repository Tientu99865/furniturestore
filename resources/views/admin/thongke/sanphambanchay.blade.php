@extends('admin/layout/index')
@section('title')
    Sản phẩm bán chạy
@endsection
@section('content')
    <div class="content-wrapper">
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div style="text-align: center;margin-bottom: 50px">
                            <h1>Sản phẩm bán chạy</h1>
                        </div>

                        {{--                        <div style="display: flex;justify-content: center">--}}
                        {{--                            <span style="float: left;padding-top: 10px;">Doanh thu : <span--}}
                        {{--                                    style="color: red">54.450.000</span> VNĐ</span>--}}
                        {{--                            <span style="float: left;padding-top: 10px;margin: 0 100px;">Tiền vốn : <span--}}
                        {{--                                    style="color: red">36.000.000</span> VNĐ</span>--}}
                        {{--                            <span style="float: left;padding-top: 10px;">Lãi gộp : <span--}}
                        {{--                                    style="color: red">18.450.000</span> VNĐ</span>--}}
                        {{--                        </div>--}}
                        <div class="table-responsive mt-2">
                            <table class="table mt-3 border-top">
                                <thead>
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng bán</th>
                                    <th>Số lượng tồn kho</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><a href="upload/sanpham/tieude/{{$product->image}}"><img src="upload/sanpham/tieude/{{$product->image}}" style="    width: 50px;height: 50px;border-radius: 0%;" alt=""></a>{{$product->name}}</td>
                                        <td>{{$product->sell_number}}</td>
                                        <td>{{$product->quantity}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                        <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">--}}
{{--                            <nav>--}}
{{--                                {!! $products->links() !!}--}}
{{--                            </nav>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
