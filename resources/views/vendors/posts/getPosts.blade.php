@extends('vendors.shared.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> {{ __('Tất Cả Bài Đăng') }}</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Content') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th colspan='2'>{{ __('Action') }}</th>
                            </tr>
                            @for($i=0;$i<count($posts);$i++)
                                <tr>
                                    <td>{{ $posts[$i]->id }}</td>
                                    <td>{{ $posts[$i]->content }}</td>
                                    <td>{{ $posts[$i]->image }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
@endsection