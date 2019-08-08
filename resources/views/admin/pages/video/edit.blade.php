@extends('admin.layouts.master-layouts')
@section('title')
    Sửa video
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Sửa đối tác chiến lược.
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Sửa video</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <div class="box-header">
                    <a href="{{route('video.index')}}" class="btn btn-primary">Danh sách video</a>
                </div>
                <form role="form" method="POST" action="{{url('admincp/video/edit/'.$video->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label>Tên (*)</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title"
                                   value="{{$video->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Video</label>
                            <input type="file" id="video" name="video" onchange="showIMG()">
                        </div>
                    </div>
                    {{--  <div class="form-group">
                        <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                        <div id="viewImg">

                        </div>
                    </div>  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>

            <script>
                function showIMG() {
                    var fileInput = document.getElementById('video');
                    var filePath = fileInput.value; //lấy giá trị input theo id
                    var allowedExtensions = /(\.mov|\.mp4|\.ogg)$/i; //các tập tin cho phép
                    //Kiểm tra định dạng
                    if (!allowedExtensions.exec(filePath)) {
                        alert('Bạn chỉ có thể dùng ảnh dưới định dạng .mov/.mp4/.ogg extension.');
                        fileInput.value = '';
                        return false;
                    }
                    // else {
                        //Image preview
                     //   if (fileInput.files && fileInput.files[0]) {
                     //       var reader = new FileReader();
                     //       reader.onload = function (e) {
                      //          document.getElementById('viewImg').innerHTML = '<video style="width:100px; height: 100px;" src="' + e.target.result + '"/></video>';
                      //      };
                       //     reader.readAsDataURL(fileInput.files[0]);
                       // }
                    //}
                }
            </script>
        </div>
    </div>
@endsection