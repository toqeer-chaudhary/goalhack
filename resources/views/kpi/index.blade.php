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
    KPI
@endsection

@section("page-title")
    KPI
@endsection

@section("sidebar-tabs")
    @include("includes.backend.kpi-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
            @if(check_resource('App\Http\Controllers\KpiController@store') == 1)
            <button class="btn btn-outline-success ks-solid text-center" data-toggle="modal"
                    data-target="#createKpiModal" id="createStrategyButton" >
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Create KPI</span>
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
                    <a class="m-menu__toggle is-active">Strategy</a>
                    <div class="m-menu__menu">
                        @foreach($allStrategies as $strategy)
                            <a class="m-menu__menu-item displayKPI"  data-id="{{$strategy->id}}">{{$strategy->name}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="ks-nav-body"  style="padding-top:0;">
            <div class="ks-nav-body-wrapper">
                <div class="container-fluid">
                    <table id="ks-datatable" class="table table-striped table-bordered kpitable" width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>KPI</th>
                            <th>Description</th>
                            <th>Target</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            {{--<th>Status</th>--}}
                            <th>Remaining Time</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                // invoking select 2
                $('.js-example-basic-multiple').select2({
                    placeholder: 'Privileges'
                });
            });
        })(jQuery);
    </script>
@endsection

{{-- Modal to create Kpi--}}
<div class="modal fade" id="createKpiModal"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Create KPI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kpiCreateForm"  autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" id="logged-in-user" value="{{ Auth::id() }}">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="strategyDropDown">Select Strategy</label>
                            <select class="js-example-basic-single form-control" id="strategyDropDown">
                                <option value="" hidden>Select your Strategy</option>
                                @foreach($allStrategies as $strategy)
                                    <option value="{{$strategy->id}}">{{$strategy->name}}</option>
                                @endforeach
                            </select>
                            <p class="selectStrategyError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="kpiName">Enter KPI Name</label>
                            <input type="text" id="kpiName" placeholder="KPI Name" class="form-control"
                                   value="{{ old("name") }}" name="name">
                            <p class="kpiNameError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="kpiTarget">Enter KPI Target</label>
                            <input type="text" id="kpiTarget" placeholder="i.e 1000" class="form-control"
                                   value="{{ old("target") }}" name="target">
                            <p class="kpiTargetError red"></p>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label for="kpiDescription">Enter KPI Description</label>
                            <input type="text" id="kpiDescription" class="form-control"
                                   placeholder="i.e build the no one search engine"
                                   value="{{ old("description") }}" name="description">
                            <p class="kpiDescriptionError red"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="kpiStartDateDiv">
                            <label for="kpiStartDate">Select Start Date</label>
                            <input type="text" id="kpiStartDate" class="form-control"
                                   placeholder="2016-09-20"
                                   value="{{ old("start_date") }}" name="start_date">
                            <p class="kpiStartDateError red"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="kpiEndDateDiv">
                            <label for="kpiEndDate">Select End Date</label>
                            <input type="text" id="kpiEndDate" class="form-control"
                                   placeholder="2016-09-20"
                                   value="{{ old("end_date") }}" name="end_date">
                            <p class="kpiEndDateError red"></p>
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-success form-group pull-right"
                                    id="createKpiButton">Create KPI</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--modal to update strategy--}}
<div class="modal fade" id="updateKpiModal"  role="dialog"
     aria-labelledby="updateStrategyModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Update KPI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kpiUpdateForm"  autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <input type="hidden" id="updateKpiID" placeholder="" value="" name="id">
                        <div class="col-sm-6 form-group">
                            <label for="updateKpiName">Enter KPI Name</label>
                            <input type="text" id="updateKpiName" placeholder="KPI alpha" class="form-control"
                                   value="{{--{{ old("name") }}--}}" name="name">
                            <p class="updateKpiNameError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updateKpiTarget">Enter KPI Target</label>
                            <input type="text" id="updateKpiTarget" placeholder="new customers" class="form-control"
                                   value="{{--{{ old("target") }}--}}" name="target" >
                            <p class="updateKpiTargetError red"></p>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label for="updateKpiDescription">Enter KPI Description</label>
                            <input type="text" id="updateKpiDescription" class="form-control"
                                   placeholder="i.e build the no one search engine"
                                   value="{{--{{ old("description") }}--}}" name="description">
                            <p class="updateKpiDescriptionError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updateKpiStartDate">Select Start Date</label>
                            <input type="text" id="updateKpiStartDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date="" data-max-date=""
                                   value="{{--{{ old("start_date") }}--}}" name="start_date">
                            <p class="updateKpiStartDateError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updateKpiEndDate">Select End Date</label>
                            <input type="text" id="updateKpiEndDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date="" data-max-date=""
                                   value="{{--{{ old("end_date") }}--}}" name="end_date">
                            <p class="updateKpiEndDateError red"></p>
                        </div>
                        <button type="submit" class="btn btn-outline-warning ks-solid col-sm-2 form-group"
                                id="updateStrategyButton">Update KPI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--modal to assign strategy--}}
<div class="modal fade" id="assignKpiModal"  role="dialog"
     aria-labelledby="assignStrategyModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Assign KPI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="levelCreateForm"  autocomplete="off">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="js-example-basic-multiple" class="col-form-label">Assign Strategy To Users:</label>
                        {{--giving select 2 inline styling which will cause the full width of it in the modal
                        else its not working properly in modal--}}
                        <select class="form-control js-example-basic-multiple" id="assignPrivileges"
                                multiple style="width: 100%">
                            <option value="1">Ali</option>
                        </select>
                        <p class="assignStrategyError"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success ks-solid" id="check">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>