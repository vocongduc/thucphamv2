@extends('admin.layouts.master-layouts')
@section('title')
    Giới thiệu.
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Giới thiệu.
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Giới thiệu</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <form role="form" method="POST" action="{{ route('introduce.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $introduces->id }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Số điện thoại(*):</label>
                            <input type="text" name="phone" class="form-control" value="{{ $introduces->phone }}"/>
                        </div>
                        <div class="form-group">
                            <label for="">Email(*):</label>
                            <input type="email" name="email" class="form-control" value="{{ $introduces->email }}"/>
                        </div>
                        <div class="form-group">
                            <label for="">Logo(*):</label>
                            <input type="file" id="image-0" name="logo" onchange="fileValidation(this)" class="form-control">
                            <input type="hidden" name="oldlogo" value="{{ $introduces->logo }}" />
                            <div id="imagePreviewimage-0">
                                <img style="width:200px;" src="{{ asset('images/logo/'.$introduces->logo) }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại(*):</label>
                            <textarea name="content" class="form-control" id="" cols="30" rows="10">{{ $introduces->content }}</textarea>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
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
                    var filePath = obj.value;
                    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

                    if (!allowedExtensions.exec(filePath)) {
                        alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
                        obj.value = '';
                        return false;
                    } else {

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