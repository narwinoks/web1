@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">For Photographers Product</h4>
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
                            <a href="{{ route('admin.productAdd') }}" class="btn btn-success btn-rounded" id="btn-add">
                                <i class="feather icon-plus"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <div class="row" id="content">

                        </div>
                    </ul>
                    <div id="loading-animation" class="text-center" style="display: none">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
@endsection
@push('styles')
    <style>
        .card-product {
            border-radius: 10px;
            border: 1px solid #eee;
            position: relative;
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 200px;
            object-fit: cover;
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

            loadMoreData();

            $("#btn-search").click(function() {
                loadMoreData()
            });

            function loadMoreData() {
                $('#content').empty()
                $("#loading-animation").show();
                var key = 'products';
                $.ajax({
                    url: "{{ route('admin.data') }}",
                    type: 'GET',
                    async: false,
                    data: {
                        search: $('#search').val(),
                        key: key
                    },
                }).done(function(data) {
                    setTimeout(function() {
                        $("#loading-animation").hide();
                    }, 2000)
                    $('#content').append(data);
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("Error: " + textStatus, errorThrown);
                })
            }
            $("body").on("click", ".delete-button-product", function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('admin.deleteProduct') }}",
                    data: {
                        id: id,
                        key: 'delete'
                    },
                    success: function(response) {
                        showAlert(response.message || 'Success', 'success')
                        loadMoreData();
                    },
                    error: function(xhr) {
                        showAlert("Gagal" || 'Error', 'danger')
                    }
                });
            })
        })
        $("body").on("click", ".edit-button-product", function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            window.location.href = '/admin/products/edit/' + id;
        });
    </script>
@endpush
