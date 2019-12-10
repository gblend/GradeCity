'use strict';
var Demo = (function () {
        var a,
            e,
            t,
            o,
            r,
            l;
        var n = document.querySelector('#demoForm'),
            s = document.querySelector('#topnav'),
            i = document.querySelector('#topbar'),
            c = document.querySelector('#sidebar'),
            d = document.querySelector('#sidebarUser'),
            u = document.querySelectorAll('[class^="container"]'),
            p =
                (document.querySelectorAll('#stylesheetLight, #stylesheetDark'),
                    document.querySelector('#stylesheetLight')),
            h = document.querySelector('#stylesheetDark'),
            b = {
                colorScheme: localStorage.getItem('dashkitColorScheme')
                    ? localStorage.getItem('dashkitColorScheme')
                    : 'light',
                navPosition: localStorage.getItem('dashkitNavPosition')
                    ? localStorage.getItem('dashkitNavPosition')
                    : 'sidenav',
                sidebarColor: localStorage.getItem('dashkitSidebarColor')
                    ? localStorage.getItem('dashkitSidebarColor')
                    : 'default'
            };
        !(function () {
            var a = window.location.search.substring(1).split('&');
            var e = 0;
            for (;
                e < a.length;
                e++
            ) {
                var t = a[e].split('='),
                    o = t[0],
                    r = t[1];
                ('colorScheme' != o && 'navPosition' != o && 'sidebarColor' != o) ||
                (localStorage.setItem(
                    'dashkit' + o.charAt(0).toUpperCase() + o.slice(1),
                    r
                ),
                    (b[o] = r));
            }
        })(),
            (function (a) {
                if (s && i && c && d)
                    if ('topnav' == a) {
                        t(i), t(c);
                        for (var e = 0; e < u.length; e++)
                            u[e].classList.remove('container-fluid'),
                                u[e].classList.add('container');
                    } else if ('combo' == a)
                        for (t(s), t(d), e = 0; e < u.length; e++)
                            u[e].classList.remove('container'),
                                u[e].classList.add('container-fluid');
                    else if ('sidenav' == a)
                        for (t(s), t(i), e = 0; e < u.length; e++)
                            u[e].classList.remove('container'),
                                u[e].classList.add('container-fluid');

                function t(a) {
                    a.setAttribute('style', 'display: none !important');
                }
            })(b.navPosition),
            (e = b.sidebarColor),
        c &&
        ('default' == e
            ? (c.classList.remove('navbar-dark', 'bg-vibrant'),
                c.classList.add('navbar-light'))
            : 'vibrant' == e &&
            (c.classList.remove('navbar-light'),
                c.classList.add('navbar-dark', 'bg-vibrant'))),
            (t = n),
            (o = b.colorScheme),
            (r = b.navPosition),
            (l = b.sidebarColor),
            $(t)
                .find('[name="colorScheme"][value="' + o + '"]')
                .closest('.btn')
                .button('toggle'),
            $(t)
                .find('[name="navPosition"][value="' + r + '"]')
                .closest('.btn')
                .button('toggle'),
            $(t)
                .find('[name="sidebarColor"][value="' + l + '"]')
                .closest('.btn')
                .button('toggle'),
            (document.body.style.display = 'block'),
        n &&
        n.addEventListener('submit', function (a) {
            var e, t, o, r;
            a.preventDefault(),
                (t = (e = n).querySelector('[name="colorScheme"]:checked').value),
                (o = e.querySelector('[name="navPosition"]:checked').value),
                (r = e.querySelector('[name="sidebarColor"]:checked').value),
                localStorage.setItem('dashkitColorScheme', t),
                localStorage.setItem('dashkitNavPosition', o),
                localStorage.setItem('dashkitSidebarColor', r),
                (window.location = window.location.pathname);
        });
    })(),
    ThemeCharts = (function () {
        var a;
        var e = $('[data-toggle="chart"]');
        var t = {base: 'Cerebri Sans'};
        var o = {
            gray: {
                300: '#E3EBF6',
                600: '#95AAC9',
                700: '#6E84A3',
                800: '#152E4D',
                900: '#283E59'
            },
            primary: {100: '#D2DDEC', 300: '#A6C5F7', 700: '#2C7BE5'},
            black: '#12263F',
            white: '#FFFFFF',
            transparent: 'transparent'
        };
        var r =
            'rgb(249, 251, 253)' == getComputedStyle(document.body).backgroundColor
                ? 'light'
                : 'dark';

        function l(a, e) {
            for (var t in e) 'object' != typeof e[t] ? (a[t] = e[t]) : l(a[t], e[t]);
        }

        function n(a) {
            var e = a.data('add'),
                t = $(a.data('target')).data('chart');
            a.is(':checked')
                ? (function a(e, t) {
                    for (var o in t)
                        Array.isArray(t[o])
                            ? t[o].forEach(function (a) {
                                e[o].push(a);
                            })
                            : a(e[o], t[o]);
                })(t, e)
                : (function a(e, t) {
                    for (var o in t)
                        Array.isArray(t[o])
                            ? t[o].forEach(function (a) {
                                e[o].pop();
                            })
                            : a(e[o], t[o]);
                })(t, e),
                t.update();
        }

        function s(a) {
            var e = a.data('update'),
                t = $(a.data('target')).data('chart');
            l(t, e),
                (function (a, e) {
                    if (void 0 !== a.data('prefix') || void 0 !== a.data('prefix')) {
                        var l = a.data('prefix') ? a.data('prefix') : '',
                            n = a.data('suffix') ? a.data('suffix') : '';
                        (e.options.scales.yAxes[0].ticks.callback = function (a) {
                            if (!(a % 10)) return l + a + n;
                        }),
                            (e.options.tooltips.callbacks.label = function (a, e) {
                                var t = e.datasets[a.datasetIndex].label || '',
                                    o = a.yLabel;
                                var r = '';
                                return (
                                    1 < e.datasets.length &&
                                    (r +=
                                        '<span class="popover-body-label mr-auto">' +
                                        t +
                                        '</span>'),
                                        (r +=
                                            '<span class="popover-body-value">' + l + o + n + '</span>')
                                );
                            });
                    }
                })(a, t),
                t.update();
        }

        return (
            window.Chart &&
            l(
                Chart,
                ((a = {
                    defaults: {
                        global: {
                            responsive: !0,
                            maintainAspectRatio: !1,
                            defaultColor: 'dark' == r ? o.gray[700] : o.gray[600],
                            defaultFontColor: 'dark' == r ? o.gray[700] : o.gray[600],
                            defaultFontFamily: t.base,
                            defaultFontSize: 13,
                            layout: {padding: 0},
                            legend: {
                                display: !1,
                                position: 'bottom',
                                labels: {usePointStyle: !0, padding: 16}
                            },
                            elements: {
                                point: {radius: 0, backgroundColor: o.primary[700]},
                                line: {
                                    tension: 0.4,
                                    borderWidth: 3,
                                    borderColor: o.primary[700],
                                    backgroundColor: o.transparent,
                                    borderCapStyle: 'rounded'
                                },
                                rectangle: {backgroundColor: o.primary[700]},
                                arc: {
                                    backgroundColor: o.primary[700],
                                    borderColor: 'dark' == r ? o.gray[800] : o.white,
                                    borderWidth: 4
                                }
                            },
                            tooltips: {
                                enabled: !1,
                                mode: 'index',
                                intersect: !1,
                                custom: function (r) {
                                    var a = $('#chart-tooltip');
                                    if (
                                        (a.length ||
                                        ((a = $(
                                            '<div id="chart-tooltip" class="popover bs-popover-top" role="tooltip"></div>'
                                        )),
                                            $('body').append(a)),
                                        0 !== r.opacity)
                                    ) {
                                        if (r.body) {
                                            var e = r.title || [],
                                                l = r.body.map(function (a) {
                                                    return a.lines;
                                                });
                                            var n = '';
                                            (n += '<div class="arrow"></div>'),
                                                e.forEach(function (a) {
                                                    n +=
                                                        '<h3 class="popover-header text-center">' +
                                                        a +
                                                        '</h3>';
                                                }),
                                                l.forEach(function (a, e) {
                                                    var t =
                                                        '<span class="popover-body-indicator" style="background-color: ' +
                                                        r.labelColors[e].backgroundColor +
                                                        '"></span>',
                                                        o =
                                                            1 < l.length
                                                                ? 'justify-content-left'
                                                                : 'justify-content-center';
                                                    n +=
                                                        '<div class="popover-body d-flex align-items-center ' +
                                                        o +
                                                        '">' +
                                                        t +
                                                        a +
                                                        '</div>';
                                                }),
                                                a.html(n);
                                        }
                                        var t = $(this._chart.canvas),
                                            o = (t.outerWidth(), t.outerHeight(), t.offset().top),
                                            s = t.offset().left,
                                            i = a.outerWidth(),
                                            c = a.outerHeight(),
                                            d = o + r.caretY - c - 16,
                                            u = s + r.caretX - i / 2;
                                        a.css({
                                            top: d + 'px',
                                            left: u + 'px',
                                            display: 'block'
                                        });
                                    } else a.css('display', 'none');
                                },
                                callbacks: {
                                    label: function (a, e) {
                                        var t = e.datasets[a.datasetIndex].label || '',
                                            o = a.yLabel;
                                        var r = '';
                                        return (
                                            1 < e.datasets.length &&
                                            (r +=
                                                '<span class="popover-body-label mr-auto">' +
                                                t +
                                                '</span>'),
                                                (r +=
                                                    '<span class="popover-body-value">' + o + '</span>')
                                        );
                                    }
                                }
                            }
                        },
                        doughnut: {
                            cutoutPercentage: 83,
                            tooltips: {
                                callbacks: {
                                    title: function (a, e) {
                                        return e.labels[a[0].index];
                                    },
                                    label: function (a, e) {
                                        var t = '';
                                        return (t +=
                                            '<span class="popover-body-value">' +
                                            e.datasets[0].data[a.index] +
                                            '</span>');
                                    }
                                }
                            },
                            legendCallback: function (a) {
                                var o = a.data;
                                var r = '';
                                return (
                                    o.labels.forEach(function (a, e) {
                                        var t = o.datasets[0].backgroundColor[e];
                                        (r += '<span class="chart-legend-item">'),
                                            (r +=
                                                '<i class="chart-legend-indicator" style="background-color: ' +
                                                t +
                                                '"></i>'),
                                            (r += a),
                                            (r += '</span>');
                                    }),
                                        r
                                );
                            }
                        }
                    }
                }),
                    Chart.scaleService.updateScaleDefaults('linear', {
                        gridLines: {
                            borderDash: [2],
                            borderDashOffset: [2],
                            color: 'dark' == r ? o.gray[900] : o.gray[300],
                            drawBorder: !1,
                            drawTicks: !1,
                            lineWidth: 0,
                            zeroLineWidth: 0,
                            zeroLineColor: 'dark' == r ? o.gray[900] : o.gray[300],
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2]
                        },
                        ticks: {
                            beginAtZero: !0,
                            padding: 10,
                            callback: function (a) {
                                if (!(a % 10)) return a;
                            }
                        }
                    }),
                    Chart.scaleService.updateScaleDefaults('category', {
                        gridLines: {drawBorder: !1, drawOnChartArea: !1, drawTicks: !1},
                        ticks: {padding: 20},
                        maxBarThickness: 10
                    }),
                    a)
            ),
                e.on({
                    change: function () {
                        var a = $(this);
                        a.is('[data-add]') && n(a);
                    },
                    click: function () {
                        var a = $(this);
                        a.is('[data-update]') && s(a);
                    }
                }),
                {colors: o, fonts: t, colorScheme: r}
        );
    })(),
    Header = (function () {
        var a,
            e;
        var t = $('#headerChart');
        t.length &&
        ((a = t),
            (e = new Chart(a, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [
                            {
                                gridLines: {
                                    color: ThemeCharts.colors.gray[900],
                                    zeroLineColor: ThemeCharts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function (a) {
                                        if (!(a % 10)) return '$' + a + 'k';
                                    }
                                }
                            }
                        ]
                    },
                    tooltips: {
                        callbacks: {
                            label: function (a, e) {
                                var t = e.datasets[a.datasetIndex].label || '',
                                    o = a.yLabel;
                                var r = '';
                                return (
                                    1 < e.datasets.length &&
                                    (r +=
                                        '<span class="popover-body-label mr-auto">' +
                                        t +
                                        '</span>'),
                                        (r += '<span class="popover-body-value">$' + o + 'k</span>')
                                );
                            }
                        }
                    }
                },
                data: {
                    labels: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    datasets: [
                        {
                            label: 'Performance',
                            data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40]
                        }
                    ]
                }
            })),
            a.data('chart', e));
    })(),
    Performance = (function () {
        var a,
            e;
        var t = $('#performanceChart');
        t.length &&
        ((a = t),
            (e = new Chart(a, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    callback: function (a) {
                                        if (!(a % 10)) return '$' + a + 'k';
                                    }
                                }
                            }
                        ]
                    },
                    tooltips: {
                        callbacks: {
                            label: function (a, e) {
                                var t = e.datasets[a.datasetIndex].label || '',
                                    o = a.yLabel;
                                var r = '';
                                return (
                                    1 < e.datasets.length &&
                                    (r +=
                                        '<span class="popover-body-label mr-auto">' +
                                        t +
                                        '</span>'),
                                        (r += '<span class="popover-body-value">$' + o + 'k</span>')
                                );
                            }
                        }
                    }
                },
                data: {
                    labels: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    datasets: [
                        {
                            label: 'Performance',
                            data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40]
                        }
                    ]
                }
            })),
            a.data('chart', e));
    })(),
    PerformanceAlias = (function () {
        var a,
            e;
        var t = $('#performanceChartAlias');
        t.length &&
        ((a = t),
            (e = new Chart(a, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    callback: function (a) {
                                        if (!(a % 10)) return '$' + a + 'k';
                                    }
                                }
                            }
                        ]
                    },
                    tooltips: {
                        callbacks: {
                            label: function (a, e) {
                                var t = e.datasets[a.datasetIndex].label || '',
                                    o = a.yLabel;
                                var r = '';
                                return (
                                    1 < e.datasets.length &&
                                    (r +=
                                        '<span class="popover-body-label mr-auto">' +
                                        t +
                                        '</span>'),
                                        (r += '<span class="popover-body-value">$' + o + 'k</span>')
                                );
                            }
                        }
                    }
                },
                data: {
                    labels: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    datasets: [
                        {
                            label: 'Performance',
                            data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40]
                        }
                    ]
                }
            })),
            a.data('chart', e));
    })(),
    Orders = (function () {
        var a,
            e;
        var t = $('#ordersChart'),
            o = $('[name="ordersSelect"]');
        t.length &&
        ((a = t),
            (e = new Chart(a, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    callback: function (a) {
                                        if (!(a % 10)) return '$' + a + 'k';
                                    }
                                }
                            }
                        ]
                    },
                    tooltips: {
                        callbacks: {
                            label: function (a, e) {
                                var t = e.datasets[a.datasetIndex].label || '',
                                    o = a.yLabel;
                                var r = '';
                                return (
                                    1 < e.datasets.length &&
                                    (r +=
                                        '<span class="popover-body-label mr-auto">' +
                                        t +
                                        '</span>'),
                                        (r += '<span class="popover-body-value">$' + o + 'k</span>')
                                );
                            }
                        }
                    }
                },
                data: {
                    labels: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    datasets: [
                        {
                            label: 'Sales',
                            data: [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32]
                        }
                    ]
                }
            })),
            a.data('chart', e)),
            o.on('change', function () {
                var a;
                'ordersSelectAll' == (a = $(this)).attr('id') &&
                (a.is(':checked') ? o.prop('checked', !0) : o.prop('checked', !1));
            });
    })(),
    OrdersAlias = (function () {
        var a,
            e;
        var t = $('#ordersChartAlias');
        t.length &&
        ((a = t),
            (e = new Chart(a, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    callback: function (a) {
                                        if (!(a % 10)) return '$' + a + 'k';
                                    }
                                }
                            }
                        ]
                    },
                    tooltips: {
                        callbacks: {
                            label: function (a, e) {
                                var t = e.datasets[a.datasetIndex].label || '',
                                    o = a.yLabel;
                                var r = '';
                                return (
                                    1 < e.datasets.length &&
                                    (r +=
                                        '<span class="popover-body-label mr-auto">' +
                                        t +
                                        '</span>'),
                                        (r += '<span class="popover-body-value">$' + o + 'k</span>')
                                );
                            }
                        }
                    }
                },
                data: {
                    labels: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    datasets: [
                        {
                            label: 'Sales',
                            data: [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32]
                        }
                    ]
                }
            })),
            a.data('chart', e));
    })(),
    Devices = (function () {
        var a,
            e,
            t,
            o,
            r;
        var l = $('#devicesChart');
        l.length &&
        ((o = l),
            (r = new Chart(o, {
                type: 'doughnut',
                options: {
                    tooltips: {
                        callbacks: {
                            title: function (a, e) {
                                return e.labels[a[0].index];
                            },
                            label: function (a, e) {
                                var t = '';
                                return (t +=
                                    '<span class="popover-body-value">' +
                                    e.datasets[0].data[a.index] +
                                    '%</span>');
                            }
                        }
                    }
                },
                data: {
                    labels: ['Desktop', 'Tabvar', 'Mobile'],
                    datasets: [
                        {
                            data: [60, 25, 15],
                            backgroundColor: [
                                ThemeCharts.colors.primary[700],
                                ThemeCharts.colors.primary[300],
                                ThemeCharts.colors.primary[100]
                            ],
                            hoverBorderColor:
                                'dark' == ThemeCharts.colorScheme
                                    ? ThemeCharts.colors.gray[800]
                                    : ThemeCharts.colors.white
                        }
                    ]
                }
            })),
            o.data('chart', r),
            (e = (a = l).data('chart').generateLegend()),
            (t = a.data('target')),
            $(t).html(e));
    })(),
    WeeklyHours = (function () {
        var a,
            e;
        var t = $('#weeklyHoursChart');
        t.length &&
        ((a = t),
            (e = new Chart(a, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    callback: function (a) {
                                        if (!(a % 10)) return a + 'hrs';
                                    }
                                }
                            }
                        ]
                    },
                    tooltips: {
                        callbacks: {
                            label: function (a, e) {
                                var t = e.datasets[a.datasetIndex].label || '',
                                    o = a.yLabel;
                                var r = '';
                                return (
                                    1 < e.datasets.length &&
                                    (r +=
                                        '<span class="popover-body-label mr-auto">' +
                                        t +
                                        '</span>'),
                                        (r += '<span class="popover-body-value">' + o + 'hrs</span>')
                                );
                            }
                        }
                    }
                },
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{data: [21, 12, 28, 15, 5, 12, 17, 2]}]
                }
            })),
            a.data('chart', e));
    })(),
    Dropdowns = (function () {
        var e = $('.dropup, .dropright, .dropdown, .dropleft');
        var t = $('.dropdown-menu'),
            o = $('.dropdown-menu .dropdown-menu');
        $('.dropdown-menu .dropdown-toggle').on('click', function () {
            var a;
            return (
                (a = $(this))
                    .closest(e)
                    .siblings(e)
                    .find(t)
                    .removeClass('show'),
                    a.next(o).toggleClass('show'),
                    !1
            );
        }),
            e.on('hide.bs.dropdown', function () {
                var a, e;
                (a = $(this)), (e = a.find(o)).length && e.removeClass('show');
            });
    })(),
    Dropzones = (function () {
        var a = $('[data-toggle="dropzone"]');
        var l = $('.dz-preview');
        a.length &&
        ((Dropzone.autoDiscover = !1),
            a.each(function () {
                var a, e, t, o, r;
                (a = $(this)),
                    (e = void 0 !== a.data('dropzone-multiple')),
                    (t = a.find(l)),
                    (o = void 0),
                    (r = {
                        url: a.data('dropzone-url'),
                        thumbnailWidth: null,
                        thumbnailHeight: null,
                        previewsContainer: t.get(0),
                        previewTemplate: t.html(),
                        maxFiles: e ? null : 1,
                        acceptedFiles: e ? null : 'image/*',
                        init: function () {
                            this.on('addedfile', function (a) {
                                !e && o && this.removeFile(o), (o = a);
                            });
                        }
                    }),
                    t.html(''),
                    a.dropzone(r);
            }));
    })(),
    Flatpickr = (function () {
        var a = $('[data-toggle="flatpickr"]');
        a.length &&
        a.each(function () {
            var a, e;
            (a = $(this)),
                (e = {
                    mode:
                        void 0 !== a.data('flatpickr-mode')
                            ? a.data('flatpickr-mode')
                            : 'single'
                }),
                a.flatpickr(e);
        });
    })(),
    Highlight = void $('.highlight').each(function (a, e) {
        var t;
        (t = e), hljs.highlightBlock(t);
    }),
    Lists = (function () {
        var a = $('[data-toggle="lists"]'),
            e = $('[data-sort]');
        a.length &&
        a.each(function () {
            var a, e;
            (a = $(this)),
                new List(a.get(0), {
                    valueNames: (e = a).data('lists-values'),
                    listClass: e.data('lists-class') ? e.data('lists-class') : 'list'
                });
        }),
            e.on('click', function () {
                return !1;
            });
    })(),
    Navbar = (function () {
        var e = $('.navbar-nav, .navbar-nav .nav'),
            t = $('.navbar-nav .collapse');
        t.on({
            'show.bs.collapse': function () {
                var a;
                (a = $(this))
                    .closest(e)
                    .find(t)
                    .not(a)
                    .collapse('hide');
            }
        });
    })(),
    Popover = (function () {
        var a = $('[data-toggle="popover"]');
        a.length && a.popover();
    })(),
    Quill = (function () {
        var a = $('[data-toggle="quill"]');
        a.length &&
        a.each(function () {
            var a, e;
            (a = $(this)),
                (e = a.data('quill-placeholder')),
                new Quill(a.get(0), {
                    modules: {
                        toolbar: [
                            ['bold', 'italic'],
                            ['link', 'blockquote', 'code', 'image'],
                            [{list: 'ordered'}, {list: 'bulvar'}]
                        ]
                    },
                    placeholder: e,
                    theme: 'snow'
                });
        });
    })(),
    Select2 = (function () {
        var a = $('[data-toggle="select"]');

        function t(a) {
            if (!a.id) return a.text;
            var e = $(a.element).data('avatar-src');
            return e
                ? $(
                    '<span class="avatar avatar-xs mr-3"><img class="avatar-img rounded-circle" src="' +
                    e +
                    '" alt="' +
                    a.text +
                    '"></span><span>' +
                    a.text +
                    '</span>'
                )
                : a.text;
        }

        a.length &&
        a.each(function () {
            var a, e;
            (a = $(this)),
                (e = {
                    dropdownParent: a.closest('.modal').length
                        ? a.closest('.modal')
                        : $(document.body),
                    minimumResultsForSearch: a.data('minimum-results-for-search'),
                    templateResult: t
                }),
                a.select2(e);
        });
    })(),
    Tooltip = (function () {
        var a = $('[data-toggle="tooltip"]');
        a.length && a.tooltip();
    })();

// Login form submission using ajax
$(function(){
  'use strict';
    var Form = $('#loginUserForm');
    $(Form).submit(function(e){
   e.preventDefault();
   // var formData = $(Form).serialize();
   $.ajax({
       type: 'POST',
       url: $(Form).attr('action'),
       data: new FormData(this),
       cache: false,
       processData: false,
       contentType: false
   }).done(function(response){
     //Make sure the form message div is set to class 'success'
     $('#loginUserMsg').removeClass('alert alert-danger');
     $('#loginUserMsg').addClass('alert alert-success');
   //  set the message text
       $('#loginUserMsg').text("Login successful");
       if(response === 'admin'){
           window.setTimeout(function () {
               //    clear the form
               $(Form)[0].reset();
               $("#loginUserMsg").alert('close');
           }, 1000);
           window.location.href = 'admin/admin-dashboard.php';
       } else if(response === 'user'){
           window.setTimeout(function () {
               $("#loginUserMsg").alert('show');
               //    clear the form
               $(Form)[0].reset();
               $("#loginUserMsg").alert('close');
           }, 1000);
           window.location.href = 'user-dashboard.php';
       }
   }).fail(function(data){
   //  make sure the form message div is set to class 'danger'
       $('#loginUserMsg').removeClass('alert alert-success');
       $('#loginUserMsg').addClass('alert alert-danger');
       if(data.responseText !== ''){
         $('#loginUserMsg').text(data.responseText);
       } else {
         $('#loginUserMsg').removeClass('alert alert-sucess').addClass('alert alert-danger').text('Oops! request failed');
       }
   });
 });

// Create user script
    var createUserForm = $('#createUserForm');
    $(createUserForm).submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(createUserForm).attr('action'),
            data: new FormData(this),
            cache: false,
            processData: false,
            contentType: false
        }).done(function (response) {
            //    Ensure that create user div has class 'success'
            $('#createUserMsg').removeClass('alert alert-danger');
            $('#createUserMsg').addClass('alert alert-success');
            $('#createUserMsg').text(response);
            $('#create_userTrigger').trigger('click');
            $('#createUserForm')[0].reset();
        }).fail(function(data){
            $('#createUserMsg').removeClass('alert alert-success');
            $('#createUserMsg').addClass('alert alert-danger');
            if(data.responseText !== ''){
                $('#createUserMsg').text(data.responseText);
                $('#create_userTrigger').trigger('click');
            } else {
                $('#createUserMsg').removeClass('alert alert-success').addClass('alert alert-danger').text('Oops! request failed');
                $('#create_userTrigger').trigger('click');
            }
        });
    });
//Recent result message modal
    $('#create_userTrigger').click(function () {
        $('#create_userModal').modal('show');
        setTimeout(function() {
            $('#create_userModal').modal('hide');
        }, 2000);
    });

});


