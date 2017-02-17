@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">站点配置</li>
    </ol>
    <div class="block">
        <form class="form-horizontal" action="@if (empty($obj->pk_id)){{url('admin/systemConfig')}} @else {{url('admin/systemConfig/'.$obj->pk_id)}} @endif" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (!empty($obj->pk_id)){{ method_field('PUT') }} @endif
            <div class="form-group">
                <label for="page_copy_status" class="col-sm-2 control-label">防页面复制启闭</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="page_copy_status" id="page_copy_status1" value="1" @if ($obj->page_copy_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="page_copy_status" id="page_copy_status0" value="0" @if ($obj->page_copy_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="captcha_status" class="col-sm-2 control-label">验证码启闭</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="captcha_status" id="captcha_status1" value="1" @if ($obj->captcha_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="captcha_status" id="captcha_status0" value="0" @if ($obj->captcha_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="admin_authentication_status" class="col-sm-2 control-label">管理员认证启闭</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="admin_authentication_status" id="admin_authentication_status1" value="1" @if ($obj->admin_authentication_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="admin_authentication_status" id="admin_authentication_status0" value="0" @if ($obj->admin_authentication_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="admin_authentication_code" class="col-sm-2 control-label">管理员认证码</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="admin_authentication_code" id="admin_authentication_code" value="{{$obj->admin_authentication_code}}" placeholder="关停原因">
                </div>
            </div>
            <div class="form-group">
                <label for="chinese_to_pinyin_status" class="col-sm-2 control-label">后台汉子转拼音启闭</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="chinese_to_pinyin_status" id="chinese_to_pinyin_status1" value="1" @if ($obj->chinese_to_pinyin_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="chinese_to_pinyin_status" id="chinese_to_pinyin_status0" value="0" @if ($obj->chinese_to_pinyin_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="page_detail_separator" class="col-sm-2 control-label">详细页面生成分割符</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="page_detail_separator" id="page_detail_separator" value="{{$obj->page_detail_separator}}" placeholder="网站标题">
                </div>
            </div>
            <div class="form-group">
                <label for="sync_mail_status" class="col-sm-2 control-label">同步邮箱启闭</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="sync_mail_status" id="sync_mail_status1" value="1" @if ($obj->sync_mail_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sync_mail_status" id="sync_mail_status0" value="0" @if ($obj->sync_mail_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="views_count_status" class="col-sm-2 control-label">浏览数设置启闭</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="views_count_status" id="views_count_status1" value="1" @if ($obj->views_count_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="views_count_status" id="views_count_status0" value="0" @if ($obj->views_count_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="seo_status" class="col-sm-2 control-label">内页SEO设置启闭</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="seo_status" id="seo_status1" value="1" @if ($obj->seo_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="seo_status" id="seo_status0" value="0" @if ($obj->seo_status==0) checked="checked" @endif> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile_web_status" class="col-sm-2 control-label">手机网站状态</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="mobile_web_status" id="mobile_web_status1" value="1" @if ($obj->mobile_web_status==1) checked="checked" @endif> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="mobile_web_status" id="mobile_web_status0" value="0" @if ($obj->mobile_web_status==0) checked="checked" @endif> 关闭
                    </label>
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
