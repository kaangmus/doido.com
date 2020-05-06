@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">product</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{asset('admin/product/add')}}">Thêm sản phẩm</a>
                </div>
                <div class="panel-body">

                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá bán</th>
                                <th>Tình trạng sản phẩm</th>
                                <th># Tag</th>
                                <th>Mô tả ngắn</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><img class="thumbnail" width="100px" src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/images/shirt-render.jpg')}}" ></td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->statustype==0?'Hết hàng':'Còn hàng'}}</td>
                                    <td>{{$item->tag}}</td>
                                    <td>{{$item->describe}}</td>
                                    <td>{{$item->status==1?'Mới':'Cũ'}}</td>
                                    <td>
                                        <a href="{{asset('admin/product/update/'.$item->id)}}">Sửa</a>
                                        <a href="{{asset('admin/product/delete/'.$item->id)}}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">DOIDO.COM</p>
    </div>
    </div><!-- /.row -->
@stop
