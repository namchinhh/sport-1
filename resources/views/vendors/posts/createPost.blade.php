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
                    @if(empty($post))
                        {!! Form::open(['method' => 'post','route' => 'storePost','files' => 'true']) !!}
                        {!! Form::textarea('content',old('content'),['class'=>'form-control','row' => '10','col'=>'80']) !!}
                        <div class="form-group">
                            {!! Form::label('image',trans('Image')) !!}
                            {!! Form::file('image',null,['id' => 'exampleInputFile']) !!}
                            <br/>
                            {!! Form::label('url',trans('Đường Dẫn Trang Chi Tiết:')) !!}
                            {!! Form::url('url', null, array('class' => 'form-control'))  !!}
                            <p class="help-block">{{ __('For Image Post') }}</p>
                        </div>
                        {!! Form::submit(__('Đăng Bài'),['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method' => 'post', 'route' => array('updatePost', $post->id),'files'=> 'true' ]) !!}
                        {!! Form::textarea('content',$post->content,['class'=>'form-control','row' => '10','col'=>'80']) !!}
                        <div class="form-group">
                            {!! Form::label('image',trans('Image')) !!}
                            {!! Form::file('image',['id' => 'exampleInputFile']) !!}
                            <br/>
                            {!! Form::label('imageold',trans('Old Image: ')) !!}
                            {!! Form::image('posts/images/'.$post->image,'success', array( 'width' => 100, 'height' => 100 ))  !!}
                            <br/>
                            {!! Form::label('url',trans('Đường Dẫn Trang Chi Tiết:')) !!}
                            {!! Form::url('url', $post->url, array('class' => 'form-control'))  !!}
                            <p class="help-block">{{ __('For Image Post') }}</p>
                        </div>
                        {!! Form::submit(__('Cập Nhật Bài Đăng') ,['class'=>'btn btn-primary']) !!}
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
