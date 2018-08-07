@extends('vendors.shared.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> {{ __('Error') }}!</h4>
                    {{ session('error') }}
                </div>
            @endif
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">{{ __('Nội Dung Bài Viết') }}
                        <small>{{ __('Thêm thông tin hấp dẫn cho những sự kiện của bạn') }}</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    @if(empty($place))
                        {!! Form::open(['method' => 'post','route' => 'storePlace']) !!}
                        <div class="form-group">
                            {!! Form::label('name',trans('Tên Cơ Sở :')) !!}
                            {!! Form::text('name', old('name'), array('class' => 'form-control'))  !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('address',trans('Địa Chỉ Cơ Sở :')) !!}
                            {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
                        </div>
                        {!! Form::submit(__('Đăng Bài'),['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method' => 'post', 'route' => array('updatePlace', $place->id),'files'=> 'true' ]) !!}
                        <div class="form-group">
                            {!! Form::label('name',trans('Tên Cơ Sở :')) !!}
                            {!! Form::text('name', $place->name, array('class' => 'form-control'))  !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('address',trans('Địa Chỉ Cơ Sở :')) !!}
                            {!! Form::text('address',$place->address,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::submit(__('Cập Nhật Cơ Sở'),['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    @endif

                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>

    <script type="text/javascript" src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('bower_components/ckeditor/ckeditor.js') !!}"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('content')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection
