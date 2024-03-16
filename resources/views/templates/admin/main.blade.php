<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <link href="{{ asset('assets/img/icon.png') }}" rel="shortcut icon" type="image/png">
    <meta name="author" content="herios" />
    <meta name="_token" content="{{ csrf_token() }}" />
    @include('templates.admin.styles')
</head>

<body>
    @include('templates.admin.navbar')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <div class="page-header-title">
                                                <h4 class="h4 fw-bold m-b-10">{{ Breadcrumbs::current()->title }}</h4>
                                            </div>
                                            <ul class="breadcrumb">
                                                {{ Breadcrumbs::render() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates.admin.script')
</body>

</html>
