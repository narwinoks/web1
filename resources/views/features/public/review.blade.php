@extends('templates.public.main')
@section('title', 'Review Page')
@section('content')
    <section class="review">
        <div class="container">
            <div class="text-center">
                <h3 class="h3 fst-italic">Review</h3>
                <p class="h7">
                    <span>Here's the review based on our lovely customers' experience with Shutterbox. </span><br />
                    <span>Hopefully this might help you to choose the right photographer on your special day! </span>
                </p>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-8">
                    <div class="card card-review">
                        <div class="header">
                            <img src="{{ asset('assets/img/600x400.png') }}" class="img-fluid" alt="image-1">
                            <h4 class="h6 fw-normal fst-italic">Roslynn | Reynaldo</h4>
                        </div>
                        <div class="content mt-2">
                            <p>
                                Pertama kali liat Shutterbox waktu di Apps nya Bridestory (a year ago) dan langsung suka banget
                                sm
                                warnanya hieros, cara ngambil foto2nya, anglenya, vibenya dll trus ga ragu langsung book
                                saat
                                itu juga! Adminnya juga ramah, sigap dan informatif. Pas hari H couple session (a day with
                                Shutterbox), bisa langsung ngarahin kita yg kaku (krn jarang foto bareng), bikin suasana lebih
                                santai, perhatian, jaga timeline biar gak ngaret, slalu inget angle terbaik, gercep, dan
                                mood yg
                                aku pengenin juga bisa di achieve sm hieros, even more than enough! Berkesan banget sesi
                                foto sm
                                hieros :D Thankyou so much buat hieros especially kak. See you on another session!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-center justify-content-center mt-4">
                    <button class="btn-show">Perlihatan Lagi</button>
                </div>
            </div>
        </div>
    </section>
@endsection
