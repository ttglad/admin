@extends('admin.layout._base')

@section('hacker_header')
@stop

@section('title') 登录 - {{ config('site.title') }} @stop

@section('meta')
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
@stop
@section('head_css')
    <link href="{{ _asset(ref('bootstrap.css')) }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="{{ _asset(ref('font-awesome.css')) }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="{{ _asset(ref('ionicons.css')) }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ _asset('back/dist/css/admin.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ _asset('back/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css"/>
    <!--
    <link href="{{ _asset('back/dist/css/skins/skin-black.min.css') }}" rel="stylesheet" type="text/css" />
    -->
    <link href="{{ _asset(ref('icheck_blue.css')) }}" rel="stylesheet" type="text/css"/>
@stop

@section('head_js')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ _asset(ref('html5shiv.js')) }}"></script>
    <script src="{{ _asset(ref('respond.js')) }}"></script>
    <![endif]-->
    @parent
@stop

@section('body_attr') class="login-page"@stop

@section('body')

    <div class="login-box">
        <div class="login-logo">
            <b>{{ config('site.title') }}</b>系统
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">登录开始您的会话</p>
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> 警告!</h4>
                    <p>{!! $errors->first('attempt') !!}</p>
                </div>
            @endif

            <form method="post" action="{{ route('admin_post_login') }}" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" maxlength="20" name="username" placeholder="用户名"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" maxlength="20" name="password" placeholder="登录密码"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> 记住我
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('afterBody')

    <!-- jQuery 2.1.3 -->
    <script src="{{ _asset(ref('jquery.js')) }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ _asset(ref('bootstrap.js')) }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ _asset(ref('icheck.js')) }}" type="text/javascript"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@stop

@section('hacker_footer')
@stop