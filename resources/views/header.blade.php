<header class="header" id="header">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- top-bar -->
    <section class="top-bar">   
        <div class="container">
            <div class="row ">
                <div class="col-5">
                    <!-- navbar-header -->
                    <div class="menu-mobile-button" id="menu-button"><i class="fas fa-bars"></i></div>

                </div>
                <div class="col-7">
                    <div class="login-out text-right">


                        @guest
                                <a href="#login" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> <span> đăng nhập</span></a>
                            @if (Route::has('register'))
                                <a href="#signUp" data-toggle="modal"><i class="fas fa-user-tag"></i><span> đăng ký</span></a>
                            @endif
                        @else

                                <a href="#">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <a  href="{{ route('logoutuser') }}">
                                    {{ __('Logout') }}
                                </a>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- mid-bar -->
    <section class="mid-bar pt-4 pb-4">
        <div class="container">
            <div class="row">

                <!-- logo -->
                <div class="col-lg-3 logo-col">
                    <div class="logo">
                        <a href="#"><img src="{{ asset('images/logo1.jpg')}}" alt=""></a>
                    </div>
                </div>

                <!-- search-col -->
                <div class="col-lg-4 search-col " style="bottom: 25px;">
                    <div class="header-search">
                        <form action="" class="search-form">
                            <div class="search-form-inner">
                                <!-- search -->
                                <div class="dropdown ">
                                  
                                    <select class="form-control" id="sel1" style="border:none">
                                        <option>Danh mục</option>
                                        <option>Đặc sản </option>
                                        <option>Rau-củ</option>
                                        <option>Trái cây</option>
                                        <option>Thực phẩm tươi</option>
                                    </select>
                                </div>

                                <!-- form -->
                                <div class="form-row">

                                    <div>
                                        <input type="text" placeholder="Nhập sản phẩm cần tìm..." class="form-control">
                                    </div>

                                    <button class="btn btn-primary ">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>

                <!-- support-col -->
                <div class="col-lg-5 support-col" style="bottom: 25px;">
                    @foreach ($contacts as $value)
                    <div class="header-support">
                        <!-- support-box -->
                        <div class="support-box">
                            <div class="icon-phone mr-3">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="text-box text-support">
                                <p class="phone-box m-0"><strong>Hỗ trợ:</strong></p>
                                <p class="tel"><a href="#"><span>{{$value->phone}}</span></a></p>
                            </div>
                        </div>

                        <!-- email-box -->
                        <div class="support-box">
                            <div class="icon-phone mr-3">
                                <i class="fas fa-mail-bulk"></i>
                            </div>
                            <div class="text-box text-email">
                                <p class="phone-box m-0"><strong>Email:</strong></p>
                                <p class="email"><a href="mailto:{{$value->email}}"><span>{{$value->email}}</span></a></p>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>


    <!-- nav-menu -->
    <section class="nav-menu ">

        <div class="container">
            <div class="wrapper-nav">


                <!-- product -->
                <div class="productList">

                    <div class="iconProduct">
                        <h3><i class="fa fa-bars" aria-hidden="true"></i> danh mục sản phẩm</h3>
                    </div>

                    <div class="nav-product animated fadeInLeft">
                        <ul>
                            <li><a href="{{ route('dac-san-vung-mien') }}">đặc sản vùng miền</a></li>
                            <li>
                                <a href="{{ route('rau-cu') }}">rau - củ <span><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></span></a>
                                <ul class="sub-menu-1 animated fadeInRight">
                                    <li><a href="#">rau an toàn</a></li>
                                    <li><a href="#">rau hữu cơ </a></li>
                                    <li><a href="#">rau đặc sản</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('hoa-qua') }}">trái cây <span><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></span></a>
                                <ul class="sub-menu-1 animated fadeInRight">
                                    <li><a href="#">trái cây nhập khẩu</a></li>
                                    <li><a href="#">trái cây trong nước</a></li>


                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('thuc-pham-tuoi-song') }}">thực phẩm tươi sống <span><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></span></a>
                                <ul class="sub-menu-1 animated fadeInRight">
                                    <li><a href="#">hải sản tươi sống</a></li>
                                    <li><a href="#">thực phẩm sơ chế</a></li>
                                    <li><a href="#">thịt sơ chế</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- cart-shop -->
                <div class="cart-shop">
                    <div class="icon-cart">
                        <a href="{{ route('gio-hang') }}"><i class="fas fa-cart-plus" style="font-size: 25px"></i></a>
                    </div>
                </div>

                <!-- main-nav -->
                <div class="main-nav" id="navBar21">
                    <ul class="menu_lv_1">
                        <li><a href="#">trang chủ</a></li>
                        <li>
                            <a href="{{ route('gioi-thieu') }}">giới thiệu <i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="menu_lv_2 animated fadeInUp">
                                <li><a href="{{ route('album-Anh') }}">album ảnh</a></li>
                                <li><a href="{{ route('video-Clip') }}">video clip</a></li>
                                <li><a href="{{ route('doi-Tac') }}">đối tác chiến lược</a></li>
                                <li><a href="{{ route('giay-Chung-Nhan') }}">giấy chứng nhận</a></li>


                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('loaisanpham/all') }}">sản phẩm<i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="menu_lv_2 animated fadeInUp">
                                @foreach($cate_products as $cate)
                                <li><a href="{{ url('loaisanpham/'.$cate->slug) }}">{{ $cate->name }}</a></li>
                               @endforeach
                                {{-- <li><a href="{{ route('rau-cu') }}">rau - củ</a></li>
                                <li><a href="{{ route('hoa-qua') }}">Hoa quả</a></li>
                                <li><a href="{{ route('thuc-pham-tuoi-song') }}">Thực phẩm tươi</a></li>--}}
                            </ul>
                        </li>
                        <li>
                            <a > tin tức <i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="menu_lv_2 animated fadeInUp">

                                @foreach($cate_news as $value)
                                    <li><a href="{{ url('tintuc').'/'.$value->slug}}">{{$value->name}}</a></li>
                                @endforeach
                                {{--<li><a href="{{ route('am-thuc') }}">ẩm thực</a></li>--}}
                                {{--<li><a href="{{ route('truyen-thong-bao-chi') }}">truyền thông báo chí</a></li>--}}
                                {{--<li><a href="{{ route('kien-thuc') }}">kiến thức</a></li>--}}

                            </ul>
                        </li>

                        <li>
                            <a > thực đơn <i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                            <ul class="menu_lv_2 animated fadeInUp">

                                @foreach($cate_menu as $value)
                                    <li><a href="{{ url('thucdon').'/'.$value->slug}}">{{$value->name}}</a></li>
                                @endforeach


                            </ul>
                        </li>
                        <li><a href="{{ route('lich-hang') }}">lịch hàng</a></li>
                        <li><a href="{{ route('khuyen-mai') }}">khuyến mãi</a></li>
                        <li><a href="{{ route('tuyen-dung') }}">tuyển dụng</a></li>
                        <li><a href="{{ route('lien-he') }}">liên hệ</a></li>
                    </ul>
                </div>


            </div>
        </div>

    </section>

    <!-- mobile-menu -->
    <section class="menu-mobile" id="menu-mobile">
     <div class="menu-mobile-bg" id="bg-mobile"></div>
        <div class="menu-mobile-box" >
            <div class="menu-mobile-info">

            </div>
            <div class="menu-mobile-content">
                <div class="menu-left">
                    <div class="menu-left-title">
                        <h3>Menu</h3>
                    </div>
                    <div class="menu-left-content">

                        <ul class="menu-left-ul-lv-1">
                            <li><a href="#">Trang chủ</a></li>

                            <li>
                                <a href="#">Giới thiệu</a>
                                <i class="fas fa-plus icon-plus"></i>
                                <ul class="menu-left-ul-lv-child menu-child">
                                    <li><a href="#">Giới thiệu công ty </a></li>
                                    <li><a href="#">Album ảnh</a></li>
                                    <li><a href="#">Video clip</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">Sản phẩm</a>
                                <i class="fas fa-plus icon-plus"></i>
                                <ul class="menu-left-ul-lv-child menu-child">
                                    <li><a href="{{ route('dac-san-vung-mien') }}">Đặc sản vùng miền</a></li>
                                    <li><a href="{{ route('dac-san-vung-mien') }}">Rau - củ </a></li>
                                    <li><a href="{{ route('hoa-qua') }}">Trái - cây</a></li>
                                    <li><a href="{{ route('thuc-pham-tuoi-song') }}">Thực phẩm tươi</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">Tin tức</a>
                                <i class="fas fa-plus icon-plus"></i>
                                <ul class="menu-left-ul-lv-child menu-child">
                                    <li><a href="#">Ẩm thực</a></li>
                                    <li><a href="#">Truyền thông báo chí </a></li>
                                    <li><a href="#">Kiến thức</a></li>
                                    
                                </ul>
                            </li>

                            <li class="lienhe-led">
                                <a href="#">Khuyến mại</a>
                            </li>
                            <li class="lienhe-led">
                                <a href="#">Lịch hàng</a>
                            </li>
                            <li class="lienhe-led">
                                <a href="#">Thực đơn</a>
                            </li>
                            <li class="lienhe-led">
                                <a href="#">Tuyển dụng</a>
                            </li>
                            <li class="lienhe-led">
                                <a href="#">Liên hệ</a>
                            </li>
                        </ul>

                    </div> <!-- menu-left-content -->
                </div> <!-- menu-left -->

            </div>
        </div>

    </section>

    <!-- login -->
    <section>
        <div class="modal fade" id="login">
            <div class="modal-dialog">
                <div class="modal-content login-custom-form">
                    <form action="{{ route('loginuser') }}" method="post">
                    @csrf
                    <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-centerz" style="text-shadow: 1px 1px 3px;font-size: 30px;">Login</h4>
                            <button type="button" class="close" data-dismiss="modal" style="margin-top:-40px;font-size: 65px;color: red;">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class=" w3l-form-group" style="padding-bottom:10px;">
                                <label>Username:</label>
                                <input id="login_email" type="email" class="form-control backgroundinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label>Password:</label>
                            <div class=" w3l-form-group">

                                <div class="pass">
                                    <input id="inputpassword" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--                            <div class="showpass"><i class="fa fa-eye" aria-hidden="true" onclick="showpass()"></i></div>--}}

                            </div>
                            <div class="forgot" style="padding: 5px 0;font-size:13px;">
                                <a href="#" style="color:blue;margin-bottom:5px;">Forgot Password?</a>
                                <div>
                                    <p>
                                        <span style="padding-right:10px;"><input type="checkbox"> Remember Me</span>
                                        <span><input type="checkbox" onclick="showPass()"> Show Password</span>
                                    </p>
                                </div>
                                <script>
                                    function showPass() {
                                        var x = document.getElementById('inputpassword');
                                        if (x.type === 'password') {
                                            x.type = 'text';
                                        } else {
                                            x.type = 'password';
                                        }
                                    }
                                    function checkEmail(obj) {
                                        var x = obj.value;
                                        var vitri = x.search("@");
                                        if (vitri === 0) {
                                            alert('"@" cannot be at the beginning of the string');
                                            obj.focus();
                                        } else if (vitri === x.length - 1) {
                                            alert('"@" cannot be at the the end of the string');
                                            obj.focus();
                                        } else if (vitri === -1) {
                                            alert('Please include "@" in the email address');
                                            obj.focus();
                                        } else {
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-block btn-success">Login</button>

                        </div>
                    </form>
                    <div style="text-align: center;margin-bottom:20px;">Don't you have an account? <a  target="_blank" class="btn" style="color:blue;font-size:15px;" data-dismiss="modal" data-toggle="modal" data-target="#signUp">Create Account</a></div>
                </div>
            </div>
        </div>
    </section>

    <!-- sign up -->
    <section>
        <div class="modal fade" id="signUp">
            <div class="modal-dialog">
                <div class="modal-content login-custom-form">
                    <div class="modal-header" >
                        <h4 class="modal-title text-center" style="text-shadow: 1px 1px 3px;font-size: 30px;">Create Account</h4>
                        <button type="button" class="close" data-dismiss="modal" style="margin-top:-40px;font-size:65px;color: red;">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('createuser') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control backgroundinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @if($errors->first('email')!=null)
                                        <script>
                                            alert("{{ $errors->first('email') }}");
                                        </script>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  onchange="lengthPasswword(this)">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div id="lengthpass" style="color: red; font-size: 15px"></div>
                                    <script>
                                        function lengthPasswword(obj) {
                                            var x = obj.value;
                                            if (x.length < 8) {
                                                document.getElementById('lengthpass').style.display = 'block';
                                                document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
                                            } else {
                                                document.getElementById('lengthpass').style.display = 'none';
                                            }
                                        }
                                    </script>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-9">
                                    <input id="password-confirm" type="password" class="form-control backgroundinput" name="password_confirmation" required autocomplete="new-password" onchange="confirmPasswword(this)">
                                    <p id="errorpass" style="color: red; font-size: 15px"></p>
                                    <script>
                                        function confirmPasswword(obj) {
                                            var y = document.getElementById('password').value;
                                            var x = obj.value;
                                            if (x != y) {
                                                document.getElementById('errorpass').style.display = 'block';
                                                document.getElementById('errorpass').innerHTML = '<span>Confirm Pass word ís not correct</span>';
                                            } else {
                                                document.getElementById('errorpass').style.display = 'none';
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" value="Register" class="btn btn-block btn-warning float-right login_btn">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- back to top -->
    <section>
        <a href="#" id="goTop" class="bd-circle t-center"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </section>





</header>

