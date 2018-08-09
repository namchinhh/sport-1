@extends('master')

@section('title', trans('Trùm Sân'))

@section('content')
    <form class="form-planner form-horizontal" style="width: 50%; margin-left: 25%;">
        <div class="row">
            <div class="col-md-3 col-xs-12 ">
                <div class="form-group">
                    <label>Check in</label>
                    <input class="form-control __plannerInput" id="datetimepicker1" type="text"
                           placeholder="10-05-2015"/>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="form-group">
                    <label>Check out</label>
                    <input class="form-control __plannerInput" id="datetimepicker2" type="text"
                           placeholder="17-05-2015"/>
                </div>
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="form-group">
                    <label>Adults</label>
                    <div class="theme-select">
                        <select class="form-control __plannerSelect">
                            <option value="">1</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="form-group">
                    <label>Kids</label>
                    <div class="theme-select">
                        <select class="form-control __plannerSelect">
                            <option value="">1</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="form-group">
                    <a href="wizzard-step2.html" class="btn btn-default wizzard-search-btn">Search</a>
                </div>
            </div>
        </div>
    </form>

    <div class="col-lg-6 col-md-6 col-sm-6" style="margin-left: 25%">
        <div class="owl-carousel owl_gallery">
            @foreach($posts as $post)
                <div class="item">
                    <img class="img-responsive" src="{{ asset('posts/images/'.$post->image) }}">
                    <p>{!! $post->content !!}</p>
                    <a href="{{ url($post->url) }}">{{ _('Xem') }}</a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .img-responsive {
            height: 518px;
        }
    </style>
@endsection
