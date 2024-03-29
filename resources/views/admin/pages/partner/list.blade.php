@extends('admin.layouts.master-layouts')
@section('title')
    Danh sách đối tác
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">

            <style>
                .input {
                    background: none;
                    border: none;
                }
            </style>


            <section class="content-header">
                <h1>
                    Danh Sách đối tác
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">đối tác</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a href="{{route('partner.create')}}" class="btn btn-success">Thêm đối tác</a>
                            </div>
                            <div class="box-header">

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Logo</th>
                                        <th>Đường dẫn</th>
                                        <th>Trạng thái</th>
                                        <th class="col-md-3">Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partner as $value)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{$value->name}}</td>
                                            <td><img width="100px" src="assets/img_partner/{{$value->logo}}"></td>
                                            <td>{{$value->link}}</td>
                                            <td>
                                                @if($value->status==1)
                                                    Hiển thị
                                                @else
                                                    Không Hiển Thị
                                                @endif
                                            </td>
                                            <td>
                                                {{--<a class="btn btn-primary" id="bt{{$value->id}}" style="display: block" onclick="thaotac({{$value->id}})" >Thao tác</a>--}}
                                                <div id="button{{$value->id}}">

                                                    <a class="btn btn-success"
                                                       href="{{url('admincp/partner/show/'.$value->id)}}"> Xem</a>


                                                    @if($value->status==1)
                                                        <a class="btn btn-info"
                                                           href="{{ url('admincp/partner/setactive/'.$value->id.'/0') }}"
                                                           onclick="return confirm('Hành động sẽ ẩn Sản Phẩm này! bạn có muốn tiếp tục?')">Ẩn</a>
                                                    @else
                                                        <a class="btn btn-warning"
                                                           href="{{ url('admincp/partner/setactive/'.$value->id.'/1') }}"
                                                           onclick="return confirm('Hành động sẽ hiển thị Sản Phẩm mục này! bạn có muốn tiếp tục?')">Hiển
                                                            thị</a>

                                                    @endif
                                                    <a class="btn btn-danger"
                                                       href="{{ url('admincp/partner/destroy/'.$value->id) }}"
                                                       onclick="return confirm('Hành động sẽ xóa đối tác này! bạn có muốn tiếp tục?')">Xóa</a>
                                                </div>


                                        </tr>
                                    @endforeach
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
                <!-- /.row -->`
            </section>
            <script>
                {{--function thaotac(id) {--}}
                {{--document.getElementById("button"+id).style.display = 'block';--}}
                {{--document.getElementById("bt"+id).style.display = 'none';--}}
                {{--}--}}

                function update(id) {
                    var input = document.querySelector('#name' + id);
                    var edit = document.querySelector('#edit' + id);
                    var active = document.querySelector('#active' + id);


                    input.removeAttribute('readonly');
                    input.classList.remove('input');
                    input.classList.add('form-control');
                    edit.classList.add('hide');
                    active.classList.remove('hide');
                }

                function huyupdate(id) {
                    var r = confirm("WARNING! You have unsaved changes that may be lost!");
                    if (r == true) {
                        var input = document.querySelector('#name' + id);
                        var edit = document.querySelector('#edit' + id);
                        var active = document.querySelector('#active' + id);


                        input.classList.add('input');
                        $('.input').prop('readonly', true);
                        input.classList.remove('form-control');
                        edit.classList.remove('hide');
                        active.classList.add('hide');

                    } else {
                        return false;
                    }
                }
            </script>
        </div>
    </div>


@endsection