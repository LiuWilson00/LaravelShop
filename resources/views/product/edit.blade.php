@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

@endsection

@section('content')
    {{-- <a href="{{ route('products.index') }}">
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
    </form> --}}
    <form method="post" action="{{ route('products.update', ['product' => $product->id]) }}"
        enctype="multipart/form-data">
        @csrf
        @method("put")
        <div id="main"></div>

    </form>
@endsection

@section('inline_js')


    <script>
        var err = []
        @if ($errors->any())
        
            @foreach ($errors->all() as $error)
                err.push("{{ $error }}")
            @endforeach
        
        @endif
        render.Products.edit({
            name: "{{ $product->name }}",
            price: "{{ $product->price }}",
            imgUrl: "{{ $product->image_url }}",
            backHref: "{{ route('products.index') }}",
            err: err
        })
    </script>
@endsection
