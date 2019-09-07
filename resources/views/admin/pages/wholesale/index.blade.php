@extends('admin.layouts.master-layouts')
@section('title')
Bán sỉ
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>
                Thêm giá sỉ cho Đơn vị.
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Bán sỉ</li>
            </ol>
        </section>
        <br>
        <button type="button" class="btn btn-primary" onclick="addcate()">Thêm</button>
        <div class="box box-primary"  id="add-cate" hidden>
            <div class="box-body">
                <form action="{{ route('wholesale.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Đơn vị(*)</label>
                        <select name="unit" id="unit" required class="form-control" onchange="selectunit(this)">
                            <option value="">--chọn đơn vị--</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>

                        <script>
                            function selectunit(obj) {
                                var unit= $('#'+obj.id+' :selected').text();
                                var unit_chose = document.querySelector('#unit-chose');
                                $('#textsi').html('(Số lượng tối thiểu để nhận giá sỉ cho đơn vị '+unit+')');
                                unit_chose.classList.remove('an');
                            }
                        </script>
                    </div>
                    <div id="unit-chose" class="an">
                        <div class="form-group"  title="Số Lượng Tối thiếu để nhận giá sỉ">
                            <label for="">Số lượng(*)</label>
                            <input type="number" required name="quantity" class="form-control">
                            <span id="textsi"></span>
                        </div>
                        <div class="form-group"  title="">
                            <label for="">phần Trăm giá sỉ(*)</label>
                            <input class="form-control" id="percent" type="number" name="percent" min="0" max="100" onchange="checkpercent(this)">
                            <div id="error-percent" style="color: red"></div>
                            <span>(số phần trăm sẽ nhân với giá gốc khi khách hàng chọn mua sỉ)</span>
                        </div>
                        <div class="form-group" style="text-align: center">
                            <hr>
                            <input type="submit" class="btn btn-success" name="submit" value="Thêm">

                        </div>
                    </div>
                    <input type="reset" class="btn btn-danger" onclick="return huycate('add')">
                </form>
            </div>

        </div>
        <div class="box box-primary"  id="edit-cate" hidden>
            <div class="box-body">
                <form action="" id="form-edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Đơn vị(*)</label>
                        <h4 id="has-unit"></h4>
                    </div>
                    <div>
                        <div class="form-group"  title="Số Lượng Tối thiếu để nhận giá sỉ">
                            <label for="">Số lượng(*)</label>
                            <input type="number" required name="quantity" id="edit-quantity" class="form-control">
                            <span id="textsi"></span>
                        </div>
                        <div class="form-group"  title="">
                            <label for="">phần Trăm giá sỉ(*)</label>
                            <input class="form-control" id="edit-percent" type="number" name="percent" min="0" max="100" onchange="checkpercent(this)">
                            <div id="error-edit-percent" style="color: red"></div>
                            <span>(số phần trăm sẽ nhân với giá gốc khi khách hàng chọn mua sỉ)</span>
                        </div>
                        <div class="form-group" style="text-align: center">
                            <hr>
                            <input type="submit" class="btn btn-success" name="submit" value="Thêm">

                        </div>
                    </div>
                    <input type="reset" class="btn btn-danger" onclick="return huycate('edit')">
                </form>

            </div>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        {{--<div class="box-header">
                            <h1>Danh Sách Loại sản Phẩm</h1>
                        </div>--}}
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th># </th>
                                    <th>Đơn vị </th>
                                    <th>Số lượng tối thiểu </th>
                                    <th>Phần trăm sỉ(%) </th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wholesales as $key => $row)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $key+1 }}</td>
                                    <td><input type="text" style="border: none; background: none;" id="name-{{ $row->id }}" value="{{ $row->name }}" readonly></td>
                                    <td><input type="text" style="border: none; background: none;" id="quantity-{{ $row->id }}" value="{{ $row->quantity }}" readonly></td>
                                    <td><input type="text" style="border: none; background: none;" id="percent-{{ $row->id }}" value="{{ $row->percent }}" readonly></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" id="{{ $row->id }}" onclick="editcate({{ $row->id}})">Sửa</button>
                                        <a class="btn btn-danger" href="{{ url('admincp/wholesale/delete/'.$row->id) }}" onclick="return confirm('Hành động sẽ xóa mục này! bạn có muốn tiếp tục?')">Xóa</a>
                                    </td>
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
            <!-- /.row -->
        </section>

        <script>
            function addcate() {
                document.getElementById('add-cate').removeAttribute('hidden');
            }
            function editcate(id) {
                $('#edit-quantity').val($('#quantity-'+id).val());
                $('#edit-percent').val($('#percent-'+id).val());

                $('#has-unit').html('Số lượng tối thiểu để nhận giá sỉ cho đơn vị '+$('#name-'+id).val());
                var editid= "'edit'";
                var num_child= $('#num-child-'+id).val();
                $('#form-edit').prop('action', '{{ url('admincp/wholesale/update/') }}'+'/'+id);
                document.getElementById('edit-cate').removeAttribute('hidden');
            }
            function huychild(number, id) {
                var x= confirm('dữ liệu vừa nhập có thể không được giữ lại! bạn có muốn tiếp tục?');
                if( x==true) {
                    var parent = document.getElementById("child"+id);
                    var child = document.getElementById('child-'+id+'-'+number);
                    parent.removeChild(child);
                }
            }
            function huycate(id) {
                var x = confirm('hành động này sẽ hủy các thao tác bạn vừa làm! bạn có tiếp tục?');
                if(x==true){
                    $('#'+id+'-cate').prop('hidden', 'true');
                    var parent = document.getElementById("child"+id);
                    var number = $('#num-child').val();
                    for( var i=1; i<=number; i++){
                        var child = document.getElementById('child-'+id+'-'+ i);
                        parent.removeChild(child);
                    }
                    $('#num-child').val(0);
                    $('#btnadd').show();
                    return true;
                }
                else {
                    return false;
                }
            }
        </script>
    </div>
</div>


@endsection