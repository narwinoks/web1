@extends('templates.public.main')
@section('title', 'About Us')
@section('content')
    <section class="about-us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="contact-us text-center justify-content-center">
                        <img src="{{ asset('assets/img/hero-about-us.png') }}" alt="about-us-hero" class="image-contact">
                    </div>
                    <div class="content mt-5">
                        <p class="paragraph-about-us">
                            <span>We are photographers based in Tasikmalaya - West Java, Indonesia.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>Every photo is a story, and we are loyal storytellers. From the beginning of the journey
                                of love to family happiness, we photograph every moment with warmth and honesty. We not only
                                capture images, but also immortalize the emotions and stories behind them. Let us be the
                                keepers your memories, preserving every beautiful second in tune
                                .</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span><span class="fw-bold">SHUTTERBOX.ID</span>  Comes from <span class="fst-italic"> "shutter"</span>  & <span class="fst-italic">box</span>, which means the
                                shutter in a camera is not just a technical tool,
                                but also a symbol that contains many deep philosophical meanings about time, life, control
                                and unpredictability.
                                and the "box" viewpoint here is the reflection room where the photographer & videographer
                                are
                                explore and design approaches to the visual arts in a more conscious and planned way which
                                conveys a deep message from a moment.
                            </span>
                        </p>
                        <p class="paragraph-about-us mt-5">
                            <span>Address: {{ $profile['address'] ?? '' }}.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>E-mail: {{ $profile['email1'] ?? '' }}</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>Phone (WA): {{ $profile['whatsapp'] ?? '' }}</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>Instagram: shutterbox.photography</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>YouTube: Shutterbox.project</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="maps">
        <iframe class="map" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://maps.google.com/maps?width=100%&amp;height=auto&amp;hl=en&amp;q={{ $profile['address'] ?? '' }}&amp;t=m&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
        </iframe>
    </section>
@endsection
