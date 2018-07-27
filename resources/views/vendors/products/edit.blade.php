@extends('vendors.shared.master')

@if(@$product)

    @section('title', __('Edit'))

@else

    @section('title', __('New'))

@endif

@section('content')
    <!-- page content -->
    <div class="row">
        <!-- left column -->
        <div>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    @if(@$product)
                        <h3 class="box-title">{{ __('Update sân') }}</h3>
                    @else
                        <h3 class="box-title">{{ __('Thêm sân mới') }}</h3>
                    @endif
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
                    {!! Form::hidden('productId', @$product?$product->id:null) !!}
                    {!! Form::hidden('vendorId', $vendorId) !!}
                    <div class="form-group row">
                        <div class="col-xs-3">
                            {!! Form::label('type', trans('Loại mô hình: ')) !!}
                            {!! Form::select(
                                'type',
                                ['1' => trans('Sân Bóng'), '2' => trans('Sân Tennis'), '3' => trans('Bể Bơi')],
                                @$product?$product->type:null,
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
                        {!! Form::file('thumbnail', ['accept' => 'image/*']) !!}
                        @if(@$product)
                            <img src="{{ asset('product_photo/thumbnail/'.$product->thumbnail) }}" width="100"
                                 height="100">
                            <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modal-default">
                                {{ __('Xem Ảnh') }}
                            </button>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="{{ asset('product_photo/thumbnail/'.$product->thumbnail) }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        @endif
                    </div>
                    <div class="box-body pad">
                        {!! Form::label('description', trans('Mô tả: ')) !!}
                        {!! Form::textarea('description', @$product?$product->description:null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', trans('Địa Chỉ: ')) !!}
                        {!! Form::text('address', @$product?$product->address:null, ['class'=>'form-control', 'required'=>'true']) !!}
                    </div>
                    @if(@$product)
                        <div class="form-group">
                            {!! Form::label('images', trans('Ảnh Sân: ')) !!}
                            {!! Form::hidden('images', '') !!}
                            <div class="dropzone" id="my-dropzone" name="myDropzone"></div>
                        </div>
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="form-group">
                    <table class="form-table" id="option-table">
                        <a href="javascript:void(0);" class="addOption">Add</a>
                        @if(@$options)
                            @foreach($options as $option)
                                <tr valign="top">
                                    <th scope="row">{!! Form::label('options', trans('Lựa chọn: ')) !!}</th>
                                    <td>
                                        {!! Form::hidden('options[id][]', $option->id) !!}
                                        {!! Form::text('options[title][]', $option->title,
                                           ['class'=>'form-control', 'required'=>'true', 'placeholder'=>trans('Nhãn')]) !!} &nbsp;
                                        {!! Form::text('options[price][]', $option->price,
                                            ['class'=>'form-control', 'required'=>'true', 'placeholder'=>trans('Giá')]
                                        ) !!} &nbsp;
                                        {!! Form::textarea('options[description][]', $option->description,
                                            ['class'=>'form-control', 'placeholder'=>trans('Mô tả')]
                                        ) !!} &nbsp;
                                        <a href="javascript:void(0);" class="remCF">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr valign="top">
                                <th scope="row">{!! Form::label('options', trans('Lựa chọn: ')) !!}</th>
                                <td>
                                    {!! Form::text('options[title][]', null,
                                       ['class'=>'form-control', 'required'=>'true', 'placeholder'=>trans('Nhãn')]
                                    ) !!} &nbsp;
                                    {!! Form::text('options[price][]', null,
                                        ['class'=>'form-control', 'required'=>'true', 'placeholder'=>trans('Giá')]
                                    ) !!} &nbsp;
                                    {!! Form::textarea('options[description][]', null,
                                        ['class'=>'form-control', 'placeholder'=>trans('Mô tả')]
                                    ) !!} &nbsp;
                                    <a href="javascript:void(0);" class="remCF">Remove</a>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
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
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
    <script src="{{ asset('/js/dropzone.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('description');
            $(".remCF").click(function () {
                $(this).parent().parent().remove();
            });
            $(".addOption").click(function () {
                $("#option-table").append('<tr valign="top">' +
                    '<th scope="row">' +
                    '{!! Form::label('options', trans('Lựa chọn: ')) !!}' +
                    '</th>' +
                    '<td>' +
                    '{!! Form::text('options[title][]', null, ['class'=>'form-control', 'required'=>'true', 'placeholder'=>trans('Nhãn')]) !!} &nbsp; ' +
                    '{!! Form::text('options[price][]', null, ['class'=>'form-control', 'required'=>'true', 'placeholder'=>trans('Giá')]) !!} &nbsp; ' +
                    '{!! Form::textarea('options[description][]', null, ['class'=>'form-control', 'placeholder'=>trans('Mô tả')]) !!} &nbsp; ' +
                    '<a href="javascript:void(0);" class="remCF">Remove</a>' +
                    '</td>' +
                    '</tr>');
                $(".remCF").click(function () {
                    $(this).parent().parent().remove();
                });
            });

        });

        Dropzone.options.myDropzone = {
            url: '{{ url('uploadProductImage') }}',
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 10,
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictFileTooBig: 'Image is bigger than 5MB',
            addRemoveLinks: true,
            init: function () {
                var myDropzone = this;

                myDropzone.on("sending", function (file, xhr, formData) {
                    formData.append("productId", {!! @$product?$product->id:null !!});
                });
                myDropzone.on("success", function (file, response) {
                    file.name = response;
                    file.productImage = response;
                });

                @if(@$images)

                    var images = JSON.parse("{{ $images }}".replace(/&quot;/ig, '"'), true);

                    for (var image in images) {

                        var mockFile = {name: image, size: images[image]};

                        myDropzone.emit("addedfile", mockFile);

                        myDropzone.emit("thumbnail", mockFile, "{{ asset('product_photo/slider') }}/" + image);

                    }

                @endif
            },
            removedfile: function (file) {
                var productImage = file.productImage;
                if (!productImage) {
                    productImage = file.name;
                    productImage = productImage.replace(/\s+/g, '-').toLowerCase();
                }

                var data = {
                    id: productImage,
                    productId: '{{ @$product?$product->id:null }}'
                };
                /*only spaces*/
                $.ajax({
                    type: 'POST',
                    url: '{{ url('removeProductImage') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: data,
                    dataType: 'html',
                    success: function (data) {
                        console.log(data);
                    }
                });
                var _ref;
                if (file.previewElement) {
                    if ((_ref = file.previewElement) != null) {
                        _ref.parentNode.removeChild(file.previewElement);
                    }
                }
                return this._updateMaxFilesReachedClass();
            },
            previewsContainer: null,
            hiddenInputContainer: "body",
        }
    </script>
@endsection
