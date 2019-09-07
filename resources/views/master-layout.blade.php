<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mỹ Tâm Mart - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">


    <!-- libary style -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-cut.png') }}" />

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

    <link rel="stylesheet" href="{{asset('css/khuyenmaichitiet.css')}}">
    <link rel="stylesheet" href="{{asset('css/sanphamchitiet.css')}}">
    <link rel="stylesheet" href="{{asset('css/dathang.css')}}">

   
    <link rel="stylesheet" href="{{ asset('toastr/css/toastr.css') }}">
<style>
    .an{
        display: none;
    }
</style>
   



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

    <script src="{{ asset('toastr/js/toastr.min.js') }}"></script>

    @if(session('thongbao'))
        <script type="text/javascript">
            toastr.success('{{ session('thongbao') }}', 'Thông báo', {timeOut: 3000});
            toastr.options.progressBar = true;
        </script>
    @endif
    @if(session('error'))
        <script type="text/javascript">
            toastr.error('{{ session('error') }}', 'Thông báo', {timeOut: 3000});
        </script>
    @endif


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
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
     
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
        });
         $('#listsp').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
            });
  

        $(".product-image").owlCarousel({
		items:1,
		loop:true,
		autoplay:true,
		nav:false,
		dots:true,
		dotsContainer:'#product-custom-dots'
	});
	$('.owl-dot').click(function () {
		$(".product-image").trigger('to.owl.carousel', [$(this).index(), 300]);
	});
    
    
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
                    items: 2
                },
                1000: {
                    items: 4
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
    function addcart(obj,id,mua) {
        //alert($('#quantity-'+obj.id).val());
        //alert(mua);
        if($('#quantity-'+obj.id).val()==0){
            toastr.error('Bạn chưa nhập số lượng!', 'Thông báo', {timeOut: 3000});
            toastr.options.progressBar = true;
        }
        else {
            var agrs = {
                url: "{{ url('addcart') }}", // gửi ajax đến file result.php
                type: "post", // chọn phương thức gửi là post
                dataType: "text", // dữ liệu trả về dạng text
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: $('#quantity-' + obj.id).val(),
                    mua: mua
                },
                success: function (result) {
                    $('#result-' + obj.id).html(result);
                }
            };
            $.ajax(agrs);
        }

    }
    </script>

    <div id="fb-root"></div>
{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>--}}




</body>

</html>