@extends('layouts.app')

@section('title', 'Home')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <?php
    
    echo 'hello world';
    
    ?>
    <p>This is my body content.</p>
@endsection
