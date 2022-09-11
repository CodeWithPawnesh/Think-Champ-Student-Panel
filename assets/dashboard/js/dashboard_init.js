!(function(a) {
    "use strict";
    a(function() {
        if (a("#bar").length) {
            var e = a("#bar").get(0).getContext("2d");
            e.height = 20;
            new Chart(e, {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Revenue",
                        backgroundColor: "#1ccab8",
                        borderColor: "transparent",
                        borderWidth: 2,
                        categoryPercentage: 0.5,
                        hoverBackgroundColor: "#00d8c2",
                        hoverBorderColor: "transparent",
                        data: [30, 39, 20, 31, 41, 25, 20, 39, 20, 31, 41, 25],
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: !1,
                        labels: {
                            fontColor: "#50649c"
                        }
                    },
                    tooltips: {
                        enabled: !0,
                        callbacks: {
                            label: function(e, a) {
                                return a.datasets[e.datasetIndex].label + " $ " + e.yLabel + "k";
                            },
                        },
                    },
                    scales: {
                        xAxes: [{
                            barPercentage: 0.35,
                            categoryPercentage: 0.4,
                            display: !0,
                            gridLines: {
                                color: "transparent",
                                borderDash: [0],
                                zeroLineColor: "transparent",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2]
                            },
                            ticks: {
                                fontColor: "#a4abc5",
                                beginAtZero: !0,
                                padding: 12
                            },
                        }, ],
                        yAxes: [{
                            gridLines: {
                                color: "#8997bd29",
                                borderDash: [3],
                                drawBorder: !1,
                                drawTicks: !1,
                                zeroLineColor: "#8997bd29",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2]
                            },
                            ticks: {
                                fontColor: "#a4abc5",
                                beginAtZero: !0,
                                padding: 12,
                                callback: function(e) {
                                    if (!(e % 10)) return "$" + e + "k";
                                },
                            },
                        }, ],
                    },
                },
            });
        }
    });
})(jQuery), $("#world-map-markers").vectorMap({
    map: "world_mill_en",
    scaleColors: ["#eff0f1", "#eff0f1"],
    normalizeFunction: "polynomial",
    hoverOpacity: 0.7,
    hoverColor: !1,
    regionStyle: {
        initial: {
            fill: "#7474b126"
        }
    },
    markers: [{
        latLng: [55.75, 37.62],
        name: "Russia"
    }, {
        latLng: [-25.27, 133.77],
        name: "Australia"
    }, {
        latLng: [20.59, 78.96],
        name: "India"
    }, {
        latLng: [39.52, -87.12],
        name: "Brazil"
    }, ],
    series: {
        regions: [{
            values: {
                US: "#868ff363",
                AU: "#868ff363",
                BR: "#868ff363",
                RU: "#868ff363"
            },
            attribute: "fill"
        }]
    },
    markerStyle: {
        initial: {
            stroke: "#7474b126"
        },
        hover: {
            stroke: "rgba(112, 112, 112, 0.30)"
        }
    },
    backgroundColor: "transparent",
    markers: [{
        latLng: [37.09024, -95.712891],
        name: "USA",
        style: {
            fill: "#f93b7a"
        }
    }, {
        latLng: [55.754093, 37.620407],
        name: "Russia",
        style: {
            fill: "#0aafff"
        }
    }, {
        latLng: [-21.943369, 123.102198],
        name: "Australia",
        style: {
            fill: "#7551e9"
        }
    }, {
        latLng: [-11.409874, -41.280857],
        name: "Brazil",
        style: {
            fill: "#ffc212"
        }
    }, ],
});
jQuery(function(e) {
    "use strict";
    var o = window.AdminoxAdmin || {};
    if (e("#platform_type_dates_donut").length) {
        echarts.init(document.getElementById("platform_type_dates_donut")).setOption({
            timeline: {
                show: !1,
                data: ["06-16", "05-16", "04-16"],
                label: {
                    formatter: function(e) {
                        return e ? e.slice(0, 3) : null;
                    },
                },
                x: 10,
                y: null,
                x2: 10,
                y2: 0,
                width: 10,
                height: 50,
                backgroundColor: "rgba(0,0,0)",
                borderColor: "#eaeaea",
                borderWidth: 0,
                padding: 5,
                controlPosition: "left",
                autoPlay: !0,
                loop: !1,
                playInterval: 2e3,
                lineStyle: {
                    width: 1,
                    color: "#000",
                    type: ""
                },
            },
            options: [{
                color: ["#8950FC", "#9AFDD2", "#FFCA60"],
                title: {
                    text: "",
                    subtext: ""
                },
                tooltip: {
                    trigger: "item",
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    show: !1,
                    x: "left",
                    orient: "vertical",
                    padding: 0,
                    data: ["iPhone 7", "Windows", "Desktop", "Mobiles", "Others"]
                },
                toolbox: {
                    show: !0,
                    color: ["#bdbdbd", "#bdbdbd", "#bdbdbd"],
                    feature: {
                        mark: {
                            show: !1
                        },
                        dataView: {
                            show: !1,
                            readOnly: !0
                        },
                        magicType: {
                            show: !0,
                            type: ["pie", "funnel"],
                            option: {
                                funnel: {
                                    x: "10%",
                                    width: "80%",
                                    funnelAlign: "center",
                                    max: 50
                                },
                                pie: {
                                    roseType: "none"
                                }
                            }
                        },
                        restore: {
                            show: !1
                        },
                        saveAsImage: {
                            show: 0
                        },
                    },
                },
                series: [{
                    name: "06-16",
                    type: "pie",
                    radius: [20, "85%"],
                    roseType: "none",
                    center: ["50%", "45%"],
                    width: "100%",
                    itemStyle: {
                        normal: {
                            label: {
                                show: !1
                            },
                            labelLine: {
                                show: !0
                            }
                        },
                        emphasis: {
                            label: {
                                show: !1
                            },
                            labelLine: {
                                show: !1
                            }
                        }
                    },
                    data: [{
                        value: 100,
                        name: "iPhone 7"
                    }, {
                        value: 150,
                        name: "Windows"
                    }, {
                        value: 50,
                        name: "Desktop"
                    }, ],
                }, ],
            }],
        });
    }
    e(window).on("load", function() {});
})