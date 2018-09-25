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
    Strategy
@endsection

@section("page-title")
    Strategy
@endsection

@section("sidebar-tabs")
    @include("includes.backend.strategy-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
          @if(check_resource('App\Http\Controllers\StrategyController@store') == 1)
            <button class="btn btn-outline-success ks-solid text-center" data-toggle="modal"
                    data-target="#createStrategyModal" id="createStrategyButton" >
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Create Strategy</span>
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
                    <a class="m-menu__toggle is-active">Vision</a>
                    <div class="m-menu__menu">
                        @foreach($allVisions as $vision)
                            <a class="m-menu__menu-item displayStrategy"  data-id="{{$vision->id}}">{{$vision->name}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="ks-nav-body"  style="padding-top:0;">
            <div class="ks-nav-body-wrapper">
                <div class="container-fluid">
                    <table id="ks-datatable" class="table table-striped table-bordered strategyTable" width="100%">
                        <thead>
                        <tr>

                            <th>Strategy</th>
                            <th>Description</th>
                            {{--<th>Target</th>--}}
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

{{-- Modal to create Strategy--}}
<div class="modal fade" id="createStrategyModal"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Create Strategy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="strategyCreateForm"  autocomplete="off">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="visionDropDown">Select Vision</label>
                                <select class="js-example-basic-single form-control" id="visionDropDown">
                                    <option value="" hidden>Select your vision</option>
                                    @foreach($allVisions as $vision)
                                        <option value="{{$vision->id}}">{{$vision->name}}</option>
                                    @endforeach
                                </select>
                                <p class="selectVisionError red"></p>
                            </div>

                            <div class="col-sm-12 form-group">
                                <label for="strategyName">Enter Strategy Name</label>
                                <input type="text" id="strategyName" placeholder="strategy alpha" class="form-control"
                                       value="{{ old("name") }}" name="name">
                                <p class="strategyNameError red"></p>
                            </div>

                            {{--<div class="col-sm-6 form-group">--}}
                                {{--<label for="strategyTarget">Enter Strategy Target</label>--}}
                                {{--<input type="text" id="strategyTarget" placeholder="i.e 1000" class="form-control"--}}
                                       {{--value="{{ old("target") }}" name="target">--}}
                                {{--<p class="strategyTargetError red"></p>--}}
                            {{--</div>--}}

                            <div class="col-sm-12 form-group">
                                <label for="strategyDescription">Enter Strategy Description</label>
                                <input type="text" id="strategyDescription" class="form-control"
                                       placeholder="i.e build the no one search engine"
                                       value="{{ old("description") }}" name="description">
                                <p class="strategyDescriptionError red"></p>
                            </div>

                            <div class="col-sm-6 form-group" id="strategyStartDateDiv">
                                <label for="strategyStartDate">Select Start Date</label>
                                <input type="text" id="strategyStartDate" class="form-control"
                                       value="{{ old("start_date") }}" name="start_date">
                                <p class="strategyStartDateError red"></p>
                            </div>

                            <div class="col-sm-6 form-group" id="strategyEndDateDiv">
                                <label for="strategyEndDate">Select End Date</label>
                                <input type="text" id="strategyEndDate" class="form-control"
                                       value="{{ old("end_date") }}" name="end_date">
                                <p class="strategyEndDateError red"></p>
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-success form-group pull-right"
                                        id="createStrategyButton">Create Strategy</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--modal to update strategy--}}
<div class="modal fade" id="updateStrategyModal"  role="dialog"
     aria-labelledby="updateStrategyModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Update Strategy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="strategyUpdateForm"  autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-sm-12 form-group">
                            <label for="updateStrategyName">Enter Strategy Name</label>
                            <input type="text" id="updateStrategyName" placeholder="strategy alpha" class="form-control"
                                   value="{{ old("name") }}" name="name">
                            <p class="updateStrategyNameError red"></p>
                        </div>

                        {{--<div class="col-sm-6 form-group">--}}
                            {{--<label for="updateStrategyTarget">Enter Strategy Target</label>--}}
                            {{--<input type="text" id="updateStrategyTarget" placeholder="new customers" class="form-control"--}}
                                   {{--value="{{ old("target") }}" name="target" >--}}
                            {{--<p class="updateStrategyTargetError red"></p>--}}
                        {{--</div>--}}

                        <div class="col-sm-12 form-group">
                            <label for="updateStrategyDescription">Enter Strategy Description</label>
                            <input type="text" id="updateStrategyDescription" class="form-control"
                                   placeholder="i.e build the no one search engine"
                                   value="{{ old("description") }}" name="description">
                            <p class="updateStrategyDescriptionError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updateStrategyStartDate">Select Start Date</label>
                            <input type="text" id="updateStrategyStartDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date="" data-max-date=""
                                   value="{{ old("start_date") }}" name="start_date">
                            <p class="updateStrategyStartDateError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updatestrategyEndDate">Select End Date</label>
                            <input type="text" id="updateStrategyEndDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date="" data-max-date=""
                                   value="{{ old("end_date") }}" name="end_date">
                            <p class="updateStrategyEndDateError red"></p>
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-warning form-group pull-right"
                                    id="updateStrategyButton">Update Strategy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--modal to assign strategy--}}
<div class="modal fade" id="assignStrategyModal"  role="dialog"
     aria-labelledby="assignStrategyModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Assign Strategy</h5>
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