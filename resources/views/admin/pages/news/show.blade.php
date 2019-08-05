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

                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="content-left">
                            <div class="content-left-head">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="thumbnail">
                                            <a href="{{ url('admincp/news/detail/'.$news->id) }}">
                                                <img src="{{asset('assets/img_new/').'/'.$news->image}}" >
                                            </a>
                                        </div>
                                        <div class="discription">
                                            <h6>
                                                <a href="{{ url('admincp/news/detail/'.$news->id) }}">{{$news->name}}</a>
                                            </h6>
                                            <small>
                                                <i class='far fa-calendar-alt'></i>
                                                &nbsp;{{$news->created_at}}
                                            </small>
                                            <p>{{$news->summary}}
                                            </p>
                                            <a href="{{  url('admincp/news/detail/'.$news->id) }}"
                                               class="btn btn-outline-success btn-sm">
                                                Đọc tiếp >>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--endrow--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection