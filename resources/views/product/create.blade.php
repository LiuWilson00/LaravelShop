@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

@endsection

{{-- @section('content')

    <a href="{{ route('products.index') }}">
        back
    </a>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <h1>Create Product</h1>
        <input type="text" value="{{ old('name') }}" name="name" placeholder="plese enter product name">
        <input type="number" value="{{ old('price') }}" name="price" placeholder="plese enter product price">
        <input type="file" value="{{ old('image') }}" name="image" placeholder="plese enter product image">
        <button type="submit">submit</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection --}}


@section('content')
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div id="main"></div>
    </form>

@endsection

@section('inline_js')
    <script>
        render.Products.create({
            name: "{{ old('name') }}",
            price: "{{ old('price') }}",
            imgUrl: "{{ old('image') }}",
            backHref: "{{ route('products.index') }}",

        })
    </script>
@endsection
