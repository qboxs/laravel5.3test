@extends('layouts.app')

@section('content')


    <div class="jumbotron">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('')}}">首页</a></li>
                <li class="active">关于我们</li>
            </ol>
        </div>
        <div class="container">
            <h1>{{$obj->title}}</h1>
            <p> {!! $obj->details !!}</p>
        </div>
    </div>
@endsection