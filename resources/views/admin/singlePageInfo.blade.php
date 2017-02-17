@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/singlePageInfo')}}">单页信息</a></li>
        <li class="active">@if (!empty($obj->pk_id))编辑 @else 添加 @endif</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($obj->pk_id)){{url('admin/singlePageInfo')}} @else {{url('admin/singlePageInfo/'.$obj->pk_id)}} @endif" method="post" enctype="multipart/form-data" onclick="return setvs()">
            {{ csrf_field() }}
            @if (!empty($obj->pk_id)){{ method_field('PUT') }} @endif

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="{{$obj->title}}" placeholder="标题">
                </div>
            </div>
            <div class="form-group">
                <label for="author" class="col-sm-2 control-label">作者</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="author" id="author" value="{{$obj->author}}" placeholder="作者">
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status1" value="1" @if (empty($obj->status) || $obj->status=='1') checked="checked" @endif> 正常
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status0" value="2" @if ($obj->status=='0') checked="checked" @endif> 隐藏
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="details" class="col-sm-2 control-label">详情</label>
                <div class="col-sm-10">
                    <input type="hidden" name="details" id="details" value="">
                    <script id="editor" type="text/plain" style="width:800px;height:500px;"></script>
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

    <script type="text/javascript" charset="utf-8" src="{{url('/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('/ueditor/ueditor.all.min.js')}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{url('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>


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


            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('editor');
            //对编辑器的操作最好在编辑器ready之后再做
            ue.ready(function() {
                //设置编辑器的内容
                ue.setContent('{!!$obj->details!!}');
            });
        });
        function setvs() {
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
