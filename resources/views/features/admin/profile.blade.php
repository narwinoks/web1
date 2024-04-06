@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <div class="row d-flex align-items-center justify-content-between">
                        <h4 class="h5 card-title">Profile</h4>
                        <button id="show-modal-add" class="is-rounded btn btn-sm btn-light">Kembali</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="search">
                        <form id="form-update-password">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="h5">Update Password</h3>
                                </div>
                                <div class="col-md-5 mt-5 col-sm-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="feather icon-lock"></i></span>
                                        <input type="password" class="form-control input-custom is-rounded"
                                            placeholder="Password.." id="password" name="password">
                                    </div>
                                    <span class="error-password text-danger d-none"></span>
                                </div>
                                <div class="col-md-5 mt-5 col-sm-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="feather icon-lock"></i></span>
                                        <input type="password" class="form-control input-custom is-rounded"
                                            placeholder="Confirm Password.." id="confirm_password" name="confirm_password">
                                    </div>
                                    <span class="error-confirm_password text-danger d-none"></span>
                                </div>
                            </div>
                            <div class="row col-md-12 justify-content-right text-right">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary is-rounded btn-sm">Update
                                        Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="search">
                        <form id="form-update-profile">
                            @csrf
                            <input type="hidden" value="{{ $profile->id }}" name="id" value="id">
                            <input type="hidden" value="{{ $profile->logo }}" name="logo_old" value="logo_old">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control input-custom" placeholder="Name"
                                            aria-label="name" aria-describedby="basic-addon1" id="name" name="name"
                                            value="{{ $profile->name }}">
                                        <span class="error-name text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="slug" class="form-label">slug</label>
                                        <input type="text" class="form-control input-custom" placeholder="slug"
                                            aria-label="slug" aria-describedby="basic-addon1" id="slug" name="slug"
                                            value="{{ $profile->slug }}">
                                        <span class="error-slug text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="email1" class="form-label">Email1</label>
                                        <input type="email" class="form-control input-custom" placeholder="email1"
                                            aria-label="email1" aria-describedby="basic-addon1" id="email1"
                                            name="email1" value="{{ $profile->email1 }}">
                                        <span class="error-email1 text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="email2" class="form-label">Email2</label>
                                        <input type="email" class="form-control input-custom" placeholder="email2"
                                            aria-label="email2" aria-describedby="basic-addon1" id="email2"
                                            name="email2" value="{{ $profile->email2 }}">
                                        <span class="error-email2 text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="phone" class="form-label">phone</label>
                                        <input type="text" class="form-control input-custom" placeholder="phone"
                                            aria-label="phone" aria-describedby="basic-addon1" id="phone"
                                            name="phone" value="{{ $profile->phone }}">
                                        <span class="error-phone text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="whatsapp" class="form-label">Whatsapp</label>
                                        <input type="text" class="form-control input-custom" placeholder="whatsapp"
                                            aria-label="whatsapp" aria-describedby="basic-addon1" id="whatsapp"
                                            name="whatsapp" value="{{ $profile->whatsapp }}">
                                        <span class="error-whatsapp text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="youtube" class="form-label">Youtube</label>
                                        <input type="text" class="form-control input-custom" placeholder="youtube"
                                            aria-label="youtube" aria-describedby="basic-addon1" id="youtube"
                                            name="youtube" value="{{ $profile->youtube }}">
                                        <span class="error-youtube text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="tiktok" class="form-label">Tiktok</label>
                                        <input type="text" class="form-control input-custom" placeholder="tiktok"
                                            aria-label="tiktok" aria-describedby="basic-addon1" id="tiktok"
                                            name="tiktok" value="{{ $profile->tiktok }}">
                                        <span class="error-tiktok text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="facebook" class="form-label">Facebook</label>
                                        <input type="text" class="form-control input-custom" placeholder="facebook"
                                            aria-label="facebook" aria-describedby="basic-addon1" id="facebook"
                                            name="facebook" value="{{ $profile->facebook }}">
                                        <span class="error-facebook text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="text" class="form-control input-custom" placeholder="instagram"
                                            aria-label="instagram" aria-describedby="basic-addon1" id="instagram"
                                            name="instagram" value="{{ $profile->instagram }}">
                                        <span class="error-instagram text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label for="file1" class="form-label">File1</label>
                                        <input type="text" class="form-control input-custom" placeholder="file1"
                                            aria-label="file1" aria-describedby="basic-addon1" id="file1"
                                            name="file1" value="{{ $profile->file1 }}">
                                        <span class="error-file1 text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label for="file2" class="form-label">File2</label>
                                        <input type="text" class="form-control input-custom" placeholder="file2"
                                            aria-label="file2" aria-describedby="basic-addon1" id="file2"
                                            name="file2" value="{{ $profile->file2 }}">
                                        <span class="error-file2 text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label for="file3" class="form-label">File3</label>
                                        <input type="text" class="form-control input-custom" placeholder="file3"
                                            aria-label="file3" aria-describedby="basic-addon1" id="file3"
                                            name="file3" value="{{ $profile->file3 }}">
                                        <span class="error-file3 text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="image" class="form-label">Logo</label>
                                        <input type="file" class="form-control input-custom" placeholder="logo"
                                            aria-label="image" aria-describedby="basic-addon1" id="image"
                                            name="image">
                                        <span class="error-logo text-danger d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label for="partner1" class="form-label">Partner</label>
                                        <input type="file" class="form-control input-custom" placeholder="partner1"
                                            aria-label="partner1" aria-describedby="basic-addon1" id="partner1"
                                            name="partner1">
                                        <span class="error-partner1 text-danger d-none"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12 justify-content-right text-right">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary is-rounded btn-sm">Update
                                        Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $("body").on("submit", "#form-update-password", function(e) {
            $(this).prop('disabled', false);
            event.preventDefault();
            var form = document.getElementById('form-update-password');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('account.password') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success')
                },
                error: function(error) {
                    if (error.status == 400 || error.status == 422) {
                        printErrorMsg(error);
                    } else {
                        showAlert(error.responseJSON.message || 'Error', 'danger')
                    }
                },
                complete: function(data) {}
            });
        });
        $("body").on("submit", "#form-update-profile", function(e) {
            $(this).prop('disabled', false);
            event.preventDefault();
            var form = document.getElementById('form-update-profile');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('account.updateProfile') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success')
                },
                error: function(error) {
                    if (error.status == 400 || error.status == 422) {
                        printErrorMsg(error);
                    } else {
                        showAlert(error.responseJSON.message || 'Error', 'danger')
                    }
                },
                complete: function(data) {}
            });
        });
    </script>
@endpush
