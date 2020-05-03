@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Danh sách người dùng</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách người dùng</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{asset('admin/user/add')}}">Thêm người dùng</a>
                </div>
                <div class="panel-body">
                    <table id="tb1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Hình ảnh</th>
                            <th>Email</th>
                            <th>Chức vụ</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="onRow">
                                <td scope="row">{{$item->id}}</td>
                                <td>{{$item->username}}</td>
                                <td><img class="thumbnail" width="100px"
                                         src="{{isset($item->img)?asset('public/media/'.$item->img):asset('public/img/default.PNG')}}">
                                </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->lever==0?'Admin':'Khách hàng'}}</td>
                                <td>
                                    <a href="{{asset('admin/profile/update/'.$item->id)}}">Edit</a>
                                    <a href="{{asset('admin/profile/delete/'.$item->id)}}">Delete</a>
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
