@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <div class="row d-flex align-items-center justify-content-between">
                        <h4 class="h5 card-title">Gallery Photo</h4>
                        <button id="show-modal-add" class="is-rounded btn btn-sm btn-light">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row search">
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="feather icon-lock"></i></span>
                                <input type="date" class="form-control input-custom" placeholder="Username"
                                    aria-label="Username" aria-describedby="basic-addon1" id="startDate"
                                    value="{{ date('Y-m-d', strtotime('-1 month')) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="feather icon-lock"></i></span>
                                <input type="date" class="form-control input-custom" placeholder="Username"
                                    aria-label="Username" id="endDate" aria-describedby="basic-addon1"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select form-select-sm input-custom" id="category"
                                aria-label=".form-select-sm example" name="category">
                                <option value="" selected>Pilih Kategory</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-secondary btn-rounded" id="btn-search">
                                <i class="feather icon-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row" id="content">

                    </div>
                    <div id="loading-animation" class="text-center">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                    <div class="row justify-content-center text-center mt-5">
                        <button class="btn btn-show" id="show-more">Perlihatan !</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ $keyCategory }}" id="image-category" name="image-category">
    <input type="hidden" value="6" name="limit" id="limit">
    <input type="hidden" value="0" name="offseat" id="offset">
    <input type="hidden" value="false" name="istrue" id="istrue">
    <!-- modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modal-image"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/templates/plugins/image-upload/image-uploader.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/plugins/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $("body").find('.input-images').imageUploader();
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });
            $("#show-modal-add").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.showModal') }}",
                    data: {
                        key: "image",
                    },
                    success: function(data) {
                        $("#modal-content").html(data);
                        $("#modal-image").modal("show");
                    },
                });
            });
            $("body").on("click", ".close-modal-add-image", function(e) {
                e.preventDefault();
                $("#modal-image").modal("hide");
            });
            $("body").on("change", "#type", function(e) {
                var selectedType = $(this).val();
                console.log("sss", selectedType);
                if (selectedType == "Image") {
                    $("body").find('#image').show();
                    $("body").find('#video').hide();
                    $("body").find('#embed').hide();
                } else if (selectedType == "Video") {
                    $("body").find('#video').show();
                    $("body").find('#image').hide();
                    $("body").find('#embed').hide();
                } else if (selectedType == "Embed Youtube") {
                    $("body").find('#embed').show();
                    $("body").find('#video').hide();
                    $("body").find('#image').hide();
                }
            })
            $("body").on("submit", "#form-add-image", function(e) {
                $(this).prop('disabled', false);
                $(this).find('.spinner-border').removeClass('d-none');
                $(this).find('#tag-button').addClass('d-none');
                event.preventDefault();
                var form = document.getElementById('form-add-image');
                var formData = new FormData(form);
                $.ajax({
                    url: '{{ route('admin.saveContent') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showAlert(response.message, 'success')
                        $("#modal-image").modal("hide");
                        loadMoreData();
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

            function search() {
                $('#offset').val(0)
                $('#limit').val(6)
                $("#istrue").val(false);
                loadMoreData();
            }
            $("#btn-search").click(function() {
                search();
            });
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
                var category = $('#category').val();
                var key = $('#image-category').val().replace(/\s+/g, '');
                $.ajax({
                    url: "{{ route('admin.content') }}",
                    type: 'GET',
                    async: false,
                    data: {
                        offset: $('#offset').val(),
                        limit: $('#limit').val(),
                        startDate: $('#startDate').val(),
                        endDate: $('#endDate').val(),
                        category: category,
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
            $("body").on("click", ".edit-button", function(e) {
                e.preventDefault();
                e.preventDefault();
                var id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.showModal') }}",
                    data: {
                        key: "image",
                        id: id
                    },
                    success: function(data) {
                        $("#modal-content").html(data);
                        $("#modal-image").modal("show");
                        search();
                    },
                });
            });

            function loadDataImage() {
                let id = $("#modal-image").find('#id-edit-image').val()
                $("body").find('#loading').show()
                $("#data-edit").load("{{ route('admin.content', ['key' => 'image-edit']) }}&id=" +
                    id,
                    () => {
                        $("body").find('#loading').hide()
                    });
            }
            $("body").on("click", ".delete-button-image", function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('admin.deleteContent') }}",
                    data: {
                        id: id,
                        key: 'delete-image'
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
            $("body").on("click", ".delete-button", function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('admin.deleteContent') }}",
                    data: {
                        id: id,
                        key: 'delete-image'
                    },
                    success: function(response) {
                        showAlert(response.message || 'Success', 'success')
                        loadMoreData();
                    },
                    error: function(error) {
                        showAlert("Gagal" || 'Error', 'danger')
                    }
                });
            })
        });
    </script>
@endpush
@push('styles')
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets/templates/plugins/image-upload/image-uploader.min.css') }}" />
    <style>
        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
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
