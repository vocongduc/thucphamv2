@extends('master-layout')

@section('content')


<div class="bg-light mt-0">
    <div class="container ">
        <div class="pt-5 pl-3">
             <h3 >Tiến hành đặt hàng </h3>
        </div>

        <div class="row">
            <div class="col-md-8 thanhtoan">
                <ul class="list-group mb-3">

                    <li class="list-group-item  bg-light"><h4>1. Địa chỉ <span class="text-danger">(*)</span></h4></li>
                    <li class="list-group-item ">
                        <label for="customRadio1" class="d-block"><input type="radio" id="customRadio1" name="receive" value="0" checked=""> <strong>Giao hàng tận nơi</strong></label>
                        <input type="text" class="form-control m-3" name="fullname" placeholder="Địa chỉ">  
                        <label for="customRadio2"><input type="radio" id="customRadio2" name="receive" value="1"><strong> Nhận hàng tại cửa hàng (Cơ sở 1: Nhà số 11 ngõ 100 đường Trung Kính quận Cầu Giấy Tp. Hà Nội)</strong></label>
                    </li>
                </ul>

                <ul class="list-group mb-3">

                    <li class="list-group-item  bg-light"><h4>2. Nhập thông tin cá nhân <span class="text-danger">(*)</span></h4></li>
                    <li class="list-group-item ">
                    <label for="fullname"><strong>Họ tên <span class="text-danger"> (Bắt buộc)</span></strong></label>
                    <input type="text" class="form-control m-3" name="fullname" placeholder="">  
                    <label for="fullname"><strong>Điện thoại <span class="text-danger"> (Bắt buộc)</span></strong></label>
                    <input type="text" class="form-control m-3" name="fullname" placeholder=""> 
                    <label for="fullname"><strong>Email </strong></label>
                    <input type="text" class="form-control m-3" name="fullname" placeholder=""> 
                    
                </li>
                </ul>


                <ul class="list-group mb-3">

                    <li class="list-group-item  bg-light"><h4>3. Thông tin thêm </h4></li>
                    <li class="list-group-item ">
                    <label for="fullname"><strong>Ngày nhận hàng</strong></label>
                    <input type="text" class="form-control m-3" name="fullname" placeholder="">  
                    <label for="fullname"><strong>Ghi chú </strong></label>
                    <input type="text" class="form-control m-3" name="fullname" placeholder=""> 
                    

                    </li>
                    </ul>
            </div>

            <div class="col-md-4">
            <div class="box-sp p-3"><h4>Thành tiền</h4>
                    <h4 class="text-danger">100.000 VND</h4>
                </div>
                <a href="" class="btn btn-danger btn-block mt-3">Đặt ngay</a>
            </div>
        </div>
    </div>
</div>

@endsection