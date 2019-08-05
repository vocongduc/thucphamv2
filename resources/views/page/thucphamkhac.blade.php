
@extends('master-layout')

@section('content')

<!-- dac san -->
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
                <h3 style="font-weight: bold;">THỰC PHẨM KHÁC</h3>
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
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/trung_chim_tri.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/na_giong_thai.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/trung_chim_tri.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/na_giong_thai.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/trung_chim_tri.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/na_giong_thai.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/trung_chim_tri.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/na_giong_thai.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/trung_chim_tri.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190712/na_giong_thai.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>

                        <div>
                            <img
                                src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180208/dua_kim_hoang_hau68.jpg">
                            <p style="text-align: center;" class="mt-2">
                                <span style="color: #3c763d">Còn hàng</span>
                                <br>
                                <span style="color: #a1a1a1 ; font-size: 12px">(0 đánh giá)</span>
                                <br>
                                <a href="#">Trứng chim trĩ</a>
                                <br>
                                <span style="color: red ; font-weight: bold;">18.000 VNĐ/Quả</span>
                            </p>
                        </div>
                        <!-- thanh phân trang -->
                        <div>
                            <ul class="pagination justify-content-center mt-3">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Trang trước</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Trang sau</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>


@endsection


