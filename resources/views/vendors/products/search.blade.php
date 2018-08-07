@extends('vendors.shared.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('Kết quả tìm kiếm') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ __("id") }}</th>
                                <th>{{ __("Địa chỉ") }}</th>
                                <th>{{ __("Thông tin") }}</th>
                                <th>{{ __("Trạng thái") }}</th>
                                <th>{{ __("Khởi tạo") }}</th>
                                <th>{{ __("Cập nhật") }}</th>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @php
                                    $statusString = "";
                                    if($product->status == 1)
                                    {
                                        $statusString = "còn sân";
                                    }else
                                    {
                                        $statusString = "kín lịch";
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->address }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $statusString}}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
