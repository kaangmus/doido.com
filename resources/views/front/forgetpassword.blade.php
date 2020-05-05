@extends('front.Base')
@section('title','Giỏ hàng')
@section('main')
    <div class="container">
        <p class="text-center upcase size-20 times-new-roman">QUÊN MẬT KHẨU</p>
        <div class="text-center nav-horizontal">
            <span class="upcase">CẦN TRỢ GIÚP?</span> Liên hệ <span class="bold">1900 636 517</span>
            <a href="https://ferosh.vn/chinh-sach-doi-tra.html">Chính sách đổi trả</a>
            <a href="https://ferosh.vn/chinh-sach-giao-hang.html">Chính sách giao hàng</a>
            <a href="https://ferosh.vn/chinh-sach-thanh-toan.html">Chính sách thanh toán</a>
            <a href="https://ferosh.vn/size-guide.html">Size Guide</a>
        </div>
        <div class="row box-gray relative">
            <form  method="POST">
                {{ csrf_field() }}
                <div class="col-md-10">
                    <p class="title">EMAIL CỦA BẠN</p>
                    <p>Vui lòng nhập email của bạn và chọn Đăng ký.<br>
                        Sau đó chúng tôi sẽ gửi bạn một email chứa đường link để bạn có thể tạo mật khẩu mới.</p>
                    <div class="relative row-control form-group">
                        <label>Email *</label><input class="form-control" name="email" type="text">
                    </div>
                </div>
                <button class="btn btn-black">Thực hiện</button>
            </form>
        </div>
        <div class="row box-gray relative">
            <form action="{{asset('login')}}" method="POST" id="frmregister" novalidate="novalidate" class="bv-form">
                {{ csrf_field() }}
                <input type="text" class="hide" name="forgotpassword_signin" value="1">
                <div class="col-md-10">
                    <p class="title">HOẶC, ĐĂNG NHẬP LẠI</p>
                    <div class="relative row-control form-group">
                        <label>Email *</label><input class="form-control" name="email" type="text" id="txtEmail" data-bv-field="email">
                        <small data-bv-validator="notEmpty" data-bv-validator-for="email" class="help-block" style="display: none;">Hòm thư bắt buộc phải nhập</small><small data-bv-validator="regexp" data-bv-validator-for="email" class="help-block" style="display: none;">Định dạng hòm thư không đúng</small></div>
                    <div class="relative row-control form-group">
                        <label>Mật khẩu *</label><input type="password" name="password" class="form-control" id="txtPassword" data-bv-field="password">
                        <small data-bv-validator="notEmpty" data-bv-validator-for="password" class="help-block" style="display: none;">Mật khẩu bắt buộc phải nhập</small></div>
                </div>
                <button class="btn btn-black" type="submit">Đăng nhập</button>
                <input type="hidden" value=""></form>
        </div>
    </div>
    @stop