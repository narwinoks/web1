<footer class="footer">
    <div class="container-md">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="row item">
                    <div class="col-md-2 col-6">
                        <h5 class="h6">Link</h5>
                        <ul class="list">
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('/pl') }}">Pricelist</a>
                            </li>
                            <li>
                                <a href="{{ url('/blog') }}">Portfolio</a>
                            </li>
                            <li>
                                <a href="{{ url('/faq') }}">F.A.Q</a>
                            </li>
                            <li>
                                <a href="{{ url('/about-us') }}">About Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-6">
                        <h5 class="h6">Sosial Media</h5>
                        <div class="social">
                            <a href="{{ $profile['instagram'] }}" target="_blank">
                                <span><i class="fa fa-instagram"></i></span>
                            </a>
                            <a href="{{ $profile['youtube'] }}" target="_blank">
                                <span><i class="fa fa-youtube"></i></span>
                            </a>
                            <a href="{{ $profile['facebook'] }}" target="_blank">
                                <span><i class="fa fa-facebook"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-4">
                        <h5 class="h6">Partners</h5>
                        <div class="partner">
                            <img src="{{ asset('assets/img/' . $profile['partner1']) }}" alt="partner"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-5 col-8">
                        <h5 class="h6">Address</h5>
                        <ul class="list">
                            <li>
                                <a href="/">
                                    <span>
                                        <i class="fa fa-whatsapp"></i>
                                        {{ $profile['whatsapp'] }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/">
                                    <span>
                                        <i class="fa fa-envelope-o"></i>
                                        {{ $profile['email1'] }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/">
                                    <span>
                                        <i class="fa fa-map-marker"></i>
                                        {{ $profile['address'] }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12 text-center">
                <h6>@ {{ date('Y') }} {{ $profile['name'] }}</h6>
            </div>
        </div>
    </div>
</footer>
@extends('templates.public.scripts')
