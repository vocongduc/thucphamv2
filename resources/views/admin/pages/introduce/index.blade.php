@extends('admin.layouts.master-layouts')
@section('title')
    Giới Thiệu
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Giới Thiệu
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Giới Thiệu</li>
                </ol>
            </section>
            <br>
            <button type="button" class="btn btn-primary" onclick="addcate()">Thêm Dịch vụ</button>
           
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h1>Giới thiệu về Mỹ Tâm Mart</h1>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                            @csrf 
                            <div class="from-group">
                                <input type="file" name="icon" id="itro-icon" class="form-control" onchange="fileValidation(this)">
                                <div id="imagePreview-intro-icon">
                                    
                                </div>
                            </div>
                            </form>
                            <!-- /.box-header -->
                            <div class="box-body">
                               
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
                                $('#imagePreview-'+obj.id).html('<img style="width:200px;" src="' + e.target.result + '"/>');
                            };
                            reader.readAsDataURL(obj.files[0]);
                        }
                    }
                }
            </script>
        </div>
    </div>


@endsection