@extends('vendors.shared.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
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
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    {!! Form::open(['method' => 'post','action' => 'Vendor\VendorPostController@store']) !!}
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                           {{ __('Nhập Nội Dung Cho Bài Viết Của Bạn') }}
                    </textarea>
                    {!! Form::close() !!}
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
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection
