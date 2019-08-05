@extends('admin.layouts.master-layouts')
@section('title')
    Thông tin công ty
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            

                {{-- ------------------------------------------------------------------------- --}}
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" ><b style="color: darkblue">Thông tin công ty</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1" ><b style="color: darkblue">Thay đổi thông tin công ty</b></a>
                      </li>
                    </ul>
                  
                    {{-- thay đổi thông tin công ty --}}
                    <div class="tab-content">
                      <div id="home" class="container tab-pane active"><br>
                     
                            {{-- <div class="content-wrapper"> --}}
                                <div class="container-fluid">
                                    <section class="content-header">
                                        <h1>
                                            Thông tin công ty
                                        </h1>
                                        <ol class="breadcrumb">
                                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                            <li class="active">Thông tin công ty</li>
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
                                                                <th class="col-md-2">Tên công ty </th>
                                                                <th class="col-md-2">SĐT</th>
                                                                <th class="col-md-2">Email</th>
                                                                <th class="col-md-2">Địa chỉ </th>
                                                                <th class="col-md-2">Giấy chứng nhận</th>
                                                                <th class="col-md-3">Hành động</th>
                        
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($thongtin as $value)
                                                                <tr class="odd gradeX" >
                                                                    <td >{{$value->name}}</td>
                                                                    <td>{{$value->phone}}</td>
                                                                    <td>{{$value->email}}</td>
                                                                    <td>{{$value->address}}</td>
                                                                    <td>{{$value->certificate}}</td>
                                                                    <td>
                                                                        <a href="{{url('admincp/contact/edit').'/'.$value->id}}" class="btn btn-warning">Sửa</a>
                                                                        <a target="_blank" href="{{route('lien-he')}}" class="btn btn-success">Xem</a>
                                                                        <a href="{{url('admincp/contact/deleteinfor').'/'.$value->id}}" class="btn btn-danger" onclick="return confirmAction()">Xóa</a>
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
                            </div>
                        {{-- </div> --}}
                        
                            <script language="JavaScript">
                                function confirmAction() {
                                    return confirm("Bạn có chắc chắn không ?")
                                }
                                
                            
                            </script>
                        
                        
                      </div>

                      {{-- thông tin công ty --}}
                      <div id="menu1" class="container tab-pane fade"><br>
                        
                        <section class="content-header">
                            <h1>
                                Thêm tin tuyển dụng
                            </h1>
                            <ol class="breadcrumb">
                                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li class="active">Thêm tin tuyển dụng</li>
                            </ol>
                        </section>
                        <br>
                        <div class="box box-primary">
                            <form role="form" method="POST" action="{{route('contact.change')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label>Tên công ty (*)</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên công ty" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ công ty (*)</label>
                                        <input type="text" class="form-control" placeholder="Nhập địa chỉ công ty" name="address" value="{{ old('address') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Giấy chứng nhận (*)</label>
                                        <input type="text" class="form-control" placeholder="Giấy chứng nhận" name="certificate" value="{{ old('certificate') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Email (*)</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>FaceBook Link(*)</label>
                                        <input type="text" class="form-control" placeholder="FB link" name="facebook" value="{{ old('facebook') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Website (*)</label>
                                        <input type="text" class="form-control" placeholder="Website" name="website" value="{{ old('website') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Sđt (*)</label>
                                        <input type="text" class="form-control" placeholder="SĐT" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                       
                                
                                <div class="box-footer">
                                    {{-- <a href="{{route('contact.index')}}" class="btn btn-warning">Quay lại</a> --}}
                                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                                </div>
                            </form>
                        </div>
                        
                      </div>
                    </div>
                    {{-- edit --}}
                    
                    {{-- endedit --}}
        </div>
    </div>

@endsection