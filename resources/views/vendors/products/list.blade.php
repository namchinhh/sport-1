@extends('vendors.shared.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href='{{ url('vendor/product/new') }}'>
                            <button type="button" class="btn btn-primary btn-lg">{{ __('Thêm Mới') }}</button>
                        </a>
                    </div>
                    @if(session('msg'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i>
                            {{ session('msg') }}
                        </div>
                @endif
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ __("Id") }}</th>
                                <th>{{ __("Thông tin") }}</th>
                                <th>{{ __("Trạng thái") }}</th>
                                <th>{{ __("Khởi tạo") }}</th>
                                <th>{{ __("Cập nhật") }}</th>
                                <th>{{ __("Sửa sân") }}</th>
                                <th>{{ __("Xóa sân") }}</th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($products);$i++)
                                @php
                                    if($products[$i]->status == 1)
                                    {
                                        $statusString = "Hoạt động";
                                    }else
                                    {
                                        $statusString = "Bảo trì";
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $products[$i]->id }}</td>
                                    <td>{{ $products[$i]->description }}</td>
                                    <td>{{ $statusString }}</td>
                                    <td>{{ $products[$i]->created_at }}</td>
                                    <td>{{ $products[$i]->updated_at }}</td>
                                    <td>
                                        <a href='{{ url('vendor/product/'.$products[$i]->id) }}'>
                                            <button type="submit" class="btn btn-primary">{{ __('Sửa') }}</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='{{ url('vendor/delete-product/'.$products[$i]->id) }}'>
                                            <button type="submit" class="btn btn-warning">{{ __('Xóa') }}</button>
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
