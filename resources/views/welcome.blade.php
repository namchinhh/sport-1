@extends('master')
@section('title', 'Contact')
@section('content')


    <div class="container">
        <div class="content">
            @if($errors->has('errorRegister'))
                <div class="alert alert-danger">
                    {{ $errors->first('errorRegister') }}
                </div>
            @endif
            <div class="title">Contact Page</div>
            <div class="quote">Our contact page!</div>
        </div>
    </div>
@endsection