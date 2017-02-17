@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/users')}}">系统用户</a></li>
        <li class="active">添加||编辑</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($obj->id)){{url('admin/users')}} @else {{url('admin/users/'.$obj->id)}} @endif" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (!empty($obj->id)){{ method_field('PUT') }} @endif

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="{{$obj->name}}" placeholder="账号">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" id="password" value="{{$obj->password}}" placeholder="密码">
                </div>
            </div>
            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="user_name" id="user_name" value="{{$obj->user_name}}" placeholder="姓名">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" value="{{$obj->email}}" placeholder="邮箱">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-default" value="保存">
                </div>
            </div>
        </form>

    </div>

@endsection
