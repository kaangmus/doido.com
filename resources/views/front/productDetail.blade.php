@extends('front.Base')
@section('title','DOIDO.COM | Thế giới đổi đồ')
@section('main')
    <div class="content-area home-content-area top-area">
        <div class="container">
            <div class="navigation margin-top20">
                <a href="{{asset('/')}}">Trang chủ</a>
                <a href="">Sản phẩm</a>
                <a href="">
                    {{$item->title}}
                </a>
            </div>
            <div class="row margin-top20">
                <div class="col-sm-8 col-md-6">
                    <div id="thumbnails">
                        <div id="up-arrow">
                            <span class="thumbnails-arrow"></span>
                        </div>
                        <div id="thumbnails-mask" style="height: auto;">
                            <div id="thumbnails-container">
                                <ul>
                                    <li color-id="22286" class="show active">
                                        <img class="lazyload"
                                             data-src="{{asset('public/media/'.$item->coverimg)}}"
                                             data-image="{{asset('public/media/'.$item->coverimg)}}"
                                             data-zoom-image="{{asset('public/media/'.$item->coverimg)}}"
                                             src="{{asset('public/media/'.$item->coverimg)}}">
                                    </li>
                                    @foreach($itemsMedia as $media)
                                        <li color-id="22286" class="show">
                                            <img class="lazyload"
                                                 data-src="{{asset('public/media/'.$media->url)}}"
                                                 data-image="{{asset('public/media/'.$media->url)}}"
                                                 data-zoom-image="{{asset('public/media/'.$media->url)}}"
                                                 src="{{asset('public/media/'.$media->url)}}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="down-arrow">
                            <span class="thumbnails-arrow"></span>
                        </div>
                    </div>
                    <div class="prod-image relative">
                        <img src="{{asset('public/media/'.$item->coverimg)}}"
                             data-zoom-image="{{asset('public/media/'.$item->coverimg)}}">
                        <div class="imageNav hide">
                            <div class="icon icon-imgnext"></div>
                            <div class="icon icon-imgprev"></div>
                        </div>
                    </div>
                </div>
                <div class="clear-xs margin-bottom20 hidden-lg"></div>
                <div class="col-sm-4 col-md-6 detail">
                    <ul>
                        <form method="POST" action="{{asset('/cart')}}">
                            {{ csrf_field() }}
                            <li>
                                <input type="hidden" id="product_id" name="id" value="{{$item->id}}">
                                <h3><span id="product_name">{{$item->title}}</span></h3>
                                <div class="desc">
                                    <input type="hidden" id="price" value="780000.0000">
                                    <input type="hidden" id="txtAlias" value="vay-nhun-sat-nach-cotton">
                                    <br>
                                    <span class="color-red">
                                {{$item->price}} VND</span>
                                </div>
                            </li>
                            <li>
                                <div class="upcase">Danh mục sản phẩm</div>
                                <div id="color" class="content">
                                        <div style="display: inline-block; margin-right: 10px;">
                                            @foreach($itemsCate as $itemcate)
                                            <label size-id="1">{{$itemcate->title}}</label>
                                            @endforeach
                                        </div>
                                </div>
                            </li>
                            <li>
                                <div class="upcase">Loại giao dịch</div>
                                <?php
                                $styles = explode(",", $item->style);
                                array_pop($styles);
                                ?>
                                <div id="size" class="content">
                                    @foreach($styles as $style)
                                        <div style="display: inline-block; margin-right: 10px;">
                                            <label size-id="1" class="box"><input type="radio" name="style"
                                                                                  value="{{$style}}">{{$style}}</label>
                                        </div>
                                    @endforeach
                                    <div class="clear"></div>
                                </div>
                                <div class="validator hide">Vui lòng chọn kích thước trước khi đặt mua</div>
                            </li>
                            <li>
                                <div class="upcase">#Tag</div>
                                <label size-id="1" class="box">#{{$item->tag}}</label>
                            </li>
                            <li>
                                <div class="upcase">Mặt hàng muốn đổi</div>

                                <label size-id="1" class="box">{{$item->desiredproducts}}</label>

                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-black btnaddtocart">Đặt đồ</button>
                                    </div>
                                </div>
                            </li>
                        </form>

                        <li class="collapse-toogle in">
                            <div class="upcase">MÔ TẢ SẢN PHẨM</div>
                            <div class="content product--content">
                                {!! $item->contents !!}
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách đổi trả</div>
                            <div class="content">
                                FEROSH chấp nhận đổi/trả hàng trong thời gian 03 ngày làm việc, áp dụng không đồng đều
                                đối với từng mặt hàng và sản phẩm khác nhau. Quý khách vui lòng kiểm tra chi tiết về
                                chính sách đổi và trả hàng theo link.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://ferosh.vn/chinh-sach-doi-tra.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách giao hàng</div>
                            <div class="content">
                                Đơn hàng sẽ được giao cho Quý khách trong vòng 07 - 10 ngày làm việc kể từ ngày đặt đơn.
                                Quý khách có thể liên hệ với Ferosh qua Email, Điện thoại, Facebook để được biết về lộ
                                trình đơn hàng của mình . Chi tiết về chính sách giao hàng Quý khách vui lòng click vào
                                link.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://ferosh.vn/chinh-sach-giao-hang.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách thanh toán</div>
                            <div class="content">
                                FEROSH cung cấp 4 hình thức thanh toán cho quý khách: Thanh toán khi nhận hàng (COD),
                                Chuyển khoản, Thanh toán qua thẻ tín dụng, Thanh toán qua thẻ ATM.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://ferosh.vn/chinh-sach-thanh-toan.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li>
                            <ul class="product-other">
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="comment">
                <h3>Bình luận</h3>
                @foreach($listComment as $itemComment)
                <div class="row">
                    <div class="col-8">
                        <div class="card card-white post">
                            <div class="post-heading">
                                <div class="float-left image">
                                    <img src="{{isset($itemComment->img)?asset('public/media/'.$itemComment->img):'images/user_1.jpg'}}" class="img-circle avatar"
                                         alt="user profile image">
                                </div>
                            </div>
                            <div class="post-description">
                                <p>{{$itemComment->comment}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{--<script>--}}
                    {{--$(document).ready(function(){--}}
                        {{--$(".comment button").click(function(){--}}
                            {{--$.post("{{asset('comment')}}",--}}
                                {{--{--}}
                                    {{--comment: $("#comment").val(),--}}
                                {{--},--}}
                                {{--function(data,status){--}}
                                    {{--alert("Data: " + data + "\nStatus: " + status);--}}
                                {{--});--}}
                        {{--});--}}
                    {{--});--}}
                {{--</script>--}}
                <form method="post" action="">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label for="comment">Bình luận:</label>
                        <input name="iduser" hidden value="{{isset(Auth::user()->id)?Auth::user()->id:-1}}">
                        <input name="idproduct" hidden value="{{$item->id}}">
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                        <button>Bình luận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<style>


    .card-white  .card-heading {
        color: #333;
        background-color: #fff;
        border-color: #ddd;
        border: 1px solid #dddddd;
    }
    .card-white  .card-footer {
        background-color: #fff;
        border-color: #ddd;
    }
    .card-white .h5 {
        font-size:14px;
    //font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    .card-white .time {
        font-size:12px;
    //font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    .post .post-heading {
        height: 95px;
        padding: 20px 15px;
    }
    .post .post-heading .avatar {
        width: 60px;
        height: 60px;
        display: block;
        margin-right: 15px;
    }
    .post .post-heading .meta .title {
        margin-bottom: 0;
    }
    .post .post-heading .meta .title a {
        color: black;
    }
    .post .post-heading .meta .title a:hover {
        color: #aaaaaa;
    }
    .post .post-heading .meta .time {
        margin-top: 8px;
        color: #999;
    }
    .post .post-image .image {
        width: 100%;
        height: auto;
    }
    .post .post-description {
        padding: 15px;
    }
    .post .post-description p {
        font-size: 14px;
    }
    .post .post-description .stats {
        margin-top: 20px;
    }
    .post .post-description .stats .stat-item {
        display: inline-block;
        margin-right: 15px;
    }
    .post .post-description .stats .stat-item .icon {
        margin-right: 8px;
    }
    .post .post-footer {
        border-top: 1px solid #ddd;
        padding: 15px;
    }
    .post .post-footer .input-group-addon a {
        color: #454545;
    }
    .post .post-footer .comments-list {
        padding: 0;
        margin-top: 20px;
        list-style-type: none;
    }
    .post .post-footer .comments-list .comment {
        display: block;
        width: 100%;
        margin: 20px 0;
    }
    .post .post-footer .comments-list .comment .avatar {
        width: 35px;
        height: 35px;
    }
    .post .post-footer .comments-list .comment .comment-heading {
        display: block;
        width: 100%;
    }
    .post .post-footer .comments-list .comment .comment-heading .user {
        font-size: 14px;
        font-weight: bold;
        display: inline;
        margin-top: 0;
        margin-right: 10px;
    }
    .post .post-footer .comments-list .comment .comment-heading .time {
        font-size: 12px;
        color: #aaa;
        margin-top: 0;
        display: inline;
    }
    .post .post-footer .comments-list .comment .comment-body {
        margin-left: 50px;
    }
    .post .post-footer .comments-list .comment > .comments-list {
        margin-left: 50px;
    }
</style>

@stop