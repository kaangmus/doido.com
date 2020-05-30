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
                    <div class="row">
                        @if($order->iduser==Auth::user()->id)
                            <div class="col-sm-6">
                                <h4>Thông tin người đổi</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <span>Họ tên: {{$guestItem[0]->username}}</span><br/>
                                        <span>Địa chỉ: {{$guestItem[0]->address}}</span><br/>
                                        <span>Số điện thoại: {{$guestItem[0]->phone}}</span><br/>
                                        <span>Email: {{$guestItem[0]->email}}</span><br/>
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="btn btn-info"
                                           href="{{asset('admin/messenger/chat/'.$guestItem[0]->id)}}"><i
                                                    class="fa fa-commenting-o"
                                                    aria-hidden="true"></i> Nhắn tin</a>
                                    </div>
                                </div>
                                <h4>Sản phẩm khách đổi: </h4>
                                <hr>
                                <span>Mã sản phẩm: {{$productreItem[0]->idproductre}}</span><br/>
                                <span>Tên sản phẩm: {{$productreItem[0]->title}}</span><br/>
                                <span>Hình ảnh:</span><br>
                                <img style="width: 300px"
                                     src="{{isset($productreItem[0]->coverimg)?asset('public/media/'.$productreItem[0]->coverimg):''}}">
                                <br/>
                                <span>Giá ước tính: {{$productreItem[0]->price}}</span><br/>
                                <span>Tình trạng sản phẩm: {{$productreItem[0]->status==0?'Cũ':'Mới'}}</span><br/>
                            </div>
                            <div class="col-sm-6">
                                <h4>Thông tin sản phẩm của tôi</h4>
                                <hr>
                                <span>Mã sản phẩm: {{$productexItem[0]->idproductex}}</span><br/>
                                <span>Tên sản phẩm: {{$productexItem[0]->title}}</span><br/>
                                <span>Hình ảnh:</span><br>
                                <img style="width: 300px"
                                     src="{{isset($productexItem[0]->coverimg)?asset('public/media/'.$productexItem[0]->coverimg):''}}">
                                <br/>
                                <span>Giá ước tính: {{$productexItem[0]->price}}</span><br/>
                                <span>Tình trạng sản phẩm: {{$productexItem[0]->status==0?'Cũ':'Mới'}}</span><br/>
                                <b>Trạng thái giao dịch:</b>
                                @if(Auth::user()->id==$order->iduser&&$order->status!=3)
                                <a class=" btn btn-success"
                                   href="{{asset('admin/ordermanger/status/'.$order->id.'/'.($order->status==1?'0':'1'))}}">{{$order->status==1?'Đã đổi':'Chưa đổi'}}</a>
                                @else
                                    {{$order->status==1?'Đã đổi':($order->status==3?'Đã bị đổi':'Chưa đổi')}}
                                @endif
                            </div>
                        @else
                            <div class="col-sm-6">
                                <h4>Thông tin {{Auth::user()->lever==0?'người đổi 1':'người đổi'}}</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <span>Họ tên: {{$guestItem[0]->username}}</span><br/>
                                        <span>Địa chỉ: {{$guestItem[0]->address}}</span><br/>
                                        <span>Số điện thoại: {{$guestItem[0]->phone}}</span><br/>
                                        <span>Email: {{$guestItem[0]->email}}</span><br/>
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="btn btn-info"
                                           href="{{asset('admin/messenger/chat/'.$guestItem[0]->id)}}"><i
                                                    class="fa fa-commenting-o"
                                                    aria-hidden="true"></i> Nhắn tin</a>
                                    </div>
                                </div>
                                <h4>Sản phẩm khách đổi: </h4>
                                <hr>
                                <span>Mã sản phẩm: {{$productexItem[0]->idproductre}}</span><br/>
                                <span>Tên sản phẩm: {{$productexItem[0]->title}}</span><br/>
                                <span>Hình ảnh:</span><br>
                                <img style="width: 300px"
                                     src="{{isset($productexItem[0]->coverimg)?asset('public/media/'.$productexItem[0]->coverimg):''}}">
                                <br/>
                                <span>Giá ước tính: {{$productexItem[0]->price}}</span><br/>
                                <span>Tình trạng sản phẩm: {{$productexItem[0]->status==0?'Cũ':'Mới'}}</span><br/>
                            </div>
                            <div class="col-sm-6">
                                <h4>Thông tin sản phẩm {{Auth::user()->lever==0?'người đổi 2':'của tôi'}}</h4>
                                @if(Auth::user()->lever==0)
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <span>Họ tên: {{$guestItem2[0]->username}}</span><br/>
                                            <span>Địa chỉ: {{$guestItem2[0]->address}}</span><br/>
                                            <span>Số điện thoại: {{$guestItem2[0]->phone}}</span><br/>
                                            <span>Email: {{$guestItem2[0]->email}}</span><br/>
                                        </div>
                                        <div class="col-sm-4">
                                            <a class="btn btn-info"
                                               href="{{asset('admin/messenger/chat/'.$guestItem2[0]->id)}}"><i
                                                        class="fa fa-commenting-o"
                                                        aria-hidden="true"></i> Nhắn tin</a>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                                <span>Mã sản phẩm: {{$productreItem[0]->idproductex}}</span><br/>
                                <span>Tên sản phẩm: {{$productreItem[0]->title}}</span><br/>
                                <span>Hình ảnh:</span><br>
                                <img style="width: 300px"
                                     src="{{isset($productreItem[0]->coverimg)?asset('public/media/'.$productreItem[0]->coverimg):''}}">
                                <br/>
                                <span>Giá ước tính: {{$productreItem[0]->price}}</span><br/>
                                <span>Tình trạng sản phẩm: {{$productreItem[0]->status==0?'Cũ':'Mới'}}</span><br/>
                                <b>Trạng thái giao dịch:</b>
                                @if(Auth::user()->id==$order->iduser)
                                    <a class=" btn btn-success"
                                       href="{{asset('admin/ordermanger/status/'.$order->id.'/'.($order->status==1?'0':'1'))}}">{{$order->status==1?'Đã đổi':'Chưa đổi'}}</a>
                                @else
                                    {{$order->status==1?'Đã đổi':($order->status==3?'Đã bị đổi':'Chưa đổi')}}
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">DOIDO.COM</p>
    </div>
    </div><!-- /.row -->
@stop
