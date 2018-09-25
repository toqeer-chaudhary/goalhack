@extends("layouts.backend")

@section("styles")
    <script src="{{asset("assets/backend/js/goalhack-dashabord.js")}}"></script>
@endsection

@section("title")
    Kpi Home
@endsection

@section("page-title")
    Kpi
@endsection

@section("sidebar-tabs")
    @include("includes.backend.kpi-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        {{--<h3>Goals List is available below</h3>--}}
        <div class="ks-title" id="">
            <div class="col-sm-2">
                <!--Dropdown primary-->
                <div class="dropdown">
                    <!--Trigger-->
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select KPI</button>
                    <!--Menu-->
                    <div class="dropdown-menu dropdown-ins">
                        @foreach($kpis as $kpi)
                            <a class="dropdown-item kpi-dashboard" href="#" data="{{$kpi->id}}">{{$kpi->name}}</a>
                        @endforeach
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
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection

@section("main-container")
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

@endsection