@extends('admin.layouts.master-layouts')
@section('title')
   Slider
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                   Danh sách Slider
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('admincp') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Slider</li>
                </ol>
            </section>
            <br>
            <button type="button" class="btn btn-primary" onclick="addcate()">Thêm Slider</button>
            <div class="box box-primary"  id="add-cate" hidden>
                    <div class="box-body">
                        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Slider(*)</label>
                                    <input type="file" class="form-control" id="slider" placeholder="Nhập tiêu đề" name="slider" value="{{ old('slider') }}" required onchange="fileValidation(this)">
                                    <div id="imagePreviewslider"></div>
                                </div>
                            <div class="form-group" style="text-align: center">
                                <hr>
                                <input type="submit" class="btn btn-success" name="submit" value="Thêm">
                                <input type="reset" class="btn btn-danger" onclick="return huycate('add')">
                            </div>
                        </form>
                    </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th># </th>
                                        <th>Ảnh </th>
                                        <th>Trạng thái </th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key => $row)

                                        <tr class="odd gradeX" align="center">
                                            <form name="edit-{{ $row->id }}" action="{{ route('slider.update', $row->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <input type="file" id="slider-{{ $row->id }}" name="slider"  class="form-control hide" onchange="fileValidation(this)">
                                                <input type="hidden" id="old-{{ $row->id }}" name="old-image" value="{{ $row->image }}">
                                                <div id="imagePreviewslider-{{ $row->id }}">
                                                    <img src="{{ asset('images/slider/'.$row->image) }}" width="50%">
                                                </div>
                                            </td>
                                            <td>hihi</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="edit-{{ $row->id }}" onclick="editcate({{ $row->id}})">Sửa</button>
                                                <input type="submit" class="btn btn-success hide" id="submit-{{ $row->id }}" value="Sửa">
                                                <input type="reset" class="btn btn-danger hide" id="huy-{{ $row->id }}" value="Hủy" onclick="huycate({{ $row->id }})">
                                                <a class="btn btn-danger" href="{{ url('admincp/product/unit/delete/'.$row->id) }}" onclick="return confirm('Hành động sẽ xóa tin tức này! bạn có muốn tiếp tục?')">Xóa</a>
                                            </td>
                                            </form>
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
                   var slider = document.querySelector('#slider-'+id);
                   var edit = document.querySelector('#edit-'+id);
                   var submit = document.querySelector('#submit-'+id);
                   var huy = document.querySelector('#huy-'+id);

                   slider.classList.remove('hide');
                   submit.classList.remove('hide');
                   huy.classList.remove('hide');
                   edit.classList.add('hide');

                }
                function huycate(id) {
                   var x = confirm('hành động này sẽ hủy các thao tác bạn vừa làm! bạn có tiếp tục?');
                    if(x==true){
                        var slider = document.querySelector('#slider-'+id);
                        var edit = document.querySelector('#edit-'+id);
                        var submit = document.querySelector('#submit-'+id);
                        var huy = document.querySelector('#huy-'+id);

                        slider.classList.add('hide');
                        submit.classList.add('hide');
                        huy.classList.add('hide');
                        edit.classList.remove('hide');
                        var old =$('#old-'+id).val();
                        document.getElementById('imagePreviewslider-'+id).innerHTML = '<img style="width:50%;" src="'+'{{ asset('images/slider') }}'+'/'+old+'"/>';

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
                                document.getElementById('imagePreview'+obj.id).innerHTML = '<img style="width:50%;" src="' + e.target.result + '"/>';
                            };
                            reader.readAsDataURL(obj.files[0]);
                        }
                    }
                }
            </script>
        </div>
    </div>


@endsection