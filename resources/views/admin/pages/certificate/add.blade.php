@extends('admin.layouts.master-layouts')
@section('title')
    Thêm chứng nhận
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Thêm chứng nhận.
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Thêm chứng nhận</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <div class="box-header">
                    <a href="{{route('certificate.index')}}" class="btn btn-primary">Danh sách</a>
                </div>
                <form role="form" method="POST" action="{{route('certificate.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                    </div>
                    
                    <div class="form-group">
                            <label for="exampleInputFile">Ảnh chứng nhận</label>
                            <input type="file" id="image" name="image" onchange="showIMG()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                        <div id="viewImg">

                        </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>

            <script>
                 function showIMG() {
                    var fileInput = document.getElementById('image');
                    var filePath = fileInput.value; //lấy giá trị input theo id
                    var allowedExtensions = /(\.jpg|\.png|\.gif )$/i; //các tập tin cho phép
                    //Kiểm tra định dạng
                    if (!allowedExtensions.exec(filePath)) {
                        alert('Bạn chỉ có thể dùng ảnh dưới định dạng .jpg/.png/.mov extension.');
                        fileInput.value = '';
                        return false;
                    }
                     else {
                        
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