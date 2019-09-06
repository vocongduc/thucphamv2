@extends('master-layout')

@section('title')
    {{ $product->name }}
@endsection
@section('content')


<div class="container mt-4">
  <div class="row">
  <div class="col-md-6 mt-2">
				<div class="product-image owl-carousel owl-theme">
					<div class="product-image-member">
						<img src="{{ asset('images/img/'.$product->main_image) }}" class="img-thumbnail" >
					</div>
                    @foreach($images as $image)
                        @if($image != '')
                        <div class="product-image-member">
                            <img src="{{ asset('images/img/'.$image) }}" class="img-thumbnail">
                        </div>
                        @endif
                    @endforeach
				</div>
				<div id='product-custom-dots' class=' owl-dots mt-4'>
					<div class='owl-dot box-image'>
						<img src="{{ asset('images/img/'.$product->main_image) }}" class="img-fluid">
					</div>
                    @foreach($images as $image)
                        @if($image != '')
                            <div class='owl-dot box-image'>
                                <img src="{{ asset('images/img/'.$image) }}" class="img-fluid">
                            </div>
                        @endif
                    @endforeach

				</div>
      </div>
      

      <div class="col-md-6 pl-5 mt-4">
        <h2 class="ten-sp">{{ $product->name }}</h2>
        <div class="gachchan"></div>
        <h4 class="ten-sp mt-3">{{ number_format($product->price_sale).'₫/'.$product->unit }}</h4>
        <br>
          <button class="btn btn-danger mr-3 pl-3 pr-3" style="font-size: 18px" onclick="mua()">Mua</button>
          <script>
              function mua() {
                  var mua= document.querySelector('#mua');

                  mua.classList.remove('an');
              }
          </script>
          <div id="mua" class="an">
              <hr>
              @if($product->si == 1)
                  <btn class="btn btn-outline-primary  pl-3 pr-3" style="font-size: 18px" onclick="muaxi(1)">Mua sỉ</btn>
              @endif
              <btn class="btn btn-outline-success  pl-3 pr-3" style="font-size: 18px" onclick="muaxi(0)">Mua lẻ</btn>
          </div>
          <br>
          <script>
              function muaxi(value) {
                  var agrs = {
                      url: "{{ route('muaxi') }}", // gửi ajax đến file result.php
                      type: "post", // chọn phương thức gửi là post
                      dataType: "text", // dữ liệu trả về dạng text
                      data: { // Danh sách các thuộc tính sẽ gửi đi
                          _token: '{{ csrf_token() }}',
                          value: value,
                          product_id: {{ $product->id }}
                      },
                      success: function (result) {
                          $('#muasi').html(result);
                      }
                  };
                  $.ajax(agrs);
              }
          </script>
          <hr>
          <div id="muasi">

          </div>
        <br>
        <div class="mt-3 noidung" >
            {!! $product->summary !!}
        </div>
        <div class="product_meta">
        <span class="tagged_as"><a href="https://nongsandungha.com/tu-khoa/dac-san-da-lat" rel="nofollow">Đặc sản Đà Lạt</a>, <a href="https://nongsandungha.com/tu-khoa/ot-chuong-do" rel="nofollow">ớt chuông đỏ</a>, <a href="https://nongsandungha.com/tu-khoa/ot-chuong-vang" rel="nofollow">ớt chuông vàng</a>, <a href="https://nongsandungha.com/tu-khoa/ot-chuong-xanh" rel="nofollow">ớt chuông xanh</a>, <a href="https://nongsandungha.com/tu-khoa/ot-xanh-ot-do-da-lat" rel="nofollow">ớt xanh ớt đỏ Đà Lạt</a></span>
      </div>
      </div>

      <hr>
      <div class="mt-5 p-3">
      <h4>THÔNG TIN THỰC PHẨM</h4>
      <div class="gachchan2"></div>

      <div class="mt-3 noidung" >
        {!! $product->description !!}
      </div>

      <div class="  owl-carousel owl-theme p-3" id="listsp">
            <div class="ok">
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/ca-tim-co-gia-tri-dinh-duong-cao-nhung-cung-de-doc-neu-an-sai-cach-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/2016/11/bau-2-250x250.png" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
            </div>
            

            <div class="ok">
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/2016/11/cai-be-4-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Cải xanh</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/2016/11/cai-be-4-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Cải xanh</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
            </div>

            <div class="ok">
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/2016/11/bau-2-250x250.png" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Bầu</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/ca-tim-co-gia-tri-dinh-duong-cao-nhung-cung-de-doc-neu-an-sai-cach-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
            </div>

            <div class="ok">
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/ca-tim-co-gia-tri-dinh-duong-cao-nhung-cung-de-doc-neu-an-sai-cach-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/2016/06/lo%E1%BA%A1i-2-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Măng tây</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
            </div>

            <div class="ok">
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/ca-tim-co-gia-tri-dinh-duong-cao-nhung-cung-de-doc-neu-an-sai-cach-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/2016/11/do-co-ve-1-250x250.png" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Đỗ</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
            </div>

            <div class="ok">
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/ca-tim-co-gia-tri-dinh-duong-cao-nhung-cung-de-doc-neu-an-sai-cach-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/ca-tim-co-gia-tri-dinh-duong-cao-nhung-cung-de-doc-neu-an-sai-cach-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
            </div>

            <div class="ok">
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/2016/11/bau-2-250x250.png" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
              <div class="mt-3 text-center">
                <a href=""><img src="https://i1.wp.com/nongsandungha.com/wp-content/uploads/ca-tim-co-gia-tri-dinh-duong-cao-nhung-cung-de-doc-neu-an-sai-cach-250x250.jpg" alt=""></a>
                <h4 class="tensp mt-3"><a href="">Củ cải tím</a></h4>
                <h4 style="color:red">25.000₫</h4>
              </div>
            </div>
           
    
</div>
  </div>
</div>
  @endsection