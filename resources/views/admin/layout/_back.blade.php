@extends('admin.layout._base')

@section('hacker_header')
@stop

@section('title') {{ config('site.title') }} - 系统 @stop

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
    <link href="{{ _asset(ref('icheck_all.css')) }}" rel="stylesheet" type="text/css"/>

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

@section('body_attr') class="skin-black sidebar-mini"@stop

@section('body')

    <!--侦测是否启用JavaScript脚本-->
    <noscript>
        <style type="text/css">
            .noscript {
                width: 100%;
                height: 100%;
                overflow: hidden;
                background: #000;
                color: #fff;
                position: absolute;
                z-index: 99999999;
                background-color: #000;
                opacity: 1.0;
                filter: alpha(opacity=100);
                margin: 0 auto;
                top: 0;
                left: 0;
            }

            .noscript h1 {
                font-size: 36px;
                margin-top: 50px;
                text-align: center;
                line-height: 40px;
            }

            html {
                overflow-x: hidden;
                overflow-y: hidden;
            }

            /*禁止出现滚动条*/
        </style>
        <div class="noscript">
            <h1>
                您的浏览器不支持JavaScript，请启用后重试！
            </h1>
        </div>
    </noscript>

    <!--wrapper start-->
    <div class="wrapper">

    @include('admin.widgets.main-header')

    @include('admin.widgets.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                @section('content-header')
                @show{{-- 内容导航头部 --}}

            </section>

            <!-- Main content -->
            <section class="content">

                @section('content')
                @show{{-- 内容主体区域 --}}

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">

            <!-- Default to the left -->
            <strong>Copyright &copy; 2015-{{ date('Y') }} {{ admin_version() }}</strong>
        </footer>

    @stop

    @section('afterBody')
        <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">

                @include('admin.widgets.control-sidebar')

            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ _asset(ref('jquery.js')) }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ _asset(ref('bootstrap.js')) }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ _asset('back/dist/js/app.min.js') }}" type="text/javascript"></script>

    <!-- Slimscroll -->
    <script src="{{ _asset('back/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

@section('extraPlugin')
@show{{-- 引入额外依赖JS插件 --}}


<script type="text/javascript">
    $(function () {
        var path_array = window.location.pathname.split('/');
        var scheme_less_url = document.location.protocol + '//' + window.location.host + window.location.pathname;
        if (path_array[2] === undefined || path_array[2] === "add" || parseInt(path_array[3]) == path_array[3]) {
            scheme_less_url = document.location.protocol + '//' + window.location.host + '/' + path_array[1];
        }
        $('ul.treeview-menu>li').find('a[href="' + scheme_less_url + '"]').closest('li').addClass('active');  //二级链接高亮
        $('ul.treeview-menu>li').find('a[href="' + scheme_less_url + '"]').closest('li.treeview').addClass('active');  //一级栏目[含二级链接]高亮
        $('.sidebar-menu>li').find('a[href="' + scheme_less_url + '"]').closest('li').addClass('active');  //一级栏目[不含二级链接]高亮

        @section('filledScript')
        @show{{-- 在document ready 里面填充一些JS代码 --}}
    });
</script>
@section('afterScript')

@show
<!-- AdminLTE for demo purposes -->
<script src="{{ _asset('back/dist/js/admin.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

@section('extraSection')
@show{{-- 补充额外的一些东东，不一定是JS，可能是HTML --}}

@stop


@section('hacker_footer')

@stop
