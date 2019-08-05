@extends('admin.layouts.master-layouts')
@section('title')
    Thêm tin tuyển dụng
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            <section class="content-header">
                    <h1>
                        Thêm tin tuyển dụng
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Thêm tin tuyển dụng</li>
                    </ol>
                </section>
                <br>
                <div class="box box-primary">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label>Tiêu đề tuyển dụng (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title" {{ old('title') }}>
                            </div>
                            <div class="form-group">
                                <label>Lương cơ bản (*)</label><br>
                                <label>Từ :</label>
                                <input type="number" placeholder="Nhập lương" name="salaryMin" id="salary1" {{ old('salaryMin') }}>
                                <label for=""> VNĐ</label>
                                <label>- Đến :</label>
                                <input type="number" placeholder="Nhập lương" name="salaryMax" id="salary2" {{ old('salaryMax') }}>
                                <label for=""> VNĐ</label>   
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" {{ old('address') }}>
                            </div>
                            <div class="form-group">
                                <label>Nội dung tuyển (*)</label>
                                <textarea name="noidung" id="" cols="30" rows="10">{{ old('noidung') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh nền</label>
                                <input type="file" id="image" name="image" onchange="showIMG()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                            <div id="viewImg">
                
                            </div>
                        </div>
                
                        {{-- tag --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tags</label>
                                <input data-role='tags-input' value="Talentwins" name="tags" {{ old('tags') }}>
                            </div>
                        </div>
                        {{-- endtag --}}
                        
                        <div class="box-footer">
                            <a href="{{route('recruitment.index')}}" class="btn btn-warning">Quay lại</a>
                            <button type="submit" class="btn btn-primary">Thêm</button>
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