@extends('front.Base')
@section('title','Đặt đồ')
@section('main')
    <style>
        .addproduct {
            display: block;
        }

        .product {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".showhide").click(function () {
                $(".addproduct").toggle();
                $(".product").toggle();
            });
        });
    </script>
    <div class="box-content">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/pages/cart02dc.css?v=1575887765">
        <script type='text/javascript' src="js/owl.carousel.min.js"></script>
        <div class="content-area home-content-area top-area">
            <div class="container">
                <div class="navigation margin-top20">
                    <a href="#">Trang chủ</a> > <a href="#">Giỏ hàng</a>
                </div>
                <div>
                    <p class="text-center upcase size-20 times-new-roman">Giỏ hàng</p>
                    <div class="text-center nav-horizontal box-help-cart">
                        <span class="upcase">TRỢ GIÚP? </span><span class="bold"
                                                                    style="margin-right: 10px;">1900 636 517</span>
                        <a href="chinh-sach-doi-tra.html">Ch&iacute;nh s&aacute;ch đổi trả</a>
                        <a href="chinh-sach-giao-hang.html">Ch&iacute;nh s&aacute;ch giao h&agrave;ng</a>
                        <a href="chinh-sach-thanh-toan.html">Ch&iacute;nh s&aacute;ch thanh to&aacute;n</a>
                        <a href="size-guide.html">Size Guide</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="nav-horizontal"><span>Thông tin cá nhân</span></h4>
                            <div>
                                <form method="POST" role="form" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="margin-top10">
                                        <div class="table-responsive lstproducts visible-xs-block hidden-xs">
                                            <div class="form-group col-sm-6">
                                                <label>Họ và tên</label>
                                                <input class="form-control" placeholder="Họ và tên" name="username"
                                                       value='{{Auth::user()->username}}'>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" placeholder="Số điện thoại" name="phone"
                                                       value="{{Auth::user()->phone}}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Địa chỉ</label>
                                                <input class="form-control" placeholder="Địa chỉ" name="address"
                                                       value="{{Auth::user()->address}}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Email</label>
                                                <input class="form-control" placeholder="Email" name="email"
                                                       type="email"
                                                       value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                        <div class="text-right margin-top10 visible-xs-block hidden-xs">
                                            <p>
                                                <a class="btn btn-black btn--modal-login showhide" type="button"><span
                                                            class="addproduct">Đã có sản phẩm</span><span
                                                            class="product">Chưa có sản phẩm</span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="margin-top10 row addproduct">
                                        <h4 class="nav-horizontal"><span>Sản phẩm đổi</span></h4>
                                        <input type="text" hidden name="idproduct" value="{{$product->id}}">
                                            <div class="form-group col-sm-6">
                                                <label>Tên sản phẩm</label>
                                                <input class="form-control" placeholder="Tên sản phẩm" name="title"
                                                       value="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Mô tả ngắn</label>
                                                <input class="form-control" placeholder="Mô tả ngắn" name="describe"
                                                       value="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Nội dung</label>
                                                <input class="form-control" placeholder="Nội dung" name="content"
                                                       value="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Tình trạng</label>
                                                <select id="boot-multiselect-demo" class="form-control" rows="5"
                                                        name="status">
                                                    <option value="1">Mới</option>
                                                    <option value="0">Cũ</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ảnh đại diện</label>
                                                    <input id="img" type="file" name="coverimg" value=""
                                                           class="form-control"
                                                           onchange="changeImg(this)">
                                                    <img id="avatar" class="thumbnail" width="300px"
                                                         src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/img/default.PNG')}}">
                                                    <p class="help-block">Ảnh đại diện.</p>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="margin-top10 row product">
                                        <h4 class="nav-horizontal"><span>Danh sách sản phẩm</span></h4>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="text-center" colspan="2">Chọn</th>
                                                <th class="text-center" style="min-width:90px;">Hình ảnh</th>
                                                <th class="text-center" style="min-width:75px;">Tên sản phẩm</th>
                                                <th class="text-right" style="min-width:85px;">Trạng thái</th>
                                            </tr>
                                            </thead>
                                            <tbody style="height:80em;overflow:scroll;">
                                            @foreach($listproduct as $item)
                                                <tr class="clear-border product-info-custom">
                                                    <td class="text-center"><input type="radio" name="checkId"
                                                                                   value="{{$item->id}}"></td>
                                                    <td class="text-center"><img class="lazyload" style="width: 50px"
                                                                                 data-src="{{asset('public/media/'.$item->coverimg)}}"
                                                                                 src="{{asset('public/media/'.$item->coverimg)}}">
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="title">{{$item->title}}</span><br>
                                                    </td>
                                                    <td class="text-right">{{$item->status==0?'Cũ':'Mới'}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right margin-top10 visible-xs-block">
                                        <p>
                                            <button class="btn btn-black btn--modal-login">Giao dịch</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h4 class="nav-horizontal"><span>{{$product->title}}</span></h4>
                            <span style="font-weight: bold">Mô tả ngắn:</span>
                            <p>{{$product->describe}}</p>
                            <span style="font-weight: bold">Giá:</span>
                            <p>{{$product->price}}</p>
                            <span style="font-weight: bold">Mặt hàng muốn đổi:</span>
                            <p>{{$product->desiredproducts}}</p>

                            <h4 class="nav-horizontal"><span>Thông tin người đổi</span></h4>
                            <span style="font-weight: bold">Tên:</span>
                            <p>{{$product->username}}</p>
                            <span style="font-weight: bold">Email:</span>
                            <p>{{$product->email}}</p>
                            <span style="font-weight: bold">Số điện thoại:</span>
                            <p>{{$product->phone}}</p>
                            <div class="prod-image relative">
                                <img src="{{asset('public/media/'.$product->coverimg)}}">
                            </div>

                        </div>
                    </div>

                    <div class="margin-bottom30 text-right">
                        <a href="{{asset('/')}}">
                            <button class="btn btn-black" type="button">Tiếp tục mua hàng</button>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- End content area -->
    </div>

@stop