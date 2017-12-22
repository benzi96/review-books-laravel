<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ url('/favicon1.png') }}"/>
        <title>@yield('title') - Pocamon admin</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('css/medium-editor.css') }}">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <link rel="stylesheet" href="{{ url('css/themes/default.css') }}">
        <link rel="stylesheet" href="{{ url('css/medium-editor-insert.css') }}">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
        
        <style>
            table form { margin-bottom: 0; }
            form ul { margin-left: 0; list-style: none; }
            .error { color: red; font-style: italic; }
            body { padding-top: 0px; }
        </style>
    </head>
 
    <body>
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
                 <ul class="nav navbar-nav">
                    <li><a class="font" href="{{ route('admin.posts.index') }}">Quản lí bài đăng</a></li>
                    <li><a class="font" href="{{ route('admin.users.index') }}">Quản lí thành viên</a></li>
                    <li><a class="font" href="{{ url('admin/gallery') }}">Quản lí hình ảnh</a></li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::check() && Auth::user()->isAdmin()==1)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle font" data-toggle="dropdown" role="button" aria-expanded="false"> Admin
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-btn fa-edit"></i>Đăng bài</a></li>
                                <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-btn fa-user"></i>Quản lí thành viên</a></li>
                                <li><a href="{{ url('admin/gallery') }}"> <i class="fa fa-btn fa-camera-retro"></i>Quản lí hình ảnh</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Đăng xuất</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
        <div class="container">
            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
 
            @yield('main')
        </div>
   
    @include('partials.editor')
         
    </body>
 
</html>