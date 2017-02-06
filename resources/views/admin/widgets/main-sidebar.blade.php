{{-- widget.main-sidebar --}}

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ _asset('back/dist/img/20150417113714.jpg') }}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->realname }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="搜索..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">主导航栏</li>

            <!--无子节点的一级导航节点-->
            <li>
                <a href="{{ route('admin_home') }}">
                    <i class="fa fa-dashboard"></i> <span>控制台</span>
                </a>
            </li>
            @can('@cache')
                <li>
                    <a href="{{ route('admin_cache') }}">
                        <i class="fa fa-eraser"></i> <span>刷新缓存</span>
                    </a>
                </li>
            @endcan

            @if (env('APP_ENV') == 'local')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i>
                        <span>开发演示</span>
                        <span class="label label-primary pull-right">3</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin_demo_form') }}">
                                <i class="fa fa-file-o"></i>表单
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin_demo_icon') }}">
                                <i class="fa fa-file-o"></i>图标
                            </a>
                        </li>
                        <li>
                            <a href="https://almsaeedstudio.com/" title="AdminLTE官网" target="_blank">
                                <i class="fa fa-file-o"></i>更多
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->can('@me') || Auth::user()->can('@user') || Auth::user()->can('@role') || Auth::user()->can('@permission'))
                <li class="treeview">
                    <a href="#">
                        <i class='fa fa-user-secret'></i>
                        <span>用户管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        @can('@me')
                            <li>
                                <a href="{{ route('admin_me') }}">
                                    <i class="fa fa-circle-o"></i>个人资料
                                </a>
                            </li>
                        @endcan
                        @can('@user')
                            <li>
                                <a href="{{ route('admin_user') }}">
                                    <i class="fa fa-circle-o"></i>管理员(用户)
                                </a>
                            </li>
                        @endcan
                        @can('@role')
                            <li>
                                <a href="{{ route('admin_role') }}">
                                    <i class="fa fa-circle-o"></i>角色
                                </a>
                            </li>
                        @endcan
                        @can('@permission')
                            <li>
                                <a href="{{ route('admin_permission') }}">
                                    <i class="fa fa-circle-o"></i>权限
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if (Auth::user()->can('@optoion') || Auth::user()->can('@log'))
                <li class="treeview">
                    <a href="#">
                        <i class='fa fa-cog'></i>
                        <span>系统管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        @can('@option')
                            <li>
                                <a href="{{ route('admin_option') }}">
                                    <i class="fa fa-caret-right"></i>系统配置
                                </a>
                            </li>
                        @endcan
                        @can('@log')
                            <li>
                                <a href="{{ route('admin_log') }}">
                                    <i class="fa fa-caret-right"></i>系统日志
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
