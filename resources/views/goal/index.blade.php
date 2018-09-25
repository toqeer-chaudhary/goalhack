@extends("layouts.backend")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/datatables-net/datatables.min.css")}}">
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/select2/css/select2.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/select2/select2.min.css")}}">
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/prism/prism.css")}}">
    <!-- original -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section("title")
    Goal
@endsection

@section("page-title")
    Goal
@endsection

@section("sidebar-tabs")
    @include("includes.backend.goal-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
            @if(check_resource('App\Http\Controllers\GoalController@store') == 1)
            <button class="btn btn-outline-success ks-solid text-center" data-toggle="modal"
                    data-target="#createGoalModal" id="create-goal-button" >
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Create Goal</span>
            </button>
            @endif
        </div>
        <div class="col-sm-offset-5">
        </div>
    </div>
@endsection

@section("main-container")
    <div class="ks-content-nav">
        <div class="ks-nav">
            <ul class="m-menu is-collapsed">
                <li class="m-menu__item is-active">
                    <a class="m-menu__toggle is-active">KPI's</a>
                    <div class="m-menu__menu">
                        {{--{{dd($kpi)}}--}}
                        @foreach($kpi as $kpis)
                            <a class="m-menu__menu-item display-kpi"  data-id="{{$kpis->id}}">{{$kpis->name}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="ks-nav-body"  style="padding-top:0;">
            <div class="ks-nav-body-wrapper">
                <div class="container-fluid">
                    <table id="ks-datatable" class="table table-striped table-bordered goals-table" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Goal</th>
                            <th>Description</th>
                            <th>Target</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            {{--<th>Status</th>--}}
                            <th>Data Entry Mode</th>
                            <th>Remaining Time</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                           {{-- @foreach( $goal as $goal)
                                <tr id="goal{{$goal->id}}">
                                    <td>{{$goal->id}}</td>
                                    <td>{{$goal->name}}</td>
                                    <td>{{$goal->description}}</td>
                                    <td>{{$goal->target}}</td>
                                    <td>{{$goal->start_date}}</td>
                                    <td>{{$goal->end_date}}</td>
                                    <td>{{$goal->status}}</td>
                                    <td>{{$goal->goal_data_entry_mode}}</td>
                                    <td>
                                        <div class='ks-controls dropdown'>
                                            <a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <span class='la la-ellipsis-h'></span>
                                            </a>
                                            <div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end'
                                            style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>
                                            <a class='dropdown-item edit-goal' href='#' data-id='{{$goal->id}}"' data-toggle='modal' data-target='#updateGoalModal'>
                                                <span class='la la-pencil ks-icon'></span>Edit
                                            </a>
                                            <a class='dropdown-item goaldeleteButton' href='#' data-id='{{$goal->id}}'>
                                                <span class='la la-trash ks-icon'></span>Delete
                                            </a>
                                            --}}{{--<a class='dropdown-item ks-no-text ks-solid view-level-modal' href='#' data-id='' data-toggle='modal' data-target='#assignGoalModal'>--}}{{--
                                                --}}{{--<span class='la la-users ks-icon'></span>Assign--}}{{--
                                            --}}{{--</a>--}}{{--
                                            <a class='dropdown-item ' href="{{ route('goal.show', ['id' => $goal->id]) }}" data-id='{{$goal->id}}'>
                                                <span class='la la-bar-chart-o ks-icon'></span>Details
                                            </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                             @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Modal to create Goal--}}
<div class="modal fade" id="createGoalModal"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="levelModalLabel">Create Goal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-goal-form"  autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" id="logged-in-user" value="{{ Auth::id() }}">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="kpiDropDown"><h5>Select KPI</h5></label>
                            <select class="js-example-basic-single form-control" id="kpi-dropDown">
                                <option value="" hidden>Select your kpi</option>
                                @foreach($kpi as $kpi)
                                    <option value="{{$kpi->id}}">{{$kpi->name}}</option>
                                @endforeach
                            </select>
                            <p id="select-goal-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="goalDataEntryMode"><h5>Select Data Entry Mode</h5></label>
                            <select class="js-example-basic-single form-control" id="goal-data-entry-mode">
                                <option value="" hidden>Select Goal Data Entry Mode</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                            <p id="goal-data-entry-mode-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="kpiName"><h5>Enter Goal Name</h5></label>
                            <input type="text" id="goal-name" placeholder="Goal Name" class="form-control"
                                   value="{{ old("name") }}" name="name">
                            <p id="goal-name-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="goalTarget"><h5>Enter Goal Target</h5></label>
                            <input type="text" id="goal-target" placeholder="i.e 1000" class="form-control"
                                   value="{{ old("target") }}" name="target">
                            <p id="goal-target-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="goalDescription"><h5>Enter Goal Description</h5></label>
                            <input type="text" id="goal-description" class="form-control"
                                   placeholder="Goal Description"
                                   value="{{ old("description") }}" name="description">
                            <p id="goal-description-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="start-date">
                            <label for="goalStartDate"><h5>Select Start Date</h5></label>
                            <input type="text" id="goal-start-date" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date=""
                                   value="{{ old("start_date") }}" name="start_date">
                            <p id="goal-start-date-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="end-date">
                            <label for="goalEndDate"><h5>Select End Date</h5></label>
                            <input type="text" id="goal-end-date" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date=""
                                   value="{{ old("end_date") }}" name="end_date">
                            <p id="goal-end-date-has-error"></p>
                        </div>
                        <button type="submit" class="btn btn-outline-success ks-solid col-sm-2 form-group"
                                id="create-goal-button">Create Goal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--modal to update Goal--}}
<div class="modal fade" id="updateGoalModal"  role="dialog"
     aria-labelledby="updateGoalModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="levelModalLabel">Update Goal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="goal-edit-form"  autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        {{--<div class="col-sm-6 form-group">
                            <label for="kpiDropDown"><h5>Select KPI</h5></label>
                            <select class="js-example-basic-single form-control" id="kpi-dropDown">
                                <option value="" hidden>Select your kpi</option>
                                <option value="kpi alpha">kpi alpha</option>
                                <option value="kpi alpha">kpi alpha</option>
                                <option value="kpi beta">kpi beta</option>
                                --}}{{-- @foreach($kpi as $kpi)
                                     <option value="{{$kpi->id}}">{{$kpi->name}}</option>
                                 @endforeach--}}{{--
                            </select>
                            <p id="select-goal-has-error"></p>
                        </div>--}}
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="goal-id" name="id">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="goalDataEntryMode"><h5>Select Data Entry Mode</h5></label>
                            <select class="js-example-basic-single form-control" id="update-goal-data-entry-mode">
                                <option value="" hidden>Select Goal Data Entry Mode</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                            <p id="update-goal-data-entry-mode-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="kpiName"><h5>Enter Goal Name</h5></label>
                            <input type="text" id="update-goal-name" placeholder="Goal Name" class="form-control"
                                   value="{{ old("name") }}" name="name">
                            <p id="update-goal-name-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="goalTarget"><h5>Enter Goal Target</h5></label>
                            <input type="text" id="update-goal-target" placeholder="i.e 1000" class="form-control"
                                   value="{{ old("target") }}" name="target">
                            <p id="update-goal-target-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="goalDescription"><h5>Enter Goal Description</h5></label>
                            <input type="text" id="update-goal-description" class="form-control"
                                   placeholder="Goal Description"
                                   value="{{ old("description") }}" name="description">
                            <p id="update-goal-description-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="start-date">
                            <label for="goalStartDate"><h5>Select Start Date</h5></label>
                            <input type="text" id="update-goal-start-date" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date=""
                                   value="{{ old("start_date") }}" name="start_date">
                            <p id="update-goal-start-date-has-error"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="end-date">
                            <label for="goalEndDate"><h5>Select End Date</h5></label>
                            <input type="text" id="update-goal-end-date" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date=""
                                   value="{{ old("end_date") }}" name="end_date">
                            <p id="update-goal-end-date-has-error"></p>
                        </div>
                        <button type="submit" class="btn btn-outline-success ks-solid col-sm-2 form-group update-goal"
                                id="update-goal-button">Update Goal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--modal to assign goal--}}
<div class="modal fade" id="assignGoalModal"  role="dialog"
     aria-labelledby="assignGoalModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Assign Goal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dd"  autocomplete="off">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="js-example-basic-multiple" class="col-form-label">Assign Goal To Users:</label>
                        {{--giving select 2 inline styling which will cause the full width of it in the modal
                        else its not working properly in modal--}}
                        <select class="form-control js-example-basic-multiple" id="assign-privileges-to-users"
                                multiple style="width: 100%">
                            <option value="1">Tahira</option>
                            <option value="1">Hoor</option>
                            <option value="1">Noor</option>
                            <option value="1">Maria</option>
                        </select>
                        <p class="assign-goal-has-error"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success ks-solid" id="assign-goal">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section("scripts")
    <script src="{{asset("assets/backend/plugins/datatables-net/media/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/datatables-net/media/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/backend/js/custom/select2.min.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/prism/prism.js")}}"></script>
    <script src="{{asset("assets/backend/plugins/jquery-ui/jquery-ui.js")}}"></script>

    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $('#ks-datatable').DataTable({
                    "initComplete": function () {
                        $('.dataTables_wrapper select').select2({
                            minimumResultsForSearch: Infinity
                        });
                    }
                });


                $("#goal-start-date").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#goal-end-date").datepicker("option","minDate", selected)
                    }
                });

                $("#goal-end-date").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#goal-start-date").datepicker("option","maxDate", selected)
                    }
                });

                $("#update-goal-start-date").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#update-goal-end-date").datepicker("option","minDate", selected)
                    }
                });

                $("#update-goal-end-date").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#update-goal-start-date").datepicker("option","maxDate", selected)
                    }
                });




            });
        })(jQuery);
    </script>
@endsection

