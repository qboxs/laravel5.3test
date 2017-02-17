@extends('layouts.app')

@section('content')
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{ url('/images/slide4.jpg') }}" alt="First slide">
                <div class="carousel-caption">标题 1</div>
            </div>
            <div class="item">
                <img src="{{ url('/images/slide7.jpg') }}" alt="Second slide">
                <div class="carousel-caption">标题 2</div>
            </div>
            <div class="item">
                <img src="{{ url('/images/slide9.jpg') }}" alt="Third slide">
                <div class="carousel-caption">标题 3</div>
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <script>
        $(function () {
            $('#myCarousel').carousel({
                interval: 2000
            });
        })
    </script>


    <div class="jumbotron">
        <div class="container">
            <h1>{{$domainConfig->company_name}}</h1>
            <p> {{$domainConfig->company_detail}}</p>
            <p><a class="btn btn-primary btn-lg" href="{{url('singlePageInfo/1')}}" role="button">更多介绍</a></p>
        </div>

        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-left col-md-11">产品系列</h3><a href="{{url('productInfo')}}" class="panel-title text-right">更多>></a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($productList as $item)
                            <div class="col-xs-3 col-md-3">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/100%x200" alt="..." src="{{ url($item->pic_url) }}">
                                    <div class="text-center">{{$item->name}}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">仪器设备</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($productByTypeList as $item)
                            <div class="col-xs-3 col-md-3">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/100%x200" alt="..." src="{{ url($item->pic_url) }}">
                                    <div class="text-center">{{$item->name}}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">合作伙伴</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($friendshipLinkList as $item)
                            <div class="col-xs-3 col-md-3">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/100%x200" alt="..." src="{{ url($item->logo_url) }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('bodyScript')
    <script>
        $(function () {
            $("#menu li").removeClass('active');
            $("#menu1").addClass('active');
        })
    </script>
@endsection
