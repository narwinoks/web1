@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">Category</h4>
                </div>
                <input type="hidden" value="5" name="limit" id="limit">
                <input type="hidden" value="0" name="offseat" id="offset">
                <input type="hidden" value="false" name="istrue" id="istrue">
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
                    <ul class="list-unstyled row" id="content">

                    </ul>
                    <div id="loading-animation" class="text-center" style="display: none">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                    <div class="row justify-content-center text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modal-data"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection
@push('styles')
    <style>
        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            height: 250px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .image-container img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .button-group {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column;
        }

        .edit-button,
        .delete-button {
            margin-bottom: 5px;
            padding: 8px 12px;
            border: none;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .edit-button,
        .delete-button i {
            color: black;
        }

        .delete-button-image {
            margin-bottom: 5px;
            padding: 8px 12px;
            border: none;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .delete-button-image i {
            color: black;
        }

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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });


            $("#btn-search").click(function() {
                search();
            });

            function search() {
                $('#offset').val(0)
                $('#limit').val(1000)
                $("#istrue").val(false);
                loadMoreData();
            }
            var timeout;
            loadMoreData();
            $('#show-more').on('click', function() {
                $("#istrue").val(true);
                loadMoreData();
            });

            function loadMoreData() {
                $("#loading-animation").show();
                let isTrue = $("#istrue").val() === "true" ? true : false;
                var offset = parseInt($('#offset').val());
                var limit = parseInt($('#limit').val());
                var key = 'category-blog';
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
                $("body").on("click", ".edit-button", function(e) {
                    e.preventDefault();
                    e.preventDefault();
                    var id = $(this).data("id");
                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.showModal') }}",
                        data: {
                            key: "category-image",
                            id: id
                        },
                        success: function(data) {
                            $("#modal-content").html(data);
                            $("#modal-data").modal("show");
                        },
                    });
                });
                $("body").on("click", ".delete-button", function(e) {
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
                $("body").on("submit", "#form-add-category-image", function(e) {
                    $(this).prop('disabled', false);
                    $(this).find('.spinner-border').removeClass('d-none');
                    $(this).find('#tag-button').addClass('d-none');
                    event.preventDefault();
                    var form = document.getElementById('form-add-category-image');
                    var formData = new FormData(form);
                    $.ajax({
                        url: '{{ route('admin.saveContent') }}',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            showAlert(response.message, 'success')
                            $("#modal-data").modal("hide");
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
            }
        })
    </script>
@endpush
