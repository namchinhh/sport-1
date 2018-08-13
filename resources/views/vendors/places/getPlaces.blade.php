@extends('vendors.shared.master')

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
                    <h3 class="box-title"> {{ __('Cơ Sở Của Bạn ') }}</h3>
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
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th colspan="2" class="text-center">{{ __('Action') }}</th>
                        </tr>
                        @foreach($places as $places)
                            {!! Form::model($places, array('route' => array('editPlace', $places->id),'method' =>'post')) !!}
                            {!! csrf_field() !!}
                            <tr>
                                <td>{{ str_limit($places->name, $limit = 30, $end = '...') }}</td>
                                <td>{{ str_limit($places->address, $limit = 30, $end = '...') }}</td>
                                </td>
                                <td>
                                    {!! Form::submit(__('Edit Place'),['class' => 'btn btn-block btn-info']) !!}
                                </td>
                                <td><a href="{{route('destroyPlace', array('id' => $places->id))}}"
                                       class="btn btn-danger float-lg-right">{{__('Xóa Cơ Sở')}}</a>
                                </td>
                            </tr>
                            {!! Form::close() !!}
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection