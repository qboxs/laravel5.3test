@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/productInfo')}}">产品信息</a></li>
        <li class="active">列表</li>
    </ol>
    <div style="margin: 0 0 2rem 2rem">
        <a href="{{url('admin/productInfo/create')}}" ><button class="btn btn-primary"><i class="icon-plus"></i>添 加</button></a>
    </div>
    <div class="well">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>名称</th>
                <th>分类</th>
                <th>市场价</th>
                <th>优惠价</th>
                <th>运费</th>
                <th>库存</th>
                <th>剩余库存</th>
                <th>是否热门</th>
                <th>状态</th>
                <th style="width: 60px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->pk_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{$item->type -> title}}</td>
                    <td>{{ $item->market_price }}</td>
                    <td>{{ $item->member_price }}</td>
                    <td>{{ $item->freight }}</td>
                    <td>{{ $item->stock_number }}</td>
                    <td>{{ $item->stock_surplus }}</td>
                    <td>{{ $item->hots}}</td>
                    <td>@if ($item->status == 1)
                            正常
                        @else
                            下架
                        @endif
                    </td>

                    <td>
                        <a href="{{url('admin/productInfo/'.$item->pk_id.'/edit')}}"><i class="glyphicon glyphicon-pencil" title="编辑"></i></a>
                        <a href="javascript:void(0);" role="button" data-toggle="modal"><i class="glyphicon glyphicon-trash" title="删除" data-title="{{$item->pk_id}}"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $list->links() }}
    </div>

@endsection

@section('bodyScript')
    <script>
        $(function() {
            $(document).on('click','.glyphicon-trash',function () {
                var id = $(this).attr('data-title');
                if(confirm('你确定要删除吗?')){
                    $.post("{{url('admin/productInfo')}}/"+id, { "_method": "DELETE","_token": "{{ csrf_token() }}"},
                        function(data){
                            window.location.reload(true);
                        }, "json");
                }
            });
        });


    </script>
@endsection