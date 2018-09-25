@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section("title")
    Goal Home
@endsection

@section("page-title")
    Goal
@endsection

@section("sidebar-tabs")
    <li class="nav-item ks-user dropdown">
        <a class="nav-link"  href="#">
            <img src="{{asset("assets/backend/images/users/".Auth::user()->image)}}"
                 width="36" height="36" class="ks-avatar rounded-circle">
            <div class="ks-info">
                <div class="ks-name">{{ Auth::user()->name }}</div>
                <div class="ks-text">{{ Auth::user()->designation }}</div>
            </div>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route("goals.data.dashboard") }}">
            <span class="ks-icon la la-dashboard"></span>
            <span>Progress</span>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link"  href="{{ route("goal-data.index")  }}" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="ks-icon la la-backward"></span>
            <span>Go Back</span>
        </a>
    </li>
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
                            <a class="dropdown-item goalData-dashboard" href="#" data="{{$goal->id}}">{{$goal->name}}</a>
                        @endforeach
                        {{--@endfor--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <form id="searchGoalDataPerformanceByDate" role="search" autocomplete="off">
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="Search Performance By Date" id="searchGoalDataPerformance" type="text">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="ks-icon la la-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("main-container")
    <div class="col-sm-6">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header" style="color: #2C638E">
                {{ auth()->user()->name."'s Performance" }}
            </h5>
            <div class="card-block">
                <div id="goal_data_curve_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card ks-card-widget ks-widget-payment-earnings" style="margin-bottom: 15px">
            <h5 class="card-header" style="color: #2C638E">
                My Request Status
            </h5>
            <div id="goal_data_pie_chart"></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header" style="color: #2C638E">
                My Performance
            </h5>
            <div class="card-block">
                <div id="goal_data_bar_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card ks-card-widget ks-widget-payment-earnings">
        <h5 class="card-header" style="color: #2C638E">
            My Performance
        </h5>
        <div class="card-block">
            <div id="goal_data_area_chart"></div>
        </div>
    </div>
    </div>

@endsection

@section("scripts")
    <script src="{{asset("assets/backend/js/goalhack-dashabord.js")}}"></script>
    <script>
        $( "#searchGoalDataPerformance" ).datepicker({
            dateFormat: 'yy-mm-dd',
        });
    </script>
@endsection