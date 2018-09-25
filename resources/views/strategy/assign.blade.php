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
        <div class="col-sm-offset-4">
        </div>
        <div class="col-sm-3">
            <h3 class="text-dark"> Assign Strategy Here</h3>
        </div>
        <div class="col-sm-offset-5">
        </div>
    </div>
@endsection

@section("main-container")

    <table id="ks-datatable" class="table table-striped table-bordered" width="100%">
        <thead>
        <tr>
            <th>Strategy</th>
            <th>Description</th>
            <th>Total Users</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($allStrategies as $allStrategy)
            {{--reason for storing id with Strategy is to use it in case of deleting--}}
            {{--and updating with ajax--}}
            <tr id="assign-strategy{{$allStrategy->id}}">
                <td>{{$allStrategy->name}}</td>
                <td>{{$allStrategy->description}}</td>
                {{--count of the total no of users against one Strategy--}}
                <td>{{$allStrategy->users->count()}}</td>
                <td>
                    <div class='ks-controls dropdown'>
                        <a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <span class='la la-ellipsis-h'></span></a>
                        <div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' 
                        style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>
                            <a class='dropdown-item assignUserLink' href='#' data-id='{{$allStrategy->id}}'
                               data-toggle='modal' data-name="strategy" data-target='#assignUserModal'>
                                <span class='la la-users ks-icon'></span>Assign</a>
                            <a class='dropdown-item updateAssignUserLink' href='#' data-id='{{$allStrategy->id}}'
                               data-toggle='modal' data-name="strategy" data-target='#updateAssignUserModal'>
                                <span class='la la-users ks-icon'></span>Edit</a>
                        {{--<a class='dropdown-item deleteStrategyLink' href='#' data-id='{{$allStrategy->id}}'>--}}
                            {{--<span class='la la-trash ks-icon'></span>Delete</a>--}}
                        {{--<a class='dropdown-item showStrategyLink' href='strategy/{{$allStrategy->id}}'--}}
                           {{--data-id='{{$allStrategy->id}}'>--}}
                            {{--<span class='la la-bar-chart-o ks-icon'></span>Details</a>--}}
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            {{--In case of no data--}}
        @endforelse
        </tbody>
    </table>
    
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
                    placeholder: 'Assign Users'
                });
            });
        })(jQuery);
    </script>
@endsection


{{--modal to assign strategy--}}
<div class="modal fade" id="assignUserModal"  role="dialog"
     aria-labelledby="assignUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignUserModalLabel">Assign Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="assignUserForm">
                    {{csrf_field()}}
                    <input type="hidden" id="logged-in-user" value="{{Auth::id()}}">
                    <div class="form-group">
                        <label for="strategy-name" class="col-form-label">@yield("page-title") Name:</label>
                        <input type="text" class="form-control" id="functionality-name" data-id = "" readonly value="">
                        <p class="assignFunctionalityNameError red"></p>
                    </div>
                    <div class="form-group">
                        <label for="js-example-basic-multiple" class="col-form-label">Assign @yield("page-title") To Users:</label>
                        {{--giving select 2 inline styling which will cause the full width of it in the modal
                        else its not working properly in modal--}}
                        <select class="form-control js-example-basic-multiple" id="assignUser"
                                multiple style="width: 100%">
                            <option value="" hidden></option>
                            @foreach($allLevels as $allLevel)
                                @foreach($allLevel->users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <p class="assignUserError"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success ks-solid" id="assign-user">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--modal to update assign strategy--}}
<div class="modal fade" id="updateAssignUserModal"  role="dialog"
     aria-labelledby="updateAssignUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAssignUserModalLabel">Update Assigned Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateAssignUserForm">
                    {{csrf_field()}}
                    <input type="hidden" id="logged-in-user" value="{{Auth::id()}}">
                    <div class="form-group">
                        <label for="strategy-name" class="col-form-label">@yield("page-title") Name:</label>
                        <input type="text" class="form-control" id="update-functionality-name" data-id = "" readonly value="">
                        <p class="assignFunctionalityNameError red"></p>
                    </div>
                    <div class="form-group">
                        <label for="js-example-basic-multiple" class="col-form-label">Assign @yield("page-title") To Users:</label>
                        {{--giving select 2 inline styling which will cause the full width of it in the modal
                        else its not working properly in modal--}}
                        <select class="form-control js-example-basic-multiple" id="updateAssignUser"
                                multiple style="width: 100%">
                            <option value="" hidden></option>
                            @foreach($allLevels as $allLevel)
                                @foreach($allLevel->users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <p class="updateAssignUserError"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success ks-solid" id="update-assign-user">Re Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{--modal to assign strategy--}}
{{--<div class="modal fade" id="assignStrategyModal"  role="dialog"--}}
     {{--aria-labelledby="assignStrategyModal" aria-hidden="true">--}}
    {{--<div class="modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="StrategyModalLabel">Assign Strategy</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<form id="strategyAssignForm">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<input type="hidden" id="logged-in-user" value="{{Auth::id()}}">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="strategy-name" class="col-form-label">Strategy Name:</label>--}}
                        {{--<input type="text" class="form-control" id="strategy-name" data-id = "" readonly value="">--}}
                        {{--<p class="assignStrategyNameError red"></p>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="js-example-basic-multiple" class="col-form-label">Assign Strategy To Users:</label>--}}
                        {{--giving select 2 inline styling which will cause the full width of it in the modal--}}
                        {{--else its not working properly in modal--}}
                        {{--<select class="form-control js-example-basic-multiple" id="assignStrategyUser"--}}
                                {{--multiple style="width: 100%">--}}
                                {{--<option value="" hidden></option>--}}
                            {{--@foreach($allUsers as $allUser)--}}
                                {{--<option value="{{$allUser->id}}">{{$allUser->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<p class="assignStrategyError"></p>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="submit" class="btn btn-outline-success ks-solid" id="assign-strategy-user">Create</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--modal to update assign strategy--}}
{{--<div class="modal fade" id="updateAssignStrategyModal"  role="dialog"--}}
     {{--aria-labelledby="updateAssignStrategyModal" aria-hidden="true">--}}
    {{--<div class="modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="StrategyModalLabel">Update Assign Strategy</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<form id="updateStrategyAssignForm">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="strategy-name" class="col-form-label">Strategy Name:</label>--}}
                        {{--<input type="text" class="form-control" id="update-strategy-name" data-id = "" readonly value="">--}}
                        {{--<p class="assignStrategyNameError red"></p>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="js-example-basic-multiple" class="col-form-label">Assign Strategy To Users:</label>--}}
                        {{--giving select 2 inline styling which will cause the full width of it in the modal--}}
                        {{--else its not working properly in modal--}}
                        {{--<select class="form-control js-example-basic-multiple" id="updateAssignStrategyUser"--}}
                                {{--multiple style="width: 100%">--}}
                            {{--<option value="" hidden></option>--}}
                            {{--@foreach($allUsers as $allUser)--}}
                                {{--<option value="{{$allUser->id}}">{{$allUser->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<p class="updateAssignStrategyError"></p>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="submit" class="btn btn-outline-success ks-solid" id="update-assign-strategy-user">Update</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}