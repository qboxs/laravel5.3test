@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @if (isset($users) && $users != null)
                <div class="panel-body">
                    <ul>
                        @foreach ($users as $user)
                            @if($loop->first || $loop->last)
                                <li>
                                    {{ $loop->index }}: {{ $user->name }}---{{$user->email}}
                                </li>
                            @else
                                <li>
                                    剩下{{$loop->remaining}}个用户没有输出，当前迭代：{{$loop->iteration}}，总共{{$loop->count}}个用户== {{ $loop->index }}: {{ $user->name }}---{{$user->email}}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (isset($userPage) && $userPage != null)
                <div class="panel-body">
                    <ul>
                        @foreach ($userPage as $user)
                            @if($loop->first || $loop->last)
                                <li>
                                    {{ $loop->index }}: {{ $user->name }}---{{$user->email}}
                                </li>
                            @else
                                <li>
                                    剩下{{$loop->remaining}}个用户没有输出，当前迭代：{{$loop->iteration}}，总共{{$loop->count}}个用户== {{ $loop->index }}: {{ $user->name }}---{{$user->email}}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    {{$userPage->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
