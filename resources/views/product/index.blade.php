@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

@endsection

@section('content')

    <h1>Products</h1>
    <div><a href="{{ route('products.create') }}">create</a></div>
    <div class="products-main">
        @foreach ($products as $product)
            <div class="product">
                <div><a href="{{ route('products.edit', ['product' => $product->id]) }}">edit</a></div>
                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                    <p>{{ $product->name }}</p>
                    <img src="{{ $product->image_url }}" width="400" alt="product">
                </a>
                <div>
                    <form method="post" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
