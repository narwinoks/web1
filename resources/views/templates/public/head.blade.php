<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/img/icon.png') }}" rel="shortcut icon" type="image/png">
    <title>@yield('title', \App\Helpers\Helper::profile('slug'))</title>
    @extends('templates.public.styles')
</head>
