@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        用户管理
        <small>管理员</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 管理员</li>
    </ol>
@endsection

@section('content')

    @include('admin.widgets.main-messages')

    @can('user-write')
        <a href="{{ Route('admin_user_add') }}" class="btn btn-primary margin-bottom">
            新增管理员(用户)
        </a>
    @endcan

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">管理员列表</h3>
            @can('user-search')
                <div class="box-tools">
                    <form action="{{ Route('admin_user') }}" method="get" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" name="s_name"
                                   value="{{ request('s_name') }}" style="width: 200px;" placeholder="搜索用户登录名或昵称">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" name="s_phone"
                                   value="{{ request('s_phone') }}" style="width: 150px;" placeholder="搜索用户手机号">
                        </div>
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            @endcan
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>
                        <input type="checkbox" value="checkbox" name="data_item">
                    </th>
                    <th>操作</th>
                    <th>编号</th>
                    <th>登录名 / 昵称</th>
                    <th>邮箱</th>
                    <th>角色</th>
                    <th>状态</th>
                    <th>最后一次登录时间</th>
                </tr>
                <!--tr-th end-->
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" value="checkbox" name="data_item">
                        </td>
                        <td>
                            @can('user-write')
                                @if (auth()->user()->isSupperAdmin() || $user->isNotSupperAdmin())
                                    <a href="{{ Route('admin_user_edit', $user->id) }}">
                                        <i class="fa fa-fw fa-pencil" title="修改"></i>
                                    </a>
                                @endif
                            @endcan
                        </td>
                        <td>{{ $user->id }}</td>
                        <td class="text-muted">{{ $user->name }} / {{ $user->nickname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-yellow">
                            @if(null !== $user->roles->first())  {{-- 某些错误情况下，会造成管理用户没有角色 --}}
                            {{ $user->roles->first()->name }}({{ $user->roles->first()->display_name }})
                            @else
                                NULL(空)
                            @endif
                        </td>
                        <td class="{{ $user->statusClass }}">
                            {{ $user->statusDesc }}
                        </td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            {!! $users->appends(['s_name' => request('s_name'), 's_phone' => request('s_phone')])->render() !!}
        </div>

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
            $('input[type="checkbox"][value=' + value + ']').iCheck('toggle');
        });
    </script>
@endsection
