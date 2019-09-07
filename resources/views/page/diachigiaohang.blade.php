@extends('master-layout')

@section('content')


<div class="bg-light mt-0">
    <div class="container ">
        <div class="pt-5 pl-3">
             <h3 >Tiến hành đặt hàng </h3>
        </div>
        <form action="{{ route('thanhtoan.post') }}" method="post">
            @csrf
        <div class="row">

            <div class="col-md-8 thanhtoan">
                <ul class="list-group mb-3">

                    <li class="list-group-item  bg-light"><h4>1. Địa chỉ <span class="text-danger">(*)</span></h4></li>
                    <li class="list-group-item ">
                        <label for="customRadio1" class="d-block"><input type="radio" id="customRadio1" name="address" value="0" required onclick="diachi()"> <strong>Giao hàng tận nơi</strong></label>
                        <div id="address"></div>
                        <label for="customRadio2"><input type="radio" id="customRadio2" required name="address" value="1" onclick="diachi2()"><strong> Nhận hàng tại cửa hàng (Cơ sở 1: Nhà số 11 ngõ 100 đường Trung Kính quận Cầu Giấy Tp. Hà Nội)</strong></label>
                    </li>
                </ul>

                <ul class="list-group mb-3">

                    <li class="list-group-item  bg-light"><h4>2. Nhập thông tin cá nhân <span class="text-danger">(*)</span></h4></li>
                    <li class="list-group-item ">
                        <label for="fullname"><strong>Họ tên <span class="text-danger"> (Bắt buộc)</span></strong></label>
                        <input type="text" class="form-control m-3" required name="name" placeholder="">
                        <label for="fullname"><strong>Điện thoại <span class="text-danger"> (Bắt buộc)</span></strong></label>
                        <input type="text" class="form-control m-3" required name="phone" placeholder="">
                        <label for="fullname"><strong>Email </strong></label>
                        <input type="text" class="form-control m-3" name="email" placeholder="">
                    </li>
                </ul>


                <ul class="list-group mb-3">

                    <li class="list-group-item  bg-light"><h4>3. Thông tin thêm </h4></li>
                    <li class="list-group-item ">
                    <label for="fullname"><strong>Ngày nhận hàng</strong></label>
                    <input type="date" required class="form-control m-3" name="date" placeholder="">
                    <label for="fullname"><strong>Ghi chú </strong></label>
                    <input type="text" class="form-control m-3" name="content" placeholder="">
                    

                    </li>
                    </ul>
            </div>

            <div class="col-md-4">
            <div class="box-sp p-3"><h4>Thành tiền</h4>
                    <h4 class="text-danger">{{ number_format($tong) }}đ</h4>
                </div>
                <input type="submit" class="btn btn-danger btn-block mt-3" value="Đặt ngay">
            </div>

        </div>
        </form>
    </div>
</div>
    <script>
        function diachi() {
                $('#address').html('<input type="text" required class="form-control m-3" name="diachi" placeholder="Địa chỉ">');
        }
        function diachi2() {
                $('#address').html('');
        }
    </script>

@endsection