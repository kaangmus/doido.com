@extends('front.Base')
@section('title','DOIDO.COM | Thế giới đổi đồ')
@section('main')
    <script src="js/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="js/jqueryez.js"></script>
    <script>
        $(document).ready(function () {
            $(".stars input").click(function () {
                console.log(1111);
                var star = $('[name="star"]:radio:checked').val();
                var idproduct = $('.idproduct').val();
                $.get(
                    '{{url('admin/rate')}}',
                    {idproduct: idproduct, rating: star},
                    function () {
                        location.reload();
                    }
                );
            });
        });
    </script>
    <style>
        .upcase {
            font-weight: bold;
        }

        label {
            font-weight: unset;
        }

        .detail label.box, .lstproducts label.box {
            font-weight: unset;
            padding: 5px;
        }
    </style>
    <div class="content-area home-content-area top-area">
        <div class="container">
            <div class="navigation margin-top20">
                <a href="{{asset('/')}}">Trang chủ ></a>
                <a href="">Sản phẩm ></a>
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
                                <div id="gal1">
                                    <ul>
                                        <li color-id="22286" class="show active">
                                            <img class="lazyload"
                                                 data-src="{{asset('public/media/'.$item->coverimg)}}"
                                                 data-image="{{asset('public/media/'.$item->coverimg)}}"
                                                 data-zoom-image="{{asset('public/media/'.$item->coverimg)}}"
                                                 src="{{asset('public/media/'.$item->coverimg)}}">
                                        </li>
                                        @foreach($itemsMedia->slice(0,3) as $media)
                                            <li><a href="{{asset('product-'.$item->id)}}"
                                                   data-image="{{asset('public/media/'.$media->url)}}"
                                                   data-zoom-image="{{asset('public/media/'.$media->url)}}">
                                                    <img class="zoom" src="{{asset('public/media/'.$media->url)}}"/>
                                                </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="down-arrow">
                            <span class="thumbnails-arrow"></span>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            // $("#zoom1").ezPlus();

                            $("#zoom1").ezPlus({
                                tint: true,
                                tintColour: '#F90', tintOpacity: 0.5
                            });
                            $(".zoom").ezPlus({
                                tint: true,
                                tintColour: '#F90', tintOpacity: 0.5
                            });
                            // $("#zoom1").elevateZoom({tint:true, tintColour:'#F90', tintOpacity:0.5});
                            $(".detail ul li.collapse-toogle.in::after").click(function () {
                                $(".detail ul li.collapse-toogle.in .content").toggle();
                            });
                        });
                    </script>
                    <div class="prod-image relative">
                        <img id="zoom1" src="{{asset('public/media/'.$item->coverimg)}}"
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
                        <li>
                            <input type="hidden" id="product_id" name="id" value="{{$item->id}}">
                            <h3><span id="product_name">{{$item->title}}</span></h3>
                            <div class="desc">
                                    <span class="color-red">
                                {{isset($item->price)?number_format($item->price,0,',','.'):0 }} VND</span>
                            </div>
                        </li>
                        <li>
                            <div class="stars">
                                <input class="idproduct" hidden name="idproduct" value="{{$item->id}}">
                                <input class="star star-5" id="star-5" type="radio" name="star"
                                       {{isset($rate)?$rate==5?'checked':'':''}} value="5"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star"
                                       {{isset($rate)?$rate==4?'checked':'':''}} value="4"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star"
                                       {{isset($rate)?$rate==3?'checked':'':''}} value="3"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star"
                                       {{isset($rate)?$rate==2?'checked':'':''}} value="2"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star"
                                       {{isset($rate)?$rate==1?'checked':'':''}} value="1"/>
                                <label class="star star-1" for="star-1"></label>
                            </div>
                        </li>
                        <li>
                            <div class="upcase">Danh mục sản phẩm</div>
                            <div id="color" class="content">
                                <div style="display: inline-block; margin-right: 10px;">
                                    @foreach($itemsCate as $itemcate)
                                        <label size-id="1">{{$itemcate->title}},</label>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="upcase">Mặt hàng muốn đổi</div>
                            <br>
                            <label size-id="1">{{$item->desiredproducts}}</label>

                        </li>
                        <li>
                            <div class="upcase">#Tag</div>
                            <label size-id="1" class="box">#{{$item->tag}}</label>
                        </li>
                        <li>
                            <div class="upcase">Trạng thái sản phẩm</div>
                            <br>
                            <label size-id="1">{{$item->statustype==0?'Hàng đã đổi':'Hàng chưa đổi'}}</label>

                        </li>
                        <li>
                            <div class="row">
                                @if($item->statustype==1)
                                    <div class="col-md-6">
                                        <a href="{{asset('order/'.$item->id)}}" class="btn btn-black btnaddtocart">Đặt
                                            đồ</a>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <a class="btn btn-info" href="{{asset('admin/messenger/chat/'.$item->iduser)}}"><i
                                                class="fa fa-commenting-o"
                                                aria-hidden="true"></i> Nhắn tin</a>
                                </div>
                            </div>
                        </li>
                        <li class="collapse-toogle in">
                            <div class="upcase">MÔ TẢ SẢN PHẨM</div>
                            <div class="content product--content">
                                {!! $item->contents !!}
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách đổi trả</div>
                            <div class="content">
                                DoiDo.com chấp nhận đổi/trả hàng trong thời gian 03 ngày làm việc, áp dụng không đồng
                                đều
                                đối với từng mặt hàng và sản phẩm khác nhau. Quý khách vui lòng kiểm tra chi tiết về
                                chính sách đổi và trả hàng theo link.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://DoiDo.com.vn/chinh-sach-doi-tra.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách giao hàng</div>
                            <div class="content">
                                Đơn hàng sẽ được giao cho Quý khách trong vòng 07 - 10 ngày làm việc kể từ ngày đặt đơn.
                                Quý khách có thể liên hệ với DoiDo.com qua Email, Điện thoại, Facebook để được biết về
                                lộ
                                trình đơn hàng của mình . Chi tiết về chính sách giao hàng Quý khách vui lòng click vào
                                link.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://DoiDo.com.vn/chinh-sach-giao-hang.html">Xem
                                        chi tiết</a></div>
                            </div>
                        </li>
                        <li class="collapse-toogle">
                            <div class="upcase">Chính sách thanh toán</div>
                            <div class="content">
                                DoiDo.com cung cấp 4 hình thức thanh toán cho quý khách: Thanh toán khi nhận hàng (COD),
                                Chuyển khoản, Thanh toán qua thẻ tín dụng, Thanh toán qua thẻ ATM.
                                <div class="text-right margin-top10"><a class="view-all"
                                                                        href="https://DoiDo.com.vn/chinh-sach-thanh-toan.html">Xem
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
                <div class="comment_comment">
                    @foreach($listComment as $itemComment)
                        <div class="row">
                            <div class="col-8">
                                <div class="card card-white post">
                                    <div class="post-heading">
                                        <div class="float-left image col-sm-11">
                                            <img src="{{isset($itemComment->img)?asset('public/media/'.$itemComment->img):'images/user_1.jpg'}}"
                                                 class="img-circle avatar inline-comment"
                                                 alt="user profile image">
                                            <span class="inline-comment">{{$itemComment->comment}}</span>
                                        </div>
                                        @if(isset(Auth::user()->id))
                                            @if(Auth::user()->id==$itemComment->id)
                                                <div class="col-sm-1">
                                                    <a href="{{asset('comment/delete/'.$itemComment->idcomment)}}">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <form method="post" action="">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label for="comment">Bình luận:</label>
                        <input name="iduser" hidden value="{{isset(Auth::user()->id)?Auth::user()->id:-1}}">
                        <input name="idproduct" hidden value="{{$item->id}}">
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                        <br>
                        <button class="btn">Bình luận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop