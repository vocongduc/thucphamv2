@extends('master-layout')
@section('title')
    @isset($cate_parents)
        {{ $cate_parents->name }}
    @else
        Tất Cả Sản Phẩm
    @endif
@endsection
@section('content')

<!-- san pham -->
<main id="sanPham" class="mt-5">
<div class="container">
        <div class="row" >
            <!-- cột bên  trái -->
            <div class="col-left col-xs-12 col-md-3 col-sm-4 mt-3">
            <ul class="list-group list-group-flush dropdown dropright">
                    <li class="list-group-item titles">SẢN PHẨM</li>
                    <li class="list-group-item">
                        <a href="{{ route('dac-san-vung-mien') }}">Đặc sản vùng miền</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="{{ route('rau-cu') }}">Rau-củ</a>
                        <div class="dropdown-menu">
                             <ul>
                                    <li><a href="#" class="dropdown-item">Rau an toàn</a></li>
                                    <hr>
                                    <li><a href="#"class="dropdown-item">Rau hữu cơ </a></li>
                                    <hr>
                                    <li><a href="#" class="dropdown-item">Rau đặc sản</a></li>
                                   
                                </ul>
                        </div>
                    </li>
                    <li class="list-group-item ">
                        <a href="{{ route('hoa-qua') }}">Trái cây</a>
                        <div class="dropdown-menu">
                                <ul>
                                    <li><a href="#" class="dropdown-item">Trái cây trong nước</a></li>
                                    <hr>
                                    <li><a href="#"class="dropdown-item">Trái cây nhập khẩu</a></li>
                                  
                                   
                                </ul>
                        </div>
                    </li>
                    <li class="list-group-item ">
                        <a href="{{ route('thuc-pham-tuoi-song') }}">Thực phẩm tươi sống</a>
                        <div class="dropdown-menu">
                                 <ul>
                                    <li><a href="#" class="dropdown-item">Hải sản tươi sống</a></li>
                                    <hr>
                                    <li><a href="#"class="dropdown-item">Thực phẩm sơ chế</a></li>
                                    <hr>
                                    <li><a href="#" class="dropdown-item">Thịt sơ chế</a></li>
                              
                                </ul>
                        </div>
                    </li>
                    <li class="list-group-item ">
                        <a href="{{ route('thuc-pham-khac') }}">Thực phẩm khác</a>
                   
                    </li>
                    <li class="list-group-item titles">NHÃN HIỆU</li>
                </ul>

                <!-- Khoảng giá -->
                <ul class="list-group list-group-flush mt-3 price">
                    <li class="list-group-item titles ">KHOẢNG GIÁ</li>

                    <div class="checkbox checkbox-primary mt-3">
                        <input id="price_26_1" name="scope" type="checkbox" value="price:[* TO 200000]">
                        <label for="price_26_1" class="radilabe">Dưới 200.000</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="price_26_1" name="scope" type="checkbox" value="price:[* TO 200000]">
                        <label for="price_26_1" class="radilabe">Dưới 200.000</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="price_26_1" name="scope" type="checkbox" value="price:[* TO 200000]">
                        <label for="price_26_1" class="radilabe">Dưới 200.000</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="price_26_1" name="scope" type="checkbox" value="price:[* TO 200000]">
                        <label for="price_26_1" class="radilabe">Dưới 200.000</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="price_26_1" name="scope" type="checkbox" value="price:[* TO 200000]">
                        <label for="price_26_1" class="radilabe">Dưới 200.000</label>
                    </div>
                </ul>

            </div>
            <!-- cột bên phải -->
            <div class="col-right col-xs-12 col-md-9 col-sm-8 mt-3">
                <h3 style="font-weight: bold;">SẢN PHẨM</h3>
                <div class="row select mt-3">
                    <div class="col-md-4">
                        <div class="mt-2">Sắp xếp theo: </div>
                        <div class="select-1">
                            <select class="form-control" id="sel1">
                                <option>Mặc định</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mt-2">Hiển thị theo: </div>
                        <div class="select-1">
                            <select class="form-control" id="sel1">
                                <option>Mặc định</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- show ảnh sản phẩm -->
                <div class="row">
                    <div class="col-item col-xs-12 col-sm-4 col-md-12 col-mb-12  item-block show-product">
                        @foreach($products as $value)
                        <div>
                            <img src="{{ asset('images/img/'.$value->image) }}">
                            <p style="text-align: center;" class="mt-2">
                                @if ($value->quantity > 0)
                                    <span>còn hàng</span>
                                @else
                                    <span>hết hàng</span>
                                @endif
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="{{ route('san-pham-chi-tiet') }}">{{ $value->name }}</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">{{ number_format($value->price_sale) }} VNĐ/{{ $value->unit }}</span>
                            </p>
                        </div>
                        @endforeach
                        <!-- thanh phân trang -->
                     {{--   <div class="content-left-foot" style="padding-top:20px ">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">
                                        <i class='fas fa-angle-left' style='font-size: 17px'></i>
                                        <i class='fas fa-angle-left' style='font-size: 17px'></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">
                                        <i class='fas fa-angle-left' style='font-size: 17px'></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">
                                        <i class='fas fa-angle-right' style='font-size: 17px'></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">
                                        <i class='fas fa-angle-right' style='font-size: 17px'></i>
                                        <i class='fas fa-angle-right' style='font-size: 17px'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>


@endsection




