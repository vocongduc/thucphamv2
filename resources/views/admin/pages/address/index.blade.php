@extends('admin.layouts.master-layouts')
@section('title')
    Danh sách địa chỉ hệ thống
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
                    Danh sách địa chỉ hệ thống
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Danh sách địa chỉ</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a class="btn btn-primary" id="btnadd" href="{{ route('admin.address.create') }}" onclick="">Thêm địa chỉ</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Địa chỉ</th>
                                        <th>Tel</th>
                                        <th>Hotline</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($address))
                                        @foreach($address as $key => $addres )
                                            <tr class="gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $addres->address }}</td>
                                                <td>{{ $addres->tel }}</td>
                                                <td>{{ $addres->hotline }}</td>
                                                <td >
                                                    <a class="btn btn-default" href="{{Route('admin.address.edit',$addres->id ) }}" title="Edit this user account"><i class="fas fa-pencil-ruler"></i> Sửa</a>
                                                    <a href="{{ Route('admin.address.action',['delete',$addres->id]) }}" class="btn btn-danger" title="Xóa" onclick="return confirm('Bạn muốn xoá địa chỉ này ?')"><i class="fa fa-trash"></i> Xóa</a>
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