@extends("layouts.backend")

@section("styles")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/apps/crm/contact.min.css")}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        input[type=text] {
            width: 200px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            /*background-image: url('../../../public/assets/backend/images/search.png');*/
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }
    </style>
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
        <h3>Goals List is available below</h3>
    </div>
@endsection

@section("main-container")
  <?php
  // creating an array of badgeColors
     $badgeColors = ["info", "success", "warning", "danger", "purple", "primary"];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <div class="ks-nav">
                    <ul class="m-menu is-collapsed">
                        @forelse($goals as $goal)
                            <li class="m-menu__item">
                                <a class="m-menu__toggle is-active">{{ $goal->name }}</a>
                                <div class="m-menu__menu">
                                    @foreach($goal->users as $user)
                                        {{-- on click this user getting all the data from goal data table
                                        wiz eneterd by this user--}}
                                        <a class="m-menu__menu-item displayGoalDataDetails"
                                           data-id="{{ $user->id }}" data-goal="{{ $goal->id }}">
                                            {{ $user->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @empty
                            <a class="m-menu__menu-item">Nothing TO Show</a>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="ks-crm-contact-user-tabs-column">
                    <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator">
                        <ul class="nav ks-nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-toggle="tab" data-target="#crm-tab-graph" aria-expanded="true">Graph</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-activity" aria-expanded="true">Activity</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-notes" aria-expanded="false">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-events" aria-expanded="false">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-tasks" aria-expanded="false">Approved</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-deals" aria-expanded="false">Rejected</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active ks-scrollable jspScrollable" id="crm-tab-graph" role="tabpanel" aria-expanded="true" data-height="735" style="height: 775px; overflow: hidden; padding: 0px; width: 904px;" tabindex="0">
                                <div class="jspContainer" style="width: 904px; height: 775px;">
                                    <div class="jspPane" style="padding: 0px; top: 0px; width: 894px;">
                                        <div class="ks-crm-user-view-activity-block">
                                            {{--graph--}}
                                            <div class="" id="goal_line_chart_toggle" data-dashboard-widget>
                                                <div id="goal_curve_chart_details"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jspVerticalBar">
                                        <div class="jspCap jspCapTop"></div>
                                        <div class="jspTrack" style="height: 775px;">
                                            <div class="jspDrag" style="height: 674px;">
                                                <div class="jspDragTop"></div>
                                                <div class="jspDragBottom"></div>
                                            </div>
                                        </div>
                                        <div class="jspCap jspCapBottom"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane  ks-scrollable jspScrollable" id="crm-tab-activity" role="tabpanel" aria-expanded="true" data-height="735" style="height: 775px; overflow: hidden; padding: 0px; width: 904px;" tabindex="0">
                                <div class="jspContainer" style="width: 904px; height: 775px;">
                                    <div class="jspPane" style="padding: 0px; top: 0px; width: 894px;">
                                        <div class="ks-crm-user-view-activity-block">
                                            <h4 class="ks-crm-user-view-activity-header" id="hideAndShow">Activity Details</h4>
                                            <div class="ks-crm-user-view-activity-items" id="appendDetails">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="jspVerticalBar">
                                        <div class="jspCap jspCapTop"></div>
                                        <div class="jspTrack" style="height: 775px;">
                                            <div class="jspDrag" style="height: 674px;">
                                                <div class="jspDragTop"></div>
                                                <div class="jspDragBottom"></div>
                                            </div>
                                        </div>
                                        <div class="jspCap jspCapBottom"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="crm-tab-notes" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px; overflow-y: scroll;">
                                <form id="searchByDate" role="search" autocomplete="off">
                                    <div class="input-group add-on">
                                        <input class="form-control" placeholder="Search By Date" id="search" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="submit"><i class="ks-icon la la-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <div class="ks-crm-user-view-activity-block">
                                    <h4 class="ks-crm-user-view-activity-header" id="hideAndShows">Daily Details</h4>
                                    <div class="ks-crm-user-view-activity-items" id="appendDateDetails">
                                            {{--Data to be appended--}}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="crm-tab-events" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px; overflow-y: scroll;">
                                <div class="ks-crm-user-view-activity-block">
                                    @forelse($goalAndGoalDatas as $goalAndGoalData)
                                     <div class="ks-crm-user-view-activity-item" id="{{ $goalAndGoalData["goalDataId"] }}">
                                        <div class="ks-crm-user-view-activity-item-badge">
                                            <span class="badge ks-circle badge-{{$badgeColors[mt_rand(0,5)]}}"></span>
                                        </div>
                                        <div class="ks-crm-user-view-activity-item-date">{{ $goalAndGoalData["dataEnteredDate"]->toFormattedDateString() }}</div>
                                        <div class="ks-crm-user-view-activity-item-action">
                                            <div class="ks-crm-user-view-activity-item-action-name">
                                                <span class="ks-icon la la-check-circle-o"></span>
                                                <span class="ks-text text-primary">Goal Name = {{ $goalAndGoalData["goalName"] }}</span>
                                                &nbsp;&nbsp;&nbsp;
                                                <span class="ks-text text-success">Target = {{ $goalAndGoalData["goalTarget"] }}</span>
                                                &nbsp;&nbsp;&nbsp;
                                                <span class="ks-text text-warning">Achieved = {{ $goalAndGoalData["TargetAchieved"] }}</span>
                                                &nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-outline-success ks-solid text-center approveDataButton" data-toggle="modal"
                                                        data-target="#approveDataModal"
                                                       {{--here data id is for goal data id and
                                                       data-date is for data entered date and data-user is the creator of that goal data--}}
                                                        data-id = "{{ $goalAndGoalData["goalDataId"] }}"
                                                        data-date = "{{ $goalAndGoalData["dataEnteredDate"]->toDateString() }}"
                                                        data-user = "{{ $goalAndGoalData["userId"] }}">
                                                    <span class="ks-icon la la-thumbs-up">&nbsp;&nbsp;</span>
                                                    <span>Approve</span>
                                                </button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-outline-danger ks-solid text-center disApproveDataButton" data-toggle="modal"
                                                        data-target="#disApproveDataModal"
                                                        {{--here data id is for goal data id and
                                                      data-date is for data entered date and data-user is the creator of that goal data--}}
                                                        data-id = "{{ $goalAndGoalData["goalDataId"] }}"
                                                        data-date = "{{ $goalAndGoalData["dataEnteredDate"]->toDateString() }}"
                                                        data-user = "{{ $goalAndGoalData["userId"] }}"
                                                        data-block = "0"
                                                >
                                                    <span class="ks-icon la la-thumbs-down">&nbsp;&nbsp;</span>
                                                        <span>Un Approved</span>
                                                </button>
                                            </div>
                                            <div class="ks-crm-user-view-activity-item-action-description">
                                               {{ $goalAndGoalData["comment"] }}
                                            </div>
                                            <div class="ks-crm-user-view-activity-item-action-time text-danger">{{ $goalAndGoalData["dataEnteredDate"]->diffForHumans(now()) }}</div>
                                        </div>
                                    </div>
                                @empty
                                  <h3>No Requests Pending</h3>
                                @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="crm-tab-tasks" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px; overflow-y: scroll;">
                                <div class="ks-crm-user-view-activity-block approvedDiv">
                                    @forelse($approvedDatas as $approvedData)
                                        <div class="ks-crm-user-view-activity-item" id="{{ $approvedData["goalDataId"] }}">
                                            <div class="ks-crm-user-view-activity-item-badge">
                                                <span class="badge ks-circle badge-{{$badgeColors[mt_rand(0,5)]}}"></span>
                                            </div>
                                            <div class="ks-crm-user-view-activity-item-date">{{ $approvedData["dataEnteredDate"]->toFormattedDateString() }}</div>
                                            <div class="ks-crm-user-view-activity-item-action">
                                                <div class="ks-crm-user-view-activity-item-action-name">
                                                    <span class="ks-icon la la-check-circle-o"></span>
                                                    <span class="ks-text text-primary">Goal Name = {{ $approvedData["goalName"] }}</span>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="ks-text text-success">Target = {{ $approvedData["goalTarget"] }}</span>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="ks-text text-warning">Achieved = {{ $approvedData["TargetAchieved"] }}</span>
                                                    {{--&nbsp;&nbsp;&nbsp;--}}
                                                    {{--<span class="ks-text text-danger">Data Entered On = {{ $approvedData["dataEnteredDate"]->toFormattedDateString() }}</span>--}}
                                                </div>
                                                <div class="ks-crm-user-view-activity-item-action-description">
                                                    {{ $approvedData["comment"] }}
                                                </div>
                                                <div class="ks-crm-user-view-activity-item-action-time text-danger">{{ $approvedData["updateDate"]->diffForHumans(now()) }}</div>
                                            </div>
                                        </div>
                                    @empty
                                        <h3 id="hide-approve">No Approved Requests</h3>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="crm-tab-deals" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px; overflow-y: scroll;">
                                <div class="ks-crm-user-view-activity-block rejectedDiv">
                                    @forelse($rejectedDatas as $rejectedData)
                                        <div class="ks-crm-user-view-activity-item" id="{{ $rejectedData["goalDataId"] }}">
                                            <div class="ks-crm-user-view-activity-item-badge">
                                                <span class="badge ks-circle badge-{{$badgeColors[mt_rand(0,5)]}}"></span>
                                            </div>
                                            <div class="ks-crm-user-view-activity-item-date">{{ $rejectedData["dataEnteredDate"]->toFormattedDateString() }}</div>
                                            <div class="ks-crm-user-view-activity-item-action">
                                                <div class="ks-crm-user-view-activity-item-action-name">
                                                    <span class="ks-icon la la-check-circle-o"></span>
                                                    <span class="ks-text text-primary">Goal Name = {{ $rejectedData["goalName"] }}</span>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="ks-text text-success">Target = {{ $rejectedData["goalTarget"] }}</span>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="ks-text text-warning">Achieved = {{ $rejectedData["TargetAchieved"] }}</span>
                                                    {{--&nbsp;&nbsp;&nbsp;--}}
                                                    {{--<span class="ks-text text-danger">Data Entered On = {{ $rejectedData["dataEnteredDate"]->toFormattedDateString() }}</span>--}}
                                                </div>
                                                <div class="ks-crm-user-view-activity-item-action-description">
                                                    {{ $rejectedData["comment"] }}
                                                </div>
                                                <div class="ks-crm-user-view-activity-item-action-time text-danger">{{ $rejectedData["updateDate"]->diffForHumans(now()) }}</div>
                                            </div>
                                        </div>
                                    @empty
                                        <h3 id="hide-rejected">No Rejected Requests</h3>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{asset("assets/backend/js/goalhack-dashabord.js")}}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBXEdLLcmeeDvJzwZrmoAWLpp23LZBfgYw"></script>
    <script src="{{asset("assets/backend/js/maplace.min.js")}}"></script>
    <script>
        $( "#search" ).datepicker({
            dateFormat: 'yy-mm-dd',
        });
        $("#location-hide-show").hide();
        $("#myModal").on("hidden.bs.modal", function () {
            $("#gmap-dropdown").html("");
            $("#location-hide-show").hide();
        });
    </script>
@endsection


<!--Modal for Unapproved data-->
<div class="modal fade" id="approveDataModal"  role="dialog"
     aria-labelledby="approveDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveDataLabel">Please Mention Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="crossvisionmodal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="approveDataForm" autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="visionName">Enter Comment </label>
                            <textarea id="approvedData"  placeholder="Well Done..." class="form-control"></textarea>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-success ks-solid col-sm-12 form-group"
                                    data-id="" data-user="" data-date=""
                                    id="createApprovedDataCommentButton">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal for approved data-->
<div class="modal fade" id="disApproveDataModal"  role="dialog"
     aria-labelledby="disApproveDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disApproveDataLabel">Please Mention Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="crossvisionmodal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="disApproveDataForm" autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="disApprovedData">Enter Reason for Un Approve </label>
                            <textarea id="disApprovedData"  placeholder="Need to work a lot..." class="form-control"></textarea>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-danger ks-solid col-sm-12 form-group createDisApprovedDataCommentButton"
                                    data-id="" data-user="" data-date=""
                                    id="createDisApprovedDataCommentButton">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--map model--}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center" id="location-hide-show">No Location Exist</h1>
                <div id="gmap-dropdown" style="with:300px;height:250px"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>