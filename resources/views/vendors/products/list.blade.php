@extends('vendors.shared.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('Danh sách sân')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{__("Địa chỉ")}}</th>
                                <th>{{__("Thông tin")}}</th>
                                <th>{{__("Trạng thái")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($products);$i++)
                                <tr>
                                    <td>{{ $products[$i]->address }}</td>
                                    <td>{{ $products[$i]->description }}</td>
                                    <td>{{ $products[$i]->status }}</td>
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
