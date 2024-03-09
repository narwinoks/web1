<!DOCTYPE html>
<html lang="en">
@include('templates.public.head')

<body>
    @routes
    @include('templates.public.nav')
    @yield('content')
    @include('templates.public.footer')
</body>

</html>
