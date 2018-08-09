@extends('master')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('Tên Chủ Sân') }}</th>
                    <th>{{ __('Cơ Sở / Mã Sân ') }}</th>
                    <th>{{ __('Ngày Đặt ') }}</th>
                    <th>{{ __('Giá Tiền') }}</th>
                    <th>{{ __('Trạng Thái ') }}</th>
                    <th>{{ __('Giờ Đặt ') }}</th>
                </tr>
                </thead>
                <tbody>
                @for( $i = 0; $i <count($data); $i++)
                    <tr>
                        <td>{!! $data[$i]['vendorName'] !!}</td>
                        <td>{!! $data[$i]['placeName'] !!} / {!! $data[$i]['productId'] !!}</td>
                        <td>{!! $data[$i]['date'] !!}</td>
                        <td>{!! $data[$i]['price'] !!}</td>
                        <td>{!! $data[$i]['status'] !!}</td>
                        <td>{!! $data[$i]['option'] !!}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection