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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 30px;">Thêm sản phẩm</h4>
                            <form class="forms-sample" method="post" action="admin/sanpham/them" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Sản phẩm thuộc danh mục<span style="color: red">*</span></label>
                                    <select  name="cat_id" aria-controls="order-listing" class="form-control">
                                        <option value="">-- Các danh mục --</option>
                                        {{\App\Helpers\FurnitureStore\Category::cat_parent($categories)}}

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Tên sản phẩm<span style="color: red">*</span></label>
                                    <input type="text" class="form-control"
                                           value=""
                                           name="name" id="exampleInputName1" placeholder="...">
                                </div>

                                <div class="form-group">
                                    <label>Chọn ảnh tiêu đề cho sản phẩm<span style="color: red">*</span></label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="...">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Chọn ảnh</button>
                                        </span>
                                    </div>
                                </div>
{{--                                //Multiple Image--}}
                                <div class="form-group">
                                    <label>Chọn ảnh chi tiết cho sản phẩm<span style="color: red">*</span></label>
                                    <input type="file" multiple="" name="images[]"  class="form-control">
                                </div>
{{--                                End multiple Image--}}
                                <div class="form-group">
                                    <label>Giá nhập của sản phẩm<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">Giá</span>
                                        </div>
                                        <input type="text" class="form-control" name="import_price" placeholder="..." aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giá bán sản phẩm<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">Giá</span>
                                        </div>
                                        <input type="text" class="form-control" name="selling_price" placeholder="..." aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mại sản phẩm<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">Giá</span>
                                        </div>
                                        <input type="text" class="form-control" name="promoted_price" placeholder="..." aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Nơi sản xuất<span style="color: red">*</span></label>
                                    <select  name="manu_id" aria-controls="order-listing" class="form-control">
                                        <option value="">-- Chọn nơi sản xuất --</option>
                                        @foreach($manufacture as $manu)
                                            <option value="{{$manu->id}}">{{$manu->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Thông tin sản phẩm<span style="color: red">*</span></label>

                                    <textarea class="form-control" name="pro_content" id="editor1" rows="4">

                                    </textarea>
                                    <script>

                                        CKEDITOR.replace( 'editor1' );

                                    </script>
                                </div>
                                <input type="submit" class="btn btn-primary mr-2" name="submit" value="Thêm sản phẩm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('script')
    <!-- Custom js for this page-->
    <script src="admin_asset/js/file-upload.js"></script>
    <script src="admin_asset/js/iCheck.js"></script>
    <script src="admin_asset/js/typeahead.js"></script>
    <script src="admin_asset/js/select2.js"></script>
    <script src="admin_asset/js/jquery-file-upload.js"></script>
    <!-- End custom js for this page-->
@endsection
