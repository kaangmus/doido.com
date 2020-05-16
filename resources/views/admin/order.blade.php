@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{asset('admin')}}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lý giao dịch</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{asset('admin/product/add')}}">Quản lý giao dịch</a>
                </div>
                <div class="panel-body">
                    @if(Auth::user()->lever==0&&$itemsManager!=null)
                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Mã giao dịch</th>
                                <th>Mã khách hàng (1)</th>
                                <th>Tên khách hàng (1)</th>
                                <th>Mã sản phẩm (1)</th>
                                <th>Mã khách hàng (2)</th>
                                <th>Tên khách hàng (2)</th>
                                <th>Mã sản phẩm (2)</th>
                                <th>Trạng thái giao dịch</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($itemsManager as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->userid1}}</td>
                                    <td>{{$item->username1}}</td>
                                    <td>{{$item->idproductex}}</td>
                                    <td>{{$item->userid2}}</td>
                                    <td>{{$item->username2}}</td>
                                    <td>{{$item->idproductre}}</td>
                                    <td>{{$item->status==1?'Đã đổi':'Chưa đổi'}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{asset('admin/ordermanger/detail/'.$item->id)}}">Chi tiết</a>
                                        <a class="btn btn-danger" href="{{asset('admin/ordermanger/delete/'.$item->id)}}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Mã giao dịch</th>
                                <th>* Tên sản phẩm</th>
                                <th>* Hình ảnh</th>
                                <th>* Loại giao dịch</th>
                                <th>* Trạng thái sản phẩm</th>
                                <th>* Họ tên người giao dịch</th>
                                <th>Mã sản phẩm</th>
                                <th>Trạng thái sản phẩm</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->idOrder}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><img class="thumbnail" width="100px"
                                             src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/images/shirt-render.jpg')}}">
                                    </td>
                                    <td>{{$item->orderType}}</td>
                                    <td>{{$item->status==0?'Cũ':'Mới'}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->idproductex}}</td>
                                    <td>{{$item->orderStatus==1?'Đã đổi':'Chưa đổi'}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{asset('admin/ordermanger/detail/'.$item->idOrder)}}">Chi tiết</a>
                                        <a class="btn btn-danger" href="{{asset('admin/ordermanger/delete/'.$item->idOrder)}}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($items2!=null)
                                @foreach($items2 as $item)
                                    <tr class="onRow">
                                        <td scope="row">{{$item->idOrder}}</td>
                                        <td>{{$item->title}}</td>
                                        <td><img class="thumbnail" width="100px"
                                                 src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/images/shirt-render.jpg')}}">
                                        </td>
                                        <td>{{$item->orderType}}</td>
                                        <td>{{$item->status==0?'Cũ':'Mới'}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->idproductre}}</td>
                                        <td>{{$item->orderStatus==1?'Đã đổi':'Chưa đổi'}}</td>
                                        <td>
                                            <a href="{{asset('admin/ordermanger/detail/'.$item->idOrder)}}">Chi tiết</a>
                                            <a href="{{asset('admin/ordermanger/delete/'.$item->idOrder)}}">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">DOIDO.COM</p>
    </div>
    </div><!-- /.row -->
@stop
