<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ url('/favicon1.png') }}"/>
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
      <link href="{{ url ('css/themes/style.css') }}" rel="stylesheet" media="screen">	
    <link href="{{ url ('css/themes/responsive.css') }}" rel="stylesheet" media="screen">	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url ('css/font/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url ('font/font.css') }}">
  


    
    <style>
        body {
            font-family: 'Tahoma';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Pocamon
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Tài khoản</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Đăng nhập</a></li>
                        <li><a href="{{ url('/register') }}">Đăng kí</a></li>
                    @elseif (Auth::check() && Auth::user()->isAdmin()==1)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Admin
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-btn fa-edit"></i>Đăng bài</a></li>
                                <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-btn fa-user"></i>Quản lí thành viên</a></li>
                                <li><a href="{{ url('admin/gallery') }}"> <i class="fa fa-btn fa-camera-retro"></i>Quản lí hình ảnh</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Đăng xuất</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Đăng xuất</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="fix content_area">
				
				<div class="fix top_add_bar">
					<div class="addbar_leaderborard"><img src="{{ url('/images/banner.jpg') }}"/></div>
				</div>
				
				<div class="manu_area">
					<div class="mainmenu menu-wrap wrap">
						<ul id="nav-bottom">
							<li><a href="{{ url('/') }}">Trang chủ</a></li>
							<li><a href="{{ url('/about') }}">Thông tin trang</a></li>
							<li><a href="{{ url('/contact') }}">Liên lạc</a></li>
                            <li><a href="{{ url('/gallery') }}">Thư viện ảnh</a></li>
						</ul>
					</div>
				</div>
                <div class="fix wrap content_wrapper">
                    <div class="fix content">
                        
                        @yield('content')
                        
                        <div class="fix sidebar floatright">
						<div class="fix single_sidebar">
								<h2>Tìm kiếm</h2>
                                <form action="{{ url('/search') }}" method="GET">
                                <input class="search" type="text" name="search" placeholder="Tìm gì bấm vào đây"/>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                </form>
								
						</div>
						<div class="fix single_sidebar">
							<h2>Giới thiệu về trang tin tức</h2>
							<p>Viết bắng laravel 5.2 và sử dụng clean template</p>
						</div>
						<div class="fix single_sidebar">
							<h2>Sẽ thêm sau nếu có thời gian</h2>
							<a href="">photography(5)</a>
						</div>
					</div>
                    </div>
                </div>
                <div class="fix bottom_add_bar">
					<div class="addbar_leaderborard"><img src="{{ url('/images/footer.png') }}"/></div>
				</div>
				
    </div>
    <div class="fix footer_top_area">
			<div class="fix footer_top wrap">
			<div class="fix footer_top_container">
				<div class="fix single_footer floatleft">
					<h2>From Facebook</h2>
					<p>Một xu hướng công nghệ mới, một cuộc cách mạng trong làng công nghệ <br> --tacgia</p>
                    <p>Thật không thể tin được!!!! <br> --tacgia</p>
                    <p>Đúng là dân chuyên<br> --tacgia</p>
				</div>
				<div class="fix single_footer floatleft">
					<h2>useful links</h2>
					<ul>
						<li><a href="{{ url('/') }}">Trang chủ</a></li>
						<li><a href="{{ url('/about') }}">Thông tin trang</a></li>
						<li><a href="{{ url('/contact') }}">Liên lạc</a></li>
					</ul>
				</div>
				
			</div>
			</div>
		</div>
    <div class="fix footer_area">
			<div class="wrap">
			<div class="fix copyright_text floatleft">
				<p>Designed By <a href="http://www.wpfreeware.com" rel="nofollow">Team C06</a></p>
			</div>
			<div class="fix social_area floatright">
				<ul>
					<li><a href="" class="feed"></a></li>
					<li><a href="" class="facebook"></a></li>
					<li><a href="" class="twitter"></a></li>
					<li><a href="" class="drible"></a></li>
					<li><a href="" class="flickr"></a></li>
					<li><a href="" class="pin"></a></li>
					<li><a href="" class="tumblr"></a></li>
				</ul>
			</div>
			</div>
		</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript" src="js/placeholder_support_IE.js"></script>
		<script type="text/javascript" src="js/selectnav.min.js"></script>
		<script type="text/javascript">
			selectnav('nav-top', {
			  label: '-Navigation-',
			  nested: true,
			  indent: '-'
			});
			
			selectnav('nav-bottom', {
			  label: '-Navigation-',
			  nested: true,
			  indent: '-'
			});			
		</script>		
		<script src="http://code.jquery.com/jquery.js"></script>	
    
</body>
</html>
