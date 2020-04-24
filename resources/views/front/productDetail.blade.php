@extends('front.Base')
@section('title','Render | Thế giới thời trang Render')
@section('main')
    <div class="content-area home-content-area top-area">
        <div class="container">
            {{$item}}
            <div class="navigation margin-top20">
                <a href="https://ferosh.vn">Trang chủ</a>
                <a href="https://ferosh.vn/san-pham">Sản phẩm</a>
                <a href="https://ferosh.vn/san-pham?types=dam-vay-lien">
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
                                    <strike class="color-red"><span class="color-black">{{$item->price}}
                                    VND</span></strike>
                                    <br>
                                    <span class="color-red">
                                {{$item->sale}} VND | Giảm
                                {{100-($item->sale/$item->price)*100}}%</span>
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
                                            <label size-id="1" class="box">{{$style}}</label>
                                        </div>
                                    @endforeach
                                    <div class="clear"></div>
                                </div>
                                <div class="validator hide">Vui lòng chọn kích thước trước khi đặt mua</div>
                            </li>
                            <li>
                                <div class="upcase">#Tag</div>
                                <?php
                                $tagItems = explode(",", $item->tag);
                                array_pop($tagItems);
                                ?>
                                <div id="color" class="content">
                                    @foreach($tagItems as $tag)
                                        <div style="display: inline-block; margin-right: 10px;">
                                            <label size-id="1" class="box">#{{$tag}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-black btnaddtocart">Đặt mua</button>
                                    </div>
                                </div>
                            </li>
                        </form>

                        <li class="collapse-toogle in">
                            <div class="upcase">MÔ TẢ SẢN PHẨM</div>
                            <div class="content product--content">
                                {{$item->content}}
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
                        <!-- <li>
<div class="upcase share">
<span>Share</span>
<a class="icon icon-fb" href="#"></a>
<a class="icon icon-in" href="#"></a>
<a class="icon icon-mail" href="#"></a>
</div>
</li> -->
                        <li>
                            <ul class="product-other">
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>


@stop