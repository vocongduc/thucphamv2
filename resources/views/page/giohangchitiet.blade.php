@extends('master-layout')

@section('content')


<div class="bg-light mt-0">
    <div class="container ">
        <div class="pt-5 pl-3">
             <h3 >GIỎ HÀNG </h3>
        </div>

        <div class="row  m-1">
            <div class="col-md-8 ">
                @foreach($carts as $key => $item)
                    <div class="row box-sp mb-3 ">
                    <div class="col-md-3 p-3">
                        <img src="{{ asset('images/img/'.$item->attributes->image) }}" alt="">
                    </div>

                    <div class="col-md-6 p-3">
                        <h4>{{ $item->name }}</h4>
                        <h5>Số lượng: {{ $item->quantity }}</h5>
                        <a href="">Xóa sản phẩm</a>
                    </div>
                    <div class="col-md-3 p-3">
                        <h4>{{ number_format($item->price) }}đ</h4>
                    </div>
                </div>
                @endforeach
            </div>



            <div class="col-md-4 ">
                <div class="box-sp p-3"><h4>Thành tiền</h4>
                    <h4 class="text-danger">{{ number_format($tong) }}đ</h4>
                </div>
                <a href="{{ route('thanhtoan') }}" class="btn btn-danger btn-block mt-3">Tiến hành đặt hàng</a>
            </div>
        </div>
    </div>
</div>
@endsection