@extends("layouts.backend")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/css/styles/libs/datatables-net/datatables.min.css")}}">
   {{--select 2 plugin css custom downloaded--}}
    <link href="{{asset("assets/backend/css/custom/select2.min.css")}}" rel="stylesheet" />
    {{--js tree--}}
    <link rel="stylesheet" type="text/css" href="{{asset("assets/backend/plugins/jstree/themes/default/style.min.css")}}">
   {{--glyph icond--}}
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

@endsection

@section("title")
    Level
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
            @if(check_resource('App\Http\Controllers\LevelController@store') == 1)
            <button class="btn btn-outline-success ks-solid" type="button" data-toggle="modal"
                    data-target="#levelCreateModal" id="createLevelButton">
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Create Level</span>
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
                    <th>Level Name</th>
                    <th>Level Description</th>
                    <th>Parent Level</th>
                    <th>Total Users</th>
                    <th>Total Resources</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($allLevels as $allLevel)
                {{--reason for storing id with level is to use it in case of deleting--}}
                {{--and updating with ajax--}}
                <tr id="level{{$allLevel->id}}">
                    <td>{{$allLevel->name}}</td>
                    <td>{{$allLevel->description}}</td>
                    {{--<td>{{$allLevel->parent_id ? "oye" : "none"}}</td>--}}
                    <td data-parent="{{$allLevel->parent_id ? $allLevel->parent_id : "" }}">
                        @if($allLevel->parent_id != null)
                        {{\App\Models\Level::find($allLevel->parent_id)->name}}
                        @else

                        @endif
                    </td>
                    {{--count of the total no of users against one level--}}
                    <td>{{$allLevel->users->count()}}</td>
                    <td>{{$allLevel->resources->count()}}</td>
                    <td>
                        <button class="btn btn-outline-warning ks-no-text ks-solid" type="button" data-toggle="modal"
                                data-target="#levelUpdateModal" title="Edit" data-id="{{$allLevel->id}}" id="levelUpdateButton">
                            <span class="la la-edit ks-icon"></span>
                        </button>
                            &nbsp;
                        <button class="btn btn-outline-danger ks-no-text ks-solid"
                                title="Delete" data-id="{{$allLevel->id}}" id="levelDeleteButton">
                            <span class="la la-trash ks-icon"></span>
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
    <script src="{{asset("assets/backend/plugins/jstree\jstree.min.js")}}"></script>

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


{{-- Modal to create Level--}}
<div class="modal fade" id="levelCreateModal"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Create Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="levelCreateForm" method="post" action="{{ route("level.store") }}" autocomplete="off">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="parentLevel" class="col-form-label">Please Select Parent Level:</label>
                        <select name="parent_id" id="parentLevel" style="width: 100%">
                            <option value="" hidden>Select Any Level</option>
                            @foreach($allLevels as $allLevel)
                                <option value="{{$allLevel->id}}">{{$allLevel->name}}</option>
                            @endforeach
                        </select>
                        {{--<input type="text" class="form-control" id="parentLevel" placeholder="Alpha"--}}
                               {{--value="{{ old("parentLevel") }}" name="parentLevel">--}}
                    </div>
                    <div class="form-group">
                        <label for="levelName" class="col-form-label">Level Name:</label>
                        <input type="text" class="form-control{{$errors->has('name') ? ' is-invalid' : '' }}" id="levelName" placeholder="Alpha"
                               value="{{ old("name") }}" name="name">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <p class="levelNameError red"></p>
                    </div>
                    <div class="form-group">
                        <label for="levelDescription" class="col-form-label">Level Description:</label>
                        <input type="text" class="form-control{{$errors->has('description') ? ' is-invalid' : '' }}" id="levelDescription"
                               placeholder="This level can view strategy" value="{{ old("description") }}"
                               name="description">
                        @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                        <p class="levelDescriptionError red"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success ks-solid" id="createLevel">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal to update Level--}}
<div class="modal fade" id="levelUpdateModal" role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="levelModalLabel">Update Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="levelUpdateForm">
                    @method("put")
                    @csrf
                    <div class="form-group">
                        <label for="updateParentLevel" class="col-form-label">Please Select Parent Level:</label>
                        <select name="parent_id" id="updateParentLevel" style="width: 100%">
                            <option value="" hidden>Select Any Level</option>
                            <option value="">Null</option>
                            @foreach($allLevels as $allLevel)
                                <option value="{{$allLevel->id}}">{{$allLevel->name}}</option>
                            @endforeach
                        </select>
                        {{--<input type="text" class="form-control" id="parentLevel" placeholder="Alpha"--}}
                        {{--value="{{ old("parentLevel") }}" name="parentLevel">--}}
                    </div>
                    <div class="form-group">
                        <label for="updateLevelName" class="col-form-label">Level Name:</label>
                        <input type="text" class="form-control{{$errors->has('name') ? ' is-invalid' : '' }}"
                               id="updateLevelName" placeholder="Alpha" name="name">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <p class="updateLevelNameError red"></p>
                    </div>
                    <div class="form-group">
                        <label for="updateLevelDescription" class="col-form-label">Level Description:</label>
                        <input type="text" class="form-control{{$errors->has('description') ? ' is-invalid' : '' }}" id="updateLevelDescription"
                               placeholder="This level can view strategy" value="{{ old("description") }}"
                               name="description">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <p class="updateLevelDescriptionError red"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-warning ks-solid" id="updateLevelButton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
