<!DOCTYPE html>
<html lang="en">
@php
    $profile = request()->session()->has('profile') ? json_decode(request()->session()->get('profile'), true) : null;
@endphp
@include('templates.public.head')

<body>
    @routes
    @include('templates.public.nav')
    @yield('content')
    @include('templates.public.footer')
</body>

</html>
