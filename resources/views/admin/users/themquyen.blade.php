@extends('admin/layout/index')
@section('title')
    Thêm chức vụ cho tài khoản
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
        @endif

        <div class="row grid-margin">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;font-size: 30px;">Thêm chức vụ cho
                            : {{$user->name}}</h4>
                        <form class="forms-sample" method="post" action="admin/users/themquyen/{{$user->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Chọn chức vụ<span
                                        style="color: red">*</span></label><br>
                                <select class="js-example-basic-multiple" style="width: 100%;" name="roles[]"
                                        multiple="multiple">
                                    @foreach($roles as $role)
                                        <option
                                            @foreach($user->getRoleNames() as $userRole)
                                                @if($role->name == $userRole)
                                                {{'selected'}}
                                                @endif
                                            @endforeach
                                            value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Thêm chức vụ cho tài khoản</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".js-example-basic-multiple").select2({
                placeholder: "--",
                allowClear: true,
            });
        });
    </script>
@endsection
