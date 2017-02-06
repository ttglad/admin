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
        <li class="active">修改角色</li>
    </ol>
@stop

@section('content')

    @include('admin.widgets.main-messages')

    <h2 class="page-header">修改角色</h2>
    <form method="post" action="{{ route('admin_put_role_edit', $role->id) }}" accept-charset="utf-8">
        {!! method_field('put') !!}
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
                        <input type="text" class="form-control" name="name" autocomplete="off"
                               value="{{ old('name', isset($role) ? $role->name : null) }}" placeholder="角色(用户组)名">
                    </div>
                    <div class="form-group">
                        <label>角色展示名
                            <small class="text-red">*</small>
                            <span class="text-green small">展示名可以为中文</span></label>
                        <input type="text" class="form-control" name="display_name" autocomplete="off"
                               value="{{ old('display_name', isset($role) ? $role->display_name : null) }}"
                               placeholder="角色(用户组)展示名">
                    </div>
                    <div class="form-group">
                        <label>角色状态
                            <small class="text-red">*</small>
                            <span class="text-green small">必须选择</span>
                        </label>
                        <div class="input-group">
                            <input type="radio" name="status"
                                   value="1" {{ ( old('status', $role->status) == 1) ? 'checked' : '' }}>
                            <label class="choice" for="radiogroup">开启</label>
                            <input type="radio" name="status"
                                   value="2" {{ ( old('status', $role->status) == 2) ? 'checked' : '' }}>
                            <label class="choice" for="radiogroup">关闭</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>角色描述</label>
                        <textarea class="form-control" name="description" cols="45" rows="2" maxlength="200"
                                  placeholder="角色(用户组)描述"
                                  autocomplete="off">{{ old('description', isset($role) ? $role->description : null) }}</textarea>
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
                                <input type="checkbox" name="permissions[]"
                                       value="{{ $per->id }}" {{ (check_array($cans,'id', $per->id) === true) ? 'checked' : '' }}>
                                <label class="choice" for="permissions[]" data-value="{{ $per->id }}"
                                       style="cursor: pointer;"><span class="text-green">{{ $per->name }}</span>[<span
                                            class="text-red">{{ $per->display_name }}</span>]</label>
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.tab-pane -->

                <button type="submit" class="btn btn-primary">修改角色</button>

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
