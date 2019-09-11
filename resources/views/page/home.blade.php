@extends('master-layout')

@section('title')
    Thực Phẩm sạch
@endsection
@section('content')

<!-- home -->
<main>
    <!-- slide -->
    <section id="my-carousel" class="carousel slide" data-ride="carousel">

        <!-- indicators -->
        <ul class="carousel-indicators">
            <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
            <li data-target="#my-carousel" data-slide-to="1"></li>
        </ul>

        <!-- content -->
        <div class="carousel-inner">
            @foreach($sliders as $key => $item)
                @if($key==0)
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/slider/'.$item->image)}}" alt="">
                        <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
                @else
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/slider/'.$item->image)}}" alt="">
                        <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
                @endif
            @endforeach
        </div>

        <!-- icon -->
        <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>

    <hr>

    <!-- service -->
    <section class="service pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach($services as $service)
                    <div class="service-1 " style="width:16%">
                        <div class="service-div">
                            <img src="{{ asset('images/services/'.$service->icon) }}" alt="">
                            <div class="text">
                                <h5>{{ $service->name }}</h5>
                                <p>{{ $service->content }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <hr>

    @foreach($cate_parents as $cate_parent)
    <!-- product-1 -->
    <section class="wrapper-product">
        <div class="container">
            <div class="row">

                <!-- colum-left -->
                <div class=" colum-left col-lg-2 nonepadding">
                    <div class="listProd">

                        <div class="panel-title panel-rau-1" style="border-radius:10px 0 0; background-color: {{ $cate_parent->color }} !important;">
                            <div style="color: white; font-size: 16px">
                                <img src="{{ asset('images/cate-icon/'.$cate_parent->image) }}" alt="">
                                {{ $cate_parent->name }}
                            </div>
                        </div>

                        <div class="navProd">
                            <ul>
                                @foreach($cate_childs as $cate_child)
                                    @if($cate_child->cate_lv1_id == $cate_parent->id)
                                        <li><a href="#">{{ $cate_child->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- colum-right -->
                <div class=" colum-right right-1 col-lg-10 nonepadding">
                    <div class="panel-default">
                        <div class="panel-heading heading-1"  style="border-radius: 0 10px 0 0; border-bottom: 2px solid {{ $cate_parent->color }} !important;">
                            <div style="float: right;"><a href="#">Xem thêm</a></div>
                        </div>
                        <div class="panelBody">

                            <div class="product-slider">
                                <!-- owl-carousel -->
                                <div class="slider-list owl-carousel owl-theme owl-loaded owl-drag">

                                @foreach($products as $product)
                                    @if($product->cate_lv1_id == $cate_parent->id)
                                    <!-- item-1 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="{{ asset('images/img/'.$product->main_image) }}" alt=""></a>
                                                    </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    @if ($product->quantity > 0)
                                                        <span>còn hàng</span>
                                                    @else
                                                        <span>hết hàng</span>
                                                    @endif

                                                    <h5><a href="{{ route('sanpham.chitiet', $product->slug) }}">{{ $product->name }}</a></h5>
                                                    <p><strong>{{ number_format($product->price_sale).' VNĐ/'.$product->unit }}</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                   {{-- <!-- item-2 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190118/Cai_bo_xoi_baby_biggreen10.png"
                                                            alt="">
                                                        </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href=""><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171123/mang_tay_xanh_da_lat_175k.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-3 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-4 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>  
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-5 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-6 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-7 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-8 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>--}}


                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endforeach
{{--
    <!-- product-2 -->
    <section class="wrapper-product">
        <div class="container">
            <div class="row">

                <!-- colum-left -->
                <div class=" colum-left col-lg-2">
                    <div class="listProd">

                        <div class="panel-title panel-rau-1" style="border-radius:10px 0 0">
                            <h5>rau - củ</h5>
                        </div>

                        <div class="navProd">
                            <ul>
                                <li><a href="#">rau hữu cơ</a></li>
                                <li><a href="#">rau đặc sản</a></li>
                                <li><a href="#">rau an toàn</a></li>
                                <li><a href="#">rau hữu cơ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- colum-right -->
                <div class=" colum-right right-1 col-lg-10 ">
                    <div class="panel-default">
                        <div class="panel-heading heading-1"  style="border-radius: 0 10px 0 0"></div>
                        <div class="panelBody">

                            <div class="product-slider">
                                <!-- owl-carousel -->
                                <div class="slider-list owl-carousel owl-theme owl-loaded owl-drag">

                                    <!-- item-1 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190718/ngo_nu_hoang_do.jpg"
                                                            alt="">
                                                        </a>
                                                    </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>còn hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">đậu hà lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171011/Cu_sen_tuoi39.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-2 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190118/Cai_bo_xoi_baby_biggreen10.png"
                                                            alt="">
                                                        </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href=""><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171123/mang_tay_xanh_da_lat_175k.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-3 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-4 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>  
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-5 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-6 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-7 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-8 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- product-3-->
    <section class="wrapper-product">
        <div class="container">
            <div class="row">

                <!-- colum-left -->
                <div class=" colum-left col-lg-2">
                    <div class="listProd">

                        <div class="panel-title panel-rau-1" style="border-radius:10px 0 0">
                            <h5>rau - củ</h5>
                        </div>

                        <div class="navProd">
                            <ul>
                                <li><a href="#">rau hữu cơ</a></li>
                                <li><a href="#">rau đặc sản</a></li>
                                <li><a href="#">rau an toàn</a></li>
                                <li><a href="#">rau hữu cơ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- colum-right -->
                <div class=" colum-right right-1 col-lg-10 ">
                    <div class="panel-default">
                        <div class="panel-heading heading-1"  style="border-radius: 0 10px 0 0"></div>
                        <div class="panelBody">

                            <div class="product-slider">
                                <!-- owl-carousel -->
                                <div class="slider-list owl-carousel owl-theme owl-loaded owl-drag">

                                    <!-- item-1 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190718/ngo_nu_hoang_do.jpg"
                                                            alt="">
                                                        </a>
                                                    </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>còn hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">đậu hà lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171011/Cu_sen_tuoi39.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-2 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190118/Cai_bo_xoi_baby_biggreen10.png"
                                                            alt="">
                                                        </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href=""><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171123/mang_tay_xanh_da_lat_175k.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-3 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-4 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>  
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-5 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-6 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-7 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-8 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- product-4 -->
    <section class="wrapper-product">
        <div class="container">
            <div class="row">

                <!-- colum-left -->
                <div class=" colum-left col-lg-2">
                    <div class="listProd">

                        <div class="panel-title panel-rau-1" style="border-radius:10px 0 0">
                            <h5>rau - củ</h5>
                        </div>

                        <div class="navProd">
                            <ul>
                                <li><a href="#">rau hữu cơ</a></li>
                                <li><a href="#">rau đặc sản</a></li>
                                <li><a href="#">rau an toàn</a></li>
                                <li><a href="#">rau hữu cơ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- colum-right -->
                <div class=" colum-right right-1 col-lg-10 ">
                    <div class="panel-default">
                        <div class="panel-heading heading-1"  style="border-radius: 0 10px 0 0"></div>
                        <div class="panelBody">

                            <div class="product-slider">
                                <!-- owl-carousel -->
                                <div class="slider-list owl-carousel owl-theme owl-loaded owl-drag">

                                    <!-- item-1 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190718/ngo_nu_hoang_do.jpg"
                                                            alt="">
                                                        </a>
                                                    </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>còn hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">đậu hà lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171011/Cu_sen_tuoi39.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-2 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20190118/Cai_bo_xoi_baby_biggreen10.png"
                                                            alt="">
                                                        </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href=""><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171123/mang_tay_xanh_da_lat_175k.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-3 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-4 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>  
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-5 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-6 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="{{ route('san-pham-chi-tiet') }}"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="{{ route('san-pham-chi-tiet') }}">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-7 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <!-- item-8 -->
                                    <div class="item">

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrap-item-slide-colum text-center">
                                            <div class="slide-colum-1">

                                                <div class="product-list-img">
                                                <div class="thumbnail">
                                                    <a href="{{ route('san-pham-chi-tiet') }}"><img
                                                            src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20180224/Rau_an_Banh_trang_phoi_suong_Trang_Bang.jpg"
                                                            alt=""></a>
                                                </div>
                                                    <div class="action animated zoomIn">
                                                        <ul>
                                                            <li><a class="buy" href="#">Mua hàng</a></li>
                                                            <li><a class="view" href="#"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="product-list-text">
                                                    <span>Còn Hàng</span>
                                                    <h5><a href="#">Đậu Hà Lan ăn quả</a></h5>
                                                    <p><strong>11.000/VND</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <hr>

    <!-- tin tuc - su kien -->
    <section class="news pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- title -->
                    <div class="news-title text-center">
                        <h3>TIN TỨC VÀ SỰ KIỆN</h3>
                    </div>

                    <!-- slider new -->
                    <div class="slider-news">
                        <div class="owl-carousel owl-theme owl-loaded owl-drag" id="list-news">

                            <!-- item-1 -->
                            <div class="item">

                                <div class="news-img">
                                    <a href="#"><img
                                            src="https://biggreen.vn/publish/thumbnail/20366/256x144xdefault/upload/20366/20190114/48982029_1628211580612408_5496795047745552384_n.jpg"
                                            alt=""></a>
                                </div>

                                <div class="news-text">
                                    <h4><a href="#">Sinh tố lá hẹ, củ sen bồi bổ cơ thể, phòng chống ung thư .</a></h4>
                                    <p class="icon-text-news"><i class="fa fa-user" aria-hidden="true"></i> biggreen/ 21,may,2019</p>
                                    <p class="main-text">Sinh tố lá hẹ và củ sen có tác dụng vừa bồi bổ cơ thể, an thần, chống suy nhược, vừa được coi là một trong những bài thuốc phòng chống ung thư hữu hiệu..</p>
                                </div>
                            </div>

                            <!-- item-2 -->
                            <div class="item">

                                <div class="news-img">
                                    <a href="#"><img
                                            src="https://biggreen.vn/publish/thumbnail/20366/256x144xdefault/upload/20366/20180320/cu_cai_trang_trang_viet_me_linh.jpg"
                                            alt=""></a>
                                </div>

                                <div class="news-text">
                                    <h4><a href="#">Lạc quan với tương lai hợp tác nông nghiệp giữa Hà Nội và Fukuoka.</a></h4>
                                    <p class="icon-text-news"><i class="fa fa-user" aria-hidden="true"></i> biggreen/ 21,may,2019</p>
                                    <p class="main-text">Thành phố Hà Nội và tỉnh Fukuoka nên hợp tác phát triển nông nghiệp đô thị, hiện đại, công nghệ cao, công nghệ sạch hiệu quả trong môi trường nông nghiệp quy mô nhỏ.</p>
                                </div>
                            </div>

                            <!-- item-3 -->
                            <div class="item">

                                <div class="news-img">
                                    <a href="#"><img
                                            src="https://biggreen.vn/publish/thumbnail/20366/256x144xdefault/upload/20366/fck/files/h%E1%BB%A3p%20t%C3%A1c%20fukuoka1.jpg"
                                            alt=""></a>
                                </div>

                                <div class="news-text">
                                    <h4><a href="#">Ngày hội thủy sản các tỉnh lưu vực sông Đà tại Hà Nội  .</a></h4>
                                    <p class="icon-text-news"><i class="fa fa-user" aria-hidden="true"></i> biggreen/ 21,may,2019</p>
                                    <p class="main-text">Ngày hội thủy sản các tỉnh lưu vực sông Đà tại Hà Nội” sẽ diễn ra từ ngày ngày 20/04/2018, tại Trung tâm Xúc tiến Đầu tư, Thương mại, Du lịch TP. Hà Nội (số 35 -Tạ Quang Bửu).</p>
                                </div>
                            </div>

                            <!-- item-4 -->
                            <div class="item">

                                <div class="news-img">
                                    <a href="#"><img
                                            src="https://biggreen.vn/publish/thumbnail/20366/256x144xdefault/upload/20366/20190114/48982029_1628211580612408_5496795047745552384_n.jpg"
                                            alt=""></a>
                                </div>

                                <div class="news-text">
                                    <h4><a href="#">Những lý do bạn nên chọn Dâu Tây giống Nhật của chúng tôi .</a></h4>
                                    <p class="icon-text-news"><i class="fa fa-user" aria-hidden="true"></i> biggreen/ 21,may,2019</p>
                                    <p class="main-text">Để giúp người tiêu dùng hiểu biết đúng về giá trị và công dụng của Đông Trùng Hạ Thảo thực phẩm sạch BigGreen chia sẻ thông tin để quý khách hàng hiểu rõ hơn về tác dụng của Đông Trùng Hạ Thảo.</p>
                                </div>
                            </div>

                            <!-- item-5 -->
                            <div class="item">

                                <div class="news-img">
                                    <a href="#"><img
                                            src="https://biggreen.vn/publish/thumbnail/20366/256x144xdefault/upload/20366/20190114/48982029_1628211580612408_5496795047745552384_n.jpg"
                                            alt=""></a>
                                </div>

                                <div class="news-text">
                                    <h4><a href="#">Tìm hiểu công dụng lợi ích của Đông Trụng Hạ Thảo.</a></h4>
                                    <p class="icon-text-news"><i class="fa fa-user" aria-hidden="true"></i> biggreen/ 21,may,2019</p>
                                    <p class="main-text">Để giúp người tiêu dùng hiểu biết đúng về giá trị và công dụng của Đông Trùng Hạ Thảo thực phẩm sạch BigGreen chia sẻ thông tin để quý khách hàng hiểu rõ hơn về tác dụng của Đông Trùng Hạ Thảo.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
<div class="container text-center" style="margin-top:10px;padding-top:10px;border-top: black dotted 1px">
    {{ $cate_parents->links() }}
</div>
    

</main>

@endsection