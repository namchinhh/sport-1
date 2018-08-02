@extends('master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'post','action'=>'Auth\RegisterController@createUser']) !!}
                        <div class="form-group row">
                            {!! Form::label('name',__('name'),['class'=> 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), array('placeholder' => 'Name', 'class' => 'form-control $errors->has(\'email\') ? \' is-invalid\' : \'\'  ')) !!}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            {!! Form::label('phone',__('Phone'),['class'=> 'col-md-4 col-form-label text-md-right']) !!}
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                {!! Form::text('phone', old(''), array('placeholder' => 'Phone', 'class' => 'form-control $errors->has(\'phone\') ? \' is-invalid\' : \'\'  ')) !!}
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            {!! Form::label('username',__('username'),['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('username', old(''), array('placeholder' => 'Username', 'class' => 'form-control $errors->has(\'username\') ? \' is-invalid\' : \'\'  ')) !!}
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('contact',__('contact'),['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('contact', old('contact'), array('placeholder' => 'Contact', 'class' => 'form-control $errors->has(\'contact\') ? \' is-invalid\' : \'\'  ')) !!}
                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('email',__('email'),['class' => 'col-md-4 col-form-label text-md-right']) !!}
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
                            {!! Form::label('password',__('password'),['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', array( 'class' => 'form-control $errors->has(\'password\') ? \' is-invalid\' : \'\'  ')) !!}
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password-confirm',__('password-confirm'),['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password-confirm', array('class' => 'form-control $errors->has(\'password-confirm\') ? \' is-invalid\' : \'\'  ')) !!}
                                @if ($errors->has('password-confirm'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password-confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(__('Register'), ['class' =>'btn btn-primary'] ) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
