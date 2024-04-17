@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">Order</h4>
                </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#btn-search").click(function() {
            search();
        });

        function search() {
            $('#offset').val(0)
            $('#limit').val(6)
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
            var key = 'orders';
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
        }
    </script>
@endpush
@push('styles')
    <style>
        .avatar-lg {
            height: 5rem;
            width: 5rem;
        }

        .font-size-18 {
            font-size: 18px !important;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        a {
            text-decoration: none !important;
        }

        .w-xl {
            min-width: 160px;
        }

        .card {
            margin-bottom: 24px;
            -webkit-box-shadow: 0 2px 3px #e4e8f0;
            box-shadow: 0 2px 3px #e4e8f0;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }
    </style>
@endpush
