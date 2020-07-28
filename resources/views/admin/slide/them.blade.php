@extends('admin/layout/index')
@section('title')
    Thêm tin tức
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
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Thêm tin tức</h4>
                        <form class="forms-sample" method="post" action="admin/slide/them" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Tiêu đề <span style="color: red">*</span></label>
                                <input type="text" value=""
                                       name="title" class="form-control" id="exampleInputName1" placeholder="Tiêu đề" />
                            </div>
                            <div class="form-group">
                                <label>Chọn ảnh slide<span style="color: red">*</span></label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="...">
                                    <span class="input-group-append">
                                      <button class="file-upload-browse btn btn-primary" type="button">Chọn ảnh</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Mô tả ngắn<span style="color: red">*</span></label>

                                <textarea class="form-control" name="short_description" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Nội dung<span style="color: red">*</span></label>

                                <textarea class="form-control" name="text_content" id="editor1" rows="4"></textarea>
                                <script>

                                    CKEDITOR.replace( 'editor1' );

                                </script>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm tin tức</button>
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
    <!-- End custom js for this page-->
@endsection
