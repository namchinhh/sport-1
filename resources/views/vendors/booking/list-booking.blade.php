@extends('vendors.shared.master')

@section('title',trans('Booking'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> {{ __('Error') }}!</h4>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success fade in alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ok"></i> {{ __('Success') }}!</h4>
                        {{ session('status') }}
                    </div>
                @endif
                <div class="box-header">
                    <h3 class="box-title"> {{ __('Các đơn đặt: ') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>{{ __('Người đặt') }}</th>
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Lựa chọn') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Ngày Tạo') }}</th>
                            <th colspan="2" class="text-center">{{ __('Actions') }}</th>
                        </tr>
                        @foreach($data as $booking)
                            <tr>
                                <td>{{ $booking['userName'] }}</td>
                                <td>{{ $booking['product'] }}</td>
                                <td>{{ $booking['option'] }}</td>
                                <td>{{ $booking['date'] }}</td>
                                <td>{{ $booking['status'] }}</td>
                                <td>{{ $booking['created_at'] }}</td>
                                <td>
                                    @if($booking['status']=='Đang chờ duyệt' || $booking['status']=='Đã từ chối')
                                        <a href="{{route('acceptBooking', array('id' => $booking['id']))}}"
                                           class="btn btn-info float-lg-right">{{__('Chấp nhận')}}</a>
                                    @endif
                                    @if($booking['status']=='Đang chờ duyệt' || $booking['status']=='Đã chấp nhận')
                                        <a href="{{route('rejectBooking', array('id' => $booking['id']))}}"
                                           class="btn btn-danger float-lg-right">{{__('Từ chối')}}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection