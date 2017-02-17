@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/feedback')}}">意见反馈</a></li>
        <li class="active">@if (!empty($obj->pk_id))编辑 @else 添加 @endif</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($obj->pk_id)){{url('admin/feedback')}} @else {{url('admin/feedback/'.$obj->pk_id)}} @endif" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (!empty($obj->pk_id)){{ method_field('PUT') }} @endif

            <div class="form-group">
                <label for="account" class="col-sm-2 control-label">提交者</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="account" id="account" value="{{$obj->account}}" placeholder="提交者">
                </div>
            </div>
            <div class="form-group">
                <label for="contents" class="col-sm-2 control-label">意见内容</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="contents" id="contents" value="{{$obj->contents}}" placeholder="意见内容">
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status1" value="1" @if ( !empty($obj->status) && $obj->status=='1') checked="checked" @endif> 已读
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status0" value="0" @if (empty($obj->status) || $obj->status=='0') checked="checked" @endif> 未读
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

