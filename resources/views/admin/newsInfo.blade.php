@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/newsInfo')}}">新闻资讯</a></li>
        <li class="active">@if (!empty($obj->pk_id))编辑 @else 添加 @endif</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" style="margin-top: 3rem" action="@if (empty($obj->pk_id)){{url('admin/newsInfo')}} @else {{url('admin/newsInfo/'.$obj->pk_id)}} @endif" method="post" enctype="multipart/form-data" onsubmit="return saves();">
            {{ csrf_field() }}
            @if (!empty($obj->pk_id)){{ method_field('PUT') }} @endif
            <input type="hidden" name="skim_count" id="skim_count" @if(!empty($obj->skim_count)) value="{{$obj->skim_count}}" @else value="0" @endif/>

            <div class="form-group">
                <label for="type_id" class="col-sm-2 control-label">分类</label>
                <div class="col-sm-10">
                    <select name="type_id" id="type_id" class="form-control">
                        @foreach ($typeList as $item)
                            <option value="{{$item->pk_id}}" @if($item->pk_id==$obj->type_id) selected="selected" @endif>{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="{{$obj->name}}" placeholder="名称" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="pic_url" class="col-sm-2 control-label">缩略图</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="pic_url" id="pic_url" value="{{$obj->pic_url}}" placeholder="缩略图">
                </div>
                <div class="col-sm-3">
                    <input type="file" name="pic_file" id="pic_file"/>
                </div>
            </div>
            <div class="form-group">
                <label for="logo_url" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <img data-src="holder.js/150x70" src="{{url(''.$obj->pic_url)}}">
                </div>

            </div>
            <div class="form-group">
                <label for="net_domain" class="col-sm-2 control-label">网络来源</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="net_domain" id="net_domain" value="{{$obj->net_domain}}" placeholder="网络来源">
                </div>
            </div>
            <div class="form-group">
                <label for="net_url" class="col-sm-2 control-label">网络来源地址</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="net_url" id="net_url" value="{{$obj->net_url}}" placeholder="网络来源地址">
                </div>
            </div>

            <div class="form-group">
                <label for="sorts" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="sorts" id="sorts" value="{{$obj->sorts}}" placeholder="排序">
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态 </label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status1" value="1" @if (empty($obj->status) || ($obj->status==1)) checked="checked" @endif> 正常
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status0" value="0" @if (!empty($obj->status) && ($obj->status==0)) checked="checked" @endif> 下架
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="hots" class="col-sm-2 control-label">是否热门</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="hots" id="hots1" value="1" @if ($obj->hots=='1') checked="checked" @endif> 是
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="hots" id="hots0" value="2" @if (empty($obj->hots) || $obj->hots=='0') checked="checked" @endif> 否
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="simple_info" class="col-sm-2 control-label">简介</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="simple_info" id="simple_info" rows="4">{{$obj->simple_info}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">详情</label>
                <div class="col-sm-10">
                    <input type="hidden" name="details" id="details" value="">
                    <script id="editor" type="text/plain" style="width:900px;height:500px;"></script>
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
    <div id="temp_content" style="display: none;">{!! $obj->details !!}</div>
@endsection

@section('bodyScript')
    <script type="text/javascript" charset="utf-8" src="{{url('/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('/ueditor/ueditor.all.min.js')}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{url('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script>
        $(function() {


            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('editor');
            //对编辑器的操作最好在编辑器ready之后再做
            ue.ready(function() {
                //设置编辑器的内容
                  ue.setContent($("#temp_content").html());
            });
        });
        function saves() {
            var ue = UE.getEditor('editor');
            //对编辑器的操作最好在编辑器ready之后再做
            ue.ready(function() {

                var html = ue.getContent();
                $("#details").val(html);
                //获取纯文本内容，返回: hello
                var txt = ue.getContentTxt();
            });
        }

    </script>
@endsection
