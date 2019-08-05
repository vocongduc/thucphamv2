@extends('master-layout')

@section('content')

<!-- san pham -->
<main id="tuyenDung" class="mt-5">
    <div class="container">
        <div class="row">
            <!-- thông tin của cột bên  trái -->
            <div class="col-left col-xs-12 col-md-8 col-sm-8">
                <ul class="list-group list-group-flush">
                    @foreach ($recruitment as $value)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img
                                    src="{{asset('assets/img_new').'/'.$value->image}}">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h3 class="job-title"><a href="#">{{$value->title}}</a></h3>
                                <div class="job-position"><i>{{$value->title}}</i></div>
                                <div class="job-bottom row">
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-usd "></span><b>Tiền lương:</b> <br> {{$value->salaryMin}} - {{$value->salaryMax}} VND</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-map-marker "></span> <b>Địa điểm:</b> {{$value->address}}</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                            @if ($value->status == 1)
                                            <b  style="color:green;"> Đang tuyển</b>
                                        @else
                                            <b  style="color:red;"> Hết hạn hồ sơ</b>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                        
                            
                    
                    @endforeach
                    <div style="margin-top: 2%">
                            {{$recruitment->links()}}
                    </div>
                    <hr>
                    {{-- <!-- Tuyển trưởng phòng nhân sự -->
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img
                                    src="https://biggreen.vn/publish/thumbnail/20366/120x80xdefault/upload/20366/20180504/truong_phong_nhan_su.jpg">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h3 class="job-title"><a href="#">Tuyển Trưởng Phòng Nhân Sự</a></h3>
                                <div class="job-position">Trưởng phòng nhân sự</div>
                                <div class="job-bottom row">
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-usd "></span>Tiền lương: 8.000.000 - 10.000.000 VND</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-map-marker "></span> Địa điểm: 113 Hoàng Văn Thái, Thanh
                                            Xuân, Hà Nội</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <b style="color: red"> Đã hết hạn hồ sơ</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Tuyển nhân viên kế toán -->
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img
                                    src="https://biggreen.vn/publish/thumbnail/20366/120x80xdefault/upload/20366/20180505/tuyen_dung_Ke_TOaN_NoI_Bo.png">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h3 class="job-title"><a href="#">Tuyển Nhân Viên Kế Toán Nội Bộ</a></h3>
                                <div class="job-position">Nhân viên kế toán nội bộ</div>
                                <div class="job-bottom row">
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-usd "></span>Tiền lương: 6.000.000 - 7.000.000 VND</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-map-marker "></span> Địa điểm: 113 Hoàng Văn Thái, Thanh
                                            Xuân, Hà Nội</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <b style="color: red"> Đã hết hạn hồ sơ</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- tuyển nhân viên bán hàng -->
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img
                                    src="https://biggreen.vn/publish/thumbnail/20366/120x80xdefault/upload/20366/20180505/TUYeN_BaN_HaNG_KIeM_THU_NGaN.png">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h3 class="job-title"><a href="#">Tuyển Nhân Viên Bán Hàng Kiêm Thu Ngân</a></h3>
                                <div class="job-position">Nhân viên bán hàng kiêm thu ngân</div>
                                <div class="job-bottom row">
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-usd "></span>Tiền lương: 5.000.000 - 7.000.000 VND</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-map-marker "></span> Địa điểm: 44 Ngọc khánh và 109E3 Thái
                                            Thịnh, Hà Nội</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <b style="color: red"> Đã hết hạn hồ sơ</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- tuyển nhân viên bán hàng -->
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img
                                    src="https://biggreen.vn/publish/thumbnail/20366/120x80xdefault/upload/20366/20171026/tuyendung-bg-trang86.png">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h3 class="job-title"><a href="#">Tuyển dụng nhân viên bán hàng tại 44 Ngọc Khánh và
                                        109E3 Thái Thịnh</a></h3>
                                <div class="job-position">Nhân viên bán hàng</div>
                                <div class="job-bottom row">
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-usd "></span>Tiền lương: 4.000.000 - 7.000.000 VND</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-map-marker "></span> Địa điểm: 44 Ngọc khánh và 109E3 Thái
                                            Thịnh, Hà Nội</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <b style="color: red"> Đã hết hạn hồ sơ</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--  tuyển quản lí -->
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img
                                    src="https://biggreen.vn/publish/thumbnail/20366/120x80xdefault/upload/20366/20171026/tuyendung-bg-trang86.png">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <h3 class="job-title"><a href="#">Tuyển dụng Quản lý cửa hàng tại 44 Ngọc Khánh, Ba
                                        Đình, Hà Nội</a></h3>
                                <div class="job-position">Nhân viên bán hàng</div>
                                <div class="job-bottom row">
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-usd "></span>Tiền lương: 6.000.000 - 10.000.000 VND</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <p><span class="fa fa-map-marker "></span> Địa điểm: 44 Ngọc khánh, Ba Đình, Hà
                                            Nội</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <b style="color: red"> Đã hết hạn hồ sơ</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
            <!-- thông tin của cột bên phải -->
            <div class="col-right col-xs-12 col-md-4 col-sm-4">
                <!-- Tin tiêu điểm -->
                <div class="panel panel-defaul panel-no-border">
                    <!-- phần đầu tin -->
                    <div class="panel-heading mt-2">
                        <div class="panel-title">Tin tiêu điểm</div>
                    </div>
                    <!--  phần body chứa các tin bên trong, mỗi tin chứa trong thẻ <li> -->
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">
                            @foreach($news_focus as $value)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4">
                                            <img
                                                    src="{{asset('assets/img_new/').'/'.$value->image}}">
                                        </div>
                                        <div class="col-xs-8 col-sm-8 news-title-1">
                                            <strong><a href="{{ url('admincp/news/detail/'.$value->id) }}">{{$value->name}}</a></strong>
                                            <p><i>{{$value->created_at}}</i></p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <!-- tin xem nhiều -->
                <div class="panel panel-defaul panel-no-border ">
                    <div class="panel-heading mt-2">
                        <div class="panel-title">Tin xem nhiều</div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">
                            @foreach($news_view as $value)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4">
                                            <img
                                                    src="{{asset('assets/img_new/').'/'.$value->image}}">
                                        </div>
                                        <div class="col-xs-8 col-sm-8 news-title-1">
                                            <strong><a href="{{ url('admincp/news/detail/'.$value->id) }}">{{$value->name}}</a></strong>
                                            <p><i>{{$value->created_at}}</i></p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach



                        </ul>
                    </div>
                </div>
                <!-- Liên kết đối tác -->
                <div class="panel panel-defaul panel-no-border ">
                    <div class="panel-heading mt-2">
                        <div class="panel-title">Liên kết đối tác</div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">

                            @foreach($partner as $key =>$value)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4">
                                            <img
                                                    src="assets/img_partner/{{$value->logo}}">
                                        </div>
                                        <div class="col-xs-8 col-sm-8 news-title-2">
                                            <strong><a href="{{$value->link}}">{{$value->name}}</a></strong>
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                        </ul>

                    </div>


                </div>

            </div>
        </div>

    </div>
</main>


@endsection