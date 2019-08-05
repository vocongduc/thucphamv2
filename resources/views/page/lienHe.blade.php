@extends('master-layout')

@section('content')


<!-- san pham -->
<main id="lien-he" class="mt-5">
    <div class="container">
        
            <!-- hàng 1 -->
            <div class="row ">
        
                <!-- bản đồ -->
                <div class="col-md-12">
                    <h5>BẢN ĐỒ</h5>
                    <iframe class="mt-2"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14894.285133003395!2d105.77032909999998!3d21.04983335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1562837184570!5m2!1svi!2s"
                        frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
            </div>

            <!-- hàng 2 -->
            <div class="row ">
                <!-- Phần thông tin liên hệ -->
                <div class="col-left col-md-4 mt-3 ">
                    <div class="panel panel-defaul panel-no-border ">
                        <div class="panel-heading mt-2">
                            <div class="panel-title">
                                <h4>LIÊN HỆ</h4>
                            </div>
                        </div>
                        
                        <div class="panel-body mt-3">
                            <p style="font-size: 15px ; line-height: 30px;font-family:Arial,Helvetica,sans-serif;">
                                <strong>{{$thongtin->name}}</strong>
                                <br>
                                <strong>Địa chỉ:</strong> {{$thongtin->address}}
                                <br>
                                <strong>Giấy chứng nhận ĐKKD:</strong> {{$thongtin->certificate}}
                                <br>
                                <strong>Email:</strong> <a  style="color:blue" href="mailto:{{$thongtin->email}}">{{$thongtin->email}}</a>
                                <br>
                                <strong>Facebook:</strong> <a target="_blank" style="color:blue" href="{{$thongtin->fblink}}">{{$thongtin->fblink}}</a>
                                <br>
                                <strong>Website:</strong> <a target="_blank" style="color:blue" href="{{$thongtin->website}}">{{$thongtin->website}}</a>
                                <hr>

                            </p>
                            <p style="font-size: 15px ; line-height: 30px;font-family:Arial,Helvetica,sans-serif;">
                                <i class="fa fa-home"></i> {{$thongtin->address}}
                                <br>
                                <i class="fa fa-phone"></i> {{$thongtin->phone}}
                                <br>
                                <i class="fa fa-envelope"></i> <a  style="color:blue" href="mailto:{{$thongtin->email}}">{{$thongtin->email}}</a>
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Phần gửi ý kiến -->
                <div class="col-right col-md-8 mt-3">
                    <div class="panel panel-defaul panel-no-border ">
                        <div class="panel-heading mt-2">
                            <div class="panel-title">
                                <h4>GỬI Ý KIẾN CỦA BẠN</h4>
                            </div>
                        </div>
                        <div class="panel-body mt-4">
                            <strong>Hoặc gửi liên hệ cho chúng tôi theo mẫu dưới đây:</strong>
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                    {{ $err }}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <script>
                                    // <div class = "alert alert-success">{{ session('thongbao') }}</div>
                                    alert('{{ session('thongbao') }}');
                                </script>
                            @endif
                            <form action="{{route('store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="inf">
                                        <input class="form-control " name="fullname" type="text" placeholder="Họ và tên *" value="{{old('fullname')}}">
                                    </div>
                                    <div class="inf">
                                        <input class="form-control " name="phone" type="text" placeholder="Sđt *" value="{{old('phone')}}">
                                    </div>
                                    <div class="inf">
                                        <input class="form-control" name="email" type="email" placeholder="Email *" value="{{old('email')}}">
                                    </div>
                                    <div class="inf">
                                        <input class="form-control" name="title" type="text" placeholder="Tiêu đề *" value="{{old('title')}}">
                                    </div>
                                    <div class="content-inf mt-5">
                                        <textarea class="form-control" rows="5" placeholder="Nội dung liên hệ *" name="content">{{old('content')}}</textarea>
                                    </div>
                                    <span style="font-size: 14px ; color: red">Dấu * là phần không được để trống</span>
                                    <div class="btn-submit-form mt-3">
                                        <button type="submit" class="btn btn-sendcontact mt-10 mb-10" >Gửi liên hệ</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


       

    </div>
</main>

@endsection