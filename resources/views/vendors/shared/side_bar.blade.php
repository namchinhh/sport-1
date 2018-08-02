<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" >
                    <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>{{ __('Trang cá nhân')}}</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{!! asset('bower_components/template_admin_gentelella/production/images/img.png') !!}"
                             alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>{{ __('Hello')}}</span>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>{{ __('Cá nhân')}}</h3>
                        <ul class="nav side-menu">

                            <li><a><i class="fa fa-edit"></i> {{ __('Bài đăng')}} <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#">{{ __('Đăng bài')}}</a></li>
                                    <li><a href="#">{{ __('Danh sách bài đăng')}}</a></li>
                                </ul>
                            </li>

                            </li>

                            <li>
                                <a><i class="fa fa-bar-chart-o"></i>{{ __('Quản lý sân')}} <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#">{{ __('Lịch sân bóng')}}</a></li>
                                    <li><a href="#">{{ __('Lịch bể bơi')}}</a></li>
                                    <li><a href="#">{{ __('Quản lý lịch')}}</a></li>
                                    <li><a href="#">{{ __('Đơn đặt sân')}}</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>{{ __('Khách hàng')}} <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#">{{ __('Yêu cầu đặt của khách')}}</a></li>
                                    <li><a href="#">{{ __('Yêu cầu đã phê duyệt')}}</a></li>
                                    <li><a href="#">{{ __('Danh sách đơn đặt')}}</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"></i>{{ __('Thống kê')}}<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#">{{ __('Thống kê đơn đặt')}}</a></li>
                                    <li><a href="#">{{ __('Thống kê sân')}}</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-laptop"></i>{{ __('Marketing')}} <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="#">{{ __('Quảng cáo')}}</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img href="{!! asset('bower_components/production/images/img.jpg') !!}">{{ __('John Doe')}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> {{ __('Profile')}}</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>{{ __('Settings')}}</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">{{ __('Help')}}</a></li>
                                <li><a href="#"><i class="fa fa-sign-out pull-right"></i> {{ __('Log Out')}}</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">{{ __('6')}}</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image">
                                            <img href="{!! asset('bower_components/production/images/img.jpg') !!}"></span>
                                        <span>
                                            <span>{{ __('John Smith')}}</span>
                                            <span class="time">{{ __('3 mins ago')}}</span>
                                        </span>
                                        <span class="message">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image">
                                            <img href="{!! asset('bower_components/production/images/img.jpg') !!}"></span>
                                        <span>
                                            <span>{{ __('John Smith')}}</span>
                                            <span class="time">{{ __('3 mins ago')}}</span>
                                        </span>
                                        <span class="message">
                                            {{ __('Film festivals used to be do-or-die moments for movie makers. They were where...')}}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>{{ __('See All Alerts')}}</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
    </div>
</div>
</body>