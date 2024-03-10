<!DOCTYPE html>
<html lang="en">
@php
    $profile = json_decode(request()->cookie('profile'), true);
@endphp
@include('templates.public.head')

<body>
    @routes
    @include('templates.public.nav')
    @yield('content')
    @include('templates.public.footer')
</body>

</html>
