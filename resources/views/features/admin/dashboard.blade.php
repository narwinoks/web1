@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="col-sm-4" id="load-card-booking">

        </div>
        <div class="col-sm-4" id="load-card-user">

        </div>
        <div class="col-sm-4" id="load-card-image">

        </div>
    </div>
    <div id="loading-animation" class="text-center">
        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/templates/js/plugins/apexcharts.min.js') }}"></script>
    <script>
        function loadChart(type, element) {
            $("body").find('#loading-animation').show();
            $(element).load("{{ route('admin.content') }}?key=dashboard&" + "type=" + type, () => {
                $("body").find('#loading-animation').hide();
            });
        }

        $(document).ready(function() {
            setTimeout(loadBooking, 100);
            setTimeout(loadUser, 200);
            setTimeout(loadImage, 300);
        });

        function loadImage() {
            loadChart("image", "#load-card-image");
            setTimeout(floatchart3, 3000);
        }

        function loadUser() {
            loadChart("user", "#load-card-user")
            setTimeout(floatchart2, 2000);
        }

        function loadBooking() {
            loadChart("booking", "#load-card-booking")
            setTimeout(floatchart1, 1000);
        }

        function floatchart1() {
            let dataString = $("body").find('#booking-result').val()
            let data = JSON.parse(dataString);
            let supportChart = $('#support-chart-1').get(0);
            if (supportChart) {
                var options1 = {
                    chart: {
                        type: 'area',
                        height: 80,
                        sparkline: {
                            enabled: true
                        }
                    },
                    colors: ["#4680ff"],
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    series: [{
                        data: data
                    }],
                    tooltip: {
                        fixed: {
                            enabled: false
                        },
                        x: {
                            show: false
                        },
                        y: {
                            title: {
                                formatter: function(seriesName) {
                                    return 'Ticket '
                                }
                            }
                        },
                        marker: {
                            show: false
                        }
                    }
                };

                new ApexCharts(supportChart, options1).render();
            } else {
                console.error("Element with ID 'support-chart-2' not found or is invalid.");
            }
        }

        function floatchart3() {
            let dataString = $("body").find('#user-result').val()
            let data = JSON.parse(dataString);
            let supportChart3 = $('#support-chart-3').get(0);
            if (supportChart3) {
                var options3 = {
                    chart: {
                        type: 'area',
                        height: 80,
                        sparkline: {
                            enabled: true
                        }
                    },
                    colors: ["#4680ff"],
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    series: [{
                        data: data
                    }],
                    tooltip: {
                        fixed: {
                            enabled: false
                        },
                        x: {
                            show: false
                        },
                        y: {
                            title: {
                                formatter: function(seriesName) {
                                    return 'Ticket '
                                }
                            }
                        },
                        marker: {
                            show: false
                        }
                    }
                };

                new ApexCharts(supportChart3, options3).render();
            } else {
                console.error("Element with ID 'support-chart-3' not found or is invalid.");
            }
        }

        function floatchart2() {
            let dataString = $("body").find('#image-result').val()
            let data = JSON.parse(dataString);
            let supportChart3 = $('#support-chart-2').get(0);

            if (supportChart3) {
                var options2 = {
                    chart: {
                        type: 'area',
                        height: 80,
                        sparkline: {
                            enabled: true
                        }
                    },
                    colors: ["#4680ff"],
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    series: [{
                        data: data
                    }],
                    tooltip: {
                        fixed: {
                            enabled: false
                        },
                        x: {
                            show: false
                        },
                        y: {
                            title: {
                                formatter: function(seriesName) {
                                    return 'Image Gallery'
                                }
                            }
                        },
                        marker: {
                            show: false
                        }
                    }
                };

                new ApexCharts(supportChart3, options2).render();
            } else {
                console.error("Element with ID 'support-chart-2' not found or is invalid.");
            }
        }
    </script>
@endpush
