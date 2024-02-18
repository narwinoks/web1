<!DOCTYPE html>
<html lang="en">
@include('templates.public.head')

<body>
    @include('templates.public.nav')
    @yield('content')
    @include('templates.public.footer')
</body>
</html>
