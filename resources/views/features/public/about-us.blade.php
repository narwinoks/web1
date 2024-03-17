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
                            <span>We are photographers based in Bandung - West Java, Indonesia.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>We love telling stories! and we know that your story is dying to be told. Your life, your
                                family, your love, and your wedding day is one of the most beautiful stories to be told. You
                                better believe that we would love to tell it for you creatively, artistically, and true to
                                who you are.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span><span class="fw-bold">SHUTTERBOX.ID (ἱερός)</span> is Greek for "sacred, sanctified". That's how
                                we see it on every wedding
                                ceremony. It takes several ceremonial steps before the day in our culture. Engagement,
                                recitation to God - whoever you believe in - every step is sacred.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span><span class="fw-bold">"Tomorrow's Memories, Today."</span> As you started to have kids,
                                your hair started to grey, and
                                the wrinkles showed everywhere. Maybe you will have the bad time, good time; nobody knows.
                                But here, let us help to memorize once again that back then, there was the time when both of
                                you were so madly in love, that both of you would conquer the world. Let us help you
                                remember all the good times.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>Address: Komplek Mulya Golf Residence A7, Cisaranten - Bandung.</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>E-mail: shutterbox.group@gmail.com</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>Phone (WA): +62 8565-9004-317</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>Instagram: hierosphoto</span>
                        </p>
                        <p class="paragraph-about-us">
                            <span>YouTube: Shutterbox Photograph</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="maps">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.804686349418!2d107.6333816!3d-6.896444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7af3be758af%3A0xbbcb42d633c6e40d!2sBORMA%20Toserba%20%E2%80%A2%20Cikutra!5e0!3m2!1sen!2sid!4v1709574874787!5m2!1sen!2sid"
            class="map" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
