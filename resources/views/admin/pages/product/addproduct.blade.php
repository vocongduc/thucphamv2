@extends('admin.layouts.master-layouts')
@section('title')
    Thêm sản phẩm
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Thêm sản phẩm.
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Thêm sản phẩm</li>
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
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="name" required value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã sản phẩm(*)</label>
                            <input class="form-control" name="code"  required
                                   placeholder="Nhập mã sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả ngắn sản phẩm(*)</label>
                            <textarea name="summary" placeholder="Mô tả sản phẩm" required class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm(*)</label>
                            <textarea name="content" placeholder="Mô tả sản phẩm" required class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm (*)</label>
                            <input class="form-control" name="price" id="price" type="number" value="0" required placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Sales</label>
                            <input name="sale" id="sale" class="form-control" min="0" max="100" value="10" type="number" onchange="checkpercent(this)"/>
                            <div id="error-sale" style="color: red"></div>

                        </div>
                        <div class="form-group">
                            <label>Giá Sale: </label><span id="price_sale"></span>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng (*)</label>
                            <input class="form-control" type="number" name="quantity" required
                                   placeholder="Nhập số lượng">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đơn vị (*)</label>
                            <select name="unit">
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="image">
                            <label for="exampleInputFile">Ảnh nền</label>
                            <input type="file" id="image-0" name="image" onchange="fileValidation(this)" class="form-control">
                            <div id="imagePreviewimage-0"></div>
                        </div>

                    </div>
                    <input id="image-number" name="image-number" value="0" type="hidden">
                    <a id="addimage" class="btn btn-primary" onclick="addimage()">Thêm Ảnh</a>
                    <script>
                        function addimage(){
                            var number = parseInt($('#image-number').val()) + 1;
                            var html = '<div class="image-item" id="image-item' + number + '">';
                            html+="<div style='text-align: right'><a onclick='huychon("+number+")'><i class='fa fa-times' ></i></a> </div>";
                            html += '<label class="text-body custom-control-label">Ảnh ' + number + '(*):</label>';
                            html += '<input name="file-' + number + '" id="file-' + number + '" class="form-control" type="file" required onchange="fileValidation(this)">';
                            html += '<div id="imagePreviewfile-' + number + '">';
                            html += '</div>';
                            html += '</div>';
                            $('#image').append(html);
                            $('#image-number').val(number);
                            if(number==4) {
                                $('#addimage').addClass('hide');
                            }
                        }
                        function huychon(id) {
                            var parent = document.getElementById("image");
                            var child = document.getElementById('image-item'+id);
                            parent.removeChild(child);
                        }
                    </script>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>

            <script>
                CKEDITOR.replace('content', {
                    filebrowserBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
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
                                document.getElementById('imagePreview'+obj.id).innerHTML = '<img style="width:200px;" src="' + e.target.result + '"/>';
                            };
                            reader.readAsDataURL(obj.files[0]);
                        }
                    }
                }
            </script>
        </div>
    </div>
@endsection