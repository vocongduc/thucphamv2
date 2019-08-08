@extends('master-layout')

@section('content')



    <div class="container-fluid">
        <div class="content">
            <div class="content-head">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
                    <li class="breadcrumb-item"><a href="#">Kiến Thức</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="content-left-text" style="padding-left:15px">

                        <!--noi dung -->

                        <h4>{!!  $news->name!!}</h4>
                        <div>
                            <time>{{ $news->created_at }}</time>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary btn-sm" style="font-size: 10px;border: none"><i
                                        class='fab fa-twitter'></i> Tweet
                            </button>
                            <button type="button" class="btn btn-info btn-sm"
                                    style="background-color: #3a5795;font-size: 10px;border: none;"><i
                                        class='fab fa-facebook-f'></i> Like
                            </button>
                            <button type="button" class="btn btn-info btn-sm"
                                    style="background-color: #3a5795;font-size: 10px;border: none;">Share
                            </button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="brief"><p><span style="font-size:16px;"><span
                                            style="font-family:Arial, Helvetica, sans-serif;"><strong>{!! $news->summary !!}</strong></span></span>
                            </p>
                            {!! $news->content !!}
                            <p><strong class="float-right" style="font-style: italic;">Theo Báo điện tử đài truyền hình
                                    Việt Nam vtv.vn</strong></p>
                            <div class="clearfix"></div>
                            <hr>
                            <div>
                                <span class="float-left"><i class="fas fa-user"></i><strong> Tác giả:</strong> Thu Hiền </span>
                                <span class="float-right"><i
                                            class="fab fa-font-awesome-flag"></i><strong> Nguồn:</strong> vtv.vn</span>
                            </div>


                            <!--tags -->

                            <div style="margin: 25px 0;">
                                <span class="badge badge-dark"><i class="fas fa-tags"></i> Tags</span>
                                @foreach($news_tags as $tag)
                                    <a href="{{asset('admincp/news/show/').'/'.$news->id}}"
                                       class="badge badge-dark">{{$tag->name}}</a>
                                @endforeach
                            </div>


                            <!--carousel -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection