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
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>loại mô hình kinh doanh:</label>
                            <select class="form-control">
                                <option>Sân Bóng</option>
                                <option>Sân Tennis</option>
                                <option>Bể Bơi</option>
                            </select>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                Hoạt động
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh Thumbnail</label>
                            <input type="file" id="exampleInputFile">

                            <p class="help-block">Example block-level help text here.</p>
                        </div>

                        <div class="box-body pad">
                            <form>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Different Width</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder=".col-xs-3">
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" placeholder=".col-xs-4">
                        </div>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder=".col-xs-5">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>

    <!-- /page content -->
    <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
        })
    </script>
@endsection
