@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <style>
        .pass{
            display: none;
        }
        .changepass{
            border: 1px solid;
        }
    </style>
    <script>
        $(document).ready(function(){
            $(".changepass").click(function(){
                $(".pass").toggle();
            });
        });
    </script>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">ProFile</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tạo mới người dùng</div>
                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" placeholder="Email" name="email"
                                       value="{{isset($item->email)?$item->email:''}}">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <span class="btn changepass">Đổi mật khẩu</span>
                                <input class="form-control pass" type="password" placeholder="Mật khẩu" name="password">
                            </div>
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" type="text" placeholder="Họ và tên" name="username"
                                       value="{{isset($item->username)?$item->username:''}}">
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" type="number" placeholder="Điện thoại" name="phone"
                                       value="{{isset($item->phone)?$item->phone:''}}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" placeholder="Địa chỉ" name="address"
                                       value="{{isset($item->address)?$item->address:''}}">
                            </div>
                            <div class="form-group">
                                <label>Thành phố</label>
                                <input class="form-control" type="text" placeholder="Thành phố" name="city"
                                       value="{{isset($item->city)?$item->city:''}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <input class="form-control" type="text" placeholder="Mô tả" name="describe"
                                       value="{{isset($item->describe)?$item->describe:''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Img</label>
                                <input id="img" type="file" name="img" value="" class="form-control"
                                       onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" width="300px"
                                     src="{{isset($item->img)?asset('public/media/'.$item->img):'img/user-profile.png'}}">
                                <p class="help-block">Ảnh đại diện.</p>
                            </div>
                        </div>
                        </div>
                        <div class="row col-sm-12">
                            <button class="btn btn-lg btn-primary">Chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">DOIDO.COM</p>
    </div>
    </div><!-- /.row -->
@stop
