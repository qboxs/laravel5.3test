<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ url('/css/app1.css') }}" rel="stylesheet">
    <link href="{{ url('/css/theme.css') }}" rel="stylesheet">
    @yield('headLink')
    <script type="text/javascript" src="{{url('/js/jquery-3.1.1.min.js')}}"></script>
    @yield('headScript')
</head>
<body>
<nav class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="icon-user"></i>{{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            <a class="brand" href="{{url('admin')}}"><span class="first">广州</span> <span class="second">佰谦化工</span></a>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-sm-3 col-md-2 sidebar">
            <div class="sidebar-nav">
                <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>Dashboard</div>
                <ul id="dashboard-menu" class="nav nav-list collapse in">
                    <li><a href="{{url('admin')}}">站点设置</a></li>
                    <li><a href="{{url('admin/systemConfig')}}">系统配置</a></li>
                    <li><a href="{{url('admin/webNaviga')}}">网站导航</a></li>
                    <li><a href="{{url('admin/users')}}">系统用户</a></li>
                    <li><a href="{{url('admin/cooperativeAdver')}}">合作广告</a></li>
                    <li><a href="{{url('admin/friendshipLink')}}">友情链接</a></li>
                    <li><a href="{{url('admin/feedback')}}">意见反馈</a></li>
                    <li><a href="{{url('admin/singlePageInfo')}}">单页信息</a></li>
                </ul>
                <div class="nav-header" data-toggle="collapse" data-target="#product-menu"><i class="icon-briefcase"></i>产品中心<span class="label label-info">+10</span></div>
                <ul id="product-menu" class="nav nav-list collapse in">
                    <li ><a href="{{url('admin/productType')}}">产品分类</a></li>
                    <li ><a href="{{url('admin/productInfo')}}">产品信息</a></li>
                </ul>
                <div class="nav-header" data-toggle="collapse" data-target="#usecase-menu"><i class="icon-briefcase"></i>案例应用<span class="label label-info">+10</span></div>
                <ul id="usecase-menu" class="nav nav-list collapse in">
                    <li ><a href="{{url('admin/useCaseType')}}">案例分类</a></li>
                    <li ><a href="{{url('admin/useCaseInfo')}}">案例信息</a></li>
                </ul>

                <div class="nav-header" data-toggle="collapse" data-target="#news-menu"><i class="icon-exclamation-sign"></i>新闻资讯</div>
                <ul id="news-menu" class="nav nav-list collapse in">
                    <li ><a href="{{url('admin/newsType')}}">资讯分类</a></li>
                    <li ><a href="{{url('admin/newsInfo')}}">新闻资讯信息</a></li>
                </ul>

            </div>
        </div>
        <div class="col-sm-9 col-md-8 sidebar">
            @yield('content')
        </div>
    </div>
</div>
@yield('content1')
<!-- Scripts -->

<script src="{{url('/js/app.js')}}"></script>
<script src="{{url('/js/holder.js')}}"></script>

@yield('bodyScript')
</body>
</html>
