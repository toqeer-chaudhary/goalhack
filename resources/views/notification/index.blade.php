@extends("layouts.backend")
@section("styles")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/datatables-net/datatables.min.css")}}">
    {{--select 2 plugin css custom downloaded--}}
    <link href="{{asset("assets/backend/css/custom/select2.min.css")}}" rel="stylesheet" />
@endsection
@section("title")
    Goal Data
@endsection

@section("page-title")
    Goal Data
@endsection

@section("sidebar-tabs")
    @include("includes.backend.goalData-sidebar")
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
                        <a href="#">Show All Notifications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
            <a href="{{ route("notification.index")}}" class="btn btn-success ks-solid text-center">
                <span>Mark All As Read</span>
                {{ auth()->user()->unreadNotifications->markAsRead()}}
            </a>
        </div>
        <div class="col-sm-offset-5">
        </div>
    </div>
@endsection
@section("main-container")
    <div class="container-fluid">
        <table id="ks-datatable" class="table table-striped table-bordered" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Notification</th>
                <th>Status</th>
                <th>By Manager</th>
                <th>On</th>
            </tr>
            </thead>
            <tbody>
            @foreach( Auth::user()->notifications as $notification)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>Target Achieved on
                        <strong>  {{ $notification->data["actualDate"] }} </strong>
                        is   <strong>  {{ $notification->data["message"] }} </strong>
                    </td>
                    <td>{{ ucfirst($notification->data["message"]) }}</td>
                    <td>{{ $notification->data["managerName"] }}</td>
                    <td>{{ $notification->created_at->diffForHumans(now()) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section("scripts")
    <script src="{{asset("assets/backend/plugins/datatables-net/media/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/datatables-net/media/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/backend/js/custom/select2.min.js")}}"></script>

    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                // invoking data table for level
                $('#ks-datatable').DataTable({
                    "initComplete": function () {
                        $('.dataTables_wrapper select').select2({
                            minimumResultsForSearch: Infinity
                        });
                    }
                });
                // This will remove the first row's <td> from the data table which shown in case of empty table
                // there is no data in the table (message name) and its custom build
                $('.dataTables_empty').remove();
                // invoking select 2
                $('.js-example-basic-multiple').select2({
                    placeholder: 'Privileges'
                });
            });
        })(jQuery);
    </script>

@endsection