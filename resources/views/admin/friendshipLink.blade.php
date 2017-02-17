@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/friendshipLink')}}">友情链接</a></li>
        <li class="active">@if (!empty($obj->pk_id))编辑 @else 添加 @endif</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($obj->pk_id)){{url('admin/friendshipLink')}} @else {{url('admin/friendshipLink/'.$obj->pk_id)}} @endif" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (!empty($obj->pk_id)){{ method_field('PUT') }} @endif
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">分类</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="type" id="type1" value=1 @if (empty($obj->type) || $obj->type==1) checked="checked" @endif> 图片链接
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" id="type2" value=2 @if ($obj->type==2) checked="checked" @endif> 文字链接
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="{{$obj->name}}" placeholder="名称">
                </div>
            </div>
            <div id="image_logo">

            <div class="form-group">
                <label for="logo_url" class="col-sm-2 control-label">logo</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="logo_url" id="logo_url" value="{{$obj->logo_url}}" placeholder="logo地址">
                </div>
                <div class="col-sm-3">
                    <input type="file" name="logo_file" id="logo_file"/>
                </div>
            </div>
            <div class="form-group">
                <label for="logo_url" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <img data-src="holder.js/150x70" src="{{url(''.$obj->logo_url)}}">
                </div>

            </div>
            </div>
            <div class="form-group">
                <label for="sorts" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="sorts" id="sorts" value="{{$obj->sorts}}" placeholder="排序">
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status1" value="1" @if (empty($obj->status) || $obj->status=='1') checked="checked" @endif> 正常
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status0" value="2" @if ($obj->status=='0') checked="checked" @endif> 下架
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="link_url" class="col-sm-2 control-label">链接地址</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="link_url" id="link_url" value="{{$obj->link_url}}" placeholder="链接地址">
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
    <script>
        $(function() {
            var link_type = $('input[type=radio][name=type]:checked').val();
            if(link_type==1){
                $("#image_logo").show();
            }else{
                $("#image_logo").hide();
            }
            $(document).on('click','input[type=radio][name=type]',function () {
               if(this.value=='1'){
                  $("#image_logo").show();
               }else{
                   $("#image_logo").hide();
               }
            });
        });


    </script>
@endsection
