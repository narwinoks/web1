@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">Bank Account</h4>
                </div>
                <input type="hidden" value="5" name="limit" id="limit">
                <input type="hidden" value="0" name="offseat" id="offset">
                <input type="hidden" value="false" name="istrue" id="istrue">
                <div class="card-body">
                    <div class="row search">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="feather icon-search"></i></span>
                                <input type="text" class="form-control input-custom" placeholder="Search.."
                                    id="search">
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-auto">
                            <button class="btn btn-secondary btn-rounded" id="btn-search">
                                <i class="feather icon-search"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success btn-rounded" id="btn-add">
                                <i class="feather icon-plus"></i>
                            </button>
                        </div>
                    </div>
                    <ul class="list-unstyled row" id="content">

                    </ul>
                    <div id="loading-animation" class="text-center" style="display: none">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-bank"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });

            function search() {
                $('#offset').val(0)
                $('#limit').val(6)
                $("#istrue").val(false);
                loadMoreData();
            }
            $("#btn-search").click(function() {
                search()
            });
            $('#show-more').on('click', function() {
                $("#istrue").val(true);
                loadMoreData();
            });
            $("#btn-add").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.showModal') }}",
                    data: {
                        key: "bank",
                    },
                    success: function(data) {
                        $("#modal-content").html(data);
                        $("#modal-bank").modal("show");
                    },
                });
            });
            $("body").on("submit", "#form-add-bank", function(e) {
                e.preventDefault();
                $(this).prop('disabled', false);
                $(this).find('.spinner-border').removeClass('d-none');
                $(this).find('#tag-button').addClass('d-none');
                var form = document.getElementById('form-add-bank');
                var formData = new FormData(form);
                var selectedValue = $('#category').val();
                var selectedImage = $('option[value="' + selectedValue + '"]').data('image');
                formData.append('image', selectedImage);

                $.ajax({
                    url: '{{ route('admin.saveContent') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showAlert(response.message, 'success')
                        $("#modal-bank").modal("hide");
                        search();
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

            function loadMoreData() {
                $("#loading-animation").show();
                let isTrue = $("#istrue").val() === "true" ? true : false;
                var offset = parseInt($('#offset').val());
                var limit = parseInt($('#limit').val());
                var key = 'bank';
                $.ajax({
                    url: "{{ route('admin.content') }}",
                    type: 'GET',
                    async: false,
                    data: {
                        offset: $('#offset').val(),
                        limit: $('#limit').val(),
                        startDate: $('#startDate').val(),
                        endDate: $('#endDate').val(),
                        search: $('#search').val(),
                        key: key
                    },
                }).done(function(data) {
                    if (offset == 0) {
                        offset = offset + 6;
                    } else {
                        offset = offset + 6;
                    }
                    $('#offset').val(offset);
                    $('#limit').val(6);
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
            loadMoreData();
            $("body").on("click", ".delete-button-bank", function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('admin.deleteContent') }}",
                    data: {
                        id: id,
                        key: 'delete'
                    },
                    success: function(response) {
                        showAlert(response.message || 'Success', 'success')
                        search();
                    },
                    error: function(xhr) {
                        showAlert("Gagal" || 'Error', 'danger')
                    }
                });
            })
            $("body").on("click", ".edit-button-bank", function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.showModal') }}",
                    data: {
                        key: "bank",
                        id: id
                    },
                    success: function(data) {
                        $("#modal-content").html(data);
                        $("#modal-bank").modal("show");
                        loadTimy();
                    },
                });
            });

        });
    </script>
@endpush
@push('styles')
    <style>
        .payment-card {
            margin: auto;
            position: relative;
            border: 1px solid #ccc;
        }

        .payment-card .row {
            margin: 2px 8px !important;
            display: flex;
            align-items: center;
            text-align: center;
        }

        .payment-card .row .card-body {
            text-align: center;
        }

        .payment-card .card-title {
            font-size: 14px;
            margin-bottom: 0.5rem;
        }

        .payment-card .card-text {
            font-size: 12px;
            margin-bottom: 0.25rem;
        }
    </style>
@endpush
