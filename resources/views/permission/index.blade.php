@extends("layouts.backend")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/datatables-net/datatables.min.css")}}">
    {{--select 2 plugin css custom downloaded--}}
    <link href="{{asset("assets/backend/css/custom/select2.min.css")}}" rel="stylesheet" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


@endsection

@section("title")
    Permission
@endsection

@section("page-title")
    Permission
@endsection

@section("sidebar-tabs")
    @include("includes.backend.vision-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-4">
        </div>
        <div class="col-sm-3">
            {{--checking if the count of level and resource is greater than zero than display this texts--}}
             @if($allLevels->count() > 0 and $allResources->count() > 0)
                <h3 class="text-dark"> Assign Permissions Here</h3>
            @else
                 {{--else display this--}}
                <h3 class="text-warning text-center"> You have to create level and resources both first</h3>
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
                <th>Level Name</th>
                <th>Level Description</th>
                <th>ControllerAndActions</th>
                <th>Total Resources</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        {{--outer loop is for the all levels--}}
        @forelse($allLevels as $allLevel)
            {{--reason for storing id with level is to use it in case of deleting--}}

            <tr id="level{{$allLevel->id}}">
                <td>{{$allLevel->name}}</td>
                <td>{{$allLevel->description}}</td>
                <td>
                    {{--inner loop is for the all resources agianst a particular level--}}
                    @forelse($allLevel->resources as $controllersAndAction )
                        {{--accessing the controller name--}}
                    <p>{{$controllersAndAction->controller_name}} :
                        <span>
                            {{--accessing the controller action--}}
                            {{$controllersAndAction->controller_action}}
                        </span>
                    </p>
                        @empty
                        <p>No permissios yet</p>
                    @endforelse
                </td>
                <td>{{$allLevel->resources->count()}}</td>
                <td>
                    <button class="btn btn-outline-primary ks-solid" type="button" data-toggle="modal"
                            data-target="#assignPermissionModal"
                            title="Assign" data-id="{{$allLevel->id}}" id="levelAssignButton">
                        Assign
                    </button>
                    &nbsp;
                    <button class="btn btn-outline-primary ks-solid" type="button" data-toggle="modal"
                            data-target="#assignPermissionModal"
                            title="Edit" data-id="{{$allLevel->id}}" id="updateLevelAssignButton">
                       Edit
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
                // initializing js tree for the resources div
                $("#resources").jstree({

                    "plugins" : [ "checkbox" ]
                });
                // for edit resources
                $("#editResources").jstree({});

            });
        })(jQuery);
    </script>
@endsection

 {{--Modal to assign permission--}}
<div class="modal fade" id="assignPermissionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignPermissionModalLabel">Assign Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="assignPermissionCreateForm">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="level-name" class="col-form-label">Level Name:</label>
                        <input type="text" class="form-control" id="level-name" data-id = "" readonly value="">
                        <p class="assignLevelNameError red"></p>
                    </div>
                    <label for="resources" id="resourcesLabel" class="col-form-label">Permissions:</label>
                    <label for="resources" id="updateResourcesLabel" class="col-form-label pull-right">
                        Previously Selected</label>
                    <div class="text-center">
                        <p class="resourceError red ">

                        </p>
                    </div>
                    <div class="row">
                        <div id="resources" class="col-sm-5">
                            <ul>
                                {{--i tried to perform with json and ajax and spend huge time but did not get the--}}
                                {{--desired result thats why i used this--}}
                                {{--the outer loop is for showing controller names--}}
                                @foreach($allResources as $controllerName => $value)

                                    <li>{{$controllerName}}
                                        <ul>
                                            {{--the inner loop is for showing methods of a controller--}}
                                            @foreach($value as $values)
                                                <li>{{ $values->controller_action }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success ks-solid" id="assignPermission">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

