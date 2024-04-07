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
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6  col-12">
                    <form id="form-review">
                        @csrf
                        <div class="form mt-5">
                            <p class="mb-5 text-center fst-italic h6">Happy In {{ \App\Helpers\Helper::getProfile('slug') }}
                            </p>
                            <input type="hidden" name="key" id="key" value="review">
                            <div class="mb-1 text-center justify-content-center">
                                <div class="rating-review">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                </div>
                                <span class="error-rating text-danger d-none"></span>
                            </div>
                            <div class="mb-1">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" class="form-control is-rounded form-control" id="name"
                                    name="name" placeholder="enter your name..">
                                <span class="error-name text-danger d-none"></span>
                            </div>
                            <div class="mb-5">
                                <label for="review" class="form-label">Review</label>
                                <textarea name="review" class="form-control-sm form-control" placeholder="Enter your review here ..." id="review"
                                    rows="4"></textarea>
                                <span class="error-review text-danger d-none"></span>
                            </div>
                            <div class="mb-1">
                                <div class="row px-3">
                                    <button class="btn btn-purple" id="button">
                                        <div class="spinner-border d-none mx-4" role="status">
                                        </div>
                                        <span class="mr-4" id="tag-button">
                                            <i aria-disabled="true" class="far fa-check-circle"></i>
                                            Kirim ke {{ \App\Helpers\Helper::getProfile('slug') }}
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $("body").on("submit", "#form-review", function(e) {
            e.preventDefault();
            $(this).prop('disabled', false);
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).find('#tag-button').addClass('d-none');
            var form = document.getElementById('form-review');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('saveForm') }}',
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
                complete: function(data) {
                    $('#button').find('.spinner-border').addClass('d-none');
                    $('#button').find('#tag-button').removeClass('d-none');
                }
            });
        });
    </script>
@endpush
