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
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
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
                    {{ Form::hidden('vendorId', $vendorId) }}
                    <div class="form-group row">
                        <div class="col-xs-3">
                            {!! Form::label('type', trans('Loại mô hình: ')) !!}
                            {!! Form::select(
                                                'type',
                                                ['1' => trans('Sân Bóng'), '2' => trans('Sân Tennis'), '3' => trans('Bể Bơi')],
                                                null,
                                                ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-3">
                            {!! Form::label('status', trans('Hoạt động: ')) !!}
                            {!! Form::checkbox('status', '1',['class'=>'js-switch','checked'=>"checked"]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('Ảnh Thumbnail: ')) !!}
                        {!! Form::file('thumbnail', ['accept' => 'image/*','required'=>'true']) !!}
                    </div>

                    <div class="box-body pad">
                        {!! Form::label('description', trans('Mô tả: ')) !!}
                        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', trans('Địa Chỉ: ')) !!}
                        {!! Form::text('address',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>

                    {{ Form::hidden('images', '') }}

                    <div class="form-group">
                        <table class="form-table" id="customFields">
                            <tr valign="top">
                                <th scope="row"><label for="customFieldName">Lựa chọn</label></th>
                                <td>
                                    <input type="text" class="code" name="options[title][]"
                                           placeholder="Nhãn" required/> &nbsp;
                                    <input type="text" class="code" name="options[price][]"
                                           placeholder="Giá" required/> &nbsp;
                                    <textarea class="code" name="options[description][]"
                                              placeholder="Mô tả"></textarea> &nbsp;
                                    <a href="javascript:void(0);" class="addCF">Add</a>
                                </td>
                            </tr>
                        </table>
                    </div>
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
            $(".addCF").click(function(){
                $("#customFields").append('<tr valign="top">' +
                    '<th scope="row">' +
                    '<label for="customFieldName">Lựa chọn</label>' +
                    '</th>' +
                    '<td>' +
                    '<input type="text" class="code" name="options[title][]" placeholder="Nhãn" /> &nbsp; ' +
                    '<input type="text" class="code" name="options[price][]" placeholder="Giá" /> &nbsp;' +
                    '<textarea type="text" class="code" name="options[description][]" placeholder="Mô tả" ></textarea> &nbsp;' +
                    '<a href="javascript:void(0);" class="remCF">Remove</a>' +
                    '</td>' +
                    '</tr>');
            });
            $("#customFields").on('click','.remCF',function(){
                $(this).parent().parent().remove();
            });
        })
    </script>
@endsection
