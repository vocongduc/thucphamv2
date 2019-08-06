@extends('admin.layouts.master-layouts')
@section('title')
    Thêm Sản Phẩm
@endsection

@section('content')
    <style>
        .addchild{
            /*border: black dotted 1px;*/
            border-radius: 10px;
            padding: 10px 10px 10px 10px;
        }
        .addchild:hover{
            box-shadow: 5px 5px 5px -1px grey;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Thêm thể loại sản phẩm.
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Sửa thể loại sản phẩm</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="#" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Thêm loại sản phẩm(*)</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="cate-parent" value="{{ old('name') }}" required>
                            <hr>
                        </div>
                        <button type="button" id="btnadd" onclick="addchild()" title="Thêm Danh mục con"><i class="fa fa-plus"></i></button>
                        <script>
                            function addchild() {
                                var number= parseInt($('#num-child').val())+1;

                                var html= '<div id="child-'+number+'" class="form-group addchild row">';
                                html += '<div class="col-12" style="text-align: right">x</div>';
                                html += '<label for="exampleInputEmail1">Thể Loại con '+ number +'(*)</label>';
                                html += '<input type="text" class="form-control" placeholder="Nhập tiêu đề" name="cate-child-'+number+'" required>';
                                html += '</div>';
                                if(number==5){
                                    $('#btnadd').hide();
                                }
                                $('#child').append(html);
                                $('#num-child').val(number);
                            }
                        </script>
                        <input type="hidden" name="num-child" id="num-child" value="0">
                        <div id="child">
                            {{--<div class="form-group">
                                <label for="exampleInputEmail1">Thể Loại con 1(*)</label>
                                <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="cate-child-1" value="{{ old('name') }}" required>
                            </div>--}}
                        </div>
                    </div>
                </form>


               {{-- <form method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sửa thể loại  (*)</label>
                            <input type="text" class="form-control" placeholder="" name="name"
                                   value="{{ $cate_id->name }}" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>--}}
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                {{--<a class="btn btn-primary" id="btnadd" href="{{ route('add.products') }}" onclick="">Thêm Sản phẩm</a>--}}
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên </th>
                                        <th>Danh Mục Con</th>
                                        <th>Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cate_parents as $row)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $row->name }}</td>
                                            <td>
                                                <input type="checkbox" value="1" name="cate-child-1"> cate1
                                            </td>

                                            <td>

                                                <a class="btn btn-primary" id="{{ $row->id }}" href="{{ url('admincp/product/edit-category/'.$row->id) }}" onclick="">Sửa</a>
                                                <a class="btn btn-danger" href="{{ url('admincp/product/del-category/'.$row->id) }}" onclick="return confirm('Hành động sẽ xóa tin tức này! bạn có muốn tiếp tục?')">Xóa</a>
                                        </tr>
                                    @endforeach
                                    </tbody>


                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

            <script>
                CKEDITOR.replace('contentt', {
                    filebrowserBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });


                function showIMG() {
                    var fileInput = document.getElementById('image');
                    var filePath = fileInput.value; //lấy giá trị input theo id
                    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; //các tập tin cho phép
                    //Kiểm tra định dạng
                    if (!allowedExtensions.exec(filePath)) {
                        alert('Bạn chỉ có thể dùng ảnh dưới định dạng .jpeg/.jpg/.png/.gif extension.');
                        fileInput.value = '';
                        return false;
                    } else {
                        //Image preview
                        if (fileInput.files && fileInput.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById('viewImg').innerHTML = '<img style="width:100px; height: 100px;" src="' + e.target.result + '"/>';
                            };
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }
                }

            </script>
        </div>
    </div>


@endsection