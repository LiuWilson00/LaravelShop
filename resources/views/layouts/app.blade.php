<html>

<head>
    <title>Roy Store - @yield('title')</title>
    @include('layouts.css')

</head>

<body>
    @section('sidebar')
        This is the master sidebar.
    @show

    <div id="app" class="container">
        @yield('content')
    </div>
</body>
@include('layouts.js')
@section('inline_js')
@show


</html>
