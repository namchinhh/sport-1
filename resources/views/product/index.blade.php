@extends('master')
@section('title', 'View all Products')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Products </h2>
            </div>
            @if ($products->isEmpty())
                <p> khong co san.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{!! $product->images !!}</td>
                            <td>
                                <a href="{!! action('ProductsController@show', $product->id) !!}">{!! $product->description !!} </a>
                            </td>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection