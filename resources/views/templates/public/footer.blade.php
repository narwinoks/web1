<style>
    .link-foot {

        font-weight: 500;
        font-size: 13px;
        white-space: pre-wrap;
        color: #b5b5b5;
    }

    .link-head {
        margin-bottom: 8px;
        font-weight: 700;
        color: rgb(238, 238, 238);
        font-size: 14px
    }

    .label-container {
        position: fixed;
        bottom: 20px;
        right: 70px;
        display: table;
        visibility: hidden;
    }

    .label-text {
        color: #FFF;
        background: rgba(51, 51, 51, 0.5);
        display: table-cell;
        vertical-align: middle;
        padding: 10px;
        border-radius: 3px;
    }

    .label-arrow {
        display: table-cell;
        vertical-align: middle;
        color: #333;
        opacity: 0.5;
    }

    .float {
        position: fixed;
        padding: 6px 9px 8px 9px;
        bottom: 20px;
        right: 20px;
        background-color: #29a71a;
        border: 1px solid #29a71a;
        color: #FFF;
        text-align: center;
        border-radius: 5px;
        font-size: 23px;
        font-weight: bold;
        z-index: 90;
    }

    .my-float {
        margin-top: 0px;
    }

    .float:hover,
    .float:focus,
    .float:active {
        background-color: #1a7510;
        color: #ffffff;
        text-decoration: normal;
        border: 1px solid #ffffff;
    }

    a.float+div.label-container {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.5s ease;
    }

    a.float:hover+div.label-container {
        visibility: visible;
        opacity: 1;
    }
</style>
<footer class="footer">
    <div class="container-md">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="row item">
                    <div class="col-md-2 col-6">
                        <h5 class="h6 link-head">Link</h5>
                        <ul class="list">
                            <li>
                                <a class="link-foot" href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a class="link-foot" href="{{ url('/pl') }}">Pricelist</a>
                            </li>
                            <li>
                                <a class="link-foot" href="{{ url('/blog') }}">Portfolio</a>
                            </li>
                            <li>
                                <a class="link-foot" href="{{ url('/faq') }}">F.A.Q</a>
                            </li>
                            <li>
                                <a class="link-foot" href="{{ url('/about-us') }}">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-6">
                        <h5 class="h6 link-head">Sosial Media</h5>
                        <div class="social">
                            <a href="{{ $profile['instagram'] }}" target="_blank">
                                <span><i class="fab fa-instagram"></i></span>
                            </a>
                            <a href="{{ $profile['youtube'] }}" target="_blank">
                                <span><i class="fab fa-youtube"></i></span>
                            </a>
                            <a href="{{ $profile['facebook'] }}" target="_blank">
                                <span><i class="fab fa-facebook"></i></span>
                            </a>
                            <a href="{{ $profile['tiktok'] }}" target="_blank">
                                <span><i class="fab fa-tiktok"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-4">
                        <h5 class="h6 link-head">Partners</h5>
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
                                        <i class="fab fa-whatsapp"></i>
                                        <span class="link-foot">{{ $profile['whatsapp'] }}</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/">
                                    <span>
                                        <i class="fas fa-envelope"></i>
                                        <span class="link-foot" style="text-transform: lowercase">
                                            {{ $profile['email1'] }}</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span class="link-foot">{{ $profile['address'] }}</span>
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
<a href="https://wa.me/{{ str_replace('-', '', $profile['whatsapp']) }}" target="_blank" class="float">
    <i class="fab fa-whatsapp my-float"></i>
</a>
<div class="label-container">
    <div class="label-text">Ada yg ingin anda tanyakan?</div>
    <i class="fas fa-play label-arrow"></i>
</div>
@extends('templates.public.scripts')
