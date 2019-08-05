 
<footer>

    <!--footer carousel-->
    <section>
        <div class="container">
            <hr>
            <h3 class="text-center" style="margin: 50px 0 10px 0">Đối tác của chúng tôi</h3>
            <hr>
            <div class="text-center">
                <div class="owl-carousel owl-theme">
                    @foreach($partner as $value)
                        <div class="item">
<<<<<<< HEAD
                            <a href="{{$value->link}}"><img src="{{ asset('assets/img_partner/'.$value->logo) }}" alt=""></a>
=======
                            <a target="_blank" href="{{$value->link}}"><img src="assets/img_partner/{{$value->logo}}" alt=""></a>
>>>>>>> 5ad7f501d0e3b0e46940fee34eda5585c37efb98
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

    <!--footer top-->
    <section style="background-color: #f2f2f2">
        <div class="container text-center">
            <div class="row" >
                <div class="col-md-4">
                    <div class="footer-top-item">
                        <span><strong>ĐĂNG KÝ NHẬN TIN KHUYỄN MÃI</strong></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group footer-top-item">
                        <input type="text" class="form-control form-control-lg" placeholder="Nhập email của bạn">
                        <div class="input-group-append">
                            <button class="btn btn-success btn-lg" type="button"
                                    style="border-top-right-radius: 30px; border-bottom-right-radius: 30px; border: 1px solid #28a745;">
                                Đăng kí</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-top-item">
                        <span><strong>THEO DÕI</strong></span>
                        <a href=""><i class="fab fa-facebook"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-google-plus"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube" style="padding: 6px;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--panel-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel">
                        <h5>Về chúng tôi</h5>
                        <ul>
                            <li><a href="">Trang chủ</a></li>
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Sản phẩm</a></li>
                            <li><a href="">Ẩm thực</a></li>
                            <li><a href="">Tin tức</a></li>
                            <li><a href="">Khuyễn mại</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <h5>Hướng dẫn</h5>
                        <ul>
                            <li><a href="">Hướng dẫn mua hàng</a></li>
                            <li><a href="">Giao nhận và thanh toán</a></li>
                            <li><a href="">Đổi trả và bảo hành</a></li>
                            <li><a href="">Đăng ký thành viên</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <h5>Điều khoản dịch vụ</h5>
                        <ul>
                            <li><a href="">Điều khoản sử dụng</a></li>
                            <li><a href="">Điều khoản giao dịch</a></li>
                            <li><a href="">Dịch vụ tiện ích</a></li>
                            <li><a href="">Quyền sở hữu trí tuệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <h5>Chính sách</h5>
                        <ul>
                            <li><a href="">Chính sách vận chuyển</a></li>
                            <li><a href="">Chính sách đổi trả</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--panel 2 Hệ thống cửa hàng thực phẩm sạch-->


    <!--footer-bottom-->
    <section style="background-color: #279c27;">
        <div class="container">
            <div class="row" >
                <div class="col-md-9">
                    <div class="footer-bottom">
                        <p>
                            <span><strong>CÔNG TY THỰC PHẨM SẠCH MYTAMMART VIỆT NAM</strong></span>
                        </p>
                        <p>
                            <span>
                                <strong>Địa chỉ:&nbsp;</strong>A11, Ngõ 100, Đường Trung Kính, Phường Yên Hòa, Quận Cầu Giấy<br>
                                <strong>Giấy chứng nhận ĐKKD:&nbsp;</strong>0104567410 do sở kế hoạch và đầu tư Thành
                                phố Hà Nội&nbsp;cấp ngày 14.4.2010<br>
                                <strong>Email:&nbsp;</strong>cskh@mytammart.vn<br>
                                <strong>Facebook:</strong>&nbsp;mytammart.com.vn<br>
                                <strong>Website:&nbsp;</strong>www.mytammart.vn
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href=""><img alt="" width="200" height="75" src="{{asset('images/hanh/logo-da-thong-bao-voi-bo-cong-thuong.png')}}"
                                    style="margin-top: 20px"></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>

    <!--footer-bottom-link-->

    <section  style="background-color: #1d741d">
        <div class="container">
            <div class="footer-bottom-link">
                <div class="row">
                    <div class="col-md-7 col-xs-12">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a href="">Chính sách bảo mật</a></li>
                            <li class="list-group-item"><a href="">Điều khoản sử dụng</a></li>
                            <li class="list-group-item">
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item" style="color: white;">Bản quyền
                                thuộc về công ty thực phẩm sạch Việt Nam</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- điện thoại -->

    <div class="fixed-bottom" style="padding: 20px 10px">
        <img src="https://teky.edu.vn/wp-content/themes/teky_v2/images/call_me.gif" alt="" style="width:50px ;height: 50px">
    </div>


    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root" style="padding-bottom:60px"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v4.0'
            });
        };
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="105328860809094"
         theme_color="#13cf13">
    </div>





</footer>

