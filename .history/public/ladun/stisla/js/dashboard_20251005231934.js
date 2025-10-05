(function($) {
    'use strict';
    $(function() {
        // SALES DIFFERENCE CHART
        if ($("#salesDifference").length) {
            var salesDifferenceData = {
                labels: ["50+", "35-50", "25-35", "18-25", "0-18"],
                datasets: [{
                    label: 'Best Sellers',
                    data: [22, 28, 18, 20, 12],
                    backgroundColor: ['#8169f2', '#6a4df5', '#4f2def', '#2b0bc5', '#180183'],
                    borderColor: ['#8169f2', '#6a4df5', '#4f2def', '#2b0bc5', '#180183'],
                    borderWidth: 2
                }]
            };
            var salesDifferenceOptions = {
                scales: {
                    xAxes: [{ display: false }],
                    yAxes: [{ display: true, ticks: { beginAtZero: true } }]
                },
                legend: { display: false },
                tooltips: { enabled: false }
            };
            var ctx = $("#salesDifference").get(0).getContext("2d");
            new Chart(ctx, { type: 'horizontalBar', data: salesDifferenceData, options: salesDifferenceOptions });
        }

        // BEST SELLERS DOUGHNUT
        if ($("#bestSellers").length) {
            var bestSellersData = {
                labels: ['Automotive','Books','Software','Toys','Video games'],
                datasets: [{
                    data: [20, 15, 20, 35, 10],
                    backgroundColor: ['#ee5b5b','#fcd53b','#0bdbb8','#464dee','#0ad7f7'],
                    borderColor: ['#ee5b5b','#fcd53b','#0bdbb8','#464dee','#0ad7f7']
                }]
            };
            var bestSellersOptions = { responsive: true, cutoutPercentage: 80, legend: { display: false } };
            var ctx = $("#bestSellers").get(0).getContext("2d");
            new Chart(ctx, { type: 'doughnut', data: bestSellersData, options: bestSellersOptions });
        }

        // SUPPORT TRACKER BAR
        if ($("#supportTracker").length) {
            var supportTrackerData = {
                labels: ["Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets: [
                    {
                        label: 'New Tickets',
                        data: [640, 750, 500, 400, 1200, 650, 550, 450, 400],
                        backgroundColor: '#464dee'
                    },
                    {
                        label: 'Open Tickets',
                        data: [800, 550, 700, 600, 1100, 650, 550, 650, 850],
                        backgroundColor: '#d8d8d8'
                    }
                ]
            };
            var supportTrackerOptions = {
                scales: { xAxes: [{ stacked: true }], yAxes: [{ stacked: true, ticks: { beginAtZero: true } }] },
                legend: { display: false }
            };
            var ctx = $("#supportTracker").get(0).getContext("2d");
            new Chart(ctx, { type: 'bar', data: supportTrackerData, options: supportTrackerOptions });
        }

        // PRODUCT ORDER GAGE
        if ($('#productorder-gage').length) {
            var gage = new JustGage({
                id: 'productorder-gage',
                value: 3245,
                min: 0,
                max: 5000,
                hideMinMax: true,
                symbol: 'K',
                label: 'You have done 57.6% more orders today',
                gaugeColor: "#f0f0f0",
                levelColors: ["#fcd53b"]
            });
            $("#productorder-gage").append('<div class="product-order"><div class="icon-inside-circle"><i class="mdi mdi-basket"></i></div></div>');
        }

    });
})(jQuery);
