@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

@endsection

@section('content')
    <a href="{{ route('products.index') }}">
        back
    </a>
    <form method="post" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method("put")
        <h1>Product</h1>
        <input type="text" name="name" value="{{ $product->name }}">
        <input type="text" name="price" value="{{ $product->price }}">
        <img src="{{ $product->image_url }}" width="400" alt="product">
        <button type="submit">Submit</button>
    </form>
@endsection
