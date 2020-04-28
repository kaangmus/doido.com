@extends('front.Base')
@section('title','Doido.com | Thế giới giao vặt')
@section('main')
    <style>
        img{
            width: 100%;
        }
    </style>
    <div class="box-landing">
        <div class="heading-area top-area banner" style="margin-bottom:0;">
            <div class="container">
                <div class="slider-carousel owl-carousel owl-theme">
                    <a href="bo-suu-tap/thoi-trang-tre.html">
                        <img class="owl-lazy" data-src="images/banner.jpg" data-srcset="images/banner.jpg"
                             sizes="50vw" alt="RENDER - Thời trang thiết kế cao cấp"/>
                    </a>
                    <a href="bo-suu-tap/dong-gia.html">
                        <img class="owl-lazy" data-src="images/banner2.jpg" data-srcset="images/banner2.jpg"
                             sizes="50vw" alt="RENDER - Thời trang thiết kế cao cấp"/>
                    </a>
                    <a href="sale.html">
                        <img class="owl-lazy" data-src="images/banner3.jpg" data-srcset="images/banner3.jpg"
                             sizes="50vw" alt="RENDER - Thời trang thiết kế cao cấp"/>
                    </a>
                    <a href="bo-suu-tap/my-pham-02.html">
                        <img class="owl-lazy" data-src="images/banner2.jpg" data-srcset="images/banner2.jpg"
                             sizes="50vw" alt="RENDER - Thời trang thiết kế cao cấp"/>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="box-landing mtb-30" id="700" style="margin-top:0px;">
        <div class="content-area home-content-area">
            <div class="container">
                <div class="text-center mtb-30">
                    <h3>
                        <span class="upcase up-case box-title">SẢN PHẨM NỔI BẬT</span>
                    </h3>
                </div>
                <!-------------------------------- slide show ------------------->
                <div class="row prod_bestsale">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products--wrapper">
                                <div class="bestsale-carousel">
                                    @foreach($items1 as $item1)
                                        <div class="prod-item">
                                            <div class="prod-img1">
                                                <a href="{{asset('product-'.$item1->id)}}" class="">
                                                    <img class="owl-lazy"
                                                         data-src="{{asset('public/media/'.$item1->coverimg)}}"/>
                                                </a>
                                            </div>
                                            <div class="content productnew">
                                                <a href="{{asset('product-'.$item1->id)}}">
                                                    <div class="title"><span>{{$item1->title}}</span></div>
                                                    <div class="desc">
                                                    	<span>
                                                            {{$item1->content}}
                                                                                                                            <br>
                                                                                                                                <strike class="color-red"><span
                                                                                                                                            class="color-black">{{$item1->price}}</span></strike>
                                                                <br>
                                                                <span class="color-red">
                                                                    {{$item1->price}} VND</span>
                                                                                                                                </span>
                                                        </span>
                                                    </div>
                                                </a>
                                                <?php
                                                $styles = explode(",", $item1->style);
                                                array_pop($styles);
                                                ?>
                                                @foreach($styles as $style)
                                                <span class="product-new">{{$style}}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-landing">
        <div class="content-area home-content-area">
            <div class="container">
                <div class="text-center mtb-30">
                    <h3>
                        <span class="upcase up-case box-title">HÀNG BÁN</span>
                    </h3>
                </div>

                <div class="row prod-list">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($items5->slice(0, 8) as $item5)
                                <div class="col-sm-3 col-xs-6">
                                    <div class="prod-img1">
                                        <a href="{{asset('product-'.$item5->id)}}"
                                           class="">
                                            <img data-src="{{asset('public/media/'.$item5->coverimg)}}"/>
                                            <img data-src="{{asset('public/media/'.$item5->coverimg)}}" class="lazyload" style="display: block !important;"/>
                                        </a>
                                    </div>
                                    <div
                                            class="content ">
                                        <a href="{{asset('product-'.$item5->id)}}">
                                            <div class="title"><span>{{$item5->title}}</span></div>
                                            <div class="desc">
                                                <span>{{$item5->content}}<br>{{$item5->price}} VND </span>
                                                </span>
                                            </div>
                                        </a>

                                        <!-- <span class="status">Exclusive</span> -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="box-landing" id="701">
        <div class="content-area home-content-area">
            <div class="container">
                <div class="text-center mtb-30">
                    <h3>
                        <span class="upcase up-case box-title">TRAO ĐỔI HÀNG HÓA</span>
                    </h3>
                </div>
                <div class="row prod_bestsale">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products--wrapper">
                                <div class="bestsale-carousel">
                                    @foreach($items2 as $item2)
                                        <div class="prod-item">
                                            <div class="prod-img1">
                                                <a href="{{asset('product-'.$item2->id)}}" class="">
                                                    <img class="owl-lazy"
                                                         data-src="{{asset('public/media/'.$item2->coverimg)}}"/>
                                                </a>
                                            </div>
                                            <div class="content productnew">
                                                <a href="{{asset('product-'.$item2->id)}}">
                                                    <div class="title"><span>{{$item2->title}}</span></div>
                                                    <div class="desc">
                                                    	<span>
                                                            {{$item2->content}}
                                                                                                                            <br>
                                                                                                                                <strike class="color-red"><span
                                                                                                                                            class="color-black">{{$item1->price}}</span></strike>
                                                                <br>
                                                                <span class="color-red">
                                                                    {{$item2->price}} VND
                                                                </span>
                                                                                                                                </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="content-area home-content-area">
        <div class="container">
            <div class="text-center mtb-30">
                <h3>
                    <span class="upcase up-case box-title">DANH MỤC NỔI BẬT</span>
                </h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme styles-carousel brand-lg styles-box">
                        <div class="item">
                            <a href="{{asset('search/Công sở')}}">
                                <img src="images/dovanphong.jpg" alt=""
                                     srcset="images/dovanphong.jpg"
                                     sizes="50vw"/>
                            </a>
                            <div class="description">
                                <a href="{{asset('search/Đồ văn phòng')}}">
                                    <h3>
                                        <span class="upcase up-case">Đồ văn phòng</span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <a href="{{asset('search/Đồ dùng cá nhân')}}">
                                <img src="images/dovanphong.jpg" alt="Đồ dùng cá nhân"
                                     srcset="images/dovanphong.jpg 1080w"
                                     sizes="50vw"/>
                            </a>
                            <div class="description">
                                <a href="{{asset('search/Đồ dùng cá nhân')}}">
                                    <h3>
                                        <span class="upcase up-case">Đồ dùng cá nhân</span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <a href="{{asset('search/Đồ điện tử')}}">
                                <img src="images/dovanphong.jpg" alt="Đồ điện tử"
                                     srcset="images/dovanphong.jpg 1080w"
                                     sizes="50vw"/>
                            </a>
                            <div class="description">
                                <a href="{{asset('search/Đồ điện tử')}}">
                                    <h3>
                                        <span class="upcase up-case">Đồ điện tử</span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <a href="{{asset('search/Cho tặng miễn phí')}}">
                                <img src="images/dovanphong.jpg" alt="Cho tặng miễn phí"
                                     srcset="images/dovanphong.jpg 1080w"
                                     sizes="50vw"/>
                            </a>
                            <div class="description">
                                <a href="{{asset('search/Cho tặng miễn phí')}}">
                                    <h3>
                                        <span class="upcase up-case">Cho tặng miễn phí</span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mtb-30">
                <div class="prod-collection-highlight">
                    <div class="container">
                        <div class="">
                            <a href="bo-suu-tap/bst-tui-xach-2020.html">
                                <img class="lazyload" data-src="images/bannermain.jpg"
                                     title="" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-landing">
        <div class="content-area home-content-area">
            <div class="container">
                <div class="text-center mtb-30">
                    <h3>
                        <span class="upcase up-case box-title">HÀNG TẶNG</span>
                    </h3>
                </div>

                <div class="row prod-list">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($items5->slice(0, 8) as $item5)
                            <div class="col-sm-3 col-xs-6">
                                <div class="prod-img1">
                                    <a href="{{asset('product-'.$item5->id)}}"
                                       class="">
                                        <img data-src="{{asset('public/media/'.$item5->coverimg)}}"/>
                                        <img data-src="{{asset('public/media/'.$item5->coverimg)}}" class="lazyload" style="display: block !important;"/>
                                    </a>
                                </div>
                                <div
                                        class="content ">
                                    <a href="{{asset('product-'.$item5->id)}}">
                                        <div class="title"><span>{{$item5->title}}</span></div>
                                        <div class="desc">
                                            	<span>{{$item5->content}}<br>{{$item5->price}} VND </span>
                                            </span>
                                        </div>
                                    </a>
                                    <!-- <span class="status">Exclusive</span> -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="box-landing" id="698">
        <div class="heading-area top-area bottom-0">
            <div class="container">
                <div class="slider-carousel owl-carousel owl-theme">
                    <a href="sale.html">
                        <img class="owl-lazy" data-src="images/bannerfooter.jpg"/>
                    </a>
                </div>
            </div>
        </div> <!-- End heading area -->
    </div>
    <input type="hidden" id="txtRouteId" value="4">
@stop
