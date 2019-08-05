@extends('admin.layouts.master-layouts')
@section('title')
    Danh sách liên hệ
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Danh sách liên hệ
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Danh sách liên hệ</li>
                </ol>
            </section>
            <hr>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-md-2">Họ tên </th>
                                        <th class="col-md-2">SĐT</th>
                                        <th class="col-md-2">Email</th>
                                        <th class="col-md-3">Tiêu đề </th>
                                        <th class="col-md-3">Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contact as $value)
                                        <tr class="odd gradeX" >
                                            <td ><input type="text" style="border: none; background: none;" readonly id="fullname{{ $value->id}}" value="{{$value->fullname}}"></td>
                                            <td ><input type="text" style="border: none; background: none;" readonly id="phone{{ $value->id}}" value="{{$value->phone}}"></td>
                                            <td ><input type="text" style="border: none; background: none;" readonly id="email{{ $value->id}}" value="{{$value->email}}"></td>
                                            <td ><input type="text" style="border: none; background: none;" readonly id="title{{ $value->id}}" value="{{$value->title}}"></td>
                                            <input  hidden type="text" style="border: none; background: none;" readonly id="content{{ $value->id}}" value="{{$value->content}}">
                                            <td>
                                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal"  onclick="show({{ $value->id}})">Xem</a>
                                                <a href="{{url('admincp/contact/delete').'/'.$value->id}}" class="btn btn-danger" onclick="return confirmAction()">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <b></b>
    </div>
</div>

<script language="JavaScript">
        function confirmAction() {
            return confirm("Bạn có chắc chắn không ?")
        }
        
    
    </script>

{{-- modal --}}
<div class="container container-fluid">
        <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 class="modal-title">Thông tin người dùng liên hệ</h2>
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button> --}}
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body" id="cont">
                        
                    </div>
                    
                        
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                    </div>
                </div>
                </div>
                
            </div>
    </div>
@stop