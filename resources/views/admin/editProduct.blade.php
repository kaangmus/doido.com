@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <script type="text/javascript">
        $('select').picker();

        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
    </script>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Sản phẩm/ Thêm mới</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm sản phẩm</div>
                <div class="panel-body">
                    <form method="POST" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Danh mục sản phẩm</label>
                                <br>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Danh mục sản phẩm
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu" style="color: black !important;">
                                        @foreach($listCate as $itemCate)
                                        <li><input type="checkbox" value="{{$itemCate->id}}" name="idcategory[]">{{$itemCate->title}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Loại đăng tin</label>
                                <br>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Loại đăng tin
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu" style="color: black !important;">
                                        <li><input type="checkbox" value="ban" name="style[]">Bán</li>
                                        <li><input type="checkbox" value="doi" name="style[]">Đổi</li>
                                        <li><input type="checkbox" value="tang" name="style[]">Tặng</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" placeholder="tên sản phẩm" name="title"
                                       value="{{isset($item->title)?$item->title:''}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>#Tag</label>
                                <input class="form-control" placeholder="#tag" name="tag"
                                       value="{{isset($item->tag)?$item->tag:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Giá bán</label>
                                <input class="form-control" type="number" placeholder="giá bán" name="price"
                                       value="{{isset($item->price)?$item->price:''}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Số lượng sản phẩm</label>
                                <input class="form-control" type="number" placeholder="số lượng sản phẩm" name="count"
                                       value="{{isset($item->count)?$item->count:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <br>
                                    <textarea class="form-control" rows="5" name="describe"
                                              placeholder="mô tả ngắn">{{isset($item->describe)?$item->describe:''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <br>
                                    <textarea class="form-control" rows="5" name="content"
                                              placeholder="mô tả">{{isset($item->content)?$item->content:''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select id="boot-multiselect-demo" class="form-control" rows="5" name="status">
                                        <option value="1">Mới</option>
                                        <option value="0">Cũ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input id="img" type="file" name="coverimg" value="" class="form-control"
                                           onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="300px"
                                         src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/img/default.PNG')}}">
                                    <p class="help-block">Ảnh đại diện.</p>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input multiple type="file" name="media[]" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary">Thêm</button>
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
