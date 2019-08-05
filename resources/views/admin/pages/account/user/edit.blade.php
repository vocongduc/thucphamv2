@extends('admin.layouts.master-layouts')
@section('title')
    Chỉnh sửa tài khoản khách hàng
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
                    Chỉnh sửa tài khoản khách hàng
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ Route('user.account.index') }}"><i class="fa fa-dashboard"></i> Tài khoản User</a></li>
                    <li class="active">Sửa tài khoản</li>
                </ol>
            </section>
            <section class="content">
                <div class="table-responsive">
                    <form action="{{ Route('user.account.update',['id' => $users->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <p class="text-body custom-control-p">Tên</p>
                            <input name="name" class="form-control" type="text" placeholder="Tên" value="{{ $users->name }}">
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        </div>

                        <div class="form-group">
                            <p class="text-body custom-control-p">Email</p>
                            <input name="email" class="form-control" type="email" placeholder="Email" value="{{ $users->email }}" />
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        </div>
                        <div v-if='showChangePassword'>
                            <div class="form-group">
                                <p class="text-body custom-control-p">Mật khẩu mới</p>
                                <input name="password" class="form-control" type="password" placeholder="Password">
                                <p style="color:red">{{ $errors->first('password') }}</p>
                            </div>
                            <div class="form-group">
                                <p class="text-body custom-control-p">Nhập lại mật khẩu</p>
                                <input name="password_confirmation" class="form-control" type="password" placeholder="Confirm password">
                                <p style="color:red">{{ $errors->first('password_confirmation') }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ Route('user.account.index') }}" type="submit" title="Cancel">Hủy</a>
                            <input name="submit" class="btn btn btn-success" type="submit" value="Cập nhật" >
                        </div>
                    </form>
                </div>
        </div>
    </div>
    </div>

@endsection