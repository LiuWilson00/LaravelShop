@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

@endsection


@section('content')
    <form method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
        @csrf
        <div id="main"></div>
    </form>

@endsection

@section('inline_js')
    <script>
        render.Members.register({
            email: "{{ old('email') }}",

            backHref: "{{ route('index') }}"

        })
    </script>
@endsection
