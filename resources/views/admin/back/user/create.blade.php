@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        用户管理
        <small>管理员</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{ route('admin_user') }}">用户管理 - 管理员</a></li>
        <li class="active">新增管理员</li>
    </ol>
@endsection

@section('content')

    @include('admin.widgets.main-messages')

    <h2 class="page-header">新增管理员</h2>
    <form method="post" action="{{ route('admin_post_user_add') }}" accept-charset="utf-8">
        {!! csrf_field() !!}
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab" aria-expanded="true">主要信息</a>
                </li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label>登录(用户)名
                            <small class="text-red">*</small>
                            <span class="text-green small">只能5-10位英文字母与阿拉伯数字组合</span>
                        </label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name') }}"
                               placeholder="登录名">
                    </div>
                    <div class="form-group">
                        <label>用户昵称
                            <small class="text-red">*</small>
                            <span class="text-green small">用于身份确认，必须为2字以上的中文</span></label>
                        <input type="text" class="form-control" name="nickname" autocomplete="off"
                               value="{{ old('nickname') }}" placeholder="用户昵称">
                    </div>
                    <div class="form-group">
                        <label>角色(用户组)
                            <small class="text-red">*</small>
                        </label>
                        <div class="input-group">
                            <select data-placeholder="选择角色..." class="chosen-select" style="min-width:280px;"
                                    name="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ ($role->name === old('role')) ? 'selected':'' }}>{{ $role->name }}
                                        ({{ $role->display_name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>状态
                            <small class="text-red">*</small>
                        </label>
                        <div class="input-group">
                            <input type="radio" name="status"
                                   value="1" {{ (old('status') == 1 || old('status') == '') ? 'checked' : '' }}>
                            <label class="choice" for="radiogroup">开启</label>
                            <input type="radio" name="status"
                                   value="2" {{ (old('status') == 2) ? 'checked' : '' }}>
                            <label class="choice" for="radiogroup">关闭</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>初始化登录密码
                            <small class="text-red">*</small>
                            <span class="text-green small">只能5-16位数字、字母和部分特殊符号（0-9a-zA-Z~@#%）组合</span></label>
                        <input type="password" class="form-control" name="password" autocomplete="off" value=""
                               placeholder="登录密码">
                    </div>
                    <div class="form-group">
                        <label>确认登录密码
                            <small class="text-red">*</small>
                        </label>
                        <input type="password" class="form-control" name="password_confirmation" autocomplete="off"
                               value="" placeholder="重复上面登录密码">
                    </div>
                    <div class="form-group">
                        <label>电子邮件
                            <span class="text-green small">用于找回或重置登录密码等操作</span></label>
                        <input type="text" class="form-control" name="email" autocomplete="off"
                               value="{{ old('email') }}" placeholder="电子邮件地址">
                    </div>
                    <div class="form-group">
                        <label>手机号码
                            <span class="text-green small">用于通讯联络，请填写国内真实的手机号码</span>
                        </label>
                        <input type="text" class="form-control" name="phone" autocomplete="off"
                               value="{{ old('phone') }}" placeholder="手机号码">
                    </div>
                </div><!-- /.tab-pane -->

                <button type="submit" class="btn btn-primary">新增管理员</button>

            </div><!-- /.tab-content -->

        </div>
    </form>

@endsection

@section('extraPlugin')

    <!--引入iCheck组件-->
    <script src="{{ _asset(ref('icheck.js')) }}" type="text/javascript"></script>
    <!--引入Chosen组件-->
    @include('admin.scripts.endChosen')

@endsection


@section('afterScript')
    <script type="text/javascript">

        $('input[type="radio"]').iCheck({
            radioClass: 'iradio_flat-blue',
            increaseArea: '20%' // optional
        });

    </script>
@endsection
