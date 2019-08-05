@extends('admin.layouts.master-layouts')
@section('title')
    Danh sách tài khoản admin
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
                    Danh sách tài khoản admin
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Tài khoản Admin</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a class="btn btn-primary" id="btnadd" href="{{ route('admin.account.create') }}" onclick="">Thêm admin</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng Thái</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($admins))
                                        @foreach($admins as $key => $admin )
                                            <tr class="gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->role }}</td>
                                                <th><?php \Carbon\Carbon::setLocale('vi')?>
                                                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($admin->created_at))->diffforHumans() !!}</th>
                                                <td>{!! $admin->status == 1 ? "<span class='badge badge-primary'>Hoạt Động <i class='fa fa-bolt'></i></span>" : "<span class='badge badge-danger'>Đang Khóa <i class='fa fa-ban'></i></span>" !!}</td>
                                                <td >
                                                    <a class="btn btn-default" href="{{Route('admin.account.edit',['id'=> $admin->id]) }}" title="Edit this user account"><i class="fas fa-pencil-ruler"></i> Sửa</a>
                                                    @if($admin->status == 1)
                                                        <a class="btn btn-warning" href="{{Route('admin.account.lock',['id' => $admin->id]) }}"><i class="fa fa-lock"></i> Khóa</a>
                                                    @else
                                                        <a class="btn btn-primary" href="{{Route('admin.account.unlock',['id' => $admin->id]) }}"><i class="fa fa-unlock"></i> Mở Khóa</a>
                                                    @endif
                                                    <a href="{{ Route('admin.account.delete',['id' => $admin->id]) }}" class="btn btn-danger" title="Xóa {{ $admin->name }}" onclick="return confirm('Bạn muốn xoá tài khoản này ?')"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>


                                </table>
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

        </div>
    </div>

@endsection