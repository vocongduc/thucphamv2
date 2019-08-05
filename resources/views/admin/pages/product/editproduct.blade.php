@extends('admin.layouts.master-layouts')
@section('title')
    Sửa sản phẩm
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>
                Sửa sản phẩm.
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sửa sản phẩm</li>
            </ol>
        </section>
        <br>
        <div class="box box-primary">
            {{-- @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif --}}
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="cate_product">
                                @foreach ($cate as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm (*)</label>
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="name"
                               value="{{ $prd->name }}">
                    </div>
                    
                    <div class="form-group">
                            <label for="exampleInputEmail1">Mã sản phẩm(*)</label>
                            <input class="form-control" name="code" cols="50" rows="10"
                                      placeholder="Nhập mã sản phẩm" value="{{ $prd->code }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả sản phẩm(*)</label>
                        <input name="description" placeholder="Mô tả sản phẩm"
                                  class="form-control" value="{{ $prd->description }}">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm (*)</label>
                            <input class="form-control" name="price" cols="50" rows="10"
                                      placeholder="Nhập giá sản phẩm"  value="{{ $prd->price }}">
                    </div>
                    
                    <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng (*)</label>
                            <input class="form-control" name="quantity" cols="50" rows="10"
                                      placeholder="Nhập số lượng"  value="{{ $prd->quantity }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh nền</label>
                        <input type="file" id="image" name="image" onchange="showIMG()" class="form-control" >
                        <input id="" name="old_image" onchange="showIMG()" class="form-control"  value="{{ $prd->image }}" type="hidden">

                    </div>
                    <div class="form-group">
                            <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                            <div id="viewImg">
                                <img style="width: 300px;height: 300px" src="{{ asset('images/img').'/'.$prd->image }}">
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Sales</label>
                                <select class="form-control" name="sale">
                                    <option @if ($prd->sale == 0) selected @endif value="0">0%</option>
                                    <option @if ($prd->sale == 10) selected @endif value="10">10%</option>
                                    <option @if ($prd->sale == 20) selected @endif value="20">20%</option>
                                    <option @if ($prd->sale == 30) selected @endif value="30">30%</option>
                                    <option @if ($prd->sale == 40) selected @endif value="40">40%</option>
                                    <option @if ($prd->sale == 50) selected @endif value="50">50%</option>
                                    <option @if ($prd->sale == 60) selected @endif value="60">60%</option>
                                    <option @if ($prd->sale == 70) selected @endif value="70">70%</option>
                                    <option @if ($prd->sale == 80) selected @endif value="70">80%</option>
                                </select>
                            </div>
                </div>
               
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    
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