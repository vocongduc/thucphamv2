@extends('admin.layouts.master-layouts')
@section('title')
    Dịch vụ
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Danh sách Dịch vụ hiện có.
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dịch vụ</li>
                </ol>
            </section>
            <br>
            <button type="button" class="btn btn-primary" onclick="addcate()">Thêm Dịch vụ</button>
            <div class="box box-primary"  id="add-cate" hidden>
                    <div class="box-body">
                        <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Tiêu đề(*)</label>
                                    <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title" value="{{ old('title') }}" required>
                                    <hr>
                                </div>
                            <div class="form-group">
                                <label for="">Content(*)</label>
                                <input type="text" id="content" name="content" class="form-control" value="{{ old('content') }}"/>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label for="">Icon(*)</label>
                                <input type="file" name="image" id="addicon" class="form-control" onchange="fileValidation(this)"/>
                                <div id="imagePreviewaddicon"></div>
                                <hr>
                            </div>

                                <div class="form-group" style="text-align: center">
                                    <input type="submit" class="btn btn-success" name="submit" value="Thêm">
                                    <input type="reset" class="btn btn-danger" onclick="return huycate('add')">
                                </div>
                        </form>
                    </div>
            </div>
            <div class="box box-primary"  id="edit-cate" hidden>
                    <div class="box-body">
                        <form action="" id="form-edit" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Sửa loại sản phẩm(*)</label>
                                    <input type="text" class="form-control" placeholder="Nhập tiêu đề" id="cate-parentedit" name="name" value="{{ old('name') }}" required>
                                </div>
                            <div class="form-group">
                                <label for="">Màu sắc(*)</label>
                                <input type="text" id="color-editicon" name="content" class="form-control"/>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label for="">Icon(*)</label>
                                <input type="file" name="image" id="editicon" class="form-control" onchange="fileValidation(this)"/>
                                <input type="hidden" id="iconedit" name="oldimage">
                                <div id="imagePreviewediticon"></div>
                                <hr>
                            </div>
                                <div class="form-group" style="text-align: center">
                                    <hr>
                                    <input type="submit" class="btn btn-success" name="submit" value="Sửa">
                                    <input type="reset" class="btn btn-danger" onclick="return huycate('edit')">
                                </div>
                        </form>
                    </div>
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
                                        <th>#</th>
                                        <th>Tên </th>
                                        <th>Màu</th>
                                        <th>Icon</th>
                                        <th>Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $key => $row)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $key+1 }}</td>
                                            <td><input type="text" style="border: none; background: none;" id="name-{{ $row->id }}" value="{{ $row->name }}" readonly></td>
                                            <td><input type="text" style="border: none; background: none;" id="content-{{ $row->id }}" value="{{ $row->content }}" readonly></td>
                                            <td>
                                                <input id="icon-{{ $row->id }}" type="hidden" value="{{ $row->icon }}">
                                                <img alt="" src="{{ asset('images/services/'.$row->icon) }}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="{{ $row->id }}" onclick="editcate({{ $row->id}})">Sửa</button>
                                                <a class="btn btn-danger" href="{{ route('services.delete', $row->id) }}" onclick="return confirm('Hành động sẽ xóa mục này! bạn có muốn tiếp tục?')">Xóa</a>
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
                    $('#color-editicon').val($('#name-'+id).val());
                    $('#cate-parentedit').val($('#content-'+id).val());
                    $('#iconedit').val($('#icon-'+id).val());
                    document.getElementById('imagePreviewediticon').innerHTML = '<img style="background-color: '+$('#color-'+id).val()+'" src="{{ asset('images/services/') }}/'+$('#icon-'+id).val()+'"/>';
                    var editid= "'edit'";
                    var num_child= $('#num-child-'+id).val();
                    $('#form-edit').prop('action', '{{ url('admincp/services/update/') }}'+'/'+id);
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
            </script>
        </div>
    </div>


@endsection