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
        render.Products.show({
            name: "{{ $product->name }}",
            price: "{{ $product->price }}",
            imgUrl: "{{ $product->image_url }}",
            backHref: "{{ route('products.index') }}",
            categoriesList: [
                @foreach ($product->categoriesList() as $category)
                    {
                    "name":"{{ $category->name }}",
                    "category_id":"{{ $category->id }}",
                    "url":"{{ route('products.index', ['category_id' => $category->id]) }}"
                    },
                @endforeach
            ],
            category_naem: "{{ $product->category->name }}",
            id: {{ $product->id }}
        })
    </script>
@endsection
