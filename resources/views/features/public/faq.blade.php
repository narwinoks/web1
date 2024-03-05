@extends('templates.public.main')
@section('title', 'FAQ')
@section('content')
    <section class="faq">
        <div class="hero">
            <img src="{{ asset('assets/img/hero-faq.png') }}" alt="image-studio" class="img-fluid">
            <div class="overlay"></div>
        </div>
        <div class="mt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-5 px-3 px-md-0 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card-question mb-2 w-100">
                                <div class="card-question-header">
                                    <h6 class="card-question-title">
                                        <a class="text-muted text-uppercase" data-toggle="collapse" href="#question1">
                                            <i class="fa fa-question-circle-o mr-2 mt-0-20 pull-left"></i>
                                            What is Lorem Ipsum?
                                            <i class="fa fa-minus mr-2 text-slate pull-right"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div id="question1" class="collapse show">
                                    <div class="card-question-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum
                                            has
                                            been the
                                            industry's standard dummy text ever since the 1500s, when an unknown printer
                                            took a
                                            galley
                                            of type
                                            and scrambled it to make a type specimen book
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="card-question mb-2 w-100">
                                <div class="card-question-header">
                                    <h6 class="card-question-title">
                                        <a class="text-muted text-uppercase" data-toggle="collapse" href="#question2">
                                            <i class="fa fa-question-circle-o mr-2 mt-0-20 pull-left"></i>
                                            Where does it come from?

                                            <i class="fa fa-minus mr-2 text-slate pull-right"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div id="question2" class="collapse" style="">
                                    <div class="card-question-body">
                                        <p>
                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                            in a
                                            piece
                                            of
                                            classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                            McClintock, a
                                            Latin professor at Hampden-Sydney College in Virginia,
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
