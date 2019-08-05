@extends('master-layout')


@section('content')

<div class="container" style="padding-top: 75px;">
    <div class="row">
        <div class="col-md-4 offset-md-2">
            <img src="{{ asset('') }}/assets/admin/dist/img/image404.png" alt="" style="width: 130%;">
        </div>
        <div class="col-md-4 offset-md-1">
            <h1 style="color: #007bff">OOPS!</h1>
            {{--<h6 style="margin: 30px 0">Copyright by <span href="" style="text-decoration: none" >NCD</span></h6>--}}
            <h3>404 Trang không tìm thấy</h3>
            <p style="margin: 20px 0 30px 0; color: gray">Sorry, an error has occured, Requested page not found!</p>
            <a href="{{ Route('home') }}"><button class="btn btn-primary" style="border-radius: 25px;">Về trang chủ</button></a>
        </div>
    </div>
</div>

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

@endsection
