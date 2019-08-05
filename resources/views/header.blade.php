<header class="header" id="header">


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
                        <a href="#login" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> <span> đăng nhập</span></a>
                        <a href="#signUp" data-toggle="modal"><i class="fas fa-user-tag"></i><span> đăng ký</span></a>
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
                    <div class="header-support">
                        <!-- support-box -->
                        <div class="support-box">
                            <div class="icon-phone mr-3">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="text-box text-support">
                                <p class="phone-box m-0"><strong>Hỗ trợ:</strong></p>
                                <p class="tel"><a href="#"><span>0967.26.88.26</span></a></p>
                            </div>
                        </div>

                        <!-- email-box -->
                        <div class="support-box">
                            <div class="icon-phone mr-3">
                                <i class="fas fa-mail-bulk"></i>
                            </div>
                            <div class="text-box text-email">
                                <p class="phone-box m-0"><strong>Email:</strong></p>
                                <p class="email"><a href="#"><span>cskh@mytammart.vn</span></a></p>
                            </div>
                        </div>

                    </div>

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
                            <a href="{{ route('san-pham') }}">sản phẩm<i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="menu_lv_2 animated fadeInUp">
                                <li><a href="{{ route('dac-san-vung-mien') }}">đặc sản vùng miền</a></li>
                                <li><a href="{{ route('rau-cu') }}">rau - củ</a></li>
                                <li><a href="{{ route('hoa-qua') }}">Hoa quả</a></li>
                                <li><a href="{{ route('thuc-pham-tuoi-song') }}">Thực phẩm tươi</a></li>


                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('tin-tuc') }}"> tin tức <i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="menu_lv_2 animated fadeInUp">
                                <li><a href="{{ route('am-thuc') }}">ẩm thực</a></li>
                                <li><a href="{{ route('truyen-thong-bao-chi') }}">truyền thông báo chí</a></li>
                                <li><a href="{{ route('kien-thuc') }}">kiến thức</a></li>

                            </ul>
                        </li>

                        <li><a href="{{ route('thuc-don') }}">thực dơn</a></li>
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
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="text-transform: uppercase;">đăng
                            nhập
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="text-transform: capitalize;">tên tài khoản hoặc địa chỉ email <span
                                        style="color: #d70000;">*</span></label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email" require>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" style="text-transform: capitalize;">mật khẩu <span style="color: #d70000;">*</span>
                                </label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password" require>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Ghi nhớ mật khẩu</label>
                            </div>
                            <button type="submit" class="btn btn-primary" style="text-transform: uppercase;">đăng
                                nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- sign up -->
    <section>
        <div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="text-transform: uppercase;">đăng ký
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="text-transform: capitalize;">tên tài khoản <span
                                        style="color: #d70000;">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" require>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" style="text-transform: capitalize;">địa chỉ email <span
                                        style="color: #d70000;">*</span></label>
                                <input type="email" class="form-control" id="exampleInputEmail1" require>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1" style="text-transform: capitalize;">mật khẩu <span style="color: #d70000;">*</span>
                                </label>
                                <input type="password" class="form-control" id="exampleInputPassword1" require>
                            </div>
                            <button type="submit" class="btn btn-primary" style="text-transform: uppercase;">đăng
                                ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- back to top -->
    <section>
        <a href="#" id="goTop" class="bd-circle t-center"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </section>





</header>

