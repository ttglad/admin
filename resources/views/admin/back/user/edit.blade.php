@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        用户管理
        <small>管理员</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{ _route('admin:user.index') }}">用户管理 - 管理员</a></li>
        <li class="active">修改管理员</li>
    </ol>
@endsection

@section('content')

    @include('admin.widgets.main-messages')

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">修改管理员资料</h3>
            <p>以下展示ID为{{ isset($user) ? $user->id : null }} 的管理员个人资料，您可修改昵称、真实姓名、手机号与登录密码等信息。登录密码项留空，则不修改登录密码。</p>
            <div class="basic_info bg-info">
                <ul>
                    <li>登录名：<span class="text-primary">{{ $user->name }}</span></li>
                    <li>昵称：<span class="text-primary">{{ $user->nickname }}</span></li>
                    <li>电子邮件：<span class="text-primary">{{ $user->email }}</span></li>
                    <li>手机号码：<b>{{ $user->phone }}</b></li>
                </ul>
            </div>
        </div><!-- /.box-header -->

        <form method="post" action="{{ Route('admin_put_user_edit', $user->id) }}" accept-charset="utf-8">
            {!! method_field('put') !!}
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label>昵称
                        <small class="text-red">*</small>
                    </label>
                    <input type="text" class="form-control" name="nickname"
                           value="{{ old('nickname', isset($user) ? $user->nickname : null) }}" placeholder="昵称">
                </div>

                <div class="form-group">
                    <label>角色(用户组)
                        <small class="text-red">*</small>
                    </label>
                    <div class="input-group">
                        <select data-placeholder="选择角色..." class="chosen-select" style="min-width:200px;" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ ($user->roles->first()->id === $role->id) ? 'selected':'' }}>{{ $role->name }}
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
                               value="1" {{ (old('status', $user->status) == 1 || old('status', $user->status) == '') ? 'checked' : '' }}>
                        <label class="choice" for="radiogroup">开启</label>
                        <input type="radio" name="status"
                               value="2" {{ (old('status', $user->status) == 2) ? 'checked' : '' }}>
                        <label class="choice" for="radiogroup">关闭</label>
                    </div>
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
                    <label>手机号码 <span class="text-green small">用于通讯联络，请填写国内真实的手机号码</span></label>
                    <input type="text" class="form-control" name="phone" autocomplete="off"
                           value="{{ old('phone', isset($user) ? $user->phone : null) }}" placeholder="手机号码">
                </div>
                <div class="form-group">
                    <label>电子邮箱 <span class="text-green small">请填写真实的电子邮箱</span></label>
                    <input type="text" class="form-control" name="email" autocomplete="off"
                           value="{{ old('email', isset($user) ? $user->email : null) }}" placeholder="电子邮箱">
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改管理员资料</button>
            </div>
        </form>

    </div>

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
