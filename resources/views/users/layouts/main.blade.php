<!doctype html>
<html lang="en">

<head>
    @include('users.partials.head')
</head>

<body>
    @include('users.partials.header')
    @yield('content')
    @include('users.partials.footer')
    @include('users.partials.scripts')
    @yield('script')
</body>

</html>
