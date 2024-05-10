    @if (Request::segment(1) != null)
        <header class="header py-1 d-sm-block d-none">
            <div class="container-lg item d-flex justify-content-between ">
                <div class="row justify-content-start ">
                    <div class="col-auto">
                        <span><i class="fab fa-whatsapp" aria-hidden="true"></i> {{ $profile['whatsapp'] }}</span>
                    </div>
                    <div class="col-auto">
                        <span><i class="far fa-envelope" aria-hidden="true"></i> {{ $profile['email1'] }}</span>
                    </div>
                </div>
                <div class="row reservasi justify-content-end align-items-center d-none">
                    <div class="col-auto">
                        <a href="{{ route('form') }}" class="mb-0 d-sm-block d-none">Reservasi</a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url(Auth()->user() ? '#' : '/login') }}" id="{{ Auth()->user() ? 'logout' : '' }}"
                            class="mb-0 d-sm-block d-none btn btn-black">{{ Auth()->user() ? 'Logout' : 'Login' }}</a>
                        <form action="{{ route('account.logout') }}" method="post"
                            id="{{ Auth()->user() ? 'form-logout' : '' }}" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar  navbar-index navbar-expand-lg sticky-top navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-center" href="/">
                    <img class="logo-sm" src="{{ asset('assets/img/logo.png') }}" alt="logo-app" height="40">
                </a>
                <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavAltMarkup">
                    <ul class="navbar-nav photo-nav navbar-hilang">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="galleryDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                                <li><a class="dropdown-item" href="{{ url('blog') }}">All</a></li>
                                <li><a class="dropdown-item" href="{{ $profile['youtube'] }}">Videos</a></li>
                                <li><a class="dropdown-item" href="{{ url('studio') }}">Studio</a></li>
                                <li><a class="dropdown-item" href="{{ url('studio-session') }}">Studio Session</a></li>
                                <li><a class="dropdown-item" href="{{ url('wedding') }}">Wedding</a></li>
                                <li><a class="dropdown-item" href="{{ url('prewedding') }}">Prewedding</a></li>
                                <li><a class="dropdown-item" href="{{ url('engagement') }}">Engagement</a></li>
                                <li><a class="dropdown-item" href="{{ url('pengajian') }}">Ceremonial before
                                        wedding</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('kin') }}"">Shutterbox.Kin</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/pl') }}">PriceList</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/products') }}">For Photographers</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/review') }}">Review</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/faq') }}">F.A.Q</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item d-block d-sm-none">
                            <a class="nav-link" href="{{ route('form') }}">Reservasi</a>
                        </li>
                        <li class="nav-item d-block d-sm-none">
                            <a href="{{ url(Auth()->user() ? '#' : '/login') }}"
                                id="{{ Auth()->user() ? 'logout' : '' }}"
                                class="nav-link">{{ Auth()->user() ? 'Logout' : 'Login' }}</a>
                            <form action="{{ route('account.logout') }}" method="post"
                                id="{{ Auth()->user() ? 'form-logout' : '' }}" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler burger" type="button" data-toggle="collapse"
                    data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    @else
        <nav class="navbar navbar-expand-lg  navbar-dark fixed-top navbar-bg">
            <div class="container">
                <a class="navbar-brand text-center" href="/">
                    <img class="logo-sm-home" src="{{ asset('assets/img/logo-no-bg.png') }}" alt="logo-app"
                        height="40">
                </a>
                <button class="navbar-toggler bugger-d-none burger" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse   justify-content-md-center" id="navbarNavAltMarkup">
                    <ul class="navbar-nav photo-nav-dark navbar-hilang">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="galleryDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                                <li><a class="dropdown-item" href="{{ url('blog') }}">All</a></li>
                                <li><a class="dropdown-item" href="{{ $profile['youtube'] }}">Videos</a></li>
                                <li><a class="dropdown-item" href="{{ url('studio') }}">Studio</a></li>
                                <li><a class="dropdown-item" href="{{ url('studio-session') }}">Studio Session</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('wedding') }}">Wedding</a></li>
                                <li><a class="dropdown-item" href="{{ url('prewedding') }}">Prewedding</a></li>
                                <li><a class="dropdown-item" href="{{ url('engagement') }}">Engagement</a></li>
                                <li><a class="dropdown-item" href="{{ url('pengajian') }}">Ceremonial before
                                        wedding</a></li>
                                <li><a class="dropdown-item" href="{{ url('kin') }}"">Shutterbox.Kin</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/pl') }}">PriceList</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/products') }}">For Photographers</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/review') }}">Review</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/faq') }}">F.A.Q</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item d-block d-sm-none">
                            <a class="nav-link" href="{{ route('form') }}">Reservasi</a>
                        </li>
                        <li class="nav-item d-block d-sm-none">
                            <a href="{{ url(Auth()->user() ? '#' : '/login') }}"
                                id="{{ Auth()->user() ? 'logout' : '' }}"
                                class="nav-link">{{ Auth()->user() ? 'Logout' : 'Login' }}</a>
                            <form action="{{ route('account.logout') }}" method="post"
                                id="{{ Auth()->user() ? 'form-logout' : '' }}" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
    <div class="d-block d-md-none navbar-content">
        @if (Request::segment(1) != null)
            <div class="d-flex text-center mx-2 mt-2 justify-content-end">
                <button type="button" class="btn-close btn-close-white"></button>
            </div>
        @endif
        <ul class="navbar-list">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/blog') }}" class="nav-link">Gallery</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/pl') }}">PriceList</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/products') }}">For Photographers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/review') }}">Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/faq') }}">F.A.Q</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/form') }}">
                    Reservasi
                </a>
            </li>
        </ul>
    </div>
    <style>
        .navbar-index {
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
                z-index: 999;
                background-color: var(--black);
                overflow: hidden;
                transition:width 0.3s ease-in-out;
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

            .nav-link {
                font-size: 20px !important;
                color: var(--white);
                text-decoration: none;
            }

            .nav-link:hover {
                color: var(--white);
                text-decoration: underline;
            }


            .nav-link {
                font-size: 20px !important;
                color: var(--white);
                text-decoration: none;
            }

            .nav-link:hover {
                color: var(--white);
                text-decoration: underline;
            }
        }

        .logo-sm-home {
            background-color: transparent;
            height: 40px;
        }
    </style>
