@extends('admin.layouts.master-layouts')
@section('title')
    Danh sách tài khoản user
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
                    Danh sách tài khoản user
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Tài khoản User</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a class="btn btn-primary" id="btnadd" href="{{ route('user.account.create') }}" onclick="">Thêm user</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng Thái</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($users))
                                        @foreach($users as $key => $user )
                                            <tr class="gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <th><?php \Carbon\Carbon::setLocale('vi')?>
                                                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffforHumans() !!}</th>
                                                <td>{!! $user->status == 1 ? "<span class='badge badge-primary'>Hoạt Động <i class='fa fa-bolt'></i></span>" : "<span class='badge badge-danger'>Đang Khóa <i class='fa fa-ban'></i></span>" !!}</td>
                                                <td >
                                                    <a class="btn btn-default" href="{{Route('user.account.edit',['id'=> $user->id]) }}" title="Edit this user account"><i class="fas fa-pencil-ruler"></i> Sửa</a>
                                                    @if($user->status == 1)
                                                        <a class="btn btn-warning" href="{{Route('user.account.lock',['id' => $user->id]) }}"><i class="fa fa-lock"></i> Khóa</a>
                                                    @else
                                                        <a class="btn btn-primary" href="{{Route('user.account.unlock',['id' => $user->id]) }}"><i class="fa fa-unlock"></i> Mở Khóa</a>
                                                    @endif
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