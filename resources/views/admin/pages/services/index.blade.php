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
            <button type="button" class="btn btn-primary" onclick="addcate()">Thêm thể loại sản phẩm</button>
            <div class="box box-primary"  id="add-cate" hidden>
                    <div class="box-body">
                        <form action="{{ route('catelv1.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Thêm loại sản phẩm(*)</label>
                                    <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="cate-parent" value="{{ old('name') }}" required>
                                    <hr>
                                </div>
                            <div class="form-group">
                                <label for="">Màu sắc(*)</label>
                                <input type="color" id="color-addicon" name="color" />
                                <hr>
                            </div>
                            <div class="form-group">
                                <label for="">Icon(*)</label>
                                <input type="file" name="icon" id="addicon" class="form-control" onchange="fileValidation(this)"/>
                                <div id="imagePreviewaddicon"></div>
                                <hr>
                            </div>
                                <button type="button" id="add" onclick="addchild(this)" title="Thêm Danh mục con"><i class="fa fa-plus"></i></button>

                                <input type="hidden" name="num-child" id="num-childadd" value="1">
                                <div id="childadd">
                                    <div id="child-add-1" class="form-group addchild row">
                                        <label for="exampleInputEmail1">Thể Loại con 1(*)</label>
                                        <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="cate-child-1" required>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <hr>
                                    <input type="submit" class="btn btn-success" name="submit" value="Thêm">
                                    <input type="reset" class="btn btn-danger" onclick="return huycate('add')">
                                </div>
                        </form>
                    </div>
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
            <div class="box box-primary"  id="edit-cate" hidden>
                    <div class="box-body">
                        <form action="" id="form-edit" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Sửa loại sản phẩm(*)</label>
                                    <input type="text" class="form-control" placeholder="Nhập tiêu đề" id="cate-parentedit" name="cate-parent-edit" value="{{ old('cate-parent-edit') }}" required>
                                </div>
                            <div class="form-group">
                                <label for="">Màu sắc(*)</label>
                                <input type="color" id="color-editicon" name="color" />
                                <hr>
                            </div>
                            <div class="form-group">
                                <label for="">Icon(*)</label>
                                <input type="file" name="icon" id="editicon" class="form-control" onchange="fileValidation(this)"/>
                                <input type="text" id="iconedit">
                                <div id="imagePreviewediticon"></div>
                                <hr>
                            </div>
                                <div class="form-group" style="text-align: center">
                                    <hr>
                                    <input type="submit" class="btn btn-success" name="submit" value="Thêm">
                                    <input type="reset" class="btn btn-danger" onclick="return huycate('edit')">
                                </div>
                        </form>
                    </div>
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
                                <h1>Danh Sách Loại sản Phẩm</h1>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên </th>
                                        <th>Màu</th>
                                        <th>Icon</th>
                                        <th>Danh Mục Con</th>
                                        <th>Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $row)
                                        <tr class="odd gradeX" align="center">
                                            <td><input type="text" style="border: none; background: none;" id="value-{{ $row->id }}" value="{{ $row->name }}" readonly></td>
                                            <td>
                                                <input id="color-{{ $row->id }}" type="hidden" value="{{ $row->color }}">
                                                <div style="border-radius:50%;width: 40px; height: 40px; background-color: {{ $row->color }}"></div>
                                            </td>
                                            <td>
                                                <input id="icon-{{ $row->id }}" type="hidden" value="{{ $row->image }}">
                                                <div><img style="background-color: {{ $row->color }}" src="{{ asset('images/cate-icon/'.$row->image) }}" alt=""></div>
                                            </td>
                                            <td>
                                               <a href="{{ route('catelv2.list', $row->id) }}">Xem Loại Sản Phẩm con</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="{{ $row->id }}" onclick="editcate({{ $row->id}})">Sửa</button>
                                                <a class="btn btn-danger" href="{{ route('catelv1.delete', $row->id) }}" onclick="return confirm('Hành động sẽ xóa mục này! bạn có muốn tiếp tục?')">Xóa</a>
                                            </td>
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
                function addcate() {
                    document.getElementById('add-cate').removeAttribute('hidden');
                }
                function editcate(id) {
                    $('#color-editicon').val($('#color-'+id).val());
                    $('#cate-parentedit').val($('#value-'+id).val());
                    $('#iconedit').val($('#icon-'+id).val());
                    document.getElementById('imagePreviewediticon').innerHTML = '<img style="background-color: '+$('#color-'+id).val()+'" src="{{ asset('images/cate-icon/') }}/'+$('#icon-'+id).val()+'"/>';
                    var editid= "'edit'";
                    var num_child= $('#num-child-'+id).val();
                    $('#form-edit').prop('action', '{{ url('admincp/product/category/level1/update/') }}'+'/'+id);
                    document.getElementById('edit-cate').removeAttribute('hidden');
                }

                function addchild(obj) {
                    var number= parseInt($('#num-child'+obj.id).val())+1;
                    var id= "'"+obj.id+"'";
                    var html= '<div id="child-add-'+number+'" class="form-group addchild row">';
                    html += '<div class="col-12" style="text-align: right"><button type="button" onclick="huychild('+number+','+id+')"><i class="fa fa-minus"></i></button> </div>';
                    html += '<label for="exampleInputEmail1">Thể Loại con '+ number +'(*)</label>';
                    html += '<input type="text" class="form-control" placeholder="Nhập tiêu đề" name="cate-child-'+number+'" required>';
                    html += '</div>';
                    if(number==5){
                        $('#'+obj.id).hide();
                    }
                    $('#child'+obj.id).append(html);
                    $('#num-child'+obj.id).val(number);
                }
                function huychild(number, id) {
                    var x= confirm('dữ liệu vừa nhập có thể không được giữ lại! bạn có muốn tiếp tục?');
                    if( x==true) {
                        var parent = document.getElementById("child"+id);
                        var child = document.getElementById('child-'+id+'-'+number);
                        parent.removeChild(child);
                    }
                }
                function huycate(id) {
                   var x = confirm('hành động này sẽ hủy các thao tác bạn vừa làm! bjn có tiếp tục?');
                    if(x==true){
                        $('#'+id+'-cate').prop('hidden', 'true');
                        var parent = document.getElementById("child"+id);
                        var number = $('#num-child').val();
                        for( var i=1; i<=number; i++){
                            var child = document.getElementById('child-'+id+'-'+ i);
                            parent.removeChild(child);
                        }
                        $('#num-child').val(0);
                        $('#btnadd').show();
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                function fileValidation(obj) {
                    if($('#color-'+obj.id).val()!=null) {
                        //var fileInput = document.getElementById('file'+id);
                        var filePath = obj.value; //lấy giá trị input theo id
                        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
                        //Kiểm tra định dạng
                        if (!allowedExtensions.exec(filePath)) {
                            alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
                            obj.value = '';
                            return false;
                        } else {
                            //Image preview
                            if (obj.files && obj.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    document.getElementById('imagePreview' + obj.id).innerHTML = '<img style="background-color: ' + $('#color-' + obj.id).val() + '" src="' + e.target.result + '"/>';
                                };
                                reader.readAsDataURL(obj.files[0]);
                            }
                        }
                    }
                    else{
                        toastr.error('Bạn chưa chọn màu nền', 'Thông báo', {timeOut: 3000});
                        toastr.options.progressBar = true;
                    }
                }
            </script>
        </div>
    </div>


@endsection