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
            <h1>广州佰谦化工有限公司</h1>
            <p> 佰谦化工(下辖：广州佰谦化工有限公司与东莞佰谦新材料科技有限公司)，一直致力于功能化学品与特种表面活性剂的研究开发与应用推广，产品应用涵盖涂料、油墨、造纸、纺织、化纤、皮革、印染、日化、润滑油、切屑液、胶黏剂、化肥、农药、废水处理、水泥陶瓷、建材、电子、电镀、清洗、发酵工艺、机械加工以及新型材料等诸多行业领域，是一家集研发、生产、销售及外贸为一体的综合性企业。。。  </p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">更多介绍</a></p>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20091121754681.jpg') }}">
                        <div class="text-center">产品1</div>
                    </a>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20093611135505.jpg') }}">
                        <div class="text-center">产品2</div>
                    </a>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20103172120606.jpg') }}">
                        <div class="text-center">产品3</div>
                    </a>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20127112431864.jpg') }}">
                        <div class="text-center">产品4</div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20091121754681.jpg') }}">
                        <div class="text-center">产品5</div>
                    </a>

                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20093611135505.jpg') }}">
                        <div class="text-center">产品6</div>
                    </a>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20103172120606.jpg') }}">
                        <div class="text-center">产品7</div>
                    </a>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20127112431864.jpg') }}">
                        <div class="text-center">产品8</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">产品系列</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="thumbnail">
                                <img data-src="holder.js/300x300" alt="..." src="{{ url('/uploadfiles/20091121754681.jpg') }}">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="thumbnail">
                                <img data-src="holder.js/300x300" alt="..." src="{{ url('/uploadfiles/20091121754681.jpg') }}">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="thumbnail">
                                <img data-src="holder.js/300x300" alt="..." src="{{ url('/uploadfiles/20091121754681.jpg') }}">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="thumbnail">
                                <img data-src="holder.js/300x300" alt="..." src="{{ url('/uploadfiles/20091121754681.jpg') }}">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3 class="text-center">成功案例</h3>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">成功案例</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-3 col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20091121754681.jpg') }}">
                            </a>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20093611135505.jpg') }}">
                            </a>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20103172120606.jpg') }}">
                            </a>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x200" alt="..." src="{{ url('/uploadfiles/20127112431864.jpg') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
