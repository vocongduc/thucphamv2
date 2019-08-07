@extends('admin.layouts.master-layouts')
@section('title')
    Chỉnh sửa tin tuyển dụng
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            <section class="content-header">
                <h1>
                        Chỉnh sửa tin tuyển dụng
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Chỉnh sửa tin tuyển dụng</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body col-md-5" style="background: white">
                            
                        <div class="form-group">
                            <label>Tiêu đề tuyển dụng (*)</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title" value="{{$recruitment->title}}">
                        </div>
                        <div class="form-group">
                            <label>Vị trí công việc:</label>
                            <input type="text" class="form-control" placeholder="Vị trí công việc" name="vitri" value="{{$recruitment->vitri}}">
                        </div>
                        <div class="form-group">
                            <label>Số lượng:</label>
                            <input type="number" class="form-control" name="soluong" value="{{$recruitment->soluong}}">
                        </div>
                        <div class="form-group">
                            <label>Độ tuổi:</label>
                            <input type="text" class="form-control" placeholder="Độ tuổi" name="dotuoi" value="{{$recruitment->dotuoi}}">
                        </div>
                        <div class="form-group">
                            <label>Yêu cầu kinh nghiệm:</label>
                            <input type="text" class="form-control" placeholder="Yêu cầu kinh nghiệm" name="kinhnghiem" value="{{$recruitment->kinhnghiem}}">
                        </div>
                        <div class="form-group">
                            <label>Trình độ học vấn:</label>
                            <input type="text" class="form-control" placeholder="Trình độ học vấn" name="hocvan" value="{{$recruitment->hocvan}}">
                        </div>
                        <div class="form-group">
                            <label>Người liên hệ:</label>
                            <input type="text" class="form-control" placeholder="Người liên hệ" name="nguoilienhe" value="{{$recruitment->nguoilienhe}}">
                        </div>
                        <div class="form-group">
                            <label>SĐT liên hệ:</label>
                            <input type="text" class="form-control" placeholder="Sđt" name="sdt" value="{{$recruitment->sdt}}">
                        </div>
                        <div class="form-group">
                            <label>Email liên hệ:</label>
                            <input type="text" class="form-control" placeholder="Email liên hệ" name="email" value="{{ $recruitment->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh nền</label>
                            <input type="file" id="image" name="image" onchange="showIMG()">
                            <input name="old_file" value="{{$recruitment->image}}" hidden>
                        </div>
                    </div>
                    <div class="box-body col-md-5" style="background: wheat; margin-left: 3%">
                        
                        <div class="form-group">
                            <label>Lương cơ bản (*)</label><br>
                            <label>Từ :</label>
                            <input type="number" placeholder="Nhập lương" name="salaryMin" id="salary1" value="{{$recruitment->salaryMin}}">
                            <label for=""> VNĐ</label>
                            <label>- Đến :</label>
                            <input type="number" placeholder="Nhập lương" name="salaryMax" id="salary2" value="{{$recruitment->salaryMax}}">
                            <label for=""> VNĐ</label>   
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (*)</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{{$recruitment->address}}">
                        </div>
                        <div class="form-group">
                            <label>Nội dung tuyển (*)</label>
                            <textarea name="noidung" id="" cols="50" rows="50">
                                {{$recruitment->content}} 
                            </textarea>
                        </div>
                        
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                        <div id="viewImg" style="margin-left: 30%">
                            <img width="250px" height="150px" src="{{asset('assets/img_new').'/'.$recruitment->image}}" alt="">
                        </div>
                    </div>
                    

                    {{-- tag --}}
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tags</label>
                            
                            <input data-role='tags-input' value="{{$tag}}" name="tags"   >
                            {{-- {{dd($tags)}} --}}
                            
                        </div>
                    </div>
                    {{-- endtag --}}
                    
                    <div class="box-footer col-sm-12" >
                        <a href="{{route('recruitment.index')}}" class="btn btn-warning">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>

            <script>
                CKEDITOR.replace('noidung', {
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
                        alert('Bạn chỉ có thể dùng ảnh dưới định dạng .jpeg/.jpg/.png/.gif .');
                        fileInput.value = '';
                        return false;
                    } else {
                        //Image preview
                        if (fileInput.files && fileInput.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById('viewImg').innerHTML = '<img style="width:150px; height: 200px;" src="' + e.target.result + '"/>';
                            };
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }
                }

                function changeV(){
                    var salary1 = document.getElementById('salary1').value;
                    var salary2 = document.getElementById('salary2').value;
                    if(salary1 < 0 || salary2 < 0  ){
                        document.getElementById('salary1').value = 0;
                        document.getElementById('salary2').value = 0;
                    }
                    
                }

            </script>
    </div>
</div>
@endsection