@extends('master-layout')

@section('content')



<div class="" id="detailfood">
    <div class="container-fluid" style="margin: 30px 10px">
      <div class="row">
        <!-- ảnh sản phẩm bên trái -->
        <div class="col-md-5">
          <div class="big_item">
            <img src="https://i.ebayimg.com/00/s/MTAyNFg3Njg=/z/bKkAAOSwAzxcCth8/$_86.JPG"
              style="width: 99%; height: 640px">
          </div>
          <div class="item">
            <img src="https://i.ebayimg.com/00/s/MTAyNFg3Njg=/z/bKkAAOSwAzxcCth8/$_86.JPG"
              style="width: 96px; height:97px">
            <img src="https://i.ebayimg.com/00/s/MTAyNFg3Njg=/z/bKkAAOSwAzxcCth8/$_86.JPG"
              style="width: 96px; height:97px">
            <img src="https://i.ebayimg.com/00/s/MTAyNFg3Njg=/z/bKkAAOSwAzxcCth8/$_86.JPG"
              style="width: 96px; height:97px">
            <img src="https://i.ebayimg.com/00/s/MTAyNFg3Njg=/z/bKkAAOSwAzxcCth8/$_86.JPG"
              style="width: 96px; height:97px">
            <img src="https://i.ebayimg.com/00/s/MTAyNFg3Njg=/z/bKkAAOSwAzxcCth8/$_86.JPG"
              style="width: 96px; height:97px">
          </div>
        </div>
        <!-- nội dung sản phẩm bên phải -->
        <div class="col-md-7">
          <div class="product-summary">
            <h1 class="product-name">Rau Bò Khai</h1>
            <!-- sao + đánh giá -->
            <div class="rate-star-product">
              <div class="rating-stars">
                <span class="star">
                  <i class="far fa-star"></i>
                </span>
                <span class="star">
                  <i class="far fa-star"></i>
                </span>
                <span class="star">
                  <i class="far fa-star"></i>
                </span>
                <span class="star">
                  <i class="far fa-star"></i>
                </span>
                <span class="star">
                  <i class="far fa-star"></i>
                </span>
              </div>
              <em class="totalRating inline-block">(0 đánh giá)</em>
            </div>
            <!-- trạng thái: còn hàng -->
            <p class="product-status">
              <span class="product-code">
                <span>Mã:</span><span class="text"> RBK1</span>
              </span>
              <span class="statustext-danger">
                <i class="fas fa-check"></i> Còn hàng
              </span>
            </p>
            <!-- chi tiết sản phẩm -->
            <div class="product-brief">
              <p>
                <strong>Mercedes-Benz </strong> là một trong những hãng sản xuất xe ô tô, xe buýt, xe tải danh tiếng
                trên thế giới.
                Hãng được xem là hãng sản xuất xe hơi lâu đời nhất còn tồn tại đến ngày nay.<br /><br />
                Nguồn gốc ban đầu của hãng được xem là phát triển từ hai nhánh hoàn toàn độc lập nhau. Năm 1883, Karl
                Benz thành lập "Benz & Co.
                Rheinische Gasmotorenfabrik Mannheim" (Nhà máy động cơ khí Rhein Mannheim Benz & Co.). Năm 1886,
                hãng đã cho ra đời những chiếc xe đầu tiên mang nhãn hiệu Benz Patent Motorwagen. Chỉ trong 15 năm sau
                đó,
                hãng đã trở thành một trong những nhà máy sản xuất xe hơi lớn nhất trên. <br /> <br />
                DMG quyết định sử dụng tên Mercedes là thương hiệu cho sản xuất ô tô của hãng và chính thức đăng ký
                thương quyền vào ngày 26.<br />
                <strong> Benz Patent Motorwagen</strong><br />
                <strong> Gasmotorenfabrik Mannheim </strong><br />
                <strong> Liên hệ mua hàng:0967.26.88.26</strong><br />
                <strong>https://www.facebook.com/mytammart.com.vn/</strong><br />
              </p>
            </div>
            <!-- hashtag -->
            <div class="tags-group">
              <span class="tag_item"> <i class="fas fa-tag"></i> tags
              </span>
              <span class="tag_item"> <a href="" style="color: #656565;">mescerdes</a></span>
              <span class="tag_item"> <a href="" style="color: #656565;">ford</a></span>
            </div>

            <br/>             
            <hr/>

            <div>
              <div class="price" >
                  <strong class=" text-danger" >78.000</strong>
                  <sup>đ</sup>
                  <span class="p-unit">/Kg</span>
              </div>
              
              <div class="add-to-cart" style="padding-top:10px">
                <div class="btn-qty">
                <!-- <span class="qty-plus qty-button" onclick="changeQty('gt');return false;"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
                <span class="qty-minus qty-button" onclick="changeQty('lt');return false;"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                </div> -->
                <input type="text" name="fields[orderQuantity]" id="qty" maxlength="12" value="1" title="Số lượng" class="input-text qty" style="width:70px">
                 &nbsp;Kg 
                <a href="javascript:;" title="Thêm vào giỏ hàng" class="button btn-cart" onclick="addToCart('59a649fb333085254b68079b');" ><i class="fa fa-plus" aria-hidden="true"></i><span>Thêm vào giỏ hàng</span></a>
                </div>
                <br/>
                <br/>
               
            </div>
            <hr>
            <div class="icon"> Chia sẻ :
                <a href=""><i class="fab fa-twitter-square" style="color: #282"></i></a>
                <a href=""><i class="far fa-thumbs-up" style="color: #282"></i></a>
                <a href=""><i class="fas fa-share-alt-square" style="color: #282"></i></a>
    
              </div>

      
            <!-- <div>
                <p class="special-price">
                  <span class="price text-danger">265.000</span>
                  <sup>đ</sup>
                  <span class="p-unit">/Kg</span>    
                </p>
                <div>
                  <span><i class="fas fa-angle-down"></i></span>
                  <span><i class="fas fa-angle-up"></i></span>
                    
                </div>
              <a href=""><i class="fas fa-plus"></i>
                <span>Thêm vào giỏ hàng</span>
              </a>
            </div> -->
            <br/>
          
          </div>
        </div>
      </div>
    </div>
    <div class="detail-product">
      <div style="padding: 6px 15px 18px;">
        <p><strong>Chi tiết sản phẩm</strong></p>
        <p>Củ sen đây là phần cắm sâu xuống lớp bùn đen chỉ được thu hoạch khi hồ sen đã héo tàn, nhưng
          lại là món thuốc quý với sức khỏe con người.</p>

        <p><strong>Củ sen</strong> là phần cắm sâu xuống lớp bùn đen chỉ được thu hoạch khi hồ sen đã héo
          tàn, nhưng lại là món thuốc quý với sức khỏe con người.</p>

        <p>Tác dụng của <strong>Củ sen</strong> tươi có vị bùi, giòn có thể ăn sống hoặc nấu chín tùy theo
          khẩu vị của mỗi người. Theo Trung y, muốn trị bệnh máu cam hiệu quả tốt nhất là ăn củ sen vì
          củ sen có tác dụng làm mát máu, mát gan, điều hòa kinh mạch, lưu thông khí huyết.</p>

        <p>Củ sen còn là món ăn giàu dinh dưỡng, tăng cường chức năng của tim, bao tử và cho giấc ngủ tốt.
          Cách chọn và bảo quản: Chọn những củ vừa tầm tròn thuôn đều. Nếu muốn chọn củ có hàm lượng
          tinh bột cao thì chọn củ có mặt cắt 7 lỗ, hàm lượng nước ít, mềm, dẻo thích hợp cho món canh.
          Còn những củ với mặt cắt là 9 lỗ thì hàm lượng nước cao, ròn thích hợp cho món xào, sa-lát.
          Củ sen nếu chưa chế biến ngay để nguyên củ ở nơi thoáng. Sau khi gọt lớp vỏ bên ngoài củ sen
          thường bị thâm vì vậy phải ngâm vào nước lạnh có pha giấm khoảng 5 – 10 phút rồi tráng qua nước
          lạnh để củ sen trắng và giòn. Từ món xào, chiên đến những tô canh hầm, củ sen đều cho bạn
          những món ăn ngon và bổ dưỡng.</p>

        <p style="font-style: italic;"><strong>Củ sen tươi có bán tại các cửa hàng thuộc hệ thống MyTamMart</strong></p>

        <p>Công ty Thực phẩm sạch MyTamMart cung cấp các mặt hàng rau, củ, hoa quả, thực phẩm sạch, thực phẩm an toàn.
          Quý khách có nhu cầu xin liên hệ:</p>

        <p><strong>Công ty TNHH thực phẩm sạch MyTamMart Việt Nam</strong><br>
          <strong>Ship hàng toàn quốc</strong><br>
          <strong>Liên hệ mua hàng: 0967.26.88.26</strong><br>
          <strong>https://www.facebook.com/mytammart.com.vn</strong></p>
      </div>
    </div>

    <div class="detail-product" style="margin-top: 25px">
      <div style="padding: 6px 15px 18px;font-size: 14px">
        <strong>Thông tin khác</strong>
        <p>CÔNG TY THỰC PHẨM SẠCH MYTAMMART VIỆT NAM Địa chỉ:  A11, Ngõ 100, Đường Trung Kính, Phường Yên Hòa, Quận Cầu Giấy Giấy chứng
          nhận ĐKKD: 0104567410 do sở kế hoạch và đầu tư Thành phố Hà Nội cấp ngày 14.4.2010</p>
      </div>
    </div>

    <div style="margin: 15px 15px">
      <div class="float-left"><strong>0 Comments</strong></div>
      <div class="float-right">
        <span>Sort By</span>
        <div class="btn-group">
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            Oldest
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Newest</a>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <hr>

    <div style="margin: 10px 15px">
      <div class="row">
        <div class="col-1">
          <img src="./img/people_icon.png" style="width:70px">
        </div>
        <div class="col-11">
          <div class="form-group" style="margin-top: 15px">
            <input type="text" class="form-control form-control-lg" placeholder="Add a commend...">
          </div>
        </div>
      </div>
    </div>
    <hr>

    <div id="fb-cmt"  style="padding-left:15px">
      <i class="fab fa-facebook"></i>
      <a target="_blank" href="">Facebook Comments Plugin</a>
    </div>
    <div id="list-product">

      <div class="list-product-top text-center">
        <h5 style="margin: 20px 0 30px 0">ĐỀ XUẤT CHO BẠN</h5>
      </div>
      <div class="list-product-body">

        <div class="row" style="padding:15px">

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="padding:15px">

          <div class="col-md-2" >
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="product-images">
              <a href="#"><img src="https://biggreen.vn/publish/thumbnail/20366/400x400xdefault/upload/20366/20171005/bo_booth_dac_biet58.jpg"></a>
            </div>
            <div class="product-content text-center">
              <div class="product-rating">
                <span class="rating-box">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="count-user-rate">
                  (0 đánh giá)
                </span><br>
                <span class="product-status" style="color: green;font-weight: 500">
                  Còn hàng
                </span>
              </div>
              <div class="product-title">
                <a href="{{ route('san-pham-chi-tiet') }}" title="Chanh vàng Nam Phi">Chanh vàng Nam Phi</a>
              </div>
              <div class="product-price">
                <span style="color: red;font-weight: bold;">126.000 VNĐ/Kg</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="list-product-bottom">
        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link">
              <i class="fas fa-angle-double-left"></i>
            </a></li>
          <li class="page-item"><a class="page-link">1</a></li>
          <li class="page-item"><a class="page-link">2</a></li>
          <li class="page-item"><a class="page-link">3</a></li>
          <li class="page-item"><a class="page-link">4</a></li>
          <li class="page-item"><a class="page-link">5</a></li>
          <li class="page-item"><a class="page-link">
              <i class="fas fa-angle-double-right"></i>
            </a></li>
        </ul>
      </div>
    </div>
  </div>

  @endsection