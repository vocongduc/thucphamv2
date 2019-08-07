@extends('master-layout')

@section('content')
<main id="tuyen-truong-phong" class="mt-5">
<div class="container " >
		<div class="row">
            <!-- thông tin của cột bên  trái -->
			<div class="col-left col-xs-12 col-md-8 col-sm-8">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<h2 class="title" >{{$chitiet->vitri}}</h2>
						<p class="text-secondary" style="font-size: 14px"><i class="fa fa-clock-o" style="margin-right: 4px"></i>{{\Carbon\Carbon::parse($chitiet->created_at)->diffForHumans()}}</p>
						<div class="col-md-4 col-sm-12" style="font-size: 120%">
							@if ($chitiet->status == 1)
							<b  style="color:green;"> Đang tuyển</b>
						@else
							<b  style="color:red;"> Hết hạn hồ sơ</b>
						@endif
					</div>
					</li>
					<li class="list-group-item">
						<div class="row job-detail">
							<div class="col-md-6 " >
								<p><i class="fa fa-check"></i><strong> Tiền lương:</strong> {{ number_format($chitiet->salaryMin)}} - {{number_format($chitiet->salaryMax)}}</p>
								<p><i class="fa fa-check"></i><strong> Kinh nghiệm:</strong> {{$chitiet->kinhnghiem}}</p>
								<p><i class="fa fa-check"></i><strong> Trình độ học vấn:</strong> {{$chitiet->hocvan}} </p>
								<p><i class="fa fa-check"></i><strong> Số lượng tuyển dụng:</strong> {{$chitiet->soluong}}</p>
								<p><i class="fa fa-check"></i><strong> Vị trí công việc:</strong> {{$chitiet->vitri}}</p>
							</div>
							<div class="col-md-6">
								<p><i class="fa fa-check"></i><strong> Địa điểm làm việc:</strong> {{$chitiet->address}}</p>
								<p><i class="fa fa-check"></i><strong> Vị trí:</strong> {{$chitiet->vitri}}</p>
								<p><i class="fa fa-check"></i><strong> Giờ:</strong> Cố định</p>
								<p><i class="fa fa-check"></i><strong> Yêu cầu giới tính:</strong> Nam/Nữ</p>
								<p><i class="fa fa-check"></i><strong> Yêu cầu độ tuổi:</strong> {{$chitiet->dotuoi}}</p>
							</div>
						</div>
					</li>

	<!-- 	Thông tin tuyển dụng -->
					<li class="list-group-item"><h2 class="title mt-3" >THÔNG TIN TUYỂN DỤNG</h2></li>
					<li class="list-group-item">
						{{-- <div class="row">
							<div class="col-md-4">
								<p>MÔ TẢ CÔNG VIỆC</p>
							</div>
							<div class="col-md-8">
								<img src="https://biggreen.vn/upload/20366/fck/files/tr%C6%B0%E1%BB%9Fng%20ph%C3%B2ng%20nh%C3%A2n%20s%E1%BB%B1(3).jpg" style="width:550px;height:300px;">
								<span >
									- Tham mưu cho Ban Giám Đốc chiến lược hoạch định và chiến lược phát triển nguồn nhân lực của công ty.
									<br>
									- Tham mưu cho giám đốc việc tái cơ cấu tổ chức sao cho phù hợp với sự phát triển của công ty.
									<br>
									- Phối hợp với các Trưởng bộ phận trong việc hoạch định nguồn nhân lực, đánh giá nhân viên, tuyển dụng và xây dựng các quy trình, quy chế… và các hoạt động khác liên quan đến sự phát triển của công ty.
									<br>
									- Xây dựng quy chế lương, thưởng và phúc lợi nhằm khích lệ tinh thần làm việc của nhân viên.
									<br>
									- Tham mưu cho Ban Giám Đốc chiến lược hoạch định và chiến lược phát triển nguồn nhân lực của công ty.
									<br>
									- Tham mưu cho giám đốc việc tái cơ cấu tổ chức sao cho phù hợp với sự phát triển của công ty.
									<br>
									- Phối hợp với các Trưởng bộ phận trong việc hoạch định nguồn nhân lực, đánh giá nhân viên, tuyển dụng và xây dựng các quy trình, quy chế… và các hoạt động khác liên quan đến sự phát triển của công ty.
									<br>
									- Xây dựng quy chế lương, thưởng và phúc lợi nhằm khích lệ tinh thần làm việc của nhân viên.
								</span>
							</div>
						</div>
					</li>
	<!-- quyền lợi  được hưởng -->
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-4">
								<p>QUYỀN LỢI ĐƯỢC HƯỞNG</p>
							</div>
							<div class="col-md-8">
								<ul style="padding-left: 14px">
									<span>
										<li>Mức lương trong khoảng: 8.000.000 đ - 10.000.000 đ (thỏa thuận), tùy thuộc vào năng lực thực tế của ứng viên.</li>
										<li>Hỗ trợ cơm trưa</li>
										<li>Sau thời gian thử việc được tham gia BHXH và các phúc lợi khác tại Công ty.</li>
										<li>Mức lương trong khoảng: 8.000.000 đ - 10.000.000 đ (thỏa thuận), tùy thuộc vào năng lực thực tế của ứng viên.</li>
										<li>Hỗ trợ cơm trưa</li>
										<li>Sau thời gian thử việc được tham gia BHXH và các phúc lợi khác tại Công ty.</li>
									</span>
								</ul>
							</div>
						</div>
					</li>
	<!--phần  yêu cầu khác -->
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-4">
								<p>YÊU CẦU KHÁC</p>
							</div>
							<div class="col-md-8">
								<span >
									<strong>Học vấn và kinh nghiệm:</strong>
									<br>
									- Tốt nghiệp Đại học chuyên ngành Quản lý Hành chính, Quản trị Nhân lực, Luật..và các ngành có liên quan.
									<br>
									- Đã từng trực tiếp thực hiện các công tác như tổ chức hội nghị khách hành, thành lập công ty / chi nhánh, tổ chức hội nghị, hội thảo chuyên đề, tổ chức tiệc công ty, khánh thành,...
									<br>
									<strong>* Kỹ năng cá nhân:</strong>
									<br>
									- Có kỹ năng tốt về công tác quản lý, sắp xếp tổ chức triển khai công việc.
									<br>
									- Có kỹ năng tốt về công tác quản lý, sắp xếp tổ chức triển khai công việc.

								</span>
								
							</div>
						</div>
					</li>
	<!-- phần hồ sơ -->
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-4">
								<p>HỒ SƠ BAO GỒM</p>
							</div>
							<div class="col-md-8">
								<span >
									- Đơn xin việc.
									<br>
									- Sơ yếu lý lịch.
									<br>
									- Hộ khẩu, chứng minh nhân dân và giấy khám sức khỏe.
									<br>
									- Các bằng cấp có liên quan.
								</span>
							</div>
						</div>
					</li> --}}
					{!!$chitiet->content!!}
		<!--Phần thông tin liên lạc -->
					<li class="list-group-item">
						<h2 class="title mt-3" >THÔNG TIN LIÊN LẠC</h2>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-4"><p>NGƯỜI LIÊN HỆ</p></div>
							<div class="col-md-8"><span>{{$chitiet->nguoilienhe}}</span></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-4"><p>ĐỊA CHỈ LIÊN HỆ</p></div>
							<div class="col-md-8"><span>{{$chitiet->address}}</span></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-4"><p>EMAIL LIÊN HỆ</p></div>
							<div class="col-md-8"><span>{{$chitiet->email}}</span></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-4"><p>SDT LIÊN HỆ</p></div>
							<div class="col-md-8"><span>{{$chitiet->sdt}}</span></div>
						</div>
					</li>
				</ul>
            </div>
            

            <!-- thông tin của cột bên  phải -->
			<div class="col-right col-xs-12 col-md-4 col-sm-4">
				<!-- Tin tiêu điểm -->
				<div class="panel panel-defaul panel-no-border">
					<!-- phần đầu tin -->
					<div class="panel-heading mt-2">
						<div class="panel-title">Tin tiêu điểm</div>
					</div>
					<!--  phần body chứa các tin bên trong, mỗi tin chứa trong thẻ <li> -->
					<div class="panel-body">
						<ul class="list-group list-group-flush">
							@foreach($news_focus as $value)
								<li class="list-group-item">
									<div class="row">
										<div class="col-xs-4 col-sm-4">
											<img
													src="{{asset('assets/img_new/').'/'.$value->image}}">
										</div>
										<div class="col-xs-8 col-sm-8 news-title-1">
											<strong><a href="{{ url('admincp/news/detail/'.$value->id) }}">{{$value->name}}</a></strong>
											<p><i>{{$value->created_at}}</i></p>
										</div>
									</div>
								</li>
							@endforeach


						</ul>
					</div>
				</div>
				<!-- tin xem nhiều -->
				<div class="panel panel-defaul panel-no-border ">
					<div class="panel-heading mt-2">
						<div class="panel-title">Tin xem nhiều</div>
					</div>
					<div class="panel-body">
						<ul class="list-group list-group-flush">
							@foreach($news_view as $value)
								<li class="list-group-item">
									<div class="row">
										<div class="col-xs-4 col-sm-4">
											<img
													src="{{asset('assets/img_new/').'/'.$value->image}}">
										</div>
										<div class="col-xs-8 col-sm-8 news-title-1">
											<strong><a href="{{ url('admincp/news/detail/'.$value->id) }}">{{$value->name}}</a></strong>
											<p><i>{{$value->created_at}}</i></p>
										</div>
									</div>
								</li>
							@endforeach



						</ul>
					</div>
				</div>
				<!-- Liên kết đối tác -->
				<div class="panel panel-defaul panel-no-border ">
					<div class="panel-heading mt-2">
						<div class="panel-title">Liên kết đối tác</div>
					</div>
					<div class="panel-body">
						<ul class="list-group list-group-flush">

							@foreach($partner as $key =>$value)
								<li class="list-group-item">
									<div class="row">
										<div class="col-xs-4 col-sm-4">
											<img
													src="assets/img_partner/{{$value->logo}}">
										</div>
										<div class="col-xs-8 col-sm-8 news-title-2">
											<strong><a href="{{$value->link}}">{{$value->name}}</a></strong>
										</div>
									</div>
								</li>
							@endforeach


						</ul>

					</div>


				</div>

			</div>
		</div>
    </div>
    
</main>
@endsection