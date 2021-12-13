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
        render.Cart()
    </script>
@endsection
