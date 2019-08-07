@extends('admin.layouts.master-layouts')
@section('title')
    Danh sách tin tuyển dụng
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            <section class="content-header">
                <h1>
                    Danh sách tin tuyển dụng
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Danh sách tin tuyển dụng</li>
                </ol>
            </section>
            <br>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                    <a href="{{route('recruitment.add')}}" class="btn btn-success">Thêm tuyển dụng</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-md-2">Tiêu đề </th>
                                        <th class="col-md-2">Mức lương</th>
                                        <th class="col-md-1">Avatar</th>
                                        <th class="col-md-2">Địa chỉ</th>
                                        <th class="col-md-3">Nội dung </th>
                                        <th class="col-md-1">Trạng thái</th>
                                        <th class="col-md-4">Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recruitment as $value)
                                        <tr class="odd gradeX" >
                                            <td>{{$value->title}}</td>
                                            <td>Từ: {{$value->salaryMin}} VNĐ - Đến: {{$value->salaryMax}} VNĐ</td>
                                            <td><img width="170px" height="70px" src="{{asset('assets/img_new').'/'.$value->image}}"> </td>
                                            <td>{{$value->address}}</td>
                                            <td>{!!substr($value->content,0,155)!!}...</td>
                                            
                                                @if ($value->status == 1)
                                                    <td><input style="color:green; border: none; text-align: center" id="tuyen" disabled value="Đang tuyển"></td>
                                                    <td>    <a href="{{ url('admincp/recruitment/act').'/'.$value->id.'/0'}}" class="btn btn-warning glyphicon glyphicon-play" title="Dừng"></a>
                                                        <a class="btn btn-primary glyphicon glyphicon-wrench" id="edit" href="{{url('admincp/recruitment/edit').'/'.$value->id}}" title="Sửa"></a>
                                                        <a class="btn btn-default glyphicon glyphicon-eye-open" href="{{ url('tuyendung/Tuyendungchitiet').'/'.$value->slug }}" target="_blank" title="Xem"></a>
                                                        <a class="btn btn-danger glyphicon glyphicon-minus-sign" href="{{url('admincp/recruitment/delete').'/'.$value->id}}" title="Xóa" onclick="return confirmAction()"></a>
                                                    </td>
                                                @else
                                                    <td><input style="color:red ; border: none; text-align: center" id="dungtuyen" disabled value="Hết hạn hồ sơ"></td>
                                                    <td>
                                                        <a href="{{ url('admincp/recruitment/act').'/'.$value->id.'/1'}}" class="btn btn-success glyphicon glyphicon-pause" title="Tuyển"></a>
                                                        <a class="btn btn-primary glyphicon glyphicon-wrench" id="edit" href="{{url('admincp/recruitment/edit').'/'.$value->id}}" title="Sửa"></a>
                                                        <a class="btn btn-default glyphicon glyphicon-eye-open" href="{{ url('tuyendung/Tuyendungchitiet').'/'.$value->slug }}" target="_blank" title="Xem"></a>
                                                        <a class="btn btn-danger glyphicon glyphicon-minus-sign" href="{{url('admincp/recruitment/delete').'/'.$value->id}}" onclick="return confirmAction()" title="Xóa"></a>
                                                    </td> 
                                                @endif
                                            
                                            
                                                
                                               
                                        </tr>
                                    @endforeach
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script language="JavaScript">
                function confirmAction() {
                        return confirm("Bạn có chắc chắn không ?")
                    }
            </script>
    </div>
</div>
@stop