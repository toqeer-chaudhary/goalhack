@extends("layouts.backend")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/datatables-net/datatables.min.css")}}">
    {{--select 2 plugin css custom downloaded--}}
    <link href="{{asset("assets/backend/css/custom/select2.min.css")}}" rel="stylesheet" />
    {{--glyphicon--}}
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

@endsection

@section("title")
    Resource
@endsection

@section("page-title")
    Resource
@endsection

@section("sidebar-tabs")
    @include("includes.backend.vision-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
            @if(check_resource('App\Http\Controllers\ResourceController@store') == 1)
            <button class="btn btn-outline-success ks-solid text-center" data-toggle="modal"
                    data-target="#resourceModal" id="createResourceButton" >
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Create Resource</span>
            </button>
            @endif
        </div>
        <div class="col-sm-offset-5">
        </div>
    </div>
@endsection

@section("main-container")


    <table id="ks-datatable" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Resource Id</th>
                <th>Controller Name</th>
                <th>Controller Action</th>
                <th>Assigned Levels</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        @forelse($allResources as $allResource)

            <tr id="resource{{$allResource->id}}">
                <td>{{$loop->iteration}}</td>
                <td>{{$allResource->controller_name}}</td>
                <td>{{$allResource->controller_action}}</td>
                <td>{{$allResource->levels->count()}}</td>
                <td>
                    <button class="btn btn-outline-danger ks-solid"
                            title="Delete" data-id="{{$allResource->id}}" id="resourcesDeleteButton">
                        <span class="la la-trash ks-icon"></span>
                        &nbsp;
                        Delete
                    </button>
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
                // initializing js tree for the resources div and also using checkboxes
                $("#resources").jstree({
                    "plugins" : [ "checkbox" ]
                });
                });
        })(jQuery);
    </script>

@endsection

{{--Modal to assign permission--}}
<div class="modal fade" id="resourceModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resourceModalLabel">Create Resources</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="resourceCreateForm">
                    {{csrf_field()}}

                    <label for="resources" class="col-form-label">Resources:</label>
                    <div class="text-center">
                        <p class="resourceError red ">

                        </p>
                    </div>
                    <div class="row">
                        <input type="hidden" id="company_id" value="{{ Auth::user()->company_id }}">
                        <div id="resources" class="col-sm-12">
                            <ul>
                                {{--i tried to perform with json and ajax and spend huge time but did not get the--}}
                                {{--desired result thats why i used this--}}
                                {{--the outer loop is for showing controller names--}}
                                @foreach($controllersAndActions as $controllersAndAction => $value)
                                    <li>{{$controllersAndAction}}
                                        <ul>
                                            {{--the inner loop is for showing methods of a controller--}}
                                            @foreach($value as $actions)
                                                <li>{{ $actions }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success ks-solid" id="createResourceSubmit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

