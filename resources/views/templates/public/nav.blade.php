  <header class="header py-1">
      <div class="container-lg item d-flex justify-content-between">
          <div class="row justify-content-start">
              <div class="col-auto">
                  <span><i class="fa fa-whatsapp" aria-hidden="true"></i>  {{ $profile['whatsapp'] }}</span>
              </div>
              <div class="col-auto">
                  <span><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $profile['email1'] }}</span>
              </div>
          </div>
          <div class="row reservasi justify-content-end align-items-center d-none">
              <div class="col-auto">
                  <a href="{{ route('form') }}" class="mb-0 d-sm-block d-none">Reservasi</a>
              </div>
              <div class="col-auto">
                  <a href="{{ url(Auth()->user() ? '#' : '/login') }}" id="{{ Auth()->user() ? 'logout' : '' }}"
                      class="btn btn-black">{{ Auth()->user() ? 'Logout' : 'Login' }}</a>
                  <form action="{{ route('account.logout') }}" method="post"
                      id="{{ Auth()->user() ? 'form-logout' : '' }}" class="d-none">
                      @csrf
                  </form>
              </div>
          </div>
      </div>
  </header>
  <nav class="navbar  navbar-expand-lg sticky-top navbar-light bg-white shadow-sm">
      <div class="container">
          <a class="navbar-brand text-center" href="/"> <img src="{{ asset('assets/img/logo.png') }}"
                  alt="logo-app" height="30"> </a>
          <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavAltMarkup">
              <ul class="navbar-nav photo-nav">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="galleryDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Gallery
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                          <li><a class="dropdown-item" href="#">All</a></li>
                          <li><a class="dropdown-item" href="#">Videos</a></li>
                          <li><a class="dropdown-item" href="#">Studio Session</a></li>
                          <li><a class="dropdown-item" href="#">Wedding</a></li>
                          <li><a class="dropdown-item" href="#">Prewedding</a></li>
                          <li><a class="dropdown-item" href="#">Enggetment</a></li>
                          <li><a class="dropdown-item" href="#">Ceremonial before wedding</a></li>
                          <li><a class="dropdown-item" href="#">Hieros.Kin</a></li>
                      </ul>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="/">PriceList</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="forDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          For Photographers
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="forDropdown">
                          <li><a class="dropdown-item" href="#">Mantra (E-Book)</a></li>
                          <li><a class="dropdown-item" href="#">Preset x Luts</a></li>
                          <li><a class="dropdown-item" href="#">Website Class</a></li>
                          <li><a class="dropdown-item" href="#">Bussines Class (play back)</a></li>
                      </ul>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="/">Review</a>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="/">F.A.Q</a>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="/">About Us</a>
                  </li>
                  <li class="nav-item d-block d-sm-none">
                      <a class="nav-link" href="{{ route('form') }}">Reservasi</a>
                  </li>
              </ul>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
  </nav>
