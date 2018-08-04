@extends('master')
@section('title', 'Contact')
@section('content')
    <div class="container">
        <div class="content">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> {{ __('Success') }}</h4>
                    {{ session('status') }}
                </div>
            @endif

            <div class="title">{{ __('Contact Page') }}</div>
            <div class="quote">{{ __('Our contact page!') }}</div>
        </div>
    </div>
@endsection
