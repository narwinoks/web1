@extends('templates.public.main')
@section('title', 'Account')
@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <div class="card is-rounded">
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="text-center border-end">
                                    <img src="{{ asset('assets/img/' . (auth()->user()->profile == null ? 'avatar.png' : auth()->user()->profile)) }}"
                                        class="img-fluid avatar-xxl rounded-circle" alt="image-user">
                                    <h4 class="text-secondary h5 fw-normal  mt-3 mb-1">{{ auth()->user()->name }}</h4>
                                    <span class="text-muted span mb-0">User</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ms-3">
                                    <div>
                                        <h4 class="card-title h5 mb-2">Description</h4>
                                        <p class="mb-0 text-muted">
                                            {{ auth()->user()->description ?? 'Tambahkan Deskripsi !!' }}</p>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-12">
                                            <div>
                                                <p class="text-muted mb-2 fw-medium"><i
                                                        class="fas fa-envelope-o me-2"></i>{{ auth()->user()->email }}
                                                </p>
                                                <p class="text-muted fw-medium mb-0"><i
                                                        class="fas fa-phone me-2"></i>{{ auth()->user()->phone }}
                                                </p>
                                                <p>
                                                <div class="mt-4">
                                                    <button class="button btn-normal" id="open-modal">Update
                                                        Profile</button>
                                                </div>
                                                </p>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4 active " href="#" target="#">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">My Kelas</span>
                                            </a>
                                        </li><!-- end li -->
                                    </ul><!-- end ul -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="tab-content p-4">
                        <div class="tab-pane active show" id="team-tab" role="tabpanel">
                            <a href="{{ url('form-review') }}" class="btn btn-black">Add Review</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Profile Modal -->
    <div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link tab-link" id="profile-tab" data-toggle="tab" href="#profile"
                                role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                            <button class="nav-link tab-link" id="password-tab" data-toggle="tab" href="#password"
                                role="tab" aria-controls="password" aria-selected="true">Password</button>
                        </div>
                    </nav>
                    <div class="tab-content" aria-labelledby="profile-tab">
                        <div id="loadingContent" class="text-center">
                            <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                        </div>
                        <div id="loadContent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        var hash = window.location.hash.substr(1);
        var href = window.location.href;

        function defaultPage() {
            if (hash == undefined || hash == "") {
                hash = "profile";
            }
            $("#" + hash + "-tab").addClass("active").siblings().removeClass("active");
            $("#" + hash).addClass("active show").siblings().removeClass("active show");

            loadPageContent(hash);

        }

        function loadPageContent(tab) {
            if (tab == "password") {
                loadPassword();
            } else if (tab == "profile") {
                loadProfile();
            }
        }
        $(".tab-link").click(function(e) {
            e.preventDefault();
            status = $(this).attr("aria-controls");
            window.location.hash = status;
            href = window.location.href;
        });
        $('[data-toggle="tab"]').click(function() {
            var hash = $(this).attr("href").substr(1);
            loadPageContent(hash);
        });

        function loadPassword() {
            $("#loadingContent").show();
            $("#loadContent").load("{{ route('account.data', ['key' => 'loadPassword']) }}", () => {
                $("#loadingContent").hide();
            })
        }

        function loadProfile() {
            $("#loadingContent").show();
            $("#loadContent").load("{{ route('account.data', ['key' => 'loadProfile']) }}", () => {
                $("#loadingContent").hide();
            })
        }
        $("body").on("submit", "#form-update-password", function(event) {
            event.preventDefault();
            var form = document.getElementById('form-update-password');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('account.update') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success')
                    $("#updateProfileModal").modal("hide");
                },
                error: function(error) {
                    if (error.status == 400 || error.status == 422) {
                        printErrorMsg(error);
                    } else {
                        showAlert(error.responseJSON.message || 'Error', 'danger')
                    }
                }
            });
        });
        $("body").on("submit", "#form-update-profile", function(event) {
            event.preventDefault();
            var form = document.getElementById('form-update-profile');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('account.update') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success')
                    $("#updateProfileModal").modal("hide");
                },
                error: function(error) {
                    if (error.status == 400 || error.status == 422) {
                        printErrorMsg(error);
                    } else {
                        showAlert(error.responseJSON.message || 'Error', 'danger')
                    }
                }
            });
        });

        $("body").on("click", "#open-modal", function(event) {
            event.preventDefault();
            console.log("Success");
            $("#updateProfileModal").modal("show");
            defaultPage();
        });
    </script>
@endpush
