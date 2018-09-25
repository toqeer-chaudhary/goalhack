@extends("layouts.backend")

@section("styles")

@endsection

@section("title")
    vision Home
@endsection

@section("page-title")
    vision
@endsection

@section("sidebar-tabs")
    @include("includes.backend.vision-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        {{--<h3>Goals List is available below</h3>--}}
        <div class="ks-title" id="">
            <div class="col-sm-2 text-center">
                <!--Dropdown primary-->
                <div class="dropdown">
                    <!--Trigger-->
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Vision</button>
                    <!--Menu-->
                    <div class="dropdown-menu dropdown-ins">
                        @foreach($visions as $vision)
                            <a class="dropdown-item vision-dashboard" href="#" data="{{$vision->id}}">{{$vision->name}}</a>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-sm-2 text-center">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Strategy</button>
                    <div class="dropdown-menu dropdown-ins" id="show-strategy-dropdown">
                        {{--<a class="dropdown-item goal-dashboard" href="#" data="{{$goal->id}}">{{$goal->name}}</a>--}}
                        {{--@endfor--}}
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
            <div class="col-sm-2 text-center">
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
                        <a class="dropdown-item vision-line-chart" href="#" data="1">Line Chart</a>
                        <a class="dropdown-item vision-pie-chart" href="#" data="2">Pie Chart</a>
                        <a class="dropdown-item vision-bar-chart" href="#" data="3">Bar Chart</a>

                        @endfor
                    </div>
                </div>
            </div>--}}
            <div class="col-sm-2 text-center"></div>
            <div class="col-sm-2 text-center"></div>
        </div>
    </div>
@endsection

@section("main-container")
    <div class="col-sm-6 show-vision-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-vision-name" style="color: #2C638E">
            </h5>
            <div class="card-block">
                <div id="d_vision_curve_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 show-vision-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header d-vision-name" style="color: #2C638E">
            </h5>
            <div id="d_vision_pie_chart"></div>
        </div>
    </div>
    <div class="col-sm-6 show-vision-chart">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header d-vision-name" style="color: #2C638E">

            </h5>
            <div class="card-block">
                <div id="d_vision_bar_chart"></div>
            </div>
        </div>
    </div>

    {{--Strategy--}}
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