@extends('master')

@section('title', trans('Trùm Sân'))

@section('content')
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="owl-carousel owl_gallery">
            <div class="item"><img class="img-responsive" src="{{ asset('example/sanbongdadanang.png') }}"></div>
            <div class="item"><img class="img-responsive" src="{{ asset('example/khu-the-thao-coma6.jpg') }}"></div>
            <div class="item"><img class="img-responsive" src="{{ asset('example/sanbongdadanang.png') }}"></div>
            <div class="item"><img class="img-responsive" src="{{ asset('example/khu-the-thao-coma6.jpg') }}"></div>
            <div class="item"><img class="img-responsive" src="{{ asset('example/sanbongdadanang.png') }}"></div>
            <div class="item"><img class="img-responsive" src="{{ asset('example/khu-the-thao-coma6.jpg') }}"></div>
            <div class="item"><img class="img-responsive" src="{{ asset('example/sanbongdadanang.png') }}"></div>
            <div class="item"><img class="img-responsive" src="{{ asset('example/khu-the-thao-coma6.jpg') }}"></div>
        </div>
    </div>

@endsection
