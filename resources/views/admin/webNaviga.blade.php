@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">站点配置</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($obj->pk_id)){{url('admin/webNaviga')}} @else {{url('admin/webNaviga/'.$obj->pk_id)}} @endif" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (!empty($obj->pk_id)){{ method_field('PUT') }} @endif

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">导航名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="{{$obj->name}}" placeholder="导航名称">
                </div>
            </div>
            <div class="form-group">
                <label for="ico_url" class="col-sm-2 control-label">导航ico</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ico_url" id="ico_url" value="{{$obj->ico_url}}" placeholder="导航ico">
                </div>
            </div>
            <div class="form-group">
                <label for="go_url" class="col-sm-2 control-label">跳转地址</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="go_url" id="go_url" value="{{$obj->go_url}}" placeholder="跳转地址">
                </div>
            </div>

            <div class="form-group">
                <label for="positions" class="col-sm-2 control-label">显示位置{{$obj->positions}}</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="positions" id="positions1" value="1" @if (empty($obj->positions) || $obj->positions=='1') checked="checked" @endif> 顶部
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="positions" id="positions2" value="2" @if ($obj->positions=='0') checked="checked" @endif> 底部
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">显示状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status1" value="1" @if (empty($obj->status) || $obj->status=='1') checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status0" value="0" @if ($obj->status=='0') checked="checked" @endif> 关闭
                    </label>
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
