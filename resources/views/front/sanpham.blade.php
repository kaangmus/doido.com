@extends('front.Base')
@section('title','DOIDO.COM | Thế giới đổi đồ')
@section('main')
    <div class="box-content">
        <input type="hidden" id="txtRouteId" value="4"/>
        <script type="text/javascript">
            var route = "san-pham.html";
        </script>
        <script type='text/javascript' src="js/jquery.slimscroll.min.js"></script>
        <script type='text/javascript' src="js/bootstrap-slider.js"></script>
        <div class="heading-area top-area">
            <div class="container">
                <div class="banner relative">
                    <a href="hang-moi.html" target="_blank">
                        <img class="lazyload" data-src="images/bannerfooter.jpg" style="width: 100%">
                        <div class="banner_body center">
                            <div class="upcase banner_header"></div>
                            <div class="banner_description text-justify"></div>
                        </div>
                    </a>
                </div>
                <!-- <div class="img" style="background-image: url('https://RENDER.vn/upload/files/W2-10-NA-2000X668-02.jpg')">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="slide-content">

                </div>
            </div>
        </div>
    </div> -->
            </div>
        </div> <!-- End heading area -->
        <div class="content-area home-content-area">
            <div class="container">
                <div class="navigation">
                    <a href="index.blade.php">Trang chủ</a> > <a href="{{asset('product ')}}">Danh mục sản phẩm</a>
                </div>
                <div class="paging-top row">
                    <div class="col-md-12">
                        <div class="cat-name">
                            <div class="text-center ld-product-type">
                                <span class="upcase active">Danh mục sản phẩm</span>
                            </div>
                        </div>
                        <div class="cat-title-gray"></div>
                    </div>
                </div>
                <div class="row prod-list">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-3 prod-list-option prod-list-filter">
                                <div class="filter-tab-content">
                                    <div class="product-type" id="product-type-tab">
                                        <ul>
                                            <li>
                                                <a class="" type-id="ao" href="#">Đồ điện tử</a>
                                            </li>
                                            <li><a class="" type-id="ao-dai" href="#">Đồ văn phòng</a>
                                                 </li>
                                            <li><a class="" type-id="bo" href="#">Đồ dùng cá nhân</a>
                                            </li>
                                            <li><a class="" type-id="chan-vay" href="#">Tặng miễn phí</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-price" id="product-price-tab">
                                        <div class="row">
                                            <div class="col-xs-9 heading">Giá</div>
                                            <div class="col-xs-3 delete">Xóa</div>
                                        </div>
                                        <div id="lblPrice"></div>
                                        <input id="txtPrice" type="text" style="width:100%" data-slider-handle="square"
                                               data-slider-min="0" data-slider-max="180000000"
                                               data-slider-tooltip="hide" data-slider-step="100000"
                                               data-slider-value="[0,60000000]"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row product-filter" style="display:hidden;">
                                    <div class="col-md-12 secondary-filters">
                                        <div class="leftnav-active-filter" id="filter-lists">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="list-product-ajax">
                                    @foreach($items as $item)
                                        <div class="col-sm-4  col-xs-6">
                                            <div class="prod-img1">
                                                <a href="{{asset('/product-'.$item->id)}}" class="">
                                                    <img data-src="{{asset('public/media/'.$item->coverimg)}}"
                                                         class="lazyload"/>
                                                </a>
                                            </div>
                                            <div class="content ">
                                                <a href="{{asset('/product-'.$item->id)}}">
                                                    <div class="title"><span>{{$item->title}}</span></div>
                                                    <div class="desc"><span>{{$item->describe}}s<br>
                                                    <span class="color-red">
                                                        {{$item->price}} VND
                                                        </span>
                                                                                                        </span>
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
                        <div class="text-right paging-bottom" id="pagging-ajax">
                            <ul class="pagination">
                                <li class="disabled"><span>&laquo;</span></li>
                                <li class="active"><span>1</span></li>
                                <li>
                                    <a href="san-phamf26b.html?route=product&amp;category_id=4&amp;cat_new_id=2&amp;tag=collection&amp;page=2">2</a>
                                </li>
                                <li>
                                    <a href="san-phamc9a4.html?route=product&amp;category_id=4&amp;cat_new_id=2&amp;tag=collection&amp;page=3">3</a>
                                </li>
                                <li class="disabled"><span>...</span></li>
                                <li>
                                    <a href="san-pham19ac.html?route=product&amp;category_id=4&amp;cat_new_id=2&amp;tag=collection&amp;page=65">65</a>
                                </li>
                                <li>
                                    <a href="san-pham333f.html?route=product&amp;category_id=4&amp;cat_new_id=2&amp;tag=collection&amp;page=66">66</a>
                                </li>
                                <li>
                                    <a href="san-phamf26b.html?route=product&amp;category_id=4&amp;cat_new_id=2&amp;tag=collection&amp;page=2"
                                       rel="next">&raquo;</a></li>
                            </ul>

                            <!-- <ul class="pagination">
                                <li class="disabled"><span></span></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">20</a></li>
                                <li><a href="#" rel="next"></a></li>
                            </ul> -->
                            <a href="#" class="gotop">Lên đầu trang</a>
                        </div>
                        <script>
                            dataLayer.push({
                                'ecommerce': {
                                    'currencyCode': 'VND',
                                    'impressions': [{
                                        "id": 35250,
                                        "name": "Ch\u00e2n V\u00e1y D\u1ea1 Midi Xanh Than",
                                        "price": "490000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 1
                                    }, {
                                        "id": 35249,
                                        "name": "Ch\u00e2n V\u00e1y D\u1ea1 Midi H\u1ed3ng",
                                        "price": "490000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 2
                                    }, {
                                        "id": 35248,
                                        "name": "Ch\u00e2n V\u00e1y D\u1ea1 Ghi",
                                        "price": "490000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 3
                                    }, {
                                        "id": 35247,
                                        "name": "Ch\u00e2n V\u00e1y D\u1ea1 N\u00e2u",
                                        "price": "399000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 4
                                    }, {
                                        "id": 35244,
                                        "name": "\u0110\u1ea7m Su\u00f4ng D\u1eadp Li Ghi",
                                        "price": "790000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 5
                                    }, {
                                        "id": 35243,
                                        "name": "\u0110\u1ea7m Su\u00f4ng Xanh Than",
                                        "price": "790000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 6
                                    }, {
                                        "id": 35113,
                                        "name": "\u00c1o Kho\u00e1c D\u00e1ng D\u00e0i C\u00f3 M\u0169 Tr\u1eafng",
                                        "price": "1350000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 7
                                    }, {
                                        "id": 35112,
                                        "name": "\u00c1o Kho\u00e1c D\u00e1ng D\u00e0i C\u00f3 M\u0169 \u0110en",
                                        "price": "1350000.0000",
                                        "brand": "Lamer",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 8
                                    }, {
                                        "id": 34014,
                                        "name": "Qu\u1ea7n tr\u1eafng su\u00f4ng Linen",
                                        "price": "400000.0000",
                                        "brand": "Lagu",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 9
                                    }, {
                                        "id": 34013,
                                        "name": "\u00c1o 2 d\u00e2y x\u1ebb v\u1ea1t",
                                        "price": "340000.0000",
                                        "brand": "Lagu",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 10
                                    }, {
                                        "id": 34011,
                                        "name": "V\u00e1y l\u1ee5a tay b\u00e8o",
                                        "price": "750000.0000",
                                        "brand": "Lagu",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 11
                                    }, {
                                        "id": 34009,
                                        "name": "V\u00e1y Baby doll tay b\u00e8o",
                                        "price": "680000.0000",
                                        "brand": "Lagu",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 12
                                    }, {
                                        "id": 34007,
                                        "name": "V\u00e1y ch\u1ea5m bi cut out eo",
                                        "price": "760000.0000",
                                        "brand": "Lagu",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 13
                                    }, {
                                        "id": 34006,
                                        "name": "V\u00e1y tr\u1eafng t\u1ee9 th\u00e2n",
                                        "price": "750000.0000",
                                        "brand": "Lagu",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 14
                                    }, {
                                        "id": 33481,
                                        "name": "\u0110\u1ea7m \u00d4m \u0110u\u00f4i C\u00e1 C\u1ed5 Thuy\u1ec1n \u0110\u1ecf",
                                        "price": "1150000.0000",
                                        "brand": "H-CHIC",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 15
                                    }, {
                                        "id": 33479,
                                        "name": "\u0110\u1ea7m Chi\u1ebft Ly Eo Tay Ph\u1ed3ng C\u1ed5 Tim \u0110en",
                                        "price": "980000.0000",
                                        "brand": "H-CHIC",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 16
                                    }, {
                                        "id": 33014,
                                        "name": "\u0110\u1ea7m X\u00f2e X\u1ebfp Li C\u1ed5 Tr\u1eafng",
                                        "price": "1998000.0000",
                                        "brand": "BAESICSTORE",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 17
                                    }, {
                                        "id": 33013,
                                        "name": "\u0110\u1ea7m X\u00f2e X\u1ebfp Li C\u1ed5 V\u00e0ng",
                                        "price": "1998000.0000",
                                        "brand": "BAESICSTORE",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 18
                                    }, {
                                        "id": 33012,
                                        "name": "\u0110\u1ea7m X\u00f2e X\u1ebfp Li C\u1ed5 T\u00edm",
                                        "price": "1998000.0000",
                                        "brand": "BAESICSTORE",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 19
                                    }, {
                                        "id": 32632,
                                        "name": "\u0110\u1ea7m H\u1ed3ng C\u01b0\u1eddm Tay",
                                        "price": "1898000.0000",
                                        "brand": "Elise",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 20
                                    }, {
                                        "id": 32631,
                                        "name": "\u0110\u1ea7m Xanh \u0110ai Eo",
                                        "price": "1698000.0000",
                                        "brand": "Elise",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 21
                                    }, {
                                        "id": 32630,
                                        "name": "Sooc Cam N\u01a1 C\u1ea1p",
                                        "price": "848000.0000",
                                        "brand": "Elise",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 22
                                    }, {
                                        "id": 32629,
                                        "name": "\u0110\u1ea7m H\u1ecda Ti\u1ebft B\u00e8o Ch\u00e9o",
                                        "price": "1698000.0000",
                                        "brand": "Elise",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 23
                                    }, {
                                        "id": 32628,
                                        "name": "\u0110\u1ea7m Xanh Ph\u1ee5 Ki\u1ec7n Trai",
                                        "price": "1898000.0000",
                                        "brand": "Elise",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 24
                                    }, {
                                        "id": 32627,
                                        "name": "\u0110\u1ea7m V\u00e0ng Ph\u1ee5 Ki\u1ec7n Trai",
                                        "price": "1898000.0000",
                                        "brand": "Elise",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 25
                                    }, {
                                        "id": 32508,
                                        "name": "\u0110\u1ea7m X\u00f2e D\u00e1ng D\u00e0i Chi\u1ebft Ly N\u00e2u",
                                        "price": "980000.0000",
                                        "brand": "H-CHIC",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 26
                                    }, {
                                        "id": 32505,
                                        "name": "\u00c1o Vest C\u1ed5 K D\u00e0i Tay \u0110\u00ednh Hoa Ghi",
                                        "price": "1150000.0000",
                                        "brand": "H-CHIC",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 27
                                    }, {
                                        "id": 32504,
                                        "name": "\u0110\u1ea7m Chi\u1ebft Ly Eo Tay Ph\u1ed3ng C\u1ed5 Tim H\u1ed3ng",
                                        "price": "980000.0000",
                                        "brand": "H-CHIC",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 28
                                    }, {
                                        "id": 32496,
                                        "name": "\u0110\u1ea7m \u00d4m C\u1ed5 Thuy\u1ec1n Tay C\u1ed9c Ph\u1ed1i L\u01b0\u1edbi Xanh Than",
                                        "price": "1150000.0000",
                                        "brand": "H-CHIC",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 29
                                    }, {
                                        "id": 31070,
                                        "name": "\u0110\u1ea7m B\u00fat Ch\u00ec H\u1ed3ng Ph\u1ee7 Vai Tr\u1eafng",
                                        "price": "1898000.0000",
                                        "brand": "BAESICSTORE",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 30
                                    }, {
                                        "id": 31068,
                                        "name": "\u0110\u1ea7m B\u00fat Ch\u00ec \u0110en Ph\u1ee7 Vai Xanh",
                                        "price": "1898000.0000",
                                        "brand": "BAESICSTORE",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 31
                                    }, {
                                        "id": 31067,
                                        "name": "\u0110\u1ea7m B\u00fat Ch\u00ec Tr\u1eafng Ph\u1ee7 Vai Tr\u1eafng",
                                        "price": "1898000.0000",
                                        "brand": "BAESICSTORE",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 32
                                    }, {
                                        "id": 30682,
                                        "name": "\u0110\u1ea7m Xo\u00e8 L\u01b0\u1edbi Can Ren Thang",
                                        "price": "1300000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 33
                                    }, {
                                        "id": 30680,
                                        "name": "\u0110\u1ea7m Su\u00f4ng Tweed K\u1ebb",
                                        "price": "1200000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 34
                                    }, {
                                        "id": 30679,
                                        "name": "\u0110\u1ea7m Xo\u00e8 Mullet",
                                        "price": "1550000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 35
                                    }, {
                                        "id": 30677,
                                        "name": "\u0110\u1ea7m \u00f4m A Can Tay B\u1ed3ng",
                                        "price": "1250000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 36
                                    }, {
                                        "id": 30673,
                                        "name": "\u0110\u1ea7m Tay B\u1ed3ng L\u00e9 Tr\u1eafng",
                                        "price": "1200000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 37
                                    }, {
                                        "id": 30672,
                                        "name": "Ch\u00e2n V\u00e1y Midi Tweed Tua Rua",
                                        "price": "675000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 38
                                    }, {
                                        "id": 30671,
                                        "name": "\u00c1o Tay B\u1ed3ng L\u00e9 Tr\u1eafng",
                                        "price": "625000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 39
                                    }, {
                                        "id": 30670,
                                        "name": "\u0110\u1ea7m \u00d4m A Tweed K\u1eb9p Tua Rua",
                                        "price": "1350000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 40
                                    }, {
                                        "id": 30669,
                                        "name": "Ch\u00e2n V\u00e1y Xo\u00e8 D\u1eadp Li",
                                        "price": "625000.0000",
                                        "brand": "De Leah",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 41
                                    }, {
                                        "id": 30144,
                                        "name": "\u0110\u1ea7m L\u1ee5a C\u1ed5 Tr\u00f2n Su\u00f4ng Tay Loe \u0110en",
                                        "price": "800000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 42
                                    }, {
                                        "id": 30143,
                                        "name": "\u0110\u1ea7m L\u1ee5a C\u1ed5 Tr\u00f2n Su\u00f4ng Tay Loe \u0110\u1ecf",
                                        "price": "800000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 43
                                    }, {
                                        "id": 30142,
                                        "name": "\u0110\u1ea7m Hai D\u00e2y Kim Sa \u0110en",
                                        "price": "890000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 44
                                    }, {
                                        "id": 30141,
                                        "name": "\u0110\u1ea7m Hai D\u00e2y Kim Sa V\u00e0ng \u0110\u1ed3ng",
                                        "price": "890000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 45
                                    }, {
                                        "id": 30140,
                                        "name": "\u0110\u1ea7m Thun Nhung V\u00e1y B\u00fat Ch\u00ec Vi\u1ec1n Ren \u0110en V\u00e0ng",
                                        "price": "890000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 46
                                    }, {
                                        "id": 30139,
                                        "name": "\u0110\u1ea7m Linen Su\u00f4ng Morocco Ph\u1ed1i \u0110en",
                                        "price": "1000000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 47
                                    }, {
                                        "id": 30138,
                                        "name": "\u0110\u1ea7m T\u01a1 Su\u00f4ng C\u1ed5 Tr\u00f2n \u0110\u00ednh Kim Sa N\u00e2u",
                                        "price": "798000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 48
                                    }, {
                                        "id": 30137,
                                        "name": "\u0110\u1ea7m T\u01a1 Su\u00f4ng C\u1ed5 Tr\u00f2n \u0110\u00ednh Kim Sa Da",
                                        "price": "798000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 49
                                    }, {
                                        "id": 30136,
                                        "name": "\u0110\u1ea7m L\u1ee5a Su\u00f4ng Tay B\u00e8o Ren Xanh",
                                        "price": "798000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 50
                                    }, {
                                        "id": 30135,
                                        "name": "\u0110\u1ea7m Kate Thun C\u1ed5 S\u01a1 Mi N\u1eafp T\u00fai Xanh C\u1ed5 V\u1ecbt",
                                        "price": "550000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 51
                                    }, {
                                        "id": 30134,
                                        "name": "\u0110\u1ea7m Kate Thun C\u1ed5 S\u01a1 Mi N\u1eafp T\u00fai H\u1ed3ng Ph\u1ea5n",
                                        "price": "550000.0000",
                                        "brand": "Elly",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 52
                                    }, {
                                        "id": 29790,
                                        "name": "\u0110\u1ea7m Xo\u1eafn Ng\u1ef1c Vai Ch\u1eddm V\u00e0ng B\u00f2",
                                        "price": "1180000.0000",
                                        "brand": "Clara Mare",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 53
                                    }, {
                                        "id": 29784,
                                        "name": "Qu\u1ea7n L\u01a1 V\u00ea G\u1ea5u Kaki Xanh",
                                        "price": "730000.0000",
                                        "brand": "Clara Mare",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 54
                                    }, {
                                        "id": 29782,
                                        "name": "Vest Kaki C\u1ed5 Ch\u1eef K V\u00e0ng B\u00f2",
                                        "price": "1300000.0000",
                                        "brand": "Clara Mare",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 55
                                    }, {
                                        "id": 29781,
                                        "name": "Vest Kaki C\u1ed5 Ch\u1eef K Xanh",
                                        "price": "1300000.0000",
                                        "brand": "Clara Mare",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 56
                                    }, {
                                        "id": 29780,
                                        "name": "Jump C\u1ed5 Tim Ch\u1ed3ng Tay Loe V\u00e0ng B\u00f2",
                                        "price": "1250000.0000",
                                        "brand": "Clara Mare",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 57
                                    }, {
                                        "id": 29778,
                                        "name": "Jump C\u1ed5 Tim Ch\u1ed3ng Tay Loe T\u00edm Than",
                                        "price": "1250000.0000",
                                        "brand": "Clara Mare",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 58
                                    }, {
                                        "id": 29716,
                                        "name": "Vest Hoa Xanh N\u1ec1n Gh",
                                        "price": "2050000.0000",
                                        "brand": "Gracy Design",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 59
                                    }, {
                                        "id": 29715,
                                        "name": "Vest Blazer C\u00fac B\u1ecdc H\u1ed3ng",
                                        "price": "2250000.0000",
                                        "brand": "Gracy Design",
                                        "list": "Trang ph\u1ee5c",
                                        "position": 60
                                    }]
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <input type="hidden" id="txtStyle" value=""/>
        </div><!-- End content area -->
    </div>
@stop