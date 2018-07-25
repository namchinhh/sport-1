<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                    <div class="header-location">
                        <i class="fa fa-home"></i>
                        <a href="#">455 Martinson, Los Angeles</a>
                    </div>
                    <div class="header-email">
                        <i class="fa fa-envelope-o"></i>
                        <a href="mailto:support@email.com">support@email.com</a>
                    </div>
                    <div class="header-phone">
                        <i class="fa fa-phone"></i>
                        <a href="#">8 (043) 567 - 89 - 30</a></div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="header-social pull-right">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <nav class="navbar navbar-universal navbar-custom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="#" class="navbar-brand page-scroll">
                                <img src="{!! asset('bower_components/template_delux_hotel/assets/images/logo/logo.png')!!}"
                                     alt="logo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="navbar-header">
                            <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse"
                                    class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-main-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active">
                                    <a href="#">{{ __('Home') }}</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">Pages <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">{{ __('About Us') }}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('Contacts') }}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('F.A.Q') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">{{ __('Reservation') }}</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle"
                                       data-toggle="dropdown" role="button"
                                       aria-expanded="false">{{ __('Rooms') }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">{{ __('All Rooms') }}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('Room Detail') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       role="button"
                                       aria-expanded="false">{{ __('Blog') }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">{{ __('All Posts') }}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('Post Detail') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">{{ __('Purchase') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
