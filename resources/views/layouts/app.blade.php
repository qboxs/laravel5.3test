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
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/common.css') }}" rel="stylesheet">
    @yield('headLink')
    <script type="text/javascript" src="{{url('/js/jquery-3.1.1.min.js')}}"></script>
    @yield('headScript')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" style="margin: 0;height: 11rem;">
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
                   <img src="{{url('images/logo.gif')}}">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse" style="margin-top: 3rem;">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav" id="menus">
                    <li id="menus1" role="presentation" class="active"><a href="{{url('')}}">首页</a></li>
                    <li id="menus2" role="presentation"><a href="#">新闻资讯</a></li>
                    <li id="menus3" role="presentation"><a href="{{url('productInfo')}}">产品系列</a></li>
                    <li id="menus4" role="presentation"><a href="{{url('useCaseInfo')}}">使用案例</a></li>
                    <li id="menus5" role="presentation"><a href="#">人才招聘</a></li>
                    <li id="menus6" role="presentation"><a href="#">关于我们</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
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
            </div>
        </div>
    </nav>
<div style="margin-top:11rem">
    @yield('content')

</div>


    <div class="jumbotron bs-docs-footer">
        <div class="container">
            <ul class="bs-docs-footer-links">

            </ul>

            <p>Copyright © 2015-2017 baiqianchemical.com 版权所有不得转载 </p>

            <p>联系电话: 020-82028812 传真: 020-82028813  邮箱: baiqianchemical@163.com</p>

        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ url('/js/app.js') }}"></script>
    <script src="{{ url('/js/holder.js') }}"></script>

    @yield('bodyScript')
</body>
</html>
