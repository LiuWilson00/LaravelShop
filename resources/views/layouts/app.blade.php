<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Roy Store - @yield('title')</title>
    @include('layouts.css')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <!-- Page Heading -->

        <!-- Page Content -->
        {{-- <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
            @if (MemberAuth::isLiggedIn())
                <p>Hi, {{ MemberAuth::member()->email }}</p>
                <form method="POST" action="{{ route('members.session.delete') }}">
                    @csrf
                    @method('DELETE')
                    <x-dropdown-link :href="route('members.session.delete')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @else
                <a href="{{ route('members.session.create') }}" class="text-sm text-gray-700 underline">Login</a>
                <a href="{{ route('members.create') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
        </div> --}}
        @if (Route::has('login'))
            <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <p>hi,{{ Auth::user()->name }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <main>


            <div id="app" class="container">
                @yield('content')
            </div>
        </main>
        <div class="err">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>
@include('layouts.js')
@section('inline_js')
@show

</html>
