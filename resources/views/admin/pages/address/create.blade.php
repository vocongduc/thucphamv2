@extends('admin.layouts.master-layouts')
@section('title')
    Tạo địa chỉ hệ thống
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
                    Tạo địa chỉ hệ thống
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ Route('admin.address.index') }}"><i class="fa fa-dashboard"></i> Danh sách địa chỉ</a></li>
                    <li class="active">Thêm địa chỉ hệ thống</li>
                </ol>
            </section>
            <section class="content">
                <div class="table-responsive">
                    <form name="create" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <p>Địa chỉ</p>
                            <input name="address" class="form-control" type="text" placeholder="Địa chỉ" value="{{ old('address') }}">
                            <p style="color:red">{{ $errors->first('address') }}</p>
                        </div>
                        <div class="form-group">
                            <p>Tel</p>
                            <input name="tel" class="form-control" type="number" placeholder="Tel" value="{{ old('tel') }}" />
                            <p style="color:red">{{ $errors->first('tel') }}</p>
                        </div>
                        <div class="form-group">
                            <p>Hotline</p>
                            <input name="hotline" class="form-control" type="number" placeholder="Hotline" value="{{ old('hotline') }}" />
                            <p style="color:red">{{ $errors->first('hotline') }}</p>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ Route('admin.address.index') }}" type="submit" title="Cancel">Hủy</a>
                            <input name="submit" class="btn btn-success" type="submit" value="Tạo" >
                        </div>

                    </form>
                </div>
                <!-- /.row -->
            </section>

        </div>
    </div>

@endsection