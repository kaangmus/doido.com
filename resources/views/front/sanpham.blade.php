@extends('front.Base')
@section('title','Render | Thế giới thời trang Render')
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
                        <img class="lazyload" data-src="{{asset('public/images/W2-10-NA-2000X668-02.jpg')}}">
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
                    <a href="index.blade.php">Trang chủ</a> > <a href="sanpham.blade.php">Trang phục</a>
                </div>
                <div class="paging-top row">
                    <div class="col-sm-6 relative1">
                        <select id="order" style="background:#FFFFFF">
                            <option value="">Sắp xếp theo</option>
                            <option field="price" value="asc">Giá tăng dần</option>
                            <option field="price" value="desc">Giá giảm dần</option>

                            <option field="effective_date" value="desc">Hàng mới</option>

                        </select>

                        <button class="pull-right active show-filter-category"
                                style="background-color: #FFFFFF!important; min-width: 140px; height: 25px; padding: 0px 10px; border-radius: 3px; font-weight: normal; border-radius: 5px; border-width: 1px; border-style: solid; border-color: rgb(166, 166, 166); border-image: initial;">
                            <img src="images/filter.png"
                                 style="max-height: 20px; margin-right: 5px; padding: 2px; background:#FFFFFF;"
                                 class="filter-group-icon"> Bộ lọc
                        </button>
                    </div>
                    <div class="col-sm-6 paging-navigation relative1">
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
                    </div>
                    <div class="col-md-12">
                        <div class="cat-name margin-top-30">
                            <div class="text-center ld-product-type" id="tag-filter">
                                <span class="upcase active" data-tag="collection">Bộ sưu tập</span>
                                <span class="split"></span>
                                <span class="upcase " data-tag="3d">Sản phẩm</span>
                            </div>
                        </div>
                        <div class="cat-title-gray"><span>Có <span id="total_items">3906</span> sản phẩm</span></div>
                    </div>
                </div>
                <div class="row prod-list">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-3 prod-list-option prod-list-filter">
                                <div class="box-filter-client hide">
                                    <a class="pull-right active show-filter-category">ĐÓNG BỘ LỌC</a>
                                    <ul class="nav nav-tabs">
                                        <li><a data-toggle="tab" href="#product-type-tab">Loại sản phẩm</a></li>
                                        <li>
                                            <a data-toggle="tab" href="#product-designer-tab">
                                                Nh&agrave; thiết kế
                                            </a>
                                        </li>
                                        <li><a data-toggle="tab" href="#product-price-tab">Giá</a></li>
                                        <li><a data-toggle="tab" href="#product-size-tab">Sizes</a></li>
                                    </ul>
                                </div>

                                <div class="filter-tab-content">
                                    <div class="product-type" id="product-type-tab">
                                        <ul>
                                            <li><a class="" type-id="ao" href="#">&Aacute;o</a>
                                                <ul style="padding-top: 10px;" class="hide">
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-so-mi" class="checkbox "><span>Áo Sơ Mi</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-khoac" class="checkbox "><span>Áo Khoác</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-dai-tay" class="checkbox ">
                                                            <span>Áo Dài Tay</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-ngan-tay" class="checkbox ">
                                                            <span>Áo Ngắn Tay</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-khong-tay" class="checkbox ">
                                                            <span>Áo Không Tay</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-blouser" class="checkbox ">
                                                            <span>Áo Blouser</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-len" class="checkbox "><span>Áo Len</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-croptop" class="checkbox ">
                                                            <span>Áo Croptop</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="vest" class="checkbox "><span>Vest</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-hai-day" class="checkbox ">
                                                            <span>Áo Hai Dây</span></div>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li><a class="" type-id="ao-dai" href="#">&Aacute;o D&agrave;i</a>
                                                <ul style="padding-top: 10px;" class="hide">
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-dai-cach-tan" class="checkbox "><span>Áo Dài Cách Tân</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="ao-dai-cuoi-hoi" class="checkbox "><span>Áo Dài Cưới Hỏi</span>
                                                        </div>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li><a class="" type-id="bo" href="#">Đồ Bộ</a>
                                                <ul style="padding-top: 10px;" class="hide">
                                                    <li style="padding:2px 0;">
                                                        <div type-id="jumpsuits" class="checkbox "><span>Jumpsuit</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="»»»-playsuit" class="checkbox ">
                                                            <span>Playsuit</span></div>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li><a class="" type-id="chan-vay" href="#">Ch&acirc;n V&aacute;y</a>
                                                <ul style="padding-top: 10px;" class="hide">
                                                    <li style="padding:2px 0;">
                                                        <div type-id="chan-vay-midi" class="checkbox "><span>Chân Váy Midi</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="chan-juyp" class="checkbox ">
                                                            <span>Chân Juyp</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="chan-vay-dai" class="checkbox ">
                                                            <span>Chân Váy Dài</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="chan-vay-ngan" class="checkbox "><span>Chân Váy Ngắn</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="chan-vay-xoe" class="checkbox ">
                                                            <span>Chân Váy Xoè</span></div>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li><a class="" type-id="dam-vay-lien" href="#">V&aacute;y Đầm</a>
                                                <ul style="padding-top: 10px;" class="hide">
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-tre-vai" class="checkbox ">
                                                            <span>Đầm Trễ Vai</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-hai-day" class="checkbox ">
                                                            <span>Đầm Hai Dây</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-sat-nach" class="checkbox ">
                                                            <span>Đầm Sát Nách</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-da-hoi" class="checkbox ">
                                                            <span>Đầm Dạ Hội </span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-ha-eo" class="checkbox ">
                                                            <span>Đầm Hạ Eo</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-maxi" class="checkbox "><span>Đầm Maxi</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="»»»-dam-dap-vat" class="checkbox "><span>Đầm Đắp Vạt</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-suong" class="checkbox ">
                                                            <span>Đầm Suông</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-om" class="checkbox "><span>Đầm Ôm</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-cup-nguc" class="checkbox ">
                                                            <span>Đầm Cúp Ngực</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-so-mi" class="checkbox ">
                                                            <span>Đầm Sơ Mi</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-da-hoi-9" class="checkbox ">
                                                            <span>Đầm Dạ Hội</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-coc-tay" class="checkbox ">
                                                            <span>Đầm Ngắn Tay</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-dai-tay" class="checkbox ">
                                                            <span>Đầm Dài Tay</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-cuoi" class="checkbox "><span>Đầm Cưới</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-midi" class="checkbox "><span>Đầm Midi</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-xoe" class="checkbox "><span>Đầm Xòe</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="dam-duoi-ca" class="checkbox ">
                                                            <span>Đầm Đuôi Cá</span></div>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li><a class="" type-id="do-boi" href="#">Đồ Bơi</a>

                                            </li>
                                            <li><a class="" type-id="quan" href="#">Quần</a>
                                                <ul style="padding-top: 10px;" class="hide">
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-vay" class="checkbox "><span>Quần Váy</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-shorts" class="checkbox ">
                                                            <span>Quần Shorts</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-ong-rong" class="checkbox "><span>Quần Ống Rộng</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-suong" class="checkbox ">
                                                            <span>Quần Suông</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-lung" class="checkbox ">
                                                            <span>Quần Lửng</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-dai" class="checkbox "><span>Quần Dài</span>
                                                        </div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-baggy" class="checkbox ">
                                                            <span>Quần Baggy</span></div>
                                                    </li>
                                                    <li style="padding:2px 0;">
                                                        <div type-id="quan-ong-loe" class="checkbox ">
                                                            <span>Quần Ống Loe</span></div>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li><a class="" type-id="set" href="#">Set</a>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-designer" id="product-designer-tab">
                                        <div class="row">
                                            <div class="col-xs-9 heading">Nh&agrave; thiết kế</div>
                                            <div class="col-xs-3 delete">Xóa</div>
                                        </div>
                                        <div class="designerSearch">
                                            <i class="demo-icon RENDERic-search search-ico-category"></i>
                                            <input type="text" id="txtSearchDesinger" class="search"
                                                   name="designerKeyword" onkeyup="frontEnd.filterDesigner()" value=""
                                                   placeholder="Tìm kiếm nhà thiết kế.." autocomplete="off">
                                        </div>
                                        <ul id="product-designer-ul">
                                            <li>
                                            </li>
                                            <li>
                                                <div designer-id="126" class="checkbox "><span>La Phạm</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="129" class="checkbox "><span>De Leah</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="136" class="checkbox ">
                                                    <span>C&Agrave; CỘ Design</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="141" class="checkbox "><span>HA LINH THU</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="144" class="checkbox "><span>Gouttobed</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="148" class="checkbox "><span>Ceilio</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="159" class="checkbox "><span>Phi by Phi Pham</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="160" class="checkbox "><span>LOUISA</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="161" class="checkbox "><span>MOLYS</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="173" class="checkbox "><span>Coquelicot</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="181" class="checkbox "><span>Mee In</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="184" class="checkbox "><span>Min Design</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="195" class="checkbox "><span>CACDEMODE</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="196" class="checkbox "><span>X&eacute;o Xọ</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="197" class="checkbox "><span>BAESICSTORE</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="199" class="checkbox "><span>HeraDG</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="201" class="checkbox "><span>Blanc &amp; Noir</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="204" class="checkbox "><span>Larita</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="205" class="checkbox "><span>Cashew</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="207" class="checkbox "><span>Am Young</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="212" class="checkbox "><span>MiMi Fashion</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="215" class="checkbox "><span>Lasix Fashion</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="216" class="checkbox "><span>C&#039;est La V</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="217" class="checkbox "><span>Liveevil</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="218" class="checkbox "><span>Cofason</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="220" class="checkbox "><span>RENDER Editor</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="224" class="checkbox "><span>Adeline</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="226" class="checkbox "><span>I.H.F</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="227" class="checkbox "><span>La Sen Vũ</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="230" class="checkbox "><span>Eternite</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="233" class="checkbox "><span>21SIX Fashion</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="234" class="checkbox "><span>Just Feel Free</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="242" class="checkbox "><span>Vicky Boutique</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="248" class="checkbox "><span>Few Lan D</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="253" class="checkbox "><span>Maki</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="254" class="checkbox "><span>Clara Mare</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="255" class="checkbox "><span>Elly</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="262" class="checkbox "><span>Ever Chic</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="266" class="checkbox "><span>H-CHIC</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="267" class="checkbox "><span>Hity</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="269" class="checkbox "><span>H&amp;T Fashion</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="270" class="checkbox "><span>Gracy Design</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="272" class="checkbox "><span>Holly Rey</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="277" class="checkbox "><span>Perla de Paris</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="282" class="checkbox ">
                                                    <span>ANGELE&#039;S CLOTHING</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="284" class="checkbox "><span>Lamer</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="285" class="checkbox "><span>Vien Tran</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="286" class="checkbox "><span>DIEM PHAM DESIGN</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="287" class="checkbox "><span>M.U.A</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="288" class="checkbox "><span>Naci</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="292" class="checkbox "><span>Songbird</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="296" class="checkbox "><span>Nhi Ho</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="297" class="checkbox "><span>Fleur De Lin</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="298" class="checkbox "><span>&Agrave; Tous</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="301" class="checkbox "><span>Camia</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="305" class="checkbox "><span>Katterry Design</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="307" class="checkbox "><span>Zen Me Store</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="308" class="checkbox "><span>Sis&#039;unite</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="309" class="checkbox "><span>HATU Concept</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="312" class="checkbox "><span>TOPXY</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="314" class="checkbox "><span>Karena</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="315" class="checkbox "><span>Yella.D</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="316" class="checkbox "><span>Helen Kieu Luxury</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="320" class="checkbox "><span>MONA LISA</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="324" class="checkbox "><span>QUACH HA VI</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="325" class="checkbox "><span>ME&#039;S DIARY</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="326" class="checkbox "><span>CHARIS</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="328" class="checkbox "><span>Maay Lingerie</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="329" class="checkbox "><span>For Every Occasion</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="330" class="checkbox "><span>Kosmo Chic</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="332" class="checkbox "><span>COCO Style</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="333" class="checkbox "><span>Chanony</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="335" class="checkbox "><span>YV LE</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="337" class="checkbox "><span>Mori Closet</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="338" class="checkbox "><span>KITE</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="341" class="checkbox "><span>Sanrini Clothing</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="342" class="checkbox "><span>FALA FASHION</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="343" class="checkbox "><span>Boutique La Lune</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="344" class="checkbox "><span>OLV Boutique</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="345" class="checkbox "><span>LE COUTURE</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="346" class="checkbox "><span>Marie Design By H</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="349" class="checkbox "><span>Lagu</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="350" class="checkbox "><span>Nafisuits</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="352" class="checkbox "><span>H.T STUDIOS by H&agrave; Trương</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div designer-id="354" class="checkbox "><span>Elise</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="357" class="checkbox "><span>The Phann</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="359" class="checkbox "><span>5AVENUE</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="362" class="checkbox "><span>White Ant</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="368" class="checkbox "><span>JACKILIA</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="373" class="checkbox "><span>TIHON</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="374" class="checkbox "><span>V Corner</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="377" class="checkbox "><span>SYO FASHION</span></div>
                                            </li>
                                            <li>
                                                <div designer-id="379" class="checkbox "><span>Elli Vu</span></div>
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
                                    <div class="product-size" id="product-size-tab">
                                        <div class="row">
                                            <div class="col-xs-9 heading">Size</div>
                                            <div class="col-xs-3 delete">Xóa</div>
                                        </div>
                                        <div class="split">
                                            <ul class="split-col-2">
                                                <li>
                                                    <div size-id="25" class="checkbox "><span>10</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="135" class="checkbox "><span>100</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="136" class="checkbox "><span>110</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="137" class="checkbox "><span>120</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="138" class="checkbox "><span>130</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="139" class="checkbox "><span>140</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="140" class="checkbox "><span>150</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="141" class="checkbox "><span>160</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="28" class="checkbox "><span>3</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="81" class="checkbox "><span>32</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="86" class="checkbox "><span>32S</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="45" class="checkbox "><span>34</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="87" class="checkbox "><span>34M</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="8" class="checkbox "><span>35</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="9" class="checkbox "><span>36</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="88" class="checkbox "><span>36L</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="10" class="checkbox "><span>37</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="30" class="checkbox "><span>4</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="22" class="checkbox "><span>5</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="21" class="checkbox "><span>6</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="31" class="checkbox "><span>7</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="80" class="checkbox "><span>8</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="24" class="checkbox "><span>9</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="134" class="checkbox "><span>90</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="6" class="checkbox "><span>Free Size</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="4" class="checkbox "><span>L</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="2" class="checkbox "><span>M</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="1" class="checkbox "><span>S</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="7" class="checkbox "><span>XL</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="5" class="checkbox "><span>XS</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="65" class="checkbox "><span>XXL</span></div>
                                                </li>
                                                <li>
                                                    <div size-id="32" class="checkbox "><span>Đặt may</span></div>
                                                </li>
                                            </ul>
                                        </div>
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
                                            <a href="{{asset('/product-render-'.$item->id)}}" class="">
                                                <img data-src="{{asset('public/media/'.$item->coverimg)}}"
                                                     class="lazyload"/>
                                            </a>
                                        </div>
                                        <div class="content ">
                                            <a href="{{asset('/product-render-'.$item->id)}}">
                                                <div class="title"><span>{{$item->title}}</span></div>
                                                <div class="desc"><span>{{$item->content}}
                                                                                                    <br>
                                                                                                        <strike class="color-red"><span
                                                                                                                    class="color-black">{{$item->price}} VND</span></strike>
                                                    <br>
                                                    <span class="color-red">
                                                        {{$item->sale}} VND | Giảm
                                                        {{100-($item->sale/$item->price)*100}}%</span>
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

        <div class="footer-area">
            <div class="footer-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 fisrt-box-hide">
                            <h3 class="heading">Hỗ trợ khách hàng</h3>
                            <ul>
                                <li><a href="lien-he.html">Th&ocirc;ng tin li&ecirc;n hệ</a></li>
                                <li><a href="huong-dan-mua-hang.html">Hướng dẫn mua h&agrave;ng</a></li>
                                <li><a href="chinh-sach-doi-tra.html">Ch&iacute;nh s&aacute;ch đổi trả</a></li>
                                <li><a href="chinh-sach-giao-hang.html">Ch&iacute;nh s&aacute;ch giao h&agrave;ng</a>
                                </li>
                                <li><a href="chinh-sach-thanh-toan.html">Ch&iacute;nh s&aacute;ch thanh to&aacute;n</a>
                                </li>
                                <li><a href="size-guide.html">Size Guide</a></li>
                                <li><a href="cau-hoi-thuong-gap1.html">FAQs</a></li>
                                <li><a href="gift-card.html">Gift Card</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 fisrt-box-hide">
                            <h3 class="heading">RENDER</h3>
                            <ul>
                                <li><a href="ve-chung-toi.html">Về ch&uacute;ng t&ocirc;i</a></li>
                                <li><a href="hop-tac-ban-hang.html">Hợp t&aacute;c b&aacute;n h&agrave;ng</a></li>
                                <li><a href="http://careers.RENDER.vn/">Tuyển dụng</a></li>
                                <li><a href="chinh-sach-bao-mat.html">Ch&iacute;nh s&aacute;ch bảo mật</a></li>
                                <li><a href="dieu-kien-dieu-khoan.html">Điều kiện &amp; Điều khoản</a></li>
                                <li><a href="do-you-know.html">#RENDERdoyouknow</a></li>
                                <li><a href="chuong-trinh-quan-tri-thuc-tap-sinh.html">Ecommerce Graduate Programme</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-12 footer-box-center">
                            <h3 class="heading">Liên hệ chúng tôi</h3>
                            <p class="margin-top15">
                                <a class="icon icon-fb icon-footer" target="_blank"
                                   href="https://www.facebook.com/www.RENDER.vn/"></a>
                                <a class="icon icon-youtube icon-footer" target="_blank"
                                   href="https://www.youtube.com/channel/UCXdH1Tz7Epnvhs4ubp5gmvw"></a>
                                <a class="icon icon-in icon-footer" target="_blank"
                                   href="https://www.linkedin.com/company/RENDER"></a>
                            </p>
                            <div class="hidden-xs">
                                <p class="heading margin-top15" style="letter-spacing: 1px;">ĐĂNG KÝ CẬP NHẬT XU HƯỚNG
                                    THỜI
                                    TRANG VÀ CÁC ƯU ĐÃI ĐẶC BIỆT</p>
                                <div class="frmReceiveEmail">
                                    <div class="form-group">
                                        <!-- <div class="col-lg-4"><label class="control-label">Ảnh đại diện</label></div> -->
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email" placeholder="Email"
                                                   id="txtEmail">
                                            <span class="input-group-btn">
                                            <button class="btn btn-black btnReceiveEmail" style="min-width: 172px;"
                                                    type="button">Đăng ký</button>
                                        </span>
                                        </div>
                                        <div class="input-group hide box-label-alert-registerreviceemail"
                                             style="padding-top:10px;">
                                            <p class="small"
                                               style="padding: 10px 0; border-top: dashed 1px #f00; color: #F00; border-bottom: dashed 1px #f00;">
                                                Quý khách đã đăng nhận bản tin thành công từ www.RENDER.vn!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-callus visible-xs">
                                <a href="tel:1900636517" class="btn btn-black mobile-callus-btn" style="width: 70%;">Call
                                    us</a>
                            </div>
                            <div class="col-md-8 fisrt-box-hide" style="padding-left:0;">
                                <p class="heading margin-top5">Thông tin công ty</p>
                                <p>CÔNG TY TNHH FEROS<br>
                                    Địa chỉ: Tầng 3, Toà nhà Thăng Long. <br>
                                    99 Mạc Thái Tổ, Phố Trung Kính, Cầu Giấy, Hà Nội <br>
                                    P: <a href="tel:+84 24 710 86889">+84 24 710 86889</a> | CSKH: <a
                                            href="tel:1900 636 517">1900 636 517</a></p>
                            </div>
                            <div class="col-md-4 fisrt-box-hide" style="text-align:left;">
                                <p class="heading margin-top5">Được chứng nhận</p>
                                <ul class="list-inline">
                                    <li style="display:inherit;">
                                        <a target="_blank"
                                           href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=24501">
                                            <img class="lazyload" data-src="images/BCT-seal-red.png">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--<div class="col-md-3 col-sm-6 footer-wiget-last">
                            <h3 class="heading">Thanh toán</h3>
                            <ul class="list-inline">
                                <li class="footer-spaces payMasterCard"></li>
                                <li class="footer-spaces payVISA"></li>
                                <li class="footer-spaces payCOD"></li>
                            </ul>
                            <h3 class="heading">Dịch vụ vận chuyển</h3>
                            <ul class="list-inline">
                                <li class="footer-spaces shipTTC"></li>
                                <li class="footer-spaces shipVTP"></li>
                            </ul>
                            <h3 class="heading">Được chứng nhận</h3>
                            <ul class="list-inline">
                                <li>
                                    <a target="_blank" href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=24501">
                                        <img src="https://RENDER.vn/images/BCT-seal-red.png">
                                    </a>
                                </li>
                            </ul>
                        </div>-->


                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-5 col-lg-6">
                            ©2016 RENDER | Số ĐKKD: 0107469891 do Sở kế hoạch và Đầu tư TP Hà Nội, cấp ngày 10/06/2016
                        </div>
                        <div class="col-sm-5 col-md-4 col-lg-3 text-left">
                        </div>
                        <div class="col-sm-4 col-md-3 col-lg-3 text-right">
                            <a href="#" class="card card-visa"></a>
                            <a href="#" class="card card-mastercard"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End footer area -->
    </div>
@stop