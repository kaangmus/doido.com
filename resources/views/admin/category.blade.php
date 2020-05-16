@extends('admin.Base')
@section('title','Danh mục sản phẩm')
@section('main')
    <script type="text/javascript">
        var id;
        var title;
        var describe;
        var status;
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus');
        });
        $(document).ready(function(){
            $('#tb1 tr').click(function (e) {
                id = $(this).closest('.onRow').find('td:nth-child(1)').text();
                title = $(this).closest('.onRow').find('td:nth-child(2)').text();
                describe = $(this).closest('.onRow').find('td:nth-child(3)').text();
                $('.title').val(title);
                $('.describe').val(describe);
            });
        });
        function updateItem() {
            var titlecate=$('.title').val();
            var describecate=$('.describe').val();
            var statuscate=$('.status').val();

            $.get(
                '{{url('admin/category/update')}}',
                {id:id,title:titlecate,describe:describecate,status:statuscate},
                function() {
                    location.reload();
                }
            );
        }
    </script>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="myForm" role="form" method="post"  action="{{ url('/admin/category/update') }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input class="form-control title" placeholder="Category Name" name="title">
                        </div>
                        <div class="form-group">
                            <label>Mô tả danh mục</label>
                            <input class="form-control describe" placeholder="Describe" name="describe">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary save" onclick="updateItem()">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--code popup---------------------------------------------------------------------}}
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{asset('admin')}}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">danh mục sản phẩm</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục sản phẩm</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tạo mới danh mục</div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <form method="POST" action="{{asset('admin/category')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input class="form-control" placeholder="Tên danh mục" name="title">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" placeholder="Mô tả" name="describe">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control form-control-sm" name="status">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                </select>
                            </div>
                            <button class="btn btn-lg btn-primary">Thêm</button>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->describe}}</td>
                                    <td>{{$item->status==1?'Hoạt động':'Không hoạt động'}}</td>
                                    <td>
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Sửa</a>
                                        <a href="{{asset('admin/category/delete/'.$item->id)}}">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">DOIDO.COM</p>
    </div>
</div><!-- /.row -->
@stop
