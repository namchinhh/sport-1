@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('Vendor Login') }}</div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if($errors->has('errorlogin'))
                    <div class="alert alert-danger">
                        {{ $errors->first('errorlogin') }}
                    </div>
                @endif

                <div class="card-body">
                    {!! Form::open(['method' => 'POST','action' => 'Auth\LoginController@postLoginVendor'])!!}
                    {{ csrf_field() }}
                    <div class="form-group row">
                        {!!Form::label('email', __('E-Mail Address') ,['class'=>'col-sm-4 col-form-label text-md-right']) !!}
                        <div class="col-md-6">
                            {!! Form::email('email', old('email'), array('placeholder' => 'Email', 'class' => 'form-control $errors->has(\'email\') ? \' is-invalid\' : \'\'  ')) !!}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('password',__('Password'),['class' => 'col-md-4 col-form-label text-md-right']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password',['class' => 'form-control $errors->has(\'password\') ? \' is-invalid\' : \'\' ']) !!}
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                                {!! Form::checkbox('remember')  !!}
                                {!! Form::label('remember',__(' Remember Me'),['class'=>'form-check-label']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">

                            {!! Form::submit(__('login'),['class'=>'btn btn-primary']) !!}

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
