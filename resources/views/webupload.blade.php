<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('webuploader/webuploader.css')}}" />
</head>
<body>
<div id="wrapper">
    <div class="uploader-container">
        <div id="filePicker">html5版本</div>
        <div id="filePicker2">flash版本</div>
    </div>
    <div id="log">
        <strong>console 会影响 md5 时间的计算，所以在测试 md5 速度的时候，把 console 关了</strong>
    </div>
</div>
<script type="text/javascript" src="{{url('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('js/app.js')}}"></script>
<script src="{{url('js/holder.js')}}"></script>
<script type="text/javascript" src="{{url('webuploader/webuploader.js')}}"></script>
<script type="text/javascript" src="{{url('webuploader/script.js')}}"></script>
</body>
</html>
