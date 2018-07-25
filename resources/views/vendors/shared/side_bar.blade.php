<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! asset('bower_components/admin-lte/dist/img/conglac.png') !!}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ __('Vendors list') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>{{ __('Đang hoạt động') }}</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ __('Menu') }}</li>
            <li class="active treeview">
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{ __('Bài đăng') }}</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Danh sách bài đăng') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Đăng bài mới') }}</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>{{ __('Khách hàng') }}</span>
                    <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Danh sách đơn đặt') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Yêu cầu đặt lịch') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Yêu cầu đã duyệt') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th"></i> <span>{{ __('Danh sách sân') }}</span>
                    <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>{{ __('Quản lý sân bóng') }}</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Lịch sân bóng') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Lịch bể bơi') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Quản lý lịch') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Đơn đặt sân') }}</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>{{ __('Thống kê') }}</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Thống kê đơn đặt') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Thống kê sân') }}</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>{{ __('Marketing') }}</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Thống kê đơn đặt') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>{{ __('Thống kê sân') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
