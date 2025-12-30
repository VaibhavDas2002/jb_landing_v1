$(document).ready(function () {
    // Sample data for schemes
    const schemes = [
        {
            name: "Kanyashree Prakalpa",
            description: "Conditional cash transfer scheme for girl students",
            beneficiaries: "45.2L",
            amount: "₹1,250Cr",
            icon: "fas fa-female",
            color: "bg-pink-500",
        },
        {
            name: "Yuvashree Arpan",
            description: "Unemployment allowance for youth",
            beneficiaries: "12.8L",
            amount: "₹850Cr",
            icon: "fas fa-user-graduate",
            color: "bg-blue-500",
        },
        {
            name: "Swasthya Sathi",
            description: "Health insurance scheme for all residents",
            beneficiaries: "98.5L",
            amount: "₹2,100Cr",
            icon: "fas fa-heartbeat",
            color: "bg-red-500",
        },
        {
            name: "Krishak Bandhu",
            description: "Financial assistance for farmers",
            beneficiaries: "75.3L",
            amount: "₹3,500Cr",
            icon: "fas fa-tractor",
            color: "bg-green-500",
        },
        {
            name: "Aikyashree",
            description: "Scholarship for minority community students",
            beneficiaries: "8.9L",
            amount: "₹450Cr",
            icon: "fas fa-book-open",
            color: "bg-purple-500",
        },
        {
            name: "Rupashree",
            description: "One-time financial assistance for marriage",
            beneficiaries: "15.7L",
            amount: "₹950Cr",
            icon: "fas fa-ring",
            color: "bg-yellow-500",
        },
    ];

    // Chart 1: Applications Trend
    Highcharts.chart("applicationsChart", {
        chart: {
            type: "column",
            backgroundColor: "transparent",
        },
        title: {
            text: "",
        },
        xAxis: {
            categories: [
                "Kanyashree",
                "Yuvashree",
                "Swasthya",
                "Krishak",
                "Aikyashree",
                "Rupashree",
                "Others",
            ],
            crosshair: true,
        },
        yAxis: {
            min: 0,
            title: {
                text: "Applications (in thousands)",
            },
        },
        tooltip: {
            headerFormat:
                '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:
                '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} K</b></td></tr>',
            footerFormat: "</table>",
            shared: true,
            useHTML: true,
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
            },
        },
        series: [
            {
                name: "Applications",
                data: [45.2, 28.5, 65.3, 42.1, 15.8, 22.7, 18.9],
                color: "#3b82f6",
            },
        ],
        credits: {
            enabled: false,
        },
    });

    // Chart 2: District Distribution
    Highcharts.chart("districtChart", {
        chart: {
            type: "pie",
            backgroundColor: "transparent",
        },
        title: {
            text: "",
        },
        tooltip: {
            pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>",
        },
        accessibility: {
            point: {
                valueSuffix: "%",
            },
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    format: "<b>{point.name}</b>: {point.percentage:.1f} %",
                },
            },
        },
        series: [
            {
                name: "Beneficiaries",
                colorByPoint: true,
                data: [
                    {
                        name: "North 24 Parganas",
                        y: 25.0,
                        sliced: true,
                        selected: true,
                    },
                    {
                        name: "South 24 Parganas",
                        y: 18.7,
                    },
                    {
                        name: "Murshidabad",
                        y: 12.5,
                    },
                    {
                        name: "Paschim Medinipur",
                        y: 8.6,
                    },
                    {
                        name: "Purba Medinipur",
                        y: 7.4,
                    },
                    {
                        name: "Howrah",
                        y: 6.8,
                    },
                    {
                        name: "Kolkata",
                        y: 5.9,
                    },
                    {
                        name: "Others",
                        y: 15.1,
                    },
                ],
            },
        ],
        credits: {
            enabled: false,
        },
    });

    // Chart 3: Compliance Rate
    Highcharts.chart("complianceChart", {
        chart: {
            type: "gauge",
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            backgroundColor: "transparent",
        },
        title: {
            text: "",
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [
                {
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                            [0, "#FFF"],
                            [1, "#333"],
                        ],
                    },
                    borderWidth: 0,
                    outerRadius: "109%",
                },
                {
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                            [0, "#333"],
                            [1, "#FFF"],
                        ],
                    },
                    borderWidth: 1,
                    outerRadius: "107%",
                },
                {
                    // default background
                },
                {
                    backgroundColor: "#DDD",
                    borderWidth: 0,
                    outerRadius: "105%",
                    innerRadius: "103%",
                },
            ],
        },
        yAxis: {
            min: 0,
            max: 100,
            minorTickInterval: "auto",
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: "inside",
            minorTickColor: "#666",
            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: "inside",
            tickLength: 10,
            tickColor: "#666",
            labels: {
                step: 2,
                rotation: "auto",
            },
            title: {
                text: "Compliance %",
            },
            plotBands: [
                {
                    from: 0,
                    to: 60,
                    color: "#DF5353", // red
                },
                {
                    from: 60,
                    to: 80,
                    color: "#DDDF0D", // yellow
                },
                {
                    from: 80,
                    to: 100,
                    color: "#55BF3B", // green
                },
            ],
        },
        series: [
            {
                name: "Compliance",
                data: [92.4],
                tooltip: {
                    valueSuffix: " %",
                },
            },
        ],
        credits: {
            enabled: false,
        },
    });

    // Chart 4: Category Distribution
    Highcharts.chart("categoryChart", {
        chart: {
            type: "dependencywheel",
            backgroundColor: "transparent",
        },
        title: {
            text: "Scheme Categories Flow",
        },
        accessibility: {
            point: {
                valueDescriptionFormat:
                    "{index}. From {point.from} to {point.to}: {point.weight}.",
            },
        },
        series: [
            {
                name: "Scheme Categories",
                keys: ["from", "to", "weight"],
                data: [
                    ["All Schemes", "Women Welfare", 4],
                    ["All Schemes", "Student Schemes", 3],
                    ["All Schemes", "Social Security", 3],
                    ["All Schemes", "Agriculture", 2],
                    ["All Schemes", "Health & Medical", 1],
                ],
                type: "dependencywheel",
                name: "Dependency wheel series",
                dataLabels: {
                    color: "#333",
                    textPath: {
                        enabled: true,
                    },
                    distance: 10,
                },
                size: "95%",
            },
        ],
        credits: {
            enabled: false,
        },
    });
});
