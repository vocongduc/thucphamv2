@extends('master-layout')

@section('content')
<div class="bg-light ">
    <div class="container ">
        <div class="pt-5 pl-3">
        <h3 >Tiến hành mua hàng </h3>
        </div>
        <div class="row box-sp m-1">
            <div class="col-md-2 p-3">
                <img src="http://nongsandungha.com/wp-content/uploads/2017/02/ot-chuong-xanh.jpg" alt="">
            </div>

            <div class="col-md-10 p-3">
                <h4>Ớt xanh ớt đỏ Đà Lạt</h4>
                <h4 style="color:#ef6e6e"> 55,000 VND</h4>
            </div>
        </div>
        <div class="row mt-4 thongtin">
            <div class="col-md-6  mb-4">
                <ul class="list-group">
                    <li class="list-group-item  bg-light"><h4>1.Tên <span class="text-danger">(*)</span></h4></li>
                    <li class="list-group-item ">
                        <input type="text" class="form-control m-3" name="fullname" placeholder="Tên">  
                    </li>
                    <li class="list-group-item  bg-light"><h4>2. Số điện thoại <span class="text-danger">(*)</span></h4></li>
                    <li class="list-group-item">
                        <input type="text" class="form-control m-3" name="fullname" placeholder="Số điện thoại">  

                    </li>
                    <li class="list-group-item  bg-light"><h4>2-1. Địa chỉ mail </h4></li>
                    <li class="list-group-item">
                    <input type="text" class="form-control m-3" name="fullname" placeholder="Địa chỉ Email">  

                    </li>
                    <li class="list-group-item  bg-light"><h4>3. Đơn vị/Công ty </h4></li>
                    <li class="list-group-item">
                    <input type="text" class="form-control m-3" name="fullname" placeholder="Địa chỉ Công ty">  

                    </li>
                    <li class="list-group-item  bg-light"><h4>4. Địa chỉ <span class="text-danger">(*)</span></h4></li>
                    <li class="list-group-item" style="  border: 1px solid rgba(0,0,0,.125)">
                    <input type="text" class="form-control m-3" name="fullname" placeholder="Địa chỉ ">  

                     </li>
                </ul>   
            </div>

            <div class="col-md-6">
                    <li class="list-group-item  bg-light"><h4>5. Số lượng</h4></li>
                    <li class="list-group-item ">
                        <input type="text" class="form-control m-3" name="fullname" placeholder="Số lượng">  
                    </li>
                    <li class="list-group-item  bg-light"><h4>7. Bạn muốn có hàng vào ngày nào? </h4></li>
                    <li class="list-group-item"  style="  border: 1px solid rgba(0,0,0,.125)">
                        <input type="text" class="form-control m-3" name="fullname" placeholder="Bạn muốn có hàng vào ngày nào?">  

                    </li>
            </div>
            <div class="col-12 mb-3">
                <input type="submit" value="Gửi order" class="btn btn-success btn-block">
            </div>
        </div>
    </div>
</div>
@endsection