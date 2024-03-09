@extends('templates.public.main')
@section('title', $title)
@section('content')
    <section class="">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <h5 class="h5 py-4 fst-italic fw-bolder">Gallery Wedding Dimas Setiawan</h5>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <div class="gallery">
                        <img src="https://via.placeholder.com/1200x800" class="img-fluid" alt="image-1">
                    </div>
                </div>
                <div class="col-auto mt-2">
                    <div class="gallery">
                        <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="image-1">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="gallery text-center">
                        <div class="ratio ratio-16x9 is-rounded" style="max-width: 500px; margin: 0 auto;">
                            <iframe src="https://www.youtube.com/embed/R2Vi-5louxI?rel=0" title="YouTube video"
                                allowfullscreen class="is-rounded"></iframe>
                            <div class="overlay is-rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
