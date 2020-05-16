@extends('front.Base')
@section('title','Doido.com | Thế giới giao vặt')
@section('main')

    <center style="padding-bottom: 10px">
        <img src="{{asset('public/img/thankyou.png')}}"/>
        <h4>Giao dịch đã được ghi nhận</h4>
        <p>Cảm ơn bạn đã sử dụng dịch vụ!</p>
        <a class="btn btn-info" href="{{asset('admin/ordermanger')}}">Về trang giao dịch</a>
    </center>
@stop
