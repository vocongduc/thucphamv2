@extends('admin.layouts.master-layouts')
@section('title')
    Thêm video
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Thêm video.
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Thêm video</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <div class="box-header">
                    <a href="{{route('video.index')}}" class="btn btn-primary">Danh sách</a>
                </div>
                <form role="form" method="POST" action="{{route('video.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label>Tên (*)</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title"
                                   value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh nền</label>
                            <input type="file" id="video" name="video" onchange="showIMG()">
                        </div>
                    </div>
                    {{--  <div class="form-group">
                        <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                        <div id="viewImg">

                        </div>  --}}
                    </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>

            <script>
                function showIMG() {
                    var fileInput = document.getElementById('video');
                    var filePath = fileInput.value; //lấy giá trị input theo id
                    var allowedExtensions = /(\.mp4|\.mov|\.ogg )$/i; //các tập tin cho phép
                    //Kiểm tra định dạng
                    if (!allowedExtensions.exec(filePath)) {
                        alert('Bạn chỉ có thể dùng ảnh dưới định dạng .ogg/.mp4/.mov extension.');
                        fileInput.value = '';
                        return false;
                    }
                     //else {
                        
                    //    if (fileInput.files && fileInput.files[0]) {
                    //        var reader = new FileReader();
                    //        reader.onload = function (e) {
                    //            document.getElementById('viewImg').innerHTML = '<video style="width:100px; height: 100px;" src="' + e.target.result + '"/><video>';
                    //        };
                    //        reader.readAsDataURL(fileInput.files[0]);
                    //    }
                    //}
                }
            </script>
        </div>
    </div>
@endsection