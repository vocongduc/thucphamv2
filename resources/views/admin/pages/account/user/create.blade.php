@extends('admin.layouts.master-layouts')
@section('title')
    Tạo tài khoản khách hàng
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <style>
                .input{
                    background: none;
                    border: none;
                }
            </style>
            <section class="content-header">
                <h1>
                    Tạo tài khoản khách hàng
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ Route('user.account.index') }}"><i class="fa fa-dashboard"></i> Tài khoản User</a></li>
                    <li class="active">Thêm tài khoản User</li>
                </ol>
            </section>
            <section class="content">
                <div class="table-responsive">
                    <form name="create" action="{{ Route('user.account.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <p>Tên</p>
                            <input name="name" class="form-control" type="text" placeholder="Tên" value="{{ old('name') }}">
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input name="email" class="form-control" type="email" placeholder="Email" value="{{ old('email') }}" />
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        </div>
                        <input name="level" class="form-control" type="hidden" value="1"/>
                        <div class="form-group">
                            <p>Mật khẩu</p>
                            <input name="password" class="form-control" id="pass" type="password" placeholder="Password" onchange="return lengthPasswword()">
                            <p style="color:red">{{ $errors->first('password') }}</p>
                            <div id="lengthpass" style="color:red"></div>
                        </div>
                        <div class="form-group">
                            <p>Nhập lại mật khẩu</p>
                            <input name="password_confirmation" class="form-control" id="confirmpass" type="password" placeholder="Confirm password" onchange="return confirmPasswword()">
                            <p style="color:red">{{ $errors->first('password_confirmation') }}</p>
                            <div id="errorpass" style="color:red"></div>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ Route('user.account.index') }}" type="submit" title="Cancel">Hủy</a>
                            <input name="submit" class="btn btn-success" type="submit" value="Tạo" >
                        </div>

                    </form>
                </div>
                <!-- /.row -->
            </section>

        </div>
    </div>
    <script>

        function fileValidation(){
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;//lấy giá trị input theo id
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
//Kiểm tra định dạng
            if(!allowedExtensions.exec(filePath)){
                alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            }else{
//Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img style="width:700px;height:400px;" src="'+e.target.result+'"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        function lengthPasswword() {
            var x= document.getElementById('pass').value;



            if(x.length < 8){
                document.getElementById('lengthpass').style.display = 'block';
                document.getElementById('lengthpass').innerHTML = '<span>Độ dài mật khẩu phải lớn hơn hoặc bằng 8 ký tự!</span>';
            }
            else
            {
                document.getElementById('lengthpass').style.display = 'none';

            }
        }


        function confirmPasswword() {
            var x= document.getElementById('pass').value;
            var y= document.getElementById('confirmpass').value;


            if(x != y){
                document.getElementById('errorpass').style.display = 'block';
                document.getElementById('errorpass').innerHTML = '<span>Mật khẩu nhập lại không đúng!</span>';
            }
            else
            {
                document.getElementById('errorpass').style.display = 'none';

            }
        }

    </script>
@endsection