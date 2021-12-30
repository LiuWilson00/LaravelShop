@extends('layouts.app')

@section('title', 'About')

@section('sidebar')
    @parent

@endsection


@section('content')
    <form method="POST" action="{{ route('members.session.store') }}" enctype="multipart/form-data">
        @csrf
        <div id="main"></div>
    </form>

@endsection

@section('inline_js')
    <script>
        render.Members.login({
            email: "{{ old('email') }}",

            backHref: "{{ route('index') }}"

        })
    </script>
@endsection
