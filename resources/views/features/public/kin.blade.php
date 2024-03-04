@extends('templates.public.main')
@section('title', 'Hieros Kin (Family Portraiture)')
@section('content')
    <section class="hero d-none d-md-block">
        <img src="{{ asset('assets/img/hero-kin.png') }}" class="img-fluid" alt="hero-kin">
    </section>
    <section class="blog">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <img src="{{ asset('assets/img/image-blog-1.webp') }}" alt="image-gallery-2" class="image-fluid">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <div class="ratio ratio-4x3">
                            <iframe src="https://www.youtube.com/embed/R2Vi-5louxI?rel=0" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <img src="{{ asset('assets/img/image-blog-1.webp') }}" alt="image-gallery-2" class="image-fluid">
                    </div>
                </div>
            </div>
            <div class="text-center justify-content-center mt-4">
                <button class="button">Perlihatan Lagi</button>
            </div>
        </div>
    </section>
    <section class="form-price">
        <div class="container justify-content-center text-center">
            <h2>Pricelist</h2>
            <p>After filling out the form below, you can access Hieros Kin Pricelist.pdf </p>
            <p>Our team will contact you as soon as possible</p>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="mb-1">
                                <label for="name" class="form-label">Name</label>
                                <input type="email" class="form-control-sm form-control" id="name"
                                    placeholder="Dimas Family">
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control-sm form-control" id="email" placeholder="..">
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">How do you know Hieros?</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>How do you know Hieros</option>
                                    <option value="google">Google</option>
                                    <option value="friend">Friend</option>
                                    <option value="ig">IG / FB Ads</option>
                                    <option value="family">Family</option>
                                    <option value="social">Social Media</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">Estimated location</label>
                                <input type="email" class="form-control-sm form-control" id="email"
                                    placeholder="Home / Studio / Air BnB / Hotel / Etc...">
                            </div>
                            <div class="mb-5">
                                <label for="email" class="form-label">Why choose Hieros Photography?</label>
                                <input type="email" class="form-control-sm form-control" id="email" placeholder="...">
                            </div>
                            <div class="mb-1">
                                <div class="row px-3">
                                    <button class="btn btn-purple"><span class="mr-4"> <i aria-disabled="true"
                                                class="fa fa-check-square-o"></i></span>
                                        Get The
                                        Pricelist</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
@endpush
