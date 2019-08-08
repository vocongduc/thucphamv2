@extends('admin.layouts.master-layouts')
@section('title')
    Danh sách album ảnh
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
                    Danh sách album ảnh
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Danh sách album ảnh</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a class="btn btn-primary" id="btnadd" href="{{ route('admin.album.create') }}" onclick="">Thêm album ảnh</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Image</th>
                                        <th>Nội dung</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($albums))
                                        @foreach($albums as $key => $album )
                                            <tr class="gradeX">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $album->title }}</td>
                                                <td><img width="50px" height="50px" src={{asset('').'assets/img_album/'.$album->image }}></td>
                                                <td>{!! $album->content !!}</td>
                                                <td >
                                                    <a class="btn btn-default" href="{{Route('admin.album.edit',$album->id ) }}" title="Edit this user account"><i class="fas fa-pencil-ruler"></i> Sửa</a>
                                                    <a href="{{ Route('admin.album.action',['delete',$album->id]) }}" class="btn btn-danger" title="Xóa" onclick="return confirm('Bạn muốn xoá địa chỉ này ?')"><i class="fa fa-trash"></i> Xóa</a>
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