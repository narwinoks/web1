@extends('templates.public.main')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card card-login is-rounded">
                    <div class="row">
                        <div class="col-md-4 d-none d-md-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/login.jpg') }}" alt="Gambar Anda" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-12  md-py-0 py-2 form-container">
                            <form method="GET" action="#" class="px-3">
                                <h2 class="h5 fst-italic fw-normal text-center mb-4">Login</h2>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control is-rounded" id="email"
                                        placeholder="Enter your Email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control is-rounded" id="password"
                                            placeholder="Enter your password">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 mt-4">
                                    <div class="row px-3">
                                        <button class="btn btn-purple is-rounded">Login</button>
                                    </div>
                                </div>
                                <div class="mb-1 mt-4">
                                    <p class="text-center">Not a member? <a href="{{ url('/register') }}">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                const passwordInput = $('#password');
                const passwordIcon = $(this).find('i');
                passwordInput.attr('type', passwordInput.attr('type') === 'password' ? 'text' : 'password');
                passwordIcon.toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>
@endpush
