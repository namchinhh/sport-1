@extends('master')
@section('content')
    <section class="breadcrumbs" style="background-image: url({!! asset('images/posts/1.jpg') !!})">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h1">{!! $namePage  !!} </h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="#">{{ __('Home') }}</a><i class="fa fa-angle-right"></i></li>
                        <li class="active">{{ $namePage }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="blog-box __post">
                        <div class="post-list">
                            @foreach($products as $product)
                                <div class="post-list_box">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-ms-12 col-xs-12">
                                            <div class="post-list_img"
                                                 style="background:url({!! asset(''.$product->image) !!})"><a
                                                        href="#"></a></div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-ms-12 col-xs-12">
                                            <div class="post-list_info">
                                                <div class="post-list_n"><a href="blog-detail.html">
                                                        @if($product->place_id == 2)
                                                        @endif
                                                    </a></div>
                                                <div class="post-list_meta">
                                                    <ul class="meta_author">
                                                        <li><i class="fa fa-user-o"></i> <span>Robert Rodriguez</span>
                                                        </li>
                                                        <li><i class="fa fa-folder-o"></i> <span>Travel</span></li>
                                                        <li><i class="fa fa-clock-o"></i> <span>11 Dec, 2016</span></li>
                                                    </ul>
                                                </div>
                                                <div class="post-list_desc">Debating me breeding be answered an he.
                                                    Spoil
                                                    event was words her off cause any. Tears woman which no is world
                                                    miles
                                                    woody. Wished be do mutual except in effect answer. Had boisterous
                                                    friendship thoroughly cultivated.
                                                </div>
                                                <div class="post-list_readmore"><a href="#">Read More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav class="text-center">
                            <ul class="pagination">
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="post-sidebar_lpost">
                        <form action="#" class="form-horizontal post-search form-wizzard">
                            <div class="form-group has-feedback">
                                <div class="search-group">
                                    <input class="form-control" placeholder="Search ..." type="search">
                                </div>
                                <i class="fa fa-search form-control-search"></i>
                            </div>
                        </form>

                        <div class="sidebar-lpost_t">Last posts</div>
                        <ul class="sidebar-lpost_ul">
                            <li class="sidebar-lpost_li">
                                <div class="lpost_img">
                                    <a href="#"><img src="{!! asset('images/posts/1.jpg') !!}" alt=""></a>
                                </div>
                                <div class="lpost_info">
                                    <div class="lpost_t"><a href="#">Grand super lux</a></div>
                                    <div class="lpost_desc">At vero eos et accusamus et iusto blanditiis praesentium
                                    </div>
                                </div>
                            </li>
                            <li class="sidebar-lpost_li">
                                <div class="lpost_img">
                                    <a href="#"><img src="{!! asset('images/posts/1.jpg') !!}" alt=""></a>
                                </div>
                                <div class="lpost_info">
                                    <div class="lpost_t"><a href="#">Grand super lux</a></div>
                                    <div class="lpost_desc">At vero eos et accusamus et iusto blanditiis praesentium
                                    </div>
                                </div>
                            </li>
                            <li class="sidebar-lpost_li">
                                <div class="lpost_img">
                                    <a href="#"><img src="{!! asset('images/posts/1.jpg') !!}" alt=""></a>
                                </div>
                                <div class="lpost_info">
                                    <div class="lpost_t"><a href="#">Grand super lux</a></div>
                                    <div class="lpost_desc">At vero eos et accusamus et iusto blanditiis praesentium
                                    </div>
                                </div>
                            </li>
                            <li class="sidebar-lpost_li">
                                <div class="lpost_img">
                                    <a href="#"><img src="{!! asset('images/posts/1.jpg') !!}" alt=""></a>
                                </div>
                                <div class="lpost_info">
                                    <div class="lpost_t"><a href="#">Grand super lux</a></div>
                                    <div class="lpost_desc">At vero eos et accusamus et iusto blanditiis praesentium
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="sidebar-lpost_t">Popular Tags</div>
                        <ul class="sidebar-tags_ul">
                            <li class="sidebar-tags_li"><a href="#">Design</a></li>
                            <li class="sidebar-tags_li"><a href="#">Portfolio</a></li>
                            <li class="sidebar-tags_li"><a href="#">Digital</a></li>
                            <li class="sidebar-tags_li"><a href="#">Brending</a></li>
                            <li class="sidebar-tags_li"><a href="#">Graphic design</a></li>
                            <li class="sidebar-tags_li"><a href="#">Theme</a></li>
                            <li class="sidebar-tags_li"><a href="#">Love</a></li>
                            <li class="sidebar-tags_li"><a href="#">Culture</a></li>
                        </ul>
                    </div>
                    <!-- /Sidebar tags -->
                </div>
            </div>
        </div>
    </section>
@endsection
