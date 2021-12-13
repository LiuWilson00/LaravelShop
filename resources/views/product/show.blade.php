@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div id="main"></div>
@endsection

@section('inline_js')
    <script>
        render.Product({
            name: "{{ $product->name }}",
            price: "{{ $product->price }}",
            imgUrl: "{{ $product->image_url }}",
            backHref: "{{ route('products.index') }}",
            id: {{ $product->id }}
        })
    </script>
@endsection
