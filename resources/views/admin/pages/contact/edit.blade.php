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
                    <div class="box-body">
                                    
                            <div class="form-group">
                                <label>Tên công ty (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập tên công ty" name="name" value="{{ $thongtin->name }}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ công ty (*)</label>
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ công ty" name="address" value="{{ $thongtin->address }}" >
                            </div>
                            <div class="form-group">
                                <label>Giấy chứng nhận (*)</label>
                                <input type="text" class="form-control" placeholder="Giấy chứng nhận" name="certificate" value="{{ $thongtin->certificate }}" >
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $thongtin->email }}" >
                            </div>
                            <div class="form-group">
                                <label>FaceBook Link(*)</label>
                                <input type="text" class="form-control" placeholder="FB link" name="facebook" value="{{ $thongtin->fblink }}">
                            </div>
                            <div class="form-group">
                                <label>Website (*)</label>
                                <input type="text" class="form-control" placeholder="Website" name="website" value="{{ $thongtin->website }}" >
                            </div>
                            <div class="form-group">
                                <label>Sđt (*)</label>
                                <input type="text" class="form-control" placeholder="SĐT" name="phone" value="{{ $thongtin->phone }}">
                            </div>
                        </div>

                    <div class="box-footer">
                        <a href="{{route('contact.change')}}" class="btn btn-warning">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>

    </div>
</div>
@endsection