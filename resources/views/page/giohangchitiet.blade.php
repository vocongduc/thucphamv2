@extends('master-layout')

@section('content')


<div class="bg-light mt-0">
    <div class="container ">
        <div class="pt-5 pl-3">
             <h3 >GIỎ HÀNG </h3>
        </div>

        <div class="row  m-1">
            <div class="col-md-8 ">
                <div class="row box-sp mb-3">
                    <div class="col-md-3 p-3">
                        <img src="http://nongsandungha.com/wp-content/uploads/2017/02/ot-chuong-xanh.jpg" alt="">
                    </div>

                    <div class="col-md-6 p-3">
                        <h4>Ớt xanh ớt đỏ Đà Lạt</h4>
                        <a href="">Xóa sản phẩm</a>
                    </div>
                    <div class="col-md-3 p-3">
                        <h4>50.000 VND</h4>
                    </div>
                </div>

                <div class="row box-sp mb-3 ">
                    <div class="col-md-3 p-3">
                        <img src="http://nongsandungha.com/wp-content/uploads/2017/02/ot-chuong-xanh.jpg" alt="">
                    </div>

                    <div class="col-md-6 p-3">
                        <h4>Ớt xanh ớt đỏ Đà Lạt</h4>
                        <a href="">Xóa sản phẩm</a>
                    </div>
                    <div class="col-md-3 p-3">
                        <h4>50.000 VND</h4>
                    </div>
                </div>
            </div>



            <div class="col-md-4 ">
                <div class="box-sp p-3"><h4>Thành tiền</h4>
                    <h4 class="text-danger">100.000 VND</h4>
                </div>
                <a href="{{ route('dia-chi-giao-hang') }}" class="btn btn-danger btn-block mt-3">Tiến hành đặt hàng</a>
            </div>
        </div>
    </div>
</div>
@endsection