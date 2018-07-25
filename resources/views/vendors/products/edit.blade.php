@extends('vendors.shared.master')

@section('title', __('New'))

@section('content')
    <!-- page content -->
    <div class="row">
        <!-- left column -->
        <div>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Thêm sân mới') }}</h3>
                </div>
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i>{{ __('Error!') }}</h4>
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i>
                        {{ session('success') }}
                    </div>
                @endif
            <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open([
                    'method' => 'POST',
                    'files' => 'true',
                    'route' => 'storeProduct'
                ]) !!}
                <div class="box-body">
                    {!! Form::hidden('vendorId', $vendorId) !!}
                    <div class="form-group row">
                        <div class="col-xs-3">
                            {!! Form::label('type', trans('Loại mô hình: ')) !!}
                            {!! Form::select(
                                'type',
                                ['1' => trans('Sân Bóng'), '2' => trans('Sân Tennis'), '3' => trans('Bể Bơi')],
                                null,
                                ['class'=>'form-control']
                            ) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-3">
                            {!! Form::label('status', trans('Hoạt động: ')) !!}
                            {!! Form::checkbox('status', '1', ['class'=>'js-switch', 'checked'=>"checked"]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('Ảnh Thumbnail: ')) !!}
                        {!! Form::file('thumbnail', ['accept' => 'image/*', 'required'=>'true']) !!}
                    </div>

                    <div class="box-body pad">
                        {!! Form::label('description', trans('Mô tả: ')) !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', trans('Địa Chỉ: ')) !!}
                        {!! Form::text('address', null, ['class'=>'form-control', 'required'=>'true']) !!}
                    </div>
                    {{ Form::hidden('images', '') }}
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {!! Form::submit( trans('Lưu'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!--/.col (left) -->
    </div>

    <!-- /page content -->
    <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('description');
        })
    </script>
@endsection
