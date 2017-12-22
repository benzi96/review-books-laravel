@extends('layouts.clean')

@section('content')
<div class="fix main_content floatleft">
						<div class="single_page_content fix">
							<h1>Chúng tôi là ai?</h1>
							<img src="{{ url('/images/aboutus.jpg') }}" class="single_feature_img" alt=""/>
							<p>Chúng tôi là xu hướng của thời đại mới, dân chuyên trong những dân cuyên</p>
							<br/><blockquote>Trụ sở chúng tôi vô cùng rộng và mát mẻ sử dụng năng lượng mặt trời và gió.
                            Và ở tầng mây thứ 9 là một hồ nước mưa rộng lớn</blockquote>
							<h2>Đây là ảnh của chủ tịch công ty</h2>
							<img src="{{ url('/images/president.png') }}" class="floatleft" style="margin-right:10px;"/>
                            <br>
                            <br>
							<p>Người sở hữu 99% cổ phiếu của halflife company, 50% cổ phiếu của công ty Pocamon chúng tôi</p>
							
						</div>
					</div>	
@endsection