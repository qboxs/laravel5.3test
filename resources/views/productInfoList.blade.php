@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('')}}">首页</a></li>
                <li class="active">产品中心</li>
            </ol>
        </div>
        <div class="container">
            <div class="col-sm-3 sidebar" style="margin-left: 0;">

                <div class="list-group" id="typeInfo">
                    <a href="{{url('productInfo')}}" class="list-group-item @if(!isset($type_id) || empty($type_id)) active @endif">
                        所有产品
                    </a>
                    @foreach ($typeList as $item)
                        <a href="{{url('productInfo')}}?type_id={{$item->pk_id}}" class="list-group-item @if($item->pk_id==$type_id) active @endif" data-content-id="{{$item->pk_id}}" >{{$item->title}}</a>
                    @endforeach
                </div>


            </div>
            <div class="col-sm-9 sidebar">
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center" id="typeName">所有产品</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">

                                @foreach ($list as $item)
                                    <div class="col-xs-3 col-md-3">
                                        <a href="{{url('productInfo')}}/{{$item->pk_id}}" class="thumbnail">
                                            <img data-src="holder.js/100%x200" alt="..." src="{{ url($item->pic_url) }}">
                                            <div class="text-center">{{$item->name}}</div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    {{ $list ->appends(['type_id' => $type_id])->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('bodyScript')
    <script>
        $("#menus li").removeClass('active');
        $("#menus3").addClass('active');

        $(function () {
            $("#typeName").text($("#typeInfo > .active").text());
        })
    </script>
@endsection