@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>
        <?php
        
        echo 'about page';
        
        ?>
    </p>
    <p>level: {{ $level }}</p>
    <p>version: {{ $ver }} </p>
@endsection
