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
                            @for($i =0 ; $i< count($data) - 3; $i++)
                                <div class="post-list_box">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-ms-12 col-xs-12">
                                            <div class="post-list_img"
                                                 style="background:url('{!! asset('images/best-rooms/'.$data[$i]['image']) !!}')">
                                                <a href="#"></a></div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-ms-12 col-xs-12">
                                            <div class="post-list_info">
                                                <div class="post-list_n">{!! $data[$i]['name'] !!}<a
                                                            href="blog-detail.html">

                                                    </a></div>
                                                <div class="post-list_meta">
                                                    <ul class="meta_author">
                                                        <li><i class="fa fa-user-o"></i> <span>{!! $data[$i]['vendor_name'] !!}
                                                                </span>
                                                        </li>
                                                        <li><i class="fa fa-clock-o"></i> <span>
                                                            @if(!empty($data['option'][$i]))
                                                                    {!! $data['option'][$i] !!}
                                                                    @if(!empty($data['price'][$i]))
                                                                        <i class="fa fa-dollar"></i>
                                                                        <span>{!! $data['price'][$i] !!}</span>
                                                                    @else
                                                                        {{ __('Chưa Có Giá Đặt Trước Cho Địa Điểm') }}
                                                                    @endif
                                                                @else
                                                                    {{ __('Chưa Có Option Cho Địa Điểm') }}
                                                                @endif
                                                            </span></li>
                                                    </ul>
                                                </div>
                                                <div class="post-list_desc">{!! $data[$i]['content'] !!}
                                                </div>
                                                <div class="post-list_meta">
                                                    <ul class="meta_author">
                                                        <li> <span>
                                                            {!! $data[$i]['address'] !!}
                                                        </span></li>
                                                    </ul>
                                                </div>
                                                <div class="post-list_readmore"><a
                                                            href="{!! route('getProducts',array('idPlace' => $data[$i]['place_id'])) !!}">{{ __('Read More') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <nav class=" text-center">
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
                                    <input class="form-control" placeholder="Search ..."
                                           type="search">
                                </div>
                                <i class="fa fa-search form-control-search"></i>
                            </div>
                        </form>

                        <div class="sidebar-lpost_t">{{ __('Last posts') }}</div>
                        <ul class="sidebar-lpost_ul">
                            @for($j = 0; $j < count($data[count($data) - 3]); $j ++)

                                <li class="sidebar-lpost_li">
                                    <div class="lpost_img">
                                        <a href="#"><img
                                                    src="{!! asset('images/posts/'. $data[count($data) - 3][$j]->image ) !!}"
                                                    alt=""></a>
                                    </div>
                                    <div class="lpost_info">
                                        <div class="lpost_t"><a
                                                    href="#">{!! $data[count($data) - 3][$j]->url !!}</a>
                                        </div>
                                        <div class="lpost_desc">{!! $data[count($data) - 3][$j]->content !!}
                                        </div>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <!-- /Sidebar tags -->
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
