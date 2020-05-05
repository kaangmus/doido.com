<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DoiDo.com - Quản trị website</title>
    <base href="{{asset('public/admin')}}/" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        $('select').picker();

        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
        /*-------------------------------jquey--------------------------->*/
    </script>
    <style>

    </style>
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{asset('/')}}"><img width="140px" src="{{asset('public/img/logo1.png')}}"></a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class=" count-info" href="{{asset('admin/messenger')}}">
                        <em class="fa fa-envelope"></em><span class="label label-danger"></span>
                    </a>
                </li>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="{{asset('public/media/'.Auth::user()->img)}}" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{Auth::user()->username}}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="{{ (request()->is('admin/admin')) ? 'active' : '' }}"><a href="{{asset('admin')}}"><em class="fa fa-dashboard">&nbsp;</em>Bảng điều khiển</a></li>
        <li class="{{ (request()->is('admin/profile')) ? 'active' : '' }}"><a href="{{asset('admin/profile')}}"><em class="fa fa-calendar"></em> Hồ sơ cá nhân</a></li>
        <li class="{{ (request()->is('admin/product')) ? 'active' : '' }}"><a href="{{asset('admin/product')}}"><em class="fa fa-calendar"></em> Sản phẩm</a></li>
        <li class="{{ (request()->is('admin/ordermanger')) ? 'active' : '' }}"><a href="{{asset('admin/ordermanger')}}"><em class="fa fa-calendar"></em> Quản lý giao dịch</a></li>
        @if(Auth::user()->lever==0)<li class="{{ (request()->is('admin/profile/user')) ? 'active' : '' }}"><a href="{{asset('admin/profile/user')}}"><em class="fa fa-bar-chart">&nbsp;</em> Danh sách người dùng</a></li>@endif
        @if(Auth::user()->lever==0) <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Tùy chọn <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li class="{{ (request()->is('admin/category')) ? 'active' : '' }}"><a class="" href="{{asset('admin/category')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span> Danh mục sản phẩm
                    </a></li>
            </ul>
        </li>@endif
        <li><a href="{{asset('logout')}}"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
    </ul>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    @yield('main')
</div>	<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>
