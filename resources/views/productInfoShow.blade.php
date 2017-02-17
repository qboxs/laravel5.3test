@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('')}}">首页</a></li>
                <li><a href="{{url('productInfo')}}">产品中心</a></li>
                <li class="active">{{$obj->type->title}}</li>
            </ol>
        </div>
        <div class="container">
            <div class="col-sm-3 sidebar" style="margin-left: 0;">

                <div class="list-group" id="typeInfo">
                    <a href="{{url('productInfo')}}" class="list-group-item @if(!isset($type_id) || empty($type_id)) active @endif">
                        所有产品
                    </a>
                    @foreach ($typeList as $item)
                        <a href="{{url('productInfo')}}?type_id={{$item->pk_id}}" class="list-group-item @if($item->pk_id==$obj->type->pk_id) active @endif" data-content-id="{{$item->pk_id}}" >{{$item->title}}</a>
                    @endforeach
                </div>


            </div>
            <div class="col-sm-9 sidebar">
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">{{$obj->name}}</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">

                                <img data-src="holder.js/100%x200" alt="..." src="{{ url($obj->pic_url) }}">
                                <div class="text-center">{{$obj->name}}</div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('bodyScript')
    <script>
        $("#menus li").removeClass('active');
        $("#menus3").addClass('active');
    </script>
@endsection

