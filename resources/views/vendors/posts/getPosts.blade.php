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
                            <th>{{ __('URL') }}</th>
                            <th colspan="2" class="text-center">{{ __('Action') }}</th>
                        </tr>
                        @foreach($posts as $post)
                            {!! Form::model($post, array('route' => array('editPost', $post->id),'method' =>'post')) !!}
                            {!! csrf_field() !!}
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ str_limit($post->content, $limit = 30, $end = '...') }}</td>
                                <td>{!! Form::image('posts/images/'.$post->image,'success', array( 'width' => 100, 'height' => 100 ))  !!}</td>
                                <td>{{ str_limit($post->url, $limit = 30, $end = '...') }}</td>
                                </td>
                                <td>
                                    {!! Form::submit(__('Edit Post'),['class' => 'btn btn-block btn-info','route' => 'editPost','name' => 'editPost']) !!}
                                </td>
                                <td><a href="{{route('destroyPost', array('id' => $post->id))}}"
                                       class="btn btn-danger float-lg-right">{{__('Xóa Bài Đăng')}}</a>
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