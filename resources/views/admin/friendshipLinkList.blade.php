@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/friendshipLink')}}">友情链接</a></li>
        <li class="active">列表</li>
    </ol>
    <div style="margin: 0 0 2rem 2rem">
        <a href="{{url('admin/friendshipLink/create')}}" ><button class="btn btn-primary"><i class="icon-plus"></i>添 加</button></a>
    </div>
    <div class="well">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>类别</th>
                <th>名称</th>
                <th>logo</th>
                <th>排序</th>
                <th>状态</th>
                <th>链接地址</th>
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
                    <td>
                        <a href="{{url('admin/friendshipLink/'.$item->pk_id.'/edit')}}"><i class="glyphicon glyphicon-pencil" title="编辑"></i></a>
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
                    $.post("{{url('admin/friendshipLink')}}/"+id, { "_method": "DELETE","_token": "{{ csrf_token() }}"},
                        function(data){
                            window.location.reload(true);
                        }, "json");
                }
            });
        });


    </script>
@endsection