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
                <div>
                    <a style="font-size:1.25rem;margin-right:10px"
                        href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
                    <a style="color:gray"
                        href="{{ route('products.index', ['category_id' => @$product->category->id]) }}">{{ @$product->category->name }}
                    </a>

                </div>
                <div class="image-group">
                    <img src="{{ $product->image_url }}" width="400" alt="product">
                </div>
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
