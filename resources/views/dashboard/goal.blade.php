@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
@endsection

@section("title")
    Goal Home
@endsection

@section("page-title")
    Goal
@endsection

@section("sidebar-tabs")
    @include("includes.backend.goal-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        {{--<h3>Goals List is available below</h3>--}}
        <div class="ks-title">
            <div class="col-sm-2">
                <!--Select Goal-->
                <div class="dropdown">
                    <!--Trigger-->
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Goal</button>
                    <!--Menu-->
                    <div class="dropdown-menu dropdown-ins">
                        @foreach($goals as $goal)
                            <a class="dropdown-item goal-dashboard" href="#" data="{{$goal->id}}">{{$goal->name}}</a>
                        @endforeach
                        {{--@endfor--}}
                    </div>
                </div>
            </div>
            {{--<div class="col-sm-2">
                <!--/Select Chart-->
                <!--Dropdown primary-->
                <div class="dropdown">
                    <!--Trigger-->
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Chart</button>
                    <!--Menu-->
                    <div class="dropdown-menu dropdown-ins">
                        <a class="dropdown-item line-chart" href="#" data="1">Line Chart</a>
                        <a class="dropdown-item pie-chart" href="#" data="2">Pie Chart</a>
                        <a class="dropdown-item bar-chart" href="#" data="2">Bar Chart</a>

                        --}}{{--@endfor--}}{{--
                    </div>
                </div>
            </div>--}}
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>


        </div>
    </div>
@endsection

@section("main-container")
    <div class="col-sm-6">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-goal-name" style="color: #2C638E">

            </h5>
            <div class="card-block">
                <div id="d_goal_curve_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-trending-down"></i>
                            </div>
                            <div class="text">
                                <h2>1,086</h2>
                                <span>this week</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-trending-down"></i>
                            </div>
                            <div class="text">
                                <h2>1,086</h2>
                                <span>this week</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-trending-up"></i>
                            </div>
                            <div class="text">
                                <h2>1,086</h2>
                                <span>this week</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-trending-down"></i>
                            </div>
                            <div class="text">
                                <h2>1,086</h2>
                                <span>this week</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-goal-name" style="color: #2C638E">
            </h5>
            <div id="d_goal_pie_chart"></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header d-goal-name" style="color: #2C638E">

            </h5>
            <div class="card-block">
                <div id="d_goal_bar_chart"></div>
            </div>
        </div>
    </div>



@endsection

@section("scripts")
    <script src="{{asset("assets/backend/js/goalhack-dashabord.js")}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script>
        //WidgetChart 2
        var ctx = document.getElementById("widgetChart2");
        if (ctx) {
            ctx.height = 130;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    type: 'line',
                    datasets: [{
                        data: [1, 18, 9, 17, 34, 22],
                        label: 'Dataset',
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(255,255,255,.55)',
                    },]
                },
                options: {

                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        intersect: false,
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            ticks: {
                                display: false,
                            }
                        }]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            tension: 0.00001,
                            borderWidth: 1
                        },
                        point: {
                            radius: 4,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            });
        }
    </script>
@endsection