<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                    <div class="header-location"><i class="fa fa-home"></i> <a
                                href="#">{{ __('433 Trần Khất Trân, Hà Nội') }}</a></div>
                    <div class="header-email"><i class="fa fa-envelope-o"></i> <a
                                href="mailto:support@email.com">{{ __('support@email.com') }}</a></div>
                    <div class="header-phone"><i class="fa fa-phone"></i> <a href="#">8 (043) 567 - 89 - 30</a></div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="header-social pull-right">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
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
                                <img src="{!! asset('logo/trumsan.png')!!}"
                                     alt="logo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="navbar-header">
                            <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse"
                                    class="navbar-toggle"><span
                                        class="sr-only">{{ __('Toggle navigation') }}</span><span
                                        class="icon-bar"></span><span class="icon-bar"></span><span
                                        class="icon-bar"></span></button>
                        </div>
                        <div class="collapse navbar-collapse navbar-main-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class=" active"><a href="{{ route('getHome') }}">{{ __('Trang Chủ ') }}</a></li>
                                <li><a href="#" class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       role="button"
                                       aria-expanded="false">{{ __('Tìm Sân ') }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('getPlaces',array('type' => 'football')) }}">{{ __('Sân Bóng ') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('getPlaces',array('type' => 'tennis')) }}">{{ __('Sân Tenis ') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('getPlaces',array('type' => 'swimming-pool')) }}">{{ __('Bể Bơi ') }}</a>
                                        </li>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <li><a href="{{ route('getBooked') }}">{{ __('Đã Từng Đặt ') }}</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li><a href="#">{{ __('Đặt Sân Ngay  ') }}</a></li>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li><a href="{{ route('logout') }}">{{ __('Đăng Xuất   ') }}</a></li>
                                @else
                                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false">{{ __('Đăng Nhập ') }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                <li><a href="{!! url('/logout') !!}">{{ __('Đăng Xuất   ') }}</a></li>
                                            @else
                                                <li><a href="{!! url('/login') !!}">{{ __(' Người Thuê Sân  ') }}</a>
                                                </li>
                                                <li><a href="{!! url('/vendorLogin') !!}">{{ __('Chủ Sân  ') }}</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false">{{ __('Đăng Kí ') }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{!! url('/register ') !!}">{{ __(' Thuê Sân  ') }}</a></li>
                                            <li><a href="{!! url('/vendorRegister') !!}">{{ __('Chủ Sân  ') }}</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
