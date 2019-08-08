@extends('admin.layouts.master-layouts')
@section('title')
    Chỉnh sửa tin giới thiệu
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            <section class="content-header">
                <h1>
                        Chỉnh sửa tin giới thiệu
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Chỉnh sửa tin giới thiệu</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <form role="form" method="POST" action="{{ url('admincp/introduce/edit/'.$introduce->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                                    
                            <div class="form-group">
                                <label>Nội dung giới thiệu (*)</label>
                                    <textarea name="content" rows="10" placeholder="Nhập nội dung" class="form-control">{{ $introduce->content }}</textarea>                            
                            </div>
                        </div>

                    <div class="box-footer">
                        <a href="{{route('introduce.index')}}" class="btn btn-warning">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
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