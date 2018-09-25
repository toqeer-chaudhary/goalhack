@extends("layouts.backend")

@section("styles")

@endsection

@section("title")
    Strategy Home
@endsection

@section("page-title")
    Strategy
@endsection

@section("sidebar-tabs")
    @include("includes.backend.strategy-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        {{--<h3>Goals List is available below</h3>--}}
        <div class="ks-title" id="">
            <div class="col-sm-2 text-center">
                <!--Dropdown primary-->
                <div class="dropdown">
                    <!--Trigger-->
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Strategy</button>
                    <!--Menu-->
                    <div class="dropdown-menu dropdown-ins">
                        @foreach($strategies as $strategy)
                            <a class="dropdown-item strategy-dashboard" href="#" data="{{$strategy->id}}">{{$strategy->name}}</a>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-sm-2 text-center">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select KPI</button>
                    <div class="dropdown-menu dropdown-ins" id="show-kpis-dropdown">
                        {{--<a class="dropdown-item goal-dashboard" href="#" data="{{$goal->id}}">{{$goal->name}}</a>--}}
                        {{--@endfor--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Goal</button>
                    <div class="dropdown-menu dropdown-ins" id="show-goals-dropdown">
                        {{--<a class="dropdown-item goal-dashboard" href="#" data="{{$goal->id}}">{{$goal->name}}</a>--}}
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
                        <a class="dropdown-item strategy-line-chart" href="#" data="1">Line Chart</a>
                        <a class="dropdown-item strategy-pie-chart" href="#" data="2">Pie Chart</a>
                        <a class="dropdown-item strategy-bar-chart" href="#" data="3">Bar Chart</a>

                        --}}{{--@endfor--}}{{--
                    </div>
                </div>
            </div>--}}
            <div class="col-sm-2 text-center"></div>
            <div class="col-sm-2 text-center"></div>
            <div class="col-sm-2 text-center"></div>

        </div>
    </div>
@endsection

@section("main-container")
    <div class="col-sm-6 show-strategy-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-strategy-name" style="color: #2C638E">
            </h5>
            <div class="card-block">
                <div id="d_strategy_curve_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 show-strategy-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-strategy-name" style="color: #2C638E">
            </h5>
            <div id="d_strategy_pie_chart"></div>
        </div>
    </div>
    <div class="col-sm-6 show-strategy-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header d-strategy-name" style="color: #2C638E">

            </h5>
            <div class="card-block">
                <div id="d_strategy_bar_chart"></div>
            </div>
        </div>
    </div>

{{--KPi--}}
    <div class="col-sm-6 show-kpi-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header d-kpi-name" style="color: #2C638E">

            </h5>
            <div class="card-block">
                <div id="kpi_curve_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 show-kpi-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-kpi-name" style="color: #2C638E">

            </h5>
            <div id="kpi_pie_chart"></div>
        </div>
    </div>
    <div class="col-sm-6 show-kpi-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header d-kpi-name" style="color: #2C638E">

            </h5>
            <div class="card-block">
                <div id="kpi_bar_chart"></div>
            </div>
        </div>
    </div>

    {{--Goals--}}
    <div class="col-sm-6 show-goal-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-goal-name" style="color: #2C638E">

            </h5>
            <div class="card-block">
                <div id="d_goal_curve_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 show-goal-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-goal-name" style="color: #2C638E">
            </h5>
            <div id="d_goal_pie_chart"></div>
        </div>
    </div>
    <div class="col-sm-6 show-goal-chart">
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

@endsection