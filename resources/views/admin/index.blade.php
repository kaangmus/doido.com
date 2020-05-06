@extends('admin.Base')
@section('title','Render | Quản trị website')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Thống kê</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bảng thống kê</h1>
        </div>
    </div><!--/.row-->
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                        <div class="large">{{count($order)}}</div>
                        <div class="text-muted">Orders</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                        <div class="large">{{count($comment)}}</div>
                        <div class="text-muted">Bình luận</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                        <div class="large">{{count($users)}}</div>
                        <div class="text-muted">Người dùng</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                        <div class="large">{{count($product)}}</div>
                        <div class="text-muted">Sản phẩm</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
    <div class="row">
        @if($checkcount==false)
            <div class="col-md-12">
                <p><b>Không đủ dữ liệu so sánh</b></p>
            </div>
        @else
            <div class="col-md-12">
                <p><b>Thống kê so sánh từ tháng {{$countproduct[1]->month}} đến tháng {{$countproduct[0]->month}}</b>
                </p>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Sản phẩm mới</h4>
                        <div class="easypiechart" id="easypiechart-blue"
                             data-percent="{{(($countproduct[0]->so-$countproduct[1]->so)/$countproduct[1]->so)*100}}">
                            <span class="percent">{{(($countproduct[0]->so-$countproduct[1]->so)/$countproduct[1]->so)*100}}%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Bình luận</h4>
                        <div class="easypiechart" id="easypiechart-orange"
                             data-percent="{{(($countcomment[0]->so-$countcomment[1]->so)/$countcomment[1]->so)*100}}">
                            <span class="percent">{{(($countcomment[0]->so-$countcomment[1]->so)/$countcomment[1]->so)*100}}%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Tài khoản mới</h4>
                        <div class="easypiechart" id="easypiechart-teal"
                             data-percent="{{(($countuser[0]->so-$countuser[1]->so)/$countuser[1]->so)*100}}"><span
                                    class="percent">{{(($countuser[0]->so-$countuser[1]->so)/$countuser[1]->so)*100}}%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Giao dịch</h4>
                        <div class="easypiechart" id="easypiechart-red"
                             data-percent="{{(($countorder[0]->so-$countorder[1]->so)/$countorder[1]->so)*100}}"><span
                                    class="percent">{{(($countorder[0]->so-$countorder[1]->so)/$countorder[1]->so)*100}}%</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div><!--/.row-->

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh mục sản phẩm
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <ul class="todo-list">
                        @foreach($itemsCategory as $itemcate)
                            <li class="todo-list-item">
                                <div class="checkbox">
                                    <label for="checkbox-1">{{$itemcate->title}}</label>
                                </div>
                                <div class="pull-right action-buttons"><a
                                            href="{{asset('admin/category/delete/'.$itemcate->id)}}" class="trash">
                                        <em class="fa fa-trash"></em>
                                    </a></div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <form action="{{asset('admin/category')}}" method="post">
                        {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" class="form-control input-md" name="title"
                               placeholder="Thêm danh mục"/><span class="input-group-btn">
								<button class="btn btn-primary btn-md">Thêm</button>
						</span>
                    </div>
                    </form>
                </div>
            </div>
        </div><!--/.col-->


        <div class="col-md-6">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    Các bước giao dịch
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body timeline-container">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Chọn sản phẩm</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Quý khách chon theo thương hiệu hoặc chủng loại sản phẩm trên phần menu chính. Webside sẽ hiển thị toàn bộ loại sản phẩm của thương hiệu đó hoặc loại sản phẩm đó. Quý khách có thể xem từng trang hoặc chọn màu sắc, loại bút và giá tiền theo yêu cầu của mình qua thanh công cụ lọc sản phẩm.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge primary"><em class="glyphicon glyphicon-link"></em></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Đặt hàng: </h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Bấm nút đặt hàng khi xem chi tiết 1 thương hiệu hoặc loại sản phẩm.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge"><em class="glyphicon glyphicon-camera"></em></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Xác Minh</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Khi nhận được đơn Đặt hàng của Quý khách chúng tôi sẽ kiểm tra và gọi điện xác nhận sản phẩm Quý khách đặt mua còn hàng hay hết hàng.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge"><em class="glyphicon glyphicon-paperclip"></em></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Kết thúc.</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Sau khi nhận hàng xong Quý khách vui lòng kiểm tra hàng hóa và giữ lại phiếu bảo hành của như hóa đơn để sử dụng trong các trường hợp cần thiết khách.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--/.col-->
        <div class="col-sm-12">
            <p class="back-link">Doido.com by <a href="{{asset('/')}}">Oanh Oanh</a></p>
        </div>
    </div><!--/.row-->
@stop
