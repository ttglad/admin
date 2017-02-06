@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        用户管理
        <small>个人资料</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 个人资料</li>
    </ol>
@stop

@section('content')

    @include('admin.widgets.main-messages')

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">修改个人资料</h3>
            <p>以下是当前用户的个人资料，您仅可修改昵称、真实姓名与登录密码。登录密码项留空，则不修改登录密码。</p>
            <div class="basic_info bg-info">
                <ul>
                    <li>登录名：<span class="text-primary">{{ $me->name }}</span></li>
                    <li>昵称：<span class="text-primary">{{ $me->nickname }}</span></li>
                    <li>电子邮件：<span class="text-primary">{{ $me->email }}</span></li>
                    <li>手机号码：<b>{{ $me->phone }}</b></li>
                </ul>
            </div>
        </div><!-- /.box-header -->

        <form method="post" action="{{ _route('admin:me') }}" accept-charset="utf-8">
            {!! method_field('put') !!}
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label>昵称
                        <small class="text-red">*</small>
                    </label>
                    <input type="text" class="form-control" name="nickname" value="{{ old('nickname', $me->nickname) }}"
                           placeholder="昵称">
                </div>
                <div class="form-group">
                    <label>登录密码</label>
                    <input type="password" class="form-control" name="password" value="" autocomplete="off"
                           placeholder="登录密码">
                </div>
                <div class="form-group">
                    <label>确认登录密码</label>
                    <input type="password" class="form-control" name="password_confirmation" value="" autocomplete="off"
                           placeholder="登录密码">
                </div>
                <div class="form-group">
                    <label>手机号码</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $me->phone) }}" placeholder="手机号码">
                </div>
                <div class="form-group">
                    <label>电子邮箱</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email', $me->email) }}" placeholder="电子邮箱">
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改个人资料</button>
            </div>
        </form>
    </div>

@stop
