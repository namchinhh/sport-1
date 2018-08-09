@extends('master')

@section('content')

    <section class="best-room">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
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
                                    <a href="#"><img src="{{ asset('product_photo/thumbnail/'.$product->thumbnail) }}"
                                                     alt=""></a>
                                    <div class="best-room_overlay">
                                        <div class="overlay_icn"><a href="#"></a></div>
                                    </div>
                                </div>
                                <div class="best-room-info">
                                    <div class="best-room_t">
                                        {!! $product->description !!}
                                    </div>
                                    <div id="demo"></div>
                                    <div class="best-room_price">
                                        @foreach($optionsOfProduct[$product->id] as $item)
                                            <div>
                                                {!! Form::button(' <span>'.$item->title.'</span>'.'/'.
                                                __('Giá:') . $item->price . '<br/>',
                                                array('id' => 'pop_button','class' => 'btn btn-primary', 'type' => 'button','onclick' => 'myFunction('.$item->id.');')) !!}
                                            </div>
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
        <div>
        </div>
    </section>

@endsection
