<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
    <div class="navbar-wrapper container">
        <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
            <ul class="nav pcoded-inner-navbar sidenav-inner">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.image') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-file"></i></span><span class="pcoded-mtext">Image</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.booking') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-calendar"></i></span><span class="pcoded-mtext">Booking</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pricelist') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-rewind"></i></span><span class="pcoded-mtext">Pricelist</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.review') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="fas fa-star"></i></span><span class="pcoded-mtext">Review</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.banner') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="fa fa-film"></i></span><span class="pcoded-mtext">Banner</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.qa') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="fa fa-question-circle"></i></span><span class="pcoded-mtext">QA</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="container">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="{{ url('/') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('assets/img/logo-admin.png') }}" height="30" alt="logo-admin" class="logo">
                <img src="{{ asset('assets/templates/images/logo-icon.png') }}" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('assets/templates/images/user/avatar-1.jpg') }}" class="img-radius"
                                    alt="User-Profile-Image">
                                <span>{{ auth()->user()->name }}</span>
                                <a href="#" class="dud-logout logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="{{ route('account.profile') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Profile</a></li>
                                <li><a href="#" class="dropdown-item logout"><i
                                            class="feather icon-lock"></i>Logout</a>
                                </li>
                            </ul>
                            <form action="{{ route('account.logout') }}" method="post" id="form-logout"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- [ Header ] end -->
