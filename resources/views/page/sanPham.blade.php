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
                @foreach($cate_products as $cate)
                    <li class="list-group-item ">
                        <a href="{{ url('loaisanpham/'.$cate->slug) }}">{{ $cate->name }}</a>
                        <div class="dropdown-menu">
                            <ul>
                                @foreach($cate_product_lv2 as $cate_lv2)
                                    <hr>
                                    <li><a href="" class="dropdown-item">{{ $cate_lv2->name }}</a></li>
                               @endforeach

                            </ul>
                        </div>
                    </li>
                @endforeach
                    {{--<li class="list-group-item">
                        <a href="{{ route('dac-san-vung-mien') }}">Đặc sản vùng miền</a>
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
                   
                    </li>--}}
                    <li class="list-group-item titles">NHÃN HIỆU</li>
                </ul>

                <!-- Khoảng giá -->
                <ul class="list-group list-group-flush mt-3 price">
                    <li class="list-group-item titles ">KHOẢNG GIÁ</li>

                    <div class="checkbox checkbox-primary mt-3">
                        <input  name="scope" type="radio" value="0,100000" onclick="gia(this)">
                        <label for="price_26_1" class="radilabe">Dưới 100.000</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input  name="scope" type="radio" value="100000,500000" onclick="gia(this)">
                        <label for="price_26_1" class="radilabe">Từ 100.000 VNĐ tới 500.000 VNĐ</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input  name="scope" type="radio" value="500000,1000000" onclick="gia(this)">
                        <label for="price_26_1" class="radilabe">Từ 500.000 VNĐ tới 1000.000 VNĐ</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input  name="scope" type="radio" value="1000000,5000000" onclick="gia(this)">
                        <label for="price_26_1" class="radilabe">Từ 1000.000 VNĐ tới 5.000.000 VNĐ</label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input  name="scope" type="radio" value="5000000," onclick="gia(this)">
                        <label for="price_26_1" class="radilabe">Trên 5.000.000 VNĐ</label>
                    </div>
                </ul>
                <script>
                    function gia(obj) {
                        //alert(obj.value);
                                    @isset($cate)
                            var cate= {{ $cate->id }};
                                    @else
                            var cate='';
                            @endisset
                            // alert(obj.value);
                            var x= obj.value.split(',');
                            //alert(x[0]+x[1]);
                            var agrs = {
                                url: "{{ route('gia') }}", // gửi ajax đến file result.php
                                type: "post", // chọn phương thức gửi là post
                                dataType: "text", // dữ liệu trả về dạng text
                                data: { // Danh sách các thuộc tính sẽ gửi đi
                                    _token: '{{ csrf_token() }}',
                                    cate_id: cate,
                                    min: x[0],
                                    max: x[1]
                                },
                                success: function (result) {

                                    $('#product').html(result);
                                }
                            };
                            $.ajax(agrs);
                    }
                </script>

            </div>
            <!-- cột bên phải -->
            <div class="col-right col-xs-12 col-md-9 col-sm-8 mt-3">
                <h3 style="font-weight: bold;">SẢN PHẨM</h3>
                <div class="row select mt-3">
                    <div class="col-md-4">
                        <div class="mt-2">Sắp xếp theo: </div>
                        <div class="select-1">
                            <select class="form-control" onchange="sapxep(this)">
                                <option value="pay,desc">Bán Chạy Nhất</option>
                                <option value="sale,desc">Giá, Tăng Dần</option>
                                <option value="sale,asc">Giá, Giảm Dần</option>
                                <option value="name,desc">Thứ tự, A-Z</option>
                                <option value="name,asc">Thứ tự, Z-A</option>
                                <option value="id,asc">Cũ Nhất</option>
                                <option value="id,desc">Mới Nhất</option>
                            </select>
                            <script>
                                function sapxep(obj) {
                                    var x= obj.value.split(',');
                                            @isset($cate->id)
                                    var cate_id= {{ $cate->id }};
                                            @else
                                    var cate_id= "";
                                    @endisset
                                    //alert(cate_id);

                                    var agrs = {
                                        url: "{{ url('sapxep/') }}", // gửi ajax đến file result.php
                                        type: "post", // chọn phương thức gửi là post
                                        dataType: "text", // dữ liệu trả về dạng text
                                        data: { // Danh sách các thuộc tính sẽ gửi đi
                                            _token: '{{ csrf_token() }}',
                                            collections: null,
                                            cate_id: cate_id,
                                            value: x[0],
                                            method: x[1],
                                        },
                                        success: function (result) {
                                            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                                            // đó vào thẻ div có id = result
                                            $('#product').html(result);

                                        }
                                    };

                                    // Truyền object vào để gọi ajax
                                    $.ajax(agrs);
                                }

                            </script>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mt-2">Hiển thị: </div>
                        <div class="select-1">
                            <select class="form-control" id="sel1" onchange="hienthi(this)">
                                <option>Mặc định</option>
                                <option value="0">0</option>
                                <option value="3">5</option>
                                <option value="10">10</option>
                            </select>
                            <script>
                                function hienthi(obj) {
                                    //alert(obj.value);
                                        alert(obj.value);
                                                @isset($cate_parents)
                                        var cate= {{ $cate_parents->id }};
                                                @else
                                        var cate='';
                                        @endisset
                                        // alert(obj.value);
                                        var x= obj.value.split(',');
                                        //alert(x[0]+x[1]);
                                        var agrs = {
                                            url: "{{ route('hienthi') }}", // gửi ajax đến file result.php
                                            type: "post", // chọn phương thức gửi là post
                                            dataType: "text", // dữ liệu trả về dạng text
                                            data: { // Danh sách các thuộc tính sẽ gửi đi
                                                _token: '{{ csrf_token() }}',
                                                cate_id: cate,
                                                number: obj.value
                                            },
                                            success: function (result) {
                                                $('#product').html(result);
                                            }
                                        };
                                        $.ajax(agrs);
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- show ảnh sản phẩm -->
                <div class="row">
                    <div class="col-item col-xs-12 col-sm-4 col-md-12 col-mb-12  item-block show-product" id="product">
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
                                <a href="{{ url('sanpham/'.$value->slug) }}">{{ $value->name }}</a>
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
    <script>
        function addcart(obj) {
            // alert(obj.value);
            var x= obj.value.split(',');
            //alert(x[0]+x[1]);
            var agrs = {
                url: "{{ route('addcart') }}", // gửi ajax đến file result.php
                type: "post", // chọn phương thức gửi là post
                dataType: "text", // dữ liệu trả về dạng text
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    _token: '{{ csrf_token() }}',
                    cate_id: cate,
                    min: x[0],
                    max: x[1]
                },
                success: function (result) {

                    $('#product').html(result);
                }
            };
            $.ajax(agrs);
        }
    </script>


@endsection




