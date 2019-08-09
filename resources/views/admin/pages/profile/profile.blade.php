<style>
    .glyphicon-refresh-animate {
        -animation: spin .7s infinite linear;
        -webkit-animation: spin2 .7s infinite linear;
    }

    @-webkit-keyframes spin2 {
        from { -webkit-transform: rotate(0deg);}
        to { -webkit-transform: rotate(360deg);}
    }

    @keyframes spin {
        from { transform: scale(1) rotate(0deg);}
        to { transform: scale(1) rotate(360deg);}
    }
</style>
@extends('admin.layouts.master-layouts')
@section('title','profile')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
<div class="content-wrapper">
    <div class="container-fluid">
    <section class="content-header">
        <h1>
            Admin Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('images/avatar/male.png')}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$admin->name}}</h3>

                        <p class="text-muted text-center">Quản trị viên</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Sản phẩm chờ phê duyệt</b> <a class="pull-right">{{count($products)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tài khoản người dùng</b> <a class="pull-right">{{count($users)}}</a>
                            </li>
                            {{--  <li class="list-group-item">
                              <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>  --}}
                        </ul>

                        <a href="{{route('admin.logout')}}" class="btn btn-primary btn-block"><b>Logout</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
            {{--  <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                  <span class="label label-danger">UI Design</span>
                  <span class="label label-success">Coding</span>
                  <span class="label label-info">Javascript</span>
                  <span class="label label-warning">PHP</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.box-body -->
            </div>  --}}
            <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Sản phẩm</a></li>
                        {{--  <li><a href="#timeline" data-toggle="tab">Tin tức</a></li>  --}}
                        <li><a href="#settings" data-toggle="tab">Tài khoản người dùng</a></li>
                        {{--  <li><a href="#addUser" data-toggle="tab">Thêm tài khoản người dùng</a></li>  --}}
                    </ul>
                    <div class="tab-content">
                        @if ( Session::has('success') )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        <div style="display:none;" id="alert_change_product" class="alert alert-success alert-dismissible">
                            <span id="alert_change"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        <div class="active tab-pane" id="activity">
                            <div class="box-body">
                                <div id="loadding" style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;background:white;opacity:0.8;z-index:99;text-align:center;padding-top:86px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Giá</th>
                                        <th>Sale</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>
                                                <img style="width:50px;" src="{{asset('images/products/'.$product->main_image)}}" alt="{{$product->name}}">
                                            </td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->sale}}</td>
                                            <td>
                                                <?php \Carbon\Carbon::setLocale('vi')?>
                                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffforHumans() !!}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning btnStatus"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Chờ phê duyệt...
                                                    <select onchange="myEventChangeStatus(this,{{$product->id}})" name="" class="selectStatus" style="background-color: #f2f3f3;outline: none;border: none;min-width: 50px;font-size: 13px;border-radius: 3px;color:#333;">
                                                        <option title="Chờ phê duyệt" value="0">Pending</option>
                                                        <option title="Hoạt động" value="1">Active</option>
                                                        <option title="vô hiêu hóa" value="2">Deactive</option>
                                                    </select>
                                                </button>
                                            </td>
                                            <td>
                                                <a href=""><span style="cursor:pointer;" title="sửa" class="badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                                                <a onclick="deleteProduct(this,{{$product->id}})" href="javascript:void(0)" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Sale</th>
                                        <th>Giá</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        {{--  <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                          <div class="box-body">
                            <table class="table table-bordered">
                              <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Tóm tắt</th>
                                <th>Ảnh</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                  <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                  </div>
                                </td>
                                <td><span class="badge bg-red">55%</span></td>
                              </tr>
                            </table>
                          </div>

                        </div>
                        <!-- /.tab-pane -->  --}}

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên tài khoản</th>
                                            <th>Ngày tạo</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        @php
                                            $i=1;
                                        @endphp

                                        @if(count($users)!=0)
                                            @foreach($users as $user)
                                                <tr>
                                                    <input type="hidden" value="{{$user->id}}">
                                                    <td>{{$i++}}.</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        <?php \Carbon\Carbon::setLocale('vi')?>
                                                        {!! \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffforHumans() !!}
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" onclick="getDataUser({{$user->id}})"><span style="cursor:pointer;" title="thay đổi mật khẩu" class="badge bg-light-blue" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></span></a>
                                                        <a onclick="deleteUser(this,{{$user->id}})" href="javascript:void(0)" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        {{--  modal  --}}
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form name="frmUser" method="POST" enctype="multipart/form-data" style="position:relative;">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input id="id_user" type="hidden" name="id_user" value="">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-size:20px;font-weight:500;" class="modal-title" id="exampleModalLabel">Cập nhật tài khoản user</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="position:relative;">
                                                            <div id="status_load" style="position:absolute;top:0;left:0;background:white;width:100%;height:100%;text-align:center;padding-top:86px;display:none;z-index:99;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                                            <label style="width:20%;font-weight:400;vertical-align:-webkit-baseline-middle" for="ac">Tên tài khoản</label>
                                                            <input id="upated_name_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="text" name="name" id="name" disabled><br>

                                                            <label style="width:20%;font-weight:400;display:none;" for="mkn">Avatar</label>
                                                            <div style="display:none;">
                                                                <img id="idAvatar" src="" alt="" style="width: 147px;transform: translateX(80%);border: 2px solid #1b75ce;padding: 2px;">
                                                                <input id="upated_pass_user_avatar" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;margin-top: 25px;transform: translateX(30%);" type="file" name="file" id="avatarUser"><br>
                                                            </div>

                                                            <label style="width:20%;font-weight:400;" for="mkn">Mật khẩu mới</label>
                                                            <input id="upated_repass_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="password" name="repass" required><br>
                                                            <label style="width:20%;font-weight:400;" for="xmkn">Xác nhận mật khẩu</label>
                                                            <input  id="upated_cfpass_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="password" name="cfpass" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button onclick="editUser()" type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </table>
                                </div>
                            </form>
                        </div>

                    {{--  <div class="tab-pane" id="addUser">
                      <form class="form-horizontal">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Name</label>

                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Name</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                          <div class="col-sm-10">
                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>  --}}
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    </div>
</div>
    <!-- /.content -->
    <!-- /.content-wrapper -->
    <script src="{{asset('admin/js/profile.js')}}"></script>
    <script>
        function getDataUser(id){
            let _token =  $('meta[name="csrf-token"]').attr('content');
            document.getElementById('status_load').style.display = 'block';
            $.ajax({
                url: "admincp/profile/account-user-list",
                type: 'POST',
                data:{"id": id,"_token": _token},
                success: function(data){
                    document.getElementById('id_user').value = data.user.id;
                    document.getElementById('upated_name_user').value = data.user.email;
                    //document.getElementById('idAvatar').src =  '{{asset('')}}/images/avatar/'+data.user.avatar;



                    document.getElementById('status_load').style.display = 'none';
                }
            });
        }
        function editUser(){
            let _token =  $('meta[name="csrf-token"]').attr('content');
            document.getElementById('status_load').style.display = 'block';
            let id = document.getElementById('id_user').value;
            let repass = document.getElementById('upated_repass_user').value;
            let confirmpass = document.getElementById('upated_cfpass_user').value;
            if(repass==''|| confirmpass==''){
                alert('bạn chưa nhập mất khẩu mới or xác nhận mật khẩu')
                document.getElementById('status_load').style.display = 'none';
            }else{
                if(repass != confirmpass){
                    alert('xác nhận mật khẩu không trung khớp :((');
                    document.getElementById('status_load').style.display = 'none';
                }else{
                    $.ajax({
                        url: "admincp/profile/account-user-edit",
                        type: 'POST',
                        data:{"id": id,"_token": _token},
                        success: function(data){
                            alert(data.sucsess);
                            {{--  console.log(data.status);  --}}
                            // document.getElementById('id_user').value = data.user.id;
                            //document.getElementById('upated_name_user').value = data.user.email;
                            //document.getElementById('idAvatar').src =  '{{asset('')}}/images/avatar/'+data.user.avatar;


                            document.getElementById('status_load').style.display = 'none';
                        }
                    });
                }
            };


        }
        function deleteUser(obj,id){
            let _token =  $('meta[name="csrf-token"]').attr('content');
            if(confirm('bạn có muốn xóa user này không')){
                let objdel = $(obj).parent().parent();
                $.ajax({
                    url: "admincp/profile/account-user-delete",
                    type: 'POST',
                    data:{"id": id,"_token": _token},
                    success: function(data){
                        alert(data.success);
                        objdel.remove();
                    }
                });
            }
        }

    </script>
@endsection