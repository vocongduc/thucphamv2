<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">


    <!-- libary style -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">




    <!-- custom style -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/reponsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/Sanpham.css')}}">
    <link rel="stylesheet" href="{{asset('css/Tuyendung.css')}}">
    <link rel="stylesheet" href="{{asset('css/TuyenTruongphong.css')}}">
    <link rel="stylesheet" href="{{asset('css/Lienhe.css')}}">
    <link rel="stylesheet" href="{{asset('css/khuyenmai.css')}}">
    <link rel="stylesheet" href="{{asset('css/lichhang.css')}}">
    <link rel="stylesheet" href="{{asset('css/thucdon1.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('css/khuyenmaichitiet.css')}}">

   



</head>




<body>



    @include('header')
    @yield('content')
    @include('footer')


    <!-- libary js -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/da679a1af2.js"></script>





    <!-- custom js -->
    <script>
    $(document).ready(function() {



        // slider product
        $('.slider-list').owlCarousel({
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        // news slider
        $('#list-news').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        // footer
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [
                "<i class='fa fa-arrow-left' style='font-size:36px'></i>",
                "<i class='fa fa-arrow-right' style='font-size:36px'></i>"
            ],
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        // menu mobile
        $("#menu-button").click(function() {
            $("#menu-mobile").toggleClass("left-in");

        })
        $("#bg-mobile").click(function() {
            $("#menu-mobile").removeClass("left-in");

        })
        
            
        $(".icon-plus").click(function() {
            $(this).next(".menu-child").slideToggle();
        })

        $(".icon-plus-1").click(function() {
            $(this).next(".menu-left-ul-lv-child-1").slideToggle();
        })
        // back to top


        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#goTop').fadeIn();
            } else {
                $('#goTop').fadeOut();
            }




        });

        $('#goTop').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        // facebook


       

        $('#send-our').click(function (e) { 
            $('#fb-page').slideToggle();
            
        });




    });
    </script>

    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>




</body>

</html>