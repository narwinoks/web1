@extends('templates.public.main')
@section('title', 'Daftar Baru')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card card-login is-rounded">
                    <div class="row">
                        <div class="col-md-4 d-none d-md-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/login.jpg') }}" alt="Gambar Anda" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-12  md-py-0 py-2 form-container">
                            <form class="px-3" id="form-register">
                                @csrf
                                <h2 class="h5 fst-italic fw-normal text-center mb-4">Daftar Baru</h2>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control is-rounded" id="name" name="name"
                                        placeholder="Dimas">
                                    <span class="error-name text-danger d-none"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control is-rounded" id="email" name="email"
                                        placeholder="dimas@gmail.com">
                                    <span class="error-email text-danger d-none"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control is-rounded" id="telepon" name="phone"
                                        placeholder="+6281466087156">
                                    <span class="error-phone text-danger d-none"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control is-rounded" id="password"
                                            placeholder="Enter your password" name="password">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <span class="error-password text-danger d-none"></span>
                                </div>
                                <div class="mb-1 mt-4">
                                    <div class="row px-3">
                                        <button type="submit" id="button" class="btn btn-purple is-rounded">
                                            <div class="spinner-border d-none mx-4" role="status">
                                            </div>
                                            <span id="tag-button">
                                                Daftar
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-1 mt-4">
                                    <p class="text-center">a member? <a href="{{ url('/login') }}">Login</a></p>
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
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                const passwordInput = $('#password');
                const passwordIcon = $(this).find('i');
                passwordInput.attr('type', passwordInput.attr('type') === 'password' ? 'text' : 'password');
                passwordIcon.toggleClass('fa-eye fa-eye-slash');
            });
            $('#form-register').submit(function(event) {
                $(this).prop('disabled', false);
                $(this).find('.spinner-border').removeClass('d-none');
                $(this).find('#tag-button').addClass('d-none');
                event.preventDefault();
                var form = document.getElementById('form-register');
                var formData = new FormData(form);
                $.ajax({
                    url: '{{ route('account.register') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showAlert(response.message, 'success')
                        setTimeout(() => {
                            window.location.href = response.data.redirect;
                        }, 2000);
                    },
                    error: function(error) {
                        if (error.status == 400 || error.status == 422) {
                            printErrorMsg(error);
                        } else {
                            showAlert(error.responseJSON.message || 'Error', 'danger')
                        }
                    },
                    complete: function(data) {
                        $('#button').find('.spinner-border').addClass('d-none');
                        $('#button').find('#tag-button').removeClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush
