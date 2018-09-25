@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/widgets/upload.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/apps/projects/task.min.css")}}">
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
        <h3 class="text-primary">{{$kpiData->name}} Details</h3>
    </div>
@endsection

@section("main-container")

    <div class="ks-project-task-page">
        <div class="ks-task-information">
            <div class="ks-wrapper">
                <div class="card panel ks-task-common-block">
                    <div class="ks-header">
               <span class="ks-name">
                   {{$kpiData->name}}
               </span>
                        <div class="ks-progress ks-progress-inline">
                            {{--<div class="progress ks-rounded ks-progress-xs">--}}
                                {{--<div class="progress-bar bg-info" role="progressbar" style="width: 44%" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>--}}
                            {{--</div>--}}
                            {{--<span class="ks-amount">2/5</span>--}}
                        </div>
                        &nbsp;
                        <div class="">
                            <span class="ks-icon la la-map-marker ks-color-success">Start Date</span> {{$kpiData->start_date}}
                            <span class="ks-icon la la-flag ks-color-success">End Date</span>{{$kpiData->end_date}}
                        </div>
                        {{--<div class="ks-datetime">--}}
                        {{--<span class="ks-icon la la-flag ks-color-success">End Date</span> {{$strategyData->end_date}}--}}
                        {{--</div>--}}
                    </div>
                    <div class="ks-project">
                        Created At
                        <span class="ks-target ks-color-info">&nbsp;{{$kpiData->created_at}}</span>
                        &nbsp;
                        Created By
                        <span class="ks-target ks-color-success"> {{\App\Models\User::find($kpiData->user_id)->name}}</span>
                    </div>
                    <div class="card-block">
                        <div class="ks-text-block">
                            <div class="ks-name">Description</div>
                            <p class="ks-text">
                                {{$kpiData->description}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card panel ks-attach-files-widget">
                    <h5 class="card-header">{{$kpiData->goals->count()}} Goals agaisnt {{$kpiData->name}} are as follows</h5>
                    <div class="card-block">
                        @foreach($kpiData->goals as $goal)
                            <ul class="ks-uploaded-files">
                                <li>
                                    <span class="ks-icon la la-bar-chart ks-color-primary"></span>
                                    <div class="ks-body">
                                        <div class="ks-header">
                                            <span class="ks-filename">{{$goal->name}}</span>
                                        </div>
                                        <div class="ks-description">
                                            {{$goal->description}}
                                        </div>
                                    </div>
                                    <div class="ks-remove text-primary" style="">
                                        {{$goal->status}}
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="ks-task-details ks-scrollable" style="overflow: hidden; padding: 0px; width: 320px;">
            <div class="jspContainer" style="width: 319px; height: 974px;">
                <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 319px;">
                    <div class="ks-wrapper">
                        <div class="ks-collapse-block">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle collapsed" data-toggle="collapse" data-target="#ks-dates-collapse-block-content">
                                    Kpi Details
                                </a>
                            </div>
                            <div class="collapse in show" id="ks-dates-collapse-block-content">
                                <table class="ks-table-details">
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-header text-primary">
                                                Name
                                            </div>
                                            <div class="ks-body">
                                                {{$kpiData->name}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-header text-primary">
                                                Description
                                            </div>
                                            <div class="ks-body">
                                                {{$kpiData->description}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-header text-primary">
                                                Status
                                            </div>
                                            <div class="ks-body">
                                                {{$kpiData->status}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-header text-primary">
                                                Start Date   ,   End Date
                                            </div>
                                            <div class="ks-body">
                                                {{$kpiData->start_date->toFormattedDateString() . "    ,    " . $kpiData->end_date->toFormattedDateString()}}
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ks-collapse-block">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle collapsed" data-toggle="collapse" data-target="#ks-people-collapse-block-content">
                                    Assigned To
                                </a>
                            </div>
                            <div class="collapse in show" id="ks-people-collapse-block-content">
                                <table class="ks-table-details">
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-body">
                                                <p class="ks-user">
                                                <ul>
                                                    @forelse($kpiData->users as $user)
                                                        <li>
                                                            <img src="{{asset("assets/backend/images/users/".$user->image)}}"
                                                                 width="30" height="30" class="ks-avatar rounded-circle">
                                                            &nbsp;
                                                            {{$user->name}}
                                                        </li>
                                                        <br>
                                                    @empty
                                                        <h5>No users assign yet</h5>
                                                    @endforelse
                                                </ul>
                                                </p>
                                            </div>
                                            <br>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{asset("assets/backend/plugins/d3/d3.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/c3js/c3.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/noty/noty.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/maplace/maplace.min.js")}}"></script>
@endsection
