<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{!! isset(Auth::user()->avatar) && !empty(Auth::user()->avatar) ? asset(replaceUrlImage(Auth::user()->avatar)) : asset('backend/dist/img/avatar5.png') !!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{  isset(Auth::user()->name) ?  Auth::user()->name :'' }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    @php
        $checkRoleAdmin = \Auth::user()->hasRole('Quản trị viên');
        $checkRoleUser = \Auth::user()->hasRole('Người dùng');
    @endphp
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BẢNG ĐIỀU KHIỂN</li>
        @if($checkRoleAdmin)
        <li class="{{ isset($activeCate) ? $activeCate : ''}}">
            <a href="{{route('ManageListCategories')}}">
                <i class="fa fa-files-o"></i>
                <span>Danh mục bài viết</span>
            </a>
        </li>
        @endif
        <li class="{{ isset($activeNew) ? $activeNew : ''}}">
            <a href="{{route('ManageListNews')}}">
                <i class="fa fa-fw fa-file-word-o"></i>
                <span>Bài viết</span>
            </a>
        </li>
        @if($checkRoleAdmin)
        <li class="{{ isset($activeUser) ? $activeUser : ''}}">
            <a href="{{route('ManageListUser')}}">
                <i class="fa fa-fw fa-user"></i>
                <span>Quản lý người dùng</span>
            </a>
        </li>
        @endif
        <!-- <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-unlock-alt"></i>
                <span>Quản lý phân quyền</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('ManageListGroupPermission')}}"><i class="fa fa-circle-o"></i>Nhóm quyền</a></li>
                <li><a href="{{route('ManageListPermission')}}"><i class="fa fa-circle-o"></i>Quyền</a></li>
                <li><a href="{{route('ManageListRole')}}"><i class="fa fa-circle-o"></i>Vai trò</a></li>
                <li><a href="{{route('ManageListUser')}}"><i class="fa fa-circle-o"></i>Quản lý người dùng</a></li>
            </ul>
        </li> -->
        <li>
            <a href="{{route('logout')}}">
                <i class="fa fa-fw fa-power-off"></i>
                <span>Đăng xuất</span>
            </a>
        </li>
    </ul>
</section>
<!-- /.sidebar -->