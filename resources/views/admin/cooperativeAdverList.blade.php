@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/cooperativeAdver')}}">广告合作</a></li>
        <li class="active">列表</li>
    </ol>
    <div style="margin: 0 0 2rem 2rem">
        <a href="{{url('admin/cooperativeAdver/create')}}" ><button class="btn btn-primary"><i class="icon-plus"></i>添 加</button></a>
    </div>
    <div class="well">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>类别</th>
                <th>名称</th>
                <th>图片</th>
                <th>排序</th>
                <th>状态</th>
                <th>链接地址</th>
                <th>投放位置</th>
                <th>投放页面</th>
                <th style="width: 60px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->pk_id }}</td>
                    <td>@if ($item->type == 1)
                            图片链接
                        @else
                            文字链接
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->logo_url }}</td>
                    <td>{{ $item->sorts }}</td>
                    <td>@if ($item->status == 1)
                            正常
                        @else
                            下架
                        @endif
                    </td>
                    <td>{{ $item->link_url }}</td>
                    <td><!--投放位置，1：顶部，2：轮播，3：中间，4：侧边，5：左边，6:右边，7:底部-->
                        @if ($item->positions == '1')
                            顶部
                        @elseif($item->positions == '2')
                            轮播
                        @elseif($item->positions == '3')
                            中间
                        @elseif($item->positions == '4')
                            侧边
                        @elseif($item->positions == '5')
                            左边
                        @elseif($item->positions == '6')
                            右边
                        @else
                            底部
                        @endif
                    </td>
                    <td><!--投放页面，1：首页，2：新闻页面，3：产品页面，4：案例页面，5：友情链接-->
                        @if ($item->pages == '1')
                            正常

                        @elseif($item->pages == '2')
                            新闻页面
                        @elseif($item->pages == '3')
                            产品页面
                        @elseif($item->pages == '4')
                            案例页面
                        @else
                            友情链接
                        @endif
                    </td>
                    <td>
                        <a href="{{url('admin/cooperativeAdver/'.$item->pk_id.'/edit')}}"><i class="glyphicon glyphicon-pencil" title="编辑"></i></a>
                        <a href="javascript:void(0);" role="button" data-toggle="modal"><i class="glyphicon glyphicon-trash" title="删除" data-title="{{$item->pk_id}}"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection

@section('bodyScript')
    <script>
        $(function() {
            $(document).on('click','.glyphicon-trash',function () {
                var id = $(this).attr('data-title');
                if(confirm('你确定要删除吗?')){
                    $.post("{{url('admin/cooperativeAdver')}}/"+id, { "_method": "DELETE","_token": "{{ csrf_token() }}"},
                        function(data){
                            window.location.reload(true);
                        }, "json");
                }
            });
        });


    </script>
@endsection