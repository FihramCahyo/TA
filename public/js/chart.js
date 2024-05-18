document.addEventListener("DOMContentLoaded", function () {
    if (
        document.getElementById("area-chart") &&
        typeof ApexCharts !== "undefined"
    ) {
        var options = {
            chart: {
                height: 350,
                type: "line",
                toolbar: {
                    show: false,
                },
            },
            series: [
                {
                    name: "New users",
                    data: [6500, 6418, 6456, 6526, 6356, 6456],
                },
            ],
            xaxis: {
                categories: [
                    "01 February",
                    "02 February",
                    "03 February",
                    "04 February",
                    "05 February",
                    "06 February",
                    "07 February",
                ],
            },
        };

        var chart = new ApexCharts(
            document.getElementById("area-chart"),
            options
        );
        chart.render();
    }
});
