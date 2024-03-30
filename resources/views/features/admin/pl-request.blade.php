@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title">PL Request</h4>
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
                    <ul class="list-unstyled" id="content">

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
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
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
            var key = 'request-pl';
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
        .task-list {
            list-style: none;
            position: relative;
            margin: 0;
            padding: 30px 0 0;
        }

        .task-list:after {
            content: "";
            position: absolute;
            background: #ecedef;
            height: 100%;
            width: 2px;
            top: 0;
            left: 30px;
            z-index: 1;
        }

        .task-list li {
            margin-bottom: 30px;
            padding-left: 55px;
            position: relative;
        }

        .task-list li:last-child {
            margin-bottom: 0;
        }

        .task-list li .task-icon {
            position: absolute;
            left: 22px;
            top: 13px;
            border-radius: 50%;
            padding: 2px;
            width: 17px;
            height: 17px;
            z-index: 2;
            -webkit-box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
        }



        .card {
            border-radius: 0;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        .card .card-header {
            background-color: transparent;
            border-bottom: 1px solid #f1f1f1;
            padding: 20px 25px;
            position: relative;
        }

        .card .card-header h5 {
            margin-bottom: 0;
            color: #000;
            font-size: 17px;
            font-weight: 400;
            display: inline-block;
            margin-right: 10px;
            line-height: 1.1;
            position: relative;
        }

        .card .card-header h5:after {
            content: "";
            background-color: #04a9f5;
            position: absolute;
            left: -25px;
            top: 0;
            width: 4px;
            height: 20px;
        }

        .card .card-header.borderless {
            border-bottom: none;
        }

        .card .card-header.borderless h5:after {
            display: none;
        }

        .card .card-header .card-header-right {
            right: 10px;
            top: 10px;
            display: inline-block;
            float: right;
            padding: 0;
            position: absolute;
        }

        @media only screen and (max-width: 575px) {
            .card .card-header .card-header-right {
                display: none;
            }
        }

        .card .card-header .card-header-right .dropdown-menu {
            margin-top: 0;
        }

        .card .card-header .card-header-right .dropdown-menu li a {
            font-size: 14px;
            text-transform: capitalize;
        }

        .card .card-header .card-header-right .btn.dropdown-toggle {
            border: none;
            background: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
            color: #888;
        }

        .card .card-header .card-header-right .btn.dropdown-toggle i {
            margin-right: 0;
        }

        .card .card-header .card-header-right .btn.dropdown-toggle:after {
            display: none;
        }

        .card .card-header .card-header-right .btn.dropdown-toggle:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
            outline: none;
        }

        .card .card-footer {
            border-top: 1px solid #f1f1f1;
            background: transparent;
            padding: 25px;
        }

        .card .card-block,
        .card .card-body {
            padding: 30px 25px;
        }

        .card .card-block img {
            width: 50px;
            border-radius: 50%;
        }

        .card.card-load {
            position: relative;
            overflow: hidden;
        }

        .card.card-load .card-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 999;
        }

        .card.card-load .card-loader i {
            margin: 0 auto;
            color: #04a9f5;
            font-size: 24px;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .card.full-card {
            z-index: 99999;
            border-radius: 0;
        }

        .bg-c-green {
            background: #1de9b6;
        }

        h6 {
            font-size: 14px;
        }
    </style>
@endpush
