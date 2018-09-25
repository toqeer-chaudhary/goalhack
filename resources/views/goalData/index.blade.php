@extends("layouts.backend")
@section("styles")
    <link rel="stylesheet" href="{{asset("assets/backend/css/goal-data.css")}}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    {{--Image upload plugin--}}
    <link rel="stylesheet" href="{{asset("assets/backend/css/JQuery.JSAjaxFileUploader.css")}}">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="{{asset("assets/backend/js/JQuery.JSAjaxFileUploader.min.js")}}"></script>

@endsection
@section("title")
    Goal Data
@endsection

@section("page-title")
    Goal Data
@endsection

@section("notifications")

    <div class="nav-item dropdown ks-notifications">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <span class="la la-bell ks-icon" aria-hidden="true">
   <span class="badge badge-pill badge-info">{{ count(Auth::user()->unreadNotifications) }}</span>
   </span>
            <span class="ks-text">Notifications</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
            <ul class="nav nav-tabs ks-nav-tabs ks-info" role="tablist">
                <li class="nav-item" style="width: 50%;">
                    <a class="nav-link active" href="#" data-toggle="tab" data-target="#navbar-notifications-unRead" role="tab">Un Read</a>
                </li>
                <li class="nav-item" style="width: 50%;">
                    <a class="nav-link" href="#" data-toggle="tab" data-target="#navbar-notifications-read" role="tab">Read</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane ks-notifications-tab active" id="navbar-notifications-unRead" role="tabpanel">
                    <div class="ks-wrapper ks-scrollable" style="overflow: hidden; padding: 0px; width: 0px;">
                        <div class="jspContainer" style="width: 0px; height: 251px;">
                            <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 100px;">
                                <div class="jspContainer" style="width: 300px; height: 251px;">
                                    <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 290px;">
                                        @forelse(Auth::user()->unreadNotifications as $unreadNotification)
                                        <a href="{{ route("notification.show",$unreadNotification->id) }}" class="ks-notification">
                                            {{--on click this link the unread notification will be
                                            marked as read notification and page will refresh--}}
                                            {{--{{$unreadNotification->markAsRead()}}--}}
                                            <div class="ks-info">
                                                <div class="ks-user-name">Dear,{{ $unreadNotification->data["userName"] }}</div>
                                                <div class="ks-text">Target Achieved on
                                                      <strong>  {{ $unreadNotification->data["actualDate"] }} </strong>
                                                 is   <strong>  {{ $unreadNotification->data["message"] }} </strong>
                                                 on   <strong> {{ $unreadNotification->data["timeOfDelivery"] }} </strong>
                                                 by   <strong>  {{ $unreadNotification->data["managerName"] }} </strong>
                                                </div>
                                            </div>
                                        </a>
                                        @empty
                                            <h3 class="text-center">No Un Read Notifications</h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ks-view-all">
                        <a href="{{ route("notification.index") }}">Show All Notifications</a>
                    </div>
                </div>
                <div class="tab-pane ks-notifications-tab" id="navbar-notifications-read" role="tabpanel">
                    <div class="ks-wrapper ks-scrollable" style="overflow: hidden; padding: 0px; width: 0px;">
                        <div class="jspContainer" style="width: 0px; height: 251px;">
                            <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 100px;">
                                <div class="jspContainer" style="width: 300px; height: 251px;">
                                    <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 290px;">
                                        @forelse(Auth::user()->readNotifications as $readNotification)
                                            <a href="#" class="ks-notification">
                                                <div class="ks-info">
                                                    <div class="ks-user-name">Dear,{{ $readNotification->data["userName"] }}</div>
                                                    <div class="ks-text">Target Achieved on
                                                        <strong>  {{ $readNotification->data["actualDate"] }} </strong>
                                                        is   <strong>  {{ $readNotification->data["message"] }} </strong>
                                                        on   <strong> {{ $readNotification->data["timeOfDelivery"] }} </strong>
                                                        by   <strong>  {{ $readNotification->data["managerName"] }} </strong>
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                            <h3 class="text-center">No Notifications</h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ks-view-all">
                        <a href="{{ route("notification.index") }}">Show All Notifications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <a class="nav-link dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="ks-icon la la-list-alt"></span>
            <span>Goals</span>
        </a>
        <div class="dropdown-menu">
            @foreach(auth()->user()->goal as $goals)
                <a class="dropdown-item display-goal goal" data-id="{{$goals->id}}">{{$goals->name}}</a>
            @endforeach
        </div>
    </li>

@endsection
@section("page-header")
    <div class="ks-title">
        <ul class="breadcrumb">
            <li class="associated-vision">Vision</li>
            <li class="associated-strategy">Strategy</li>
            <li class="associated-kpi">Kpi</li>
            <li class="associated-goal">Goal</li>
        </ul>

    </div>
@endsection
@section("main-container")
    <div class="col-1" id="target-actual">
        <div >
            <span id="target-val">Target</span>
            <span id="actual-val">Actual</span>
            <span id="comment-sec">Comment</span>
        </div>
    </div>
    <div class="col-11">
        <div id="dailyData">
            <div class="kpi-entries-header">
                <div id="">



                    <form id="goaldataForm" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" id="t_goal_id" value="">
                        <input type="hidden" id="t_goal_data_id" name="[]" value="">
                        <div class="scroll">



                            <table class="kpi-entry">

                                <tr id="goal-dates">


                                    <th title="The actual KPI value for the selected date" class="actual past" style="">11 Jul 2018</th>
                                    <th title="The actual KPI value for the selected date" class="actual past" style="">13 Jul 2018</th>
                                    <th title="The actual KPI value for the selected date" class="actual past" style="">14 Jul 2018</th>
                                    <th title="The actual KPI value for the selected date" class="actual past" style="">15 Jul 2018</th>
                                    <th title="The actual KPI value for the selected date" class="actual past" style="">16 Jul 2018</th>
                                    <th title="The actual KPI value for the selected date" class="actual today" style="">17 Jul 2018</th>
                                    <th title="The actual KPI value for the selected date" class="actual future" style="">18 Jul 2018</th>

                                </tr>
                                <tr id="target-and-actual">


                                    <td class="actual past">
                                        <input type="tel" tabindex="27" maxlength="15" autocomplete="off" class="target" value=""
                                               style="margin-top: 5px;">
                                        <input type="tel" tabindex="20" autocomplete="off" maxlength="15" class="actual" value="">
                                        <textarea rows="3" cols="30" class="comments"></textarea>
                                    </td>

                                    <td class="actual past">
                                        <input type="tel" tabindex="27" maxlength="15" autocomplete="off" class="target"
                                               style="margin-top: 5px;">
                                        <input type="tel" tabindex="20" autocomplete="off" maxlength="15" class="actual">
                                        <textarea rows="3" cols="19" class="comments"></textarea>

                                    </td>

                                    <td class="actual past">
                                        <input type="tel" tabindex="27" maxlength="15" autocomplete="off" class="target" value=""
                                               style="margin-top: 5px;">
                                        <input type="tel" tabindex="20" autocomplete="off" maxlength="15" class="actual">
                                        <textarea rows="3" cols="19" class="comments"></textarea>

                                    </td>

                                    <td class="actual past">
                                        <input type="tel" tabindex="27" maxlength="15" autocomplete="off" class="target"
                                               style="margin-top: 5px;">
                                        <input type="tel" tabindex="20" autocomplete="off" maxlength="15" class="actual" value="">
                                        <textarea rows="3" cols="19" class="comments"></textarea>

                                    </td>

                                    <td class="actual past">
                                        <input type="tel" tabindex="27" maxlength="15" autocomplete="off" class="target"
                                               style="margin-top: 5px;">
                                        <input type="tel" tabindex="20" autocomplete="off" maxlength="15" class="actual">
                                        <textarea rows="3" cols="19" class="comments"></textarea>

                                    </td>

                                    <td class="actual today">
                                        <input type="tel" tabindex="19" maxlength="15" autocomplete="off" class="target"
                                               style="margin-top: 5px;">
                                        <input type="tel" tabindex="12" autocomplete="off" maxlength="15" class="actual">
                                        <textarea rows="3" cols="19" class="comments"></textarea>

                                    </td>

                                    <td class="actual future">
                                        <input type="tel" tabindex="33" maxlength="15" autocomplete="off" class="target"
                                               style="margin-top: 5px;">
                                        <input type="tel" tabindex="26" autocomplete="off" maxlength="15" class="actual">
                                        <textarea rows="3" cols="19" class="comments"></textarea>

                                    </td>

                                </tr>
                                <tr>
                                </tr>
                            </table>

                        </div>



                        <button type="submit" class="btn btn-success save-data" id="save-goaldata" data-href="{{URL::to('goal-data')}}" > Save</button>
                    </form>




                </div>

            </div>
        </div>
    </div>

        <div id="dialog">
            <div id="canvasMap"></div>
        </div>
        <div id="lblOfficeAddress" hidden>
            13560 Morris Rd, Alpharetta, GA 30004, USA
        </div>


        <footer class="footer fixed-bottom" id="myDiv">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="pull-right fly-bar" id="btnmap">Geo Location</a>
                        <img src="https://png.icons8.com/color/50/000000/google-maps.png" class="pull-right" width="40" style="margin-top: 8px">
                    </div>
                    <div class="col-md-6 fly-bar">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('assets/backend/images/placeholder.svg')}}" style="width: 40px" alt="My Awesome SVG">
                                @if($location[5] == "127.0.0.1")
                                    <span>No City | No Country!</span>
                                @else
                                    <span>You are login from:{{$location[2]}} | {{$location[3]}}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <span>Your IP: {{$location[5]}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button  onclick="document.getElementById('myDiv').style.display='none'" type="button" class="close pull-right" aria-label="Close" style="color: black">
                            <span aria-hidden="true" id="close-button">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </footer>
        @endsection






        @section("scripts")
            <script src="https://maps.google.com/maps/api/js?key=AIzaSyBXEdLLcmeeDvJzwZrmoAWLpp23LZBfgYw">
            </script>
            {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
            {{--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>--}}
            <script src="{{asset("assets/backend/js/goal-data.js")}}"></script>
            <script>

                /*Google map*/

                $(function() {
                    $("#btnmap").click(function() {
                        // debugger;
                        $("#dialog").dialog({
                            modal: true,
                            title: "Location",
                            width: 600,
                            height: 450,
                            buttons: {
                                Close: function() {
                                    $(this).dialog('close');
                                }
                            },
                            open: function() {
                                //debugger;
                                var mapOptions = {
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                }
                                // debugger;
                                var map = new google.maps.Map($("#canvasMap")[0], mapOptions);

                                var geocoder = new google.maps.Geocoder();
                                geocoder.geocode({
                                    address: $("#lblOfficeAddress").text()
                                }, function(results, status) {
                                    if (status == "OK") {
                                        map.setCenter(results[0].geometry.location);
                                        map.setZoom(18);
                                        var marker = new google.maps.Marker({
                                            map: map,
                                            position: results[0].geometry.location
                                        });

                                    } else alert("Geocode failed, status=" + status);
                                });
                            }
                        });
                    });
                });
            </script>

    @endsection