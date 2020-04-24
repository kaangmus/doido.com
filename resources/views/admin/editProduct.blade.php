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
            <li class="active">Product/Add</li>
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
                                <select id="boot-multiselect-demo" multiple="multiple" class="form-control" rows="5"
                                        name="idcategory[]">
                                    @foreach($listCate as $itemCate)
                                        <option value="{{$itemCate->id}}">{{$itemCate->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" placeholder="tên sản phẩm" name="title"
                                       value="{{isset($item->title)?$item->title:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Giá bán</label>
                                <input class="form-control" type="number" placeholder="giá bán" name="price"
                                       value="{{isset($item->price)?$item->price:''}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Giá sale</label>
                                <input class="form-control" type="number" placeholder="giá sale" name="sale"
                                       value="{{isset($item->sale)?$item->sale:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>#Tag</label>
                                <input class="form-control" placeholder="#tag" name="tag"
                                       value="{{isset($item->tag)?$item->tag:''}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Loại đăng tin</label>
                                <select id="boot-multiselect-demo" multiple="multiple" class="form-control" rows="5"
                                        name="style[]">
                                    <option value="bán">Bán</option>
                                    <option value="cho">Cho</option>
                                    <option value="đổi">Đổi</option>
                                    <option value="tặng">Tặng</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Số lượng sản phẩm</label>
                                <input class="form-control" type="number" placeholder="số lượng sản phẩm" name="count"
                                       value="{{isset($item->count)?$item->count:''}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Mô tả ngắn</label>
                                <br>
                                <textarea class="form-control" rows="5" name="describe"
                                          placeholder="mô tả ngắn">{{isset($item->describe)?$item->describe:''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Mô tả sản phẩm</label>
                            <br>
                            <textarea class="form-control" rows="5" name="content"
                                      placeholder="mô tả">{{isset($item->content)?$item->content:''}}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Ảnh đại diện</label>
                                <input id="img" type="file" name="coverimg" value="" class="form-control"
                                       onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" width="300px"
                                     src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/img/default.PNG')}}">
                                <p class="help-block">Ảnh đại diện.</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Hình ảnh sản phẩm</label>
                                <input multiple type="file" name="media[]" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Trạng thái</label>
                            <select id="boot-multiselect-demo" class="form-control" rows="5" name="status">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
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
