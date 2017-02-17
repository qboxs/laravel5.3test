@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/newsType')}}">新闻资讯</a></li>
        <li class="active">@if (!empty($obj->pk_id))编辑 @else 添加 @endif</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($obj->pk_id)){{url('admin/newsType')}} @else {{url('admin/newsType/'.$obj->pk_id)}} @endif" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (!empty($obj->pk_id)){{ method_field('PUT') }} @endif

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">分类标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="{{$obj->title}}" placeholder="分类标题">
                </div>
            </div>

            <div class="form-group">
                <label for="parent_id" class="col-sm-2 control-label">上级分类</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="parent_id" id="parent_id" value="{{$obj->parent_id}}" placeholder="上级分类">
                </div>

            </div>

            <div class="form-group">
                <label for="levels" class="col-sm-2 control-label">层级</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="levels" id="levels" value="{{$obj->levels}}" placeholder="层级">
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status1" value=1 @if (empty($obj->status) || $obj->status==1) checked="checked" @endif> 正常
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status0" value=0 @if ($obj->status==0) checked="checked" @endif> 隐藏
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="detail" class="col-sm-2 control-label">备注</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="detail" id="detail" value="{{$obj->detail}}" placeholder="备注">
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

@section('bodyScript')

@endsection
