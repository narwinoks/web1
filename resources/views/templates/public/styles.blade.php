<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.scss') }}">
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/fontawesome-free/css/all.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/plugin/font-awesome/css/font-awesome.css') }}" type="text/css">
@stack('styles')
<style>
    .btn-close-white {
        color: var(--white)
    }

    <style>.navbar-index {
        z-index: 99;
    }

    @media (max-width: 576px) {
        .photo-nav-dark {
            margin-top: 30px;
            background-color: #333;
            color: #fff;
        }

        .dropdown-menu .dropdown-item {
            color: #fff;
        }

        .navbar-hilang {
            display: none;
        }

        .navbar-content {
            position: fixed;
            top: 0;
            right: 0;
            width: 0vw;
            height: 100vh;
            z-index: 999 !important;
            background-color: var(--black);
            overflow: hidden;
            transition: width 0.3s ease-in-out;
            border-radius: 10px 0 0 10px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-end;
            justify-content: end;
        }

        .navbar-content.show {
            width: 55vw;
        }

        .navbar-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: end;
            margin-top: 40%;
        }

        .nav-item {
            padding: 0px 0.5rem;
        }

        .nav-link:hover {
            color: var(--white);
            text-decoration: underline;
        }


        .nav-link {
            font-size: 14px !important;
            color: var(--white);
            text-decoration: none;
        }

        .nav-link:hover {
            color: var(--white);
            text-decoration: underline;
        }

        .bg-white {
            z-index: 99 !important;
        }

        .logo-sm-home {
            background-color: transparent !important;
            height: 20px !important;
        }
    }
</style>
