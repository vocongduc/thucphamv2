@extends('admin.layouts.master-layouts')
@section('title')
    Chỉnh sửa album ảnh
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
                    Chỉnh sửa album ảnh
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ Route('admin.address.index') }}"><i class="fa fa-dashboard"></i> Danh sách album ảnh</a></li>
                    <li class="active">Sửa album ảnh</li>
                </ol>
            </section>
            <section class="content">
                <div class="table-responsive">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-body custom-control-label">Tiêu đề :</label>
                            <input name="title" class="form-control" type="text" placeholder="Tiêu đề" value="{{ $albums->title }}">
                            <p style="color:red">{{ $errors->first('title') }}</p>
                        </div>
                        <div class="form-group">
                            <label class="text-body custom-control-label">Ảnh album mới :</label>
                            <input onchange="showIMG()" name="image" id="image" class="form-control" type="file">
                            <input name="old_file" class="form-control" type="hidden" value="{{ $albums->image }}">
                        </div>
                        <label for="">Ảnh album cũ : </label>
                        <div id="viewImg">
                            <img style="width:25%;" src="{{ asset('assets/img_album/'.$albums->image) }}" />
                        </div>
                        <br>
                        {{--<div class="form-group">--}}
                            {{--<lable for="price">Ảnh album:</lable>--}}
                            {{--<input type="file" name="image" class="form-control">--}}
                            {{--@if($errors->has('image'))--}}
                                {{--<div class="alert alert-danger">{{ $errors->first('image') }}</div>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label class="text-body custom-control-label">Nội dung album :</label>
                            <textarea name="content" id="demo" cols="5" rows="5" class="form-control">{!! $albums->content !!}</textarea>
                            @if($errors->has('content'))
                                <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ Route('admin.album.index') }}" type="submit" title="Cancel">Hủy</a>
                            <input name="submit" class="btn btn-success" type="submit" value="cập nhật" >
                        </div>
                    </form>
                </div>
        </div>
    </div>
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
    </script>
@endsection