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
    Vision
@endsection

@section("page-title")
    Vision
@endsection

@section("sidebar-tabs")
    @include("includes.backend.vision-sidebar")
@endsection
@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
            @if(check_resource('App\Http\Controllers\VisionController@store') == 1)
            <button class="btn btn-outline-success ks-solid text-center" data-toggle="modal"
                    data-target="#createVisionModal" id="createVisionButton" >
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Create Vision</span>
            </button>
            @endif
        </div>
        <div class="col-sm-offset-5">
        </div>
    </div>
@endsection

<!--Modal for creating vision-->
<div class="modal fade" id="createVisionModal"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Create vision</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="crossvisionmodal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="visionCreateForm" autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group">
                            <input type="hidden" id="company-id" class="form-control" name="company-id"
                                   value="{{ Auth::user()->company_id }}">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="visionName">Enter Vision Name</label>
                            <input type="text" id="visionName" placeholder="vision alpha" class="form-control"
                                   value="{{ old("name") }}" name="name">
                            <p class="visionNameError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="visionTarget">Enter Vision Target</label>
                            <input type="text" id="visionTarget" placeholder="i.e 1000" class="form-control"
                                   value="{{ old("target") }}" name="target">
                            <p class="visionTargetError red"></p>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label for="visionDescription">Enter Vision Description</label>
                            <textarea type="textarea" id="visionDescription" class="form-control"
                                   placeholder="i.e increasing profit by 40%"
                                      value="{{ old("description") }}" name="description" ></textarea>
                            <p class="visionDescriptionError red"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="visionStartDateDiv">
                            <label for="visionStartDate">Select Start Date</label>
                            <input type="text" id="visionStartDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date=""
                                   value="{{ old("start_date") }}" name="start_date">
                            <p class="visionStartDateError red"></p>
                        </div>

                        <div class="col-sm-6 form-group" id="visionEndDateDiv">
                            <label for="visionEndDate">Select End Date</label>
                            <input type="text" id="visionEndDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-max-date=""
                                   value="{{ old("end_date") }}" name="end_date">
                            <p class="visionEndDateError red"></p>
                        </div>
                        <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-outline-success ks-solid col-sm-2 form-group"
                                id="createvisionButton">Create Vision</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal for updating vision-->
<div class="modal fade" id="updateVisionModal"  role="dialog"
     aria-labelledby="updateVisionModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visionModalLabel">Update Vision</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="visionUpdateForm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group">
                            <input type="hidden" id="updatevisionId" class="form-control" name="id">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="updatevisionName">Enter Vision Name</label>
                            <input type="text" id="updatevisionName" placeholder="Vision alpha" class="form-control"
                                   value="{{ old("name") }}" name="name">
                            <p class="updateVisionNameError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updateVisionTarget">Enter Vision Target</label>
                            <input type="text" id="updateVisionTarget" placeholder="new customers" class="form-control"
                                   value="{{ old("target") }}" name="target" >
                            <p class="updateVisionTargetError red"></p>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label for="updateStrategyDescription">Enter Vision Description</label>
                            <input type="text" id="updateVisionDescription" class="form-control"
                                   placeholder="i.e build the no one search engine"
                                   value="{{ old("description") }}" name="description">
                            <p class="updateVisionDescriptionError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updateVisionStartDate">Select Start Date</label>
                            <input type="text" id="updateVisionStartDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date="" data-max-date=""
                                   value="{{ old("start_date") }}" name="start_date">
                            <p class="updateVisionStartDateError red"></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="updateVisionEndDate">Select End Date</label>
                            <input type="text" id="updateVisionEndDate" class="form-control calendar"
                                   placeholder="2016-09-20" data-min-date="" data-max-date=""
                                   value="{{ old("end_date") }}" name="end_date">
                            <p class="updateVisionEndDateError red"></p>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-outline-success ks-solid col-sm-2 form-group"
                                    id="updateVisionButton">Update Vision</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section("main-container")
    <div class="container-fluid">
        <table id="ks-datatable" class="table table-striped table-bordered visiontable" width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Vision</th>
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
            @foreach( $visions as $vision)
                <tr id="vision{{$vision->id}}">
                    <td scope="row">{{$vision->id}}</td>
                    <td>{{$vision->name}}</td>
                    <td>{{$vision->description}}</td>
                    <td>{{$vision->target}}</td>
                    <td>{{$vision->start_date->toDateString()}}</td>
                    <td>{{$vision->end_date->toDateString()}}</td>
                    {{--<td>{{$vision->status}}</td>--}}
                    <td>{{ $vision->end_date->diffForHumans(now()) }}</td>
                    {{--<td>--}}
                        {{--<button class="btn btn-outline-primary ks-no-text ks-solid editVisionButton" type="button" data-toggle="modal"--}}
                                {{--data-target="#updateVisionModal" title="Edit" data-id="{{$vision->id}}">--}}
                            {{--<span class="la la-edit ks-icon"></span>--}}
                        {{--</button>--}}
                        {{--<button class="btn btn-outline-danger ks-no-text ks-solid deletevisionButton"--}}
                                {{--title="Delete" data-id="{{$vision->id}}">--}}
                            {{--<span class="la la-trash ks-icon"></span>--}}
                        {{--</button>--}}
                    {{--</td>--}}

                    <td><div class='ks-controls dropdown'>
                            <a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class='la la-ellipsis-h'></span></a>
                            <div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end'
                            style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>
                            <a class='dropdown-item editVisionButton' href='#' data-id="{{$vision->id}}"  data-toggle='modal' data-target='#updateVisionModal'>
                                <span class='la la-pencil ks-icon'></span>Edit</a>
                            <a class='dropdown-item deletevisionButton' href='#' data-id="{{$vision->id}}">
                                <span class='la la-trash ks-icon'></span>Delete</a>
                            {{--<a class='dropdown-item assignVisionLink' href='#' data-id="{{$vision->id}}" data-toggle='modal' data-target=''>--}}
                                {{--<span class='la la-users ks-icon'></span>Assign</a>--}}
                            <a class='dropdown-item editVisionButton' href='vision-detail/{{$vision->id}}' data-id="{{$vision->id}}">
                                <span class='la la-bar-chart-o ks-icon'></span>Details</a>
                            </div>
                        </div></td>

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


                $("#visionStartDate").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#visionEndDate").datepicker("option","minDate", selected)
                    }
                });

                $("#visionEndDate").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#visionStartDate").datepicker("option","maxDate", selected)
                    }
                });

                $("#updateVisionStartDate").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#updateVisionEndDate").datepicker("option","minDate", selected)
                    }
                });

                $("#updateVisionEndDate").datepicker({
                    showSecond: true,
                    timeFormat: 'hh:mm:ss',
                    dateFormat: 'yy-mm-dd',
                    numberOfMonths: 1,
                    onSelect: function(selected) {
                        $("#updateVisionStartDate").datepicker("option","maxDate", selected)
                    }
                });




            });
        })(jQuery);
    </script>
@endsection
