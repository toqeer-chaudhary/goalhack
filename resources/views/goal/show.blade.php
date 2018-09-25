@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/widgets/upload.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/apps/projects/task.min.css")}}">
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
        <h3 class="text-primary">{{$goalData->name}} Details</h3>
    </div>
@endsection

@section("main-container")

    <div class="ks-project-task-page">
        <div class="ks-task-information">
            <div class="ks-wrapper">
                <div class="card panel ks-task-common-block">
                    <div class="ks-header">
               <span class="ks-name">
             {{$goalData->name}}
               </span>
                        <div class="ks-progress ks-progress-inline">
                            <div class="progress ks-rounded ks-progress-xs">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 44%" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="ks-amount">2/5</span>
                        </div>
                        &nbsp;
                        <div class="">
                            <span class="ks-icon la la-map-marker ks-color-success">Start Date</span>{{$goalData->start_date}}
                            <span class="ks-icon la la-flag ks-color-success">End Date</span>{{$goalData->end_date}}
                        </div>
                        {{--<div class="ks-datetime">--}}
                        {{--<span class="ks-icon la la-flag ks-color-success">End Date</span> {{$strategyData->end_date}}--}}
                        {{--</div>--}}
                    </div>
                    <div class="ks-project">
                        Created At
                        <span class="ks-target ks-color-info">&nbsp;{{$goalData->created_at}}</span>
                    </div>
                    <div class="card-block">
                        <div class="ks-text-block">
                            <div class="ks-name">Description</div>
                            <p class="ks-text">
                                {{$goalData->description}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card panel ks-attach-files-widget">
                    <h5 class="card-header"> KPIs agaisnt  are as follows</h5>
                    <div class="card-block">
                        @foreach($goalData->goalDatas as $goaldetail)
                            <ul class="ks-uploaded-files">
                                <li>
                                    <span class="ks-icon la la-bar-chart ks-color-primary"></span>
                                    <div class="ks-body">
                                        <div class="ks-header">
                                            <span class="ks-filename">
                                                {{$goaldetail->name}}
                                            </span>
                                        </div>
                                        <div class="ks-description">
                                            {{$goaldetail->description}}
                                        </div>
                                    </div>
                                    <div class="ks-remove text-primary" style="">
                                        {{$goaldetail->status}}
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
                                    KPI Details
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
                                                {{$goalData->Kpi->name}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-header text-primary">
                                                Description
                                            </div>
                                            <div class="ks-body">
                                                {{$goalData->Kpi->description}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-header text-primary">
                                                Status
                                            </div>
                                            <div class="ks-body">
                                                {{$goalData->Kpi->status}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ks-header text-primary">
                                                Start Date   ,   End Date
                                            </div>
                                            <div class="ks-body">
                                                {{$goalData->Kpi->start_date . "    ,    " . $goalData->Kpi->end_date}}
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
                                                    <img src="assets/img/avatars/avatar-10.jpg" width="25" height="25" class="rounded-circle ks-avatar">
                                                    {{--{{$strategyData->user->name}}--}}
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
