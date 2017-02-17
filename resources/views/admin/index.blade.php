@extends('layouts.admin')

@section('headScript')
    <link href="{{ url('/uploadify/uploadify.css') }}" rel="stylesheet">
@endsection

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">站点配置</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($domainConfig->pk_id)){{url('admin/domainConfig')}} @else {{url('admin/domainConfig/'.$domainConfig->pk_id)}} @endif" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (!empty($domainConfig->pk_id)){{ method_field('PUT') }} @endif
            <div class="form-group">
                <label for="open_status" class="col-sm-2 control-label">网站状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="open_status" id="open_status1" value="1" @if ($domainConfig->open_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="open_status" id="open_status0" value="0" @if ($domainConfig->open_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="close_case" class="col-sm-2 control-label">关停原因</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="close_case" id="close_case" value="{{$domainConfig->close_case}}" placeholder="关停原因">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">网站标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="domain_title" id="domain_title" value="{{$domainConfig->domain_title}}" placeholder="网站标题">
                </div>
            </div>
            <div class="form-group">
                <label for="domain_name" class="col-sm-2 control-label">网站域名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="domain_name" id="domain_name" value="{{$domainConfig->domain_name}}" placeholder="网站域名">
                </div>
            </div>
            <div class="form-group">
                <label for="icp_info" class="col-sm-2 control-label">icp备案</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="icp_info" id="icp_info" value="{{$domainConfig->icp_info}}" placeholder="icp备案信息">
                </div>
            </div>
            <div class="form-group">
                <label for="common_web_info" class="col-sm-2 control-label">公网安备案信息</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="common_web_info" id="common_web_info" value="{{$domainConfig->common_web_info}}" placeholder="公网安备案信息">

                </div>
            </div>
            <div class="form-group">
                <label for="logo" class="col-sm-2 control-label">LOGO</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="logo" id="logo" value="{{$domainConfig->logo}}" placeholder="LOGO地址">
                </div>
                <div class="col-sm-3">
                    <input type="file"  name="logo_file" id="logo_file" value="选择图片" >
                </div>
            </div>

            <div class="form-group">
                <label for="logo" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <img data-src="holder.js/150x70" src="{{url($domainConfig->logo)}}">
                </div>

            </div>

            <div class="form-group">
                <label for="ico" class="col-sm-2 control-label">ICO</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ico" id="ico" value="{{$domainConfig->ico}}" placeholder="ICO地址">
                </div>
            </div>
            <div class="form-group">
                <label for="third_inface_code" class="col-sm-2 control-label">第三放代码调用接口</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="third_inface_code" id="third_inface_code" value="{{$domainConfig->third_inface_code}}" placeholder="第三放代码调用接口">
                </div>
            </div>
            <div class="form-group">
                <label for="seo_info" class="col-sm-2 control-label">seo信息</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="seo_info" id="seo_info" value="{{$domainConfig->seo_info}}" placeholder="seo信息">
                </div>
            </div>
            <div class="form-group">
                <label for="key_word" class="col-sm-2 control-label">网站关键词</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key_word" id="key_word" value="{{$domainConfig->key_word}}" placeholder="网站关键词">
                </div>
            </div>
            <div class="form-group">
                <label for="domain_name_detail" class="col-sm-2 control-label">网站描述</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="domain_name_detail">{{$domainConfig->domain_name_detail}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="company_name" class="col-sm-2 control-label">公司名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_name" id="company_name" value="{{$domainConfig->company_name}}" placeholder="公司名称">
                </div>
            </div>
            <div class="form-group">
                <label for="company_address" class="col-sm-2 control-label">公司地址</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_address" id="company_address" value="{{$domainConfig->company_address}}" placeholder="公司地址">
                </div>
            </div>
            <div class="form-group">
                <label for="company_detail" class="col-sm-2 control-label">首页公司简介</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" name="company_detail">{{$domainConfig->company_detail}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="contacts" class="col-sm-2 control-label">联系人</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="contacts" id="contacts" value="{{$domainConfig->contacts}}" placeholder="联系人">
                </div>
            </div>
            <div class="form-group">
                <label for="contacts_tel" class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="contacts_tel" id="contacts_tel" value="{{$domainConfig->contacts_tel}}" placeholder="联系电话">
                </div>
            </div>
            <div class="form-group">
                <label for="contacts_phone" class="col-sm-2 control-label">移动电话</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="contacts_phone" id="contacts_phone" value="{{$domainConfig->contacts_phone}}" placeholder="移动电话">
                </div>
            </div>
            <div class="form-group">
                <label for="fax_number" class="col-sm-2 control-label">传真号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fax_number" id="fax_number" value="{{$domainConfig->fax_number}}" placeholder="传真号">
                </div>
            </div>
            <div class="form-group">
                <label for="qq" class="col-sm-2 control-label">qq客服</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="qq" id="qq" value="{{$domainConfig->qq}}" placeholder="qq客服">
                </div>
            </div>
            <div class="form-group">
                <label for="link_mail" class="col-sm-2 control-label">联系邮箱</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="link_mail" id="link_mail" value="{{$domainConfig->link_mail}}" placeholder="联系邮箱">
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
    <script type="text/javascript" src="{{url('/uploadify/jquery.uploadify.js')}}"></script>
    <script type="text/javascript">
        <?php $timestamp = time();?>
        $(function() {
            $('#file_upload').uploadify({
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                },
                'swf'      : "{{url('/uploadify/uploadify.swf')}}",
                'uploader' : "{{url('/uploadify/uploadify.php')}}"
            });
        });
    </script>
@endsection
