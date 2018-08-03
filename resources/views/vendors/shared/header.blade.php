<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') !!}"
          rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/font-awesome/css/font-awesome.min.css') !!}"
          rel="stylesheet">
    <!-- NProgress -->
    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/nprogress/nprogress.css') !!}"
          rel="stylesheet">
    <!-- iCheck -->
    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/iCheck/skins/flat/green.css') !!}"
          rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') !!}"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/jqvmap/dist/jqvmap.min.css') !!}"
          rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}"
          rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{!! asset('bower_components/template_admin_gentelella/build/css/custom.min.css') !!}" rel="stylesheet">


    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/select2/dist/css/select2.min.css')!!}"
          rel="stylesheet">

    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/switchery/dist/switchery.min.css')!!}"
          rel="stylesheet">

    <link href="{!! asset('bower_components/template_admin_gentelella/vendors/starrr/dist/starrr.css')!!}"
          rel="stylesheet">




</head>
=======
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{ __('Trùm Sân') }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ __('Toggle navigation') }}</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ __('You have 10 notifications') }}</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> {{ __('5 new members joined today') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> {{ __('5 new members joined today') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">{{ __('View all') }}</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                Alexander Pierce - Web Developer
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">{{ __('Sign out') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
