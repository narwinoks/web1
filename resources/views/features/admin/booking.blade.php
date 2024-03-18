@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">Booking Requests</h4>
                </div>
                <input type="hidden" value="5" name="limit" id="limit">
                <input type="hidden" value="0" name="offseat" id="offset">
                <input type="hidden" value="false" name="istrue" id="istrue">
                <input type="hidden" value="{{ $category }}" name="booking-category" id="booking-category">
                <div class="card-body">
                    <div class="row search">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="feather icon-lock"></i></span>
                                <input type="date" class="form-control input-custom" placeholder="Username"
                                    aria-label="Username" aria-describedby="basic-addon1" id="startDate"
                                    value="{{ date('Y-m-d', strtotime('-1 week')) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="feather icon-lock"></i></span>
                                <input type="date" class="form-control input-custom" placeholder="Username"
                                    aria-label="Username" id="endDate" aria-describedby="basic-addon1"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-secondary btn-rounded" id="btn-search">
                                <i class="feather icon-search"></i>
                            </button>
                        </div>
                    </div>
                    <ul class="list-unstyled" id="content">

                    </ul>
                    <div id="loading-animation" class="text-center">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                    <div class="row justify-content-center text-center">
                        <button class="btn btn-show" id="show-more">Perlihatan !</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
@endsection
@push('styles')
    <style>
        .search {
            border: 1px solid #eee;
            padding: 20px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $("#btn-search").click(function() {
            loadMoreData();
            console.log($("#istrue").val());
            $("#istrue").val(false);
            console.log($("#istrue").val());
        });
        var timeout;
        loadMoreData();
        $('#show-more').on('click', function() {
            $("#istrue").val(true);
            loadMoreData();
        });

        function loadMoreData() {
            $("#loading-animation").show();
            let isTrue =Boolean($("#istrue").val());
            if (isTrue == true) {
                var offset = parseInt($('#offset').val());
                var limit = parseInt($('#limit').val());
            } else {
                var offset = 0;
                var limit = 5;
            }
            var key = $('#booking-category').val().replace(/\s+/g, '');
            $.ajax({
                url: "{{ route('admin.content') }}",
                type: 'GET',
                async: false,
                data: {
                    offset: $('#offset').val(),
                    limit: $('#limit').val(),
                    startDate: $('#startDate').val(),
                    endDate: $('#endDate').val(),
                    key: key
                },
            }).done(function(data) {
                if (isTrue == true) {
                    if (offset == 0) {
                        offset = offset + 5;

                    } else {
                        offset = offset + 5;
                    }
                }
                $('#offset').val(offset);
                $('#limit').val(3);
                setTimeout(function() {
                    $("#loading-animation").hide();
                }, 2000)
                if (isTrue == true) {
                    $('#content').append(data);
                } else {
                    $('#content').empty()
                    $('#content').append(data);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
        $("body").on("click", ".btn-reject", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "{{ route('admin.updateContent') }}",
                data: {
                    _token: $('#token').val(),
                    id: id,
                    status: 'Reject'
                },
                success: function(data) {
                    showAlert("Berhasil !", "success");
                    loadMoreData();
                },
                error: function(response) {
                    printErrorMsg(response);
                },
            });
        })
        $("body").on("click", ".btn-approval", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "{{ route('admin.updateContent') }}",
                data: {
                    _token: $('#token').val(),
                    id: id,
                    status: 'Approve'
                },
                success: function(data) {
                    showAlert("Berhasil !", "success");
                    loadMoreData();
                },
                error: function(response) {
                    printErrorMsg(response);
                },
            });
        })
    </script>
@endpush
