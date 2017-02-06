@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        用户管理
        <small>角色</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{ route('admin_role') }}">用户管理 - 角色</a></li>
        <li class="active">新增角色</li>
    </ol>
@stop

@section('content')

    @include('admin.widgets.main-messages')

    <h2 class="page-header">新增角色</h2>
    <form method="post" action="{{ route('admin_post_role_add') }}" accept-charset="utf-8">
        {!! csrf_field() !!}
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label>角色名
                            <small class="text-red">*</small>
                            <span class="text-green small">只能为英文单词，建议首字母大写</span></label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name') }}"
                               placeholder="角色名">
                    </div>
                    <div class="form-group">
                        <label>角色展示名
                            <small class="text-red">*</small>
                            <span class="text-green small">展示名可以为中文</span></label>
                        <input type="text" class="form-control" name="display_name" autocomplete="off"
                               value="{{ old('display_name') }}" placeholder="角色展示名">
                    </div>
                    <div class="form-group">
                        <label>角色状态
                            <small class="text-red">*</small>
                            <span class="text-green small">必须选择</span>
                        </label>
                        <div class="input-group">
                            <input type="radio" name="status" value="1" {{ ( old('status') == 1) ? 'checked' : '' }}>
                            <label class="choice" for="radiogroup">开启</label>
                            <input type="radio" name="status" value="2" {{ ( old('status') == 2) ? 'checked' : '' }}>
                            <label class="choice" for="radiogroup">关闭</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>关联权限
                            <small class="text-red">*</small>
                        </label>
                        <div class="input-group">
                            @foreach($permissions as $index => $per)
                                @if(starts_with($per->name, '@') && $index !== 0)
                                    <br>
                                @endif
                                <input type="checkbox" name="permissions[]" value="{{ $per->id }}">
                                <label class="choice" for="permissions[]" data-value="{{ $per->id }}"
                                       style="cursor: pointer;"><span class="text-green">{{ $per->name }}</span>[<span
                                            class="text-red">{{ $per->display_name }}</span>]</label>
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.tab-pane -->

                <button type="submit" class="btn btn-primary">新增角色</button>

            </div><!-- /.tab-content -->

        </div>
    </form>

@stop

@section('extraPlugin')

    <!--引入iCheck组件-->
    <script src="{{ _asset(ref('icheck.js')) }}" type="text/javascript"></script>

@stop

@section('afterScript')
    <script type="text/javascript">
        //启用iCheck响应checkbox与radio表单控件
        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            increaseArea: '20%', // optional
        });

        $('input[type="radio"]').iCheck({
            radioClass: 'iradio_flat-blue',
            increaseArea: '20%' // optional
        });

        //响应点击label 选中或者取消选中
        $('label.choice').click(function () {
            var value = $(this).data('value');
            $('input[name="permissions[]"][value=' + value + ']').iCheck('toggle');
        });
    </script>
@stop
