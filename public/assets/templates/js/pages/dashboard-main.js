'use strict';
$(document).ready(function() {
    setTimeout(function() {
        floatchart()
    }, 100);
});

function floatchart() {
    let dataString = $('#booking-result').val();
    let data = JSON.parse(dataString);
    $(function() {
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
                data:data
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
        }
        new ApexCharts(document.querySelector("#support-chart"), options1).render();
    });
}
