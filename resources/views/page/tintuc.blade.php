@extends('master-layout')

@section('content')

    <!-- tin tuc -->
    <main>
        <div class="container">
            <div class="content">
                <div class="content-head">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
                        <li class="breadcrumb-item"><a href="#">{{$cate_name->name}}</a></li>

                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="content-left">
                            <div class="content-left-head">
                                <div class="row">
                                    @foreach($news as $key=> $value)
                                        @if($value->status == 1 )
                                            @if($value->focus == 1 && $key < 2)
                                                <div class="col-md-6">
                                                    <div class="thumbnail">
                                                        <a href="{{ url('tintuc'.'/'.$cate_name->slug.'/'.$value->slug) }}">
                                                            <img src="{{asset('assets/img_new').'/'.$value->image}}">
                                                        </a>
                                                    </div>
                                                    <div class="discription">
                                                        <h6>
                                                            <a href="{{ url('tintuc'.'/'.$cate_name->slug.'/'.$value->slug) }}">{{$value->name}}</a>
                                                        </h6>
                                                        <small>
                                                            <i class='far fa-calendar-alt'></i>
                                                            &nbsp;{{$value->created_at}}
                                                        </small>
                                                        <p>{!!  substr($value->summary, 0, 150).'...'!!}
                                                        </p>
                                                        <a href="{{  url('tintuc'.'/'.$cate_name->slug.'/'.$value->slug) }}"
                                                           class="btn btn-outline-success btn-sm">
                                                            Đọc tiếp >>
                                                        </a>
                                                    </div>
                                                </div>

                                            @endif
                                        @endif

                                    @endforeach
                                </div>

                            </div>
                            <div>
                                @foreach($news as $value)
                                    {{--Trem--}}
                                    @if($value->status == 1)
                                        <div class="content-left-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="thumbnail">
                                                        <img src="{{asset('assets/img_new/').'/'.$value->image}}"
                                                             alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div>
                                                        <h6>
                                                            <a href="{{ url('tintuc'.'/'.$cate_name->slug.'/'.$value->slug) }}">{{$value->name}}</a>
                                                        </h6>
                                                        <small><i class='far fa-calendar-alt'></i>
                                                            &nbsp;{{$value->created_at}}
                                                        </small>
                                                        <p>{!!  substr($value->summary, 0, 150).'...'!!}</p>
                                                        <a href="{{  url('tintuc'.'/'.$cate_name->slug.'/'.$value->slug)}}"
                                                           class="btn btn-outline-success btn-sm">
                                                            Đọc tiếp >>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div style="float: right" align="right">
                                    {{$news->links()}}
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="content-right">
                            <div class="list-group">
                                <h5 class="list-group-item">DANH MỤC NỘI DUNG</h5>
                                <a href="#" class="list-group-item list-group-item-action">Giới thiệu công ty
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Album ảnh
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Video clip
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Đối tác chiến lược
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Giấy chứng nhận
                                </a>
                            </div>
                            <br>
                            <div class="list-group">
                                <h5 class="list-group-item">GIỚI THIỆU</h5>
                                <a href="#" class="list-group-item list-group-item-action">Giới thiệu công ty
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Album ảnh
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Video clip
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Đối tác chiến lược
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Giấy chứng nhận
                                </a>
                            </div>
                            <br>
                            <div class="list-group">
                                <h5 class="list-group-item">THỐNG KÊ TRUY CẬP</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class='fas fa-clipboard-list float-left'
                                           style='font-size: 20px; color: #21252994'></i>
                                        <span class="float-left"> &nbsp;Hôm nay :</span>
                                        <span class="float-right">67</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class='fas fa-clipboard-list float-left'
                                           style='font-size: 20px; color: #21252994'></i>
                                        <span class="float-left"> &nbsp;Hôm qua :</span>
                                        <span class="float-right">90</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class='fas fa-clipboard-list float-left'
                                           style='font-size: 20px; color: #21252994'></i>
                                        <span class="float-left"> &nbsp;Tháng 07 :</span>
                                        <span class="float-right">782</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class='fas fa-clipboard-list float-left'
                                           style='font-size: 20px; color: #21252994'></i>
                                        <span class="float-left"> &nbsp;Last Month</span>
                                        <span class="float-right">4.016</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class='fas fa-clipboard-list float-left'
                                           style='font-size: 20px; color: #21252994'></i>
                                        <span class="float-left"> &nbsp;Năm 2019 :</span>
                                        <span class="float-right">36.507</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class='fas fa-clipboard-list float-left'
                                           style='font-size: 20px; color: #21252994'></i>
                                        <span class="float-left"> &nbsp;Last Year</span>
                                        <span class="float-right">36.507</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class='fas fa-chart-bar float-left'
                                           style='font-size: 20px; color: #21252994'></i>
                                        <span class="float-left"> &nbsp;Tổng số :</span>
                                        <span class="float-right">58.865</span>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <div class="list-group">
                                <h5 class="list-group-item">FACEBOOK</h5>
                                <ul class="list-group">
                                    {{--<li class="list-group-item"--}}
                                    {{--style="background-image: url('images/rau_xanh.jpg'); background-repeat: no-repeat;">--}}
                                    <div>
                                        <img src="images/big_green_logo.png" class="float-left">
                                        <div class="float-left">
                                            <a href="" style="color: white; font-size: 20px;">
                                                Biggreen.com.vn- Rau, quả,...
                                            </a>
                                            <br>
                                            <span style="color: white;">26.850 likes</span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div style="margin: 50px 0;">
                                            <button style='font-size: 15px' class="float-left">
                                                <i class='fab fa-facebook'>&nbsp;Link Page</i>
                                            </button>
                                            <button style='font-size: 15px' class="float-right">
                                                <i class='far fa-comments'>&nbsp;Send Message</i>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    </li>
                                    <li class="list-group-item" style="background-color: #f0f1f2;">
                                        <div class="shadow bg-white"
                                             style="background-color: white; height: 30px; padding: 5px 15px; font-size: 14px;">
                                            Be the first of your friends to like this
                                        </div>
                                    </li>
                                </ul>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection