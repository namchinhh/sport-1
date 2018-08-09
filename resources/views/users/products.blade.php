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
        <label>Chọn ngày: </label>
        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
            <input class="form-control" readonly="" type="text" id="date-chosen">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
        <style>label {
                margin-left: 20px;
            }

            #datepicker {
                width: 180px;
                margin: 0 20px 20px 20px;
            }

            #datepicker > span:hover {
                cursor: pointer;
            }
        </style>

        <script type="text/javascript">
            function myFunction(id) {
                if (confirm(("Thực Hiện Đặt Sân Với Optioidn Đã Chọn?"))) {
                    var date = $('#date-chosen').val();
                    var dateArray = date.split("-");
                    var day = dateArray[0];
                    var month = dateArray[1];
                    var year = dateArray[2];
                    if (date == "") {
                        alert('{{ __('Bạn phải chọn này trước khi đặt.') }}');
                    } else
                        document.location.href = "{!! route('booking'); !!}" + '/' + id + '/' + day + '/' + month + '/' + year;
                } else {

                }
            }

            $(function () {
                $("#datepicker").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
        </script>
        <link rel="stylesheet prefetch"
              href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    </section>

@endsection
