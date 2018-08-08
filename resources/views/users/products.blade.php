@extends('master')
@section('content')
    <section class="best-room">
        <div class="container">
            <div class="title-main">
                <h2 class="h2">{{ __('Các Sân Của Cơ Sở: ') }}{!! $placeName !!} <span
                            class="title-secondary">{{ __('Hiển Thị Các Sân Thuộc Cơ Sở ') }}</span>
                </h2>
            </div>
            <div class="best-room-carousel">
                <ul class="row best-room_ul">
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12 best-room_li">
                                <div class="best-room_img">
                                    <a href="#"><img src="{{ asset('images/best-rooms/1.jpg') }}" alt=""></a>
                                    <div class="best-room_overlay">
                                        <div class="overlay_icn"><a href="#"></a></div>
                                    </div>
                                </div>
                                <div class="best-room-info">
                                    <div class="best-room_t">
                                        {{ $product->description }}
                                    </div>
                                    <div class="best-room_price">
                                        @foreach($optionsOfProduct[$product->id] as $item)
                                            <a href="#"><span>{!! $item->title  !!}</span>
                                                / {{ __('Giá: ') }} {!! $item->price !!}</a> <br/>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 best-room_li"> {{ __('Không Có Sân Nào Thuộc Cơ Sở Này ') }}</div>
                    @endif
                </ul>
            </div>
        </div>
        <div></div>
    </section>
@endsection
