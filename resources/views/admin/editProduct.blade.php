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
                                        <li><input type="checkbox" value="{{$itemCate->id}} " name="idcategory[]" >{{$itemCate->title}}</li>
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
                                        <li><input type="checkbox" value="đổi" name="style[]" checked {{isset($item->style)?(strpos($item->style,'doi')>0?'checked':''):''}}>Đổi</li>
                                        <li><input type="checkbox" value="tặng" name="style[]" {{isset($item->style)?(strpos($item->style,'tang')>0?'checked':''):''}}>Tặng</li>
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
                                <label>Trạng thái sản phẩm</label>
                                <select name="statustype" class="form-control">
                                    <option value="1" selected {{isset($item->statustype)?($item->statustype==1?'selected':''):''}}>Còn</option>
                                    <option value="0" {{isset($item->statustype)?($item->statustype==0?'selected':''):''}}>Hết</option>
                                </select>
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
                                    <textarea class="form-control ckeditor" rows="5" name="contents"
                                              placeholder="mô tả">{{isset($item->contents)?$item->contents:''}}</textarea>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('contents',{
                                            language:'vi',
                                            filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
                                            filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
                                            filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select id="boot-multiselect-demo" class="form-control" rows="5" name="status">
                                        <option value="1" {{isset($item->status)?($item->status==1?'selected':''):''}}>Mới</option>
                                        <option value="0" {{isset($item->status)?($item->status==0?'selected':''):''}}>Cũ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Sản phẩm mong muốn</label>
                                    <input class="form-control" type="text" placeholder="sản phẩm cách nhau bởi dấu ," name="desiredproducts"
                                           value="{{isset($item->desiredproducts)?$item->desiredproducts:''}}">
                                </div>
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
