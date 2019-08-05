@extends('admin.layouts.master-layouts')
@section('title')
    Thêm tin tức
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>
                Thêm tin tức.
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Thêm tin tức</li>
            </ol>
        </section>
        <br>
        <div class="box box-primary">

            <form role="form" method="POST" action="{{ url('admincp/menu/edit/'.$menu->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="cate_menu">
                            @foreach($cate_menu as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề tin tức (*)</label>
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="name"
                               value="{{ $menu->name }}">
                    </div>
                    <label for="exampleInputEmail1">Tóm tắt tin tức (*)</label>
                    <div class="form-group">
    
                            <textarea class="form-control" name="summary" cols="50" rows="10"
                                      placeholder="Nhập tóm tắt nội dung">{{ $menu->summary }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung (*)</label>
                        <textarea name="contentt" rows="10" placeholder="Nhập nội dung"
                                  class="form-control">{{ $menu->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh nền</label>
                        <input type="file" id="image" name="image" onchange="showIMG()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                    <div id="viewImg">
                        <img width="100px" src="assets/img_menu/{{$menu ->image}}">
                    </div>
                </div>
    
                {{-- tag --}}
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Tags</label>
                        <input data-role='tags-input' value="{{$str_tags}}" name="tags">
                    </div>
                </div>
                {{-- endtag --}}
                {{--Tiêu điểm --}}
                <div class="form-group">
                    <label>Tiêu điểm</label>
                    @if($menu->focus == 1)
                        <label class="radio-inline">
                            <input name="focus" value="1" checked="" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="focus" value="0" type="radio">Không
                        </label>
                    @else
                        <label class="radio-inline">
                            <input name="focus" value="1"  type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="focus" value="0" checked="" type="radio">Không
                        </label>
                    @endif
                </div>
                {{--Hết tiêu điểm--}}
    
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