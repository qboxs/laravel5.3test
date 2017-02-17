@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">導航</a></li>
        <li class="active">站点配置</li>
    </ol>
    <div style="margin: 0 0 2rem 2rem">
        <a href="{{url('admin/webNaviga/create')}}" ><button class="btn btn-primary"><i class="icon-plus"></i>添 加</button></a>
    </div>
    <div class="well">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>导航名称</th>
                <th>显示位置</th>
                <th>显示状态</th>
                <th>跳转地址</th>
                <th style="width: 60px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->pk_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>@if ($item->positions == 1)
                            顶部
                        @else
                            底部
                        @endif
                    </td>
                    <td>@if ($item->status == 1)
                            显示
                        @else
                            隐藏
                        @endif
                    </td>
                    <td>{{ $item->go_url }}</td>
                    <td>
                        <a href="{{url('admin/webNaviga/'.$item->pk_id.'/edit')}}"><i class="glyphicon glyphicon-pencil" title="编辑"></i></a>
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
                    $.post("{{url('admin/webNaviga')}}/"+id, { "_method": "DELETE","_token": "{{ csrf_token() }}"},
                        function(data){
                            window.location.reload(true);
                        }, "json");
                }
            });
        });


    </script>
@endsection