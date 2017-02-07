@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        用户管理
        <small>角色</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 角色</li>
    </ol>
@endsection

@section('content')

    @include('admin.widgets.main-messages')

    @can('role-write')
        <a href="{{ route('admin_role_add') }}" class="btn btn-primary margin-bottom">新增角色</a>
    @endcan

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">角色列表</h3>
            <div class="box-tips clearfix">
                <p class="text-red">
                    请在超级管理员协助下完成增改角色（用户组）操作。
                </p>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>编号</th>
                    <th>角色名</th>
                    <th>角色展示名</th>
                    <th>状态</th>
                    <th>创建日期</th>
                    <th>更新日期</th>
                </tr>
                <!--tr-th end-->

                @foreach ($roles as $role)
                    <tr>
                        <td>
                            @can('role-write')
                                @if (auth()->user()->isSupperAdmin() || !in_array($role->id, explode(',', env('ADMIN_ROLE_IDS', 1))))
                                <a href="{{ route('admin_role_edit', $role->id) }}">
                                    <i class="fa fa-fw fa-pencil" title="修改"></i>
                                </a>
                                @endif
                            @endcan
                        </td>
                        <td class="text-muted">{{ $role->id }}</td>
                        <td class="text-green">{{ $role->name }}</td>
                        <td class="text-red">{{ $role->display_name }}</td>
                        <td class="{{ $role->statusClass }}">{{ $role->statusDesc }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ $role->updated_at }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div><!-- /.box-body -->

    </div>
@endsection

