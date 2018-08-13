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
            <div class="best-room-carousel ">
                <ul class="row best-room_ul col-lg-9 col-md-9 col-sm-9 col-xs-10 ">
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
                                <div class="best-room-info" style="min-height: 200px;max-height: 300px">
                                    <div class="best-room_t">
                                        {!! $product->description !!}
                                    </div>
                                    <div id="demo"></div>

                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 best-room_li"> {{ __('Không Có Sân Nào Thuộc Cơ Sở Này ') }}</div>
                    @endif
                </ul>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                    <label>{{ __('Chọn ngày:') }} </label>
                    <div id="datepicker" class="input-group date">
                        <input class="form-control" readonly="" type="text" id="date-chosen"
                               onchange="showOption(this.value)">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    <div class="best-room_price">
                        <div style="min-width: 20px;min-height: 200px;max-height: 300px" id="option">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
        </div>

        <style>
            .datepicker {
                width: 20%;
            }

            label {
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

            function showOption(value) {
                var url = "/getProducts/" + {!! $placeId !!}+"/" + value;
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("option").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function myFunction(id) {
                if (confirm(("Thực Hiện Đặt Sân Với Optioidn Đã Chọn?"))) {
                    var date = $('#date-chosen').val();
                    if (date == "") {
                        alert('{{ __('Bạn phải chọn này trước khi đặt.') }}');
                    } else
                        document.location.href = "{!! route('booking'); !!}" + '/' + id + '/' + date;
                } else {

                }
            }

            $(function () {
                $("#datepicker").datepicker({
                    format: "mm/dd/yy",
                    weekStart: 0,
                    calendarWeeks: true,
                    autoclose: true,
                    todayHighlight: true,
                    rtl: true,
                    orientation: "auto"
                }).datepicker('update', new Date());
            });

        </script>
        <link rel="stylesheet prefetch"
              href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    </section>

@endsection
