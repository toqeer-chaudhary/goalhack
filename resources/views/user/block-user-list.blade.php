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
    Block User
@endsection

@section("page-title")
    Block User
@endsection

@section("sidebar-tabs")
    @include("includes.backend.goal-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
       <h3>List of Block Users</h3>
    </div>
@endsection

@section("main-container")
    <div class="ks-content-nav">
        <div class="ks-nav-body"  style="padding-top:0;">
            <div class="ks-nav-body-wrapper">
                <div class="container-fluid">
                    <table id="ks-datatable" class="table table-striped table-bordered strategyTable" width="100%">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Last Name</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Change Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr id="user{{$user->id}}">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->designation }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        <button data-user="{{ $user->id }}" class="btn btn-success ks-solid" id="unblock">
                                            UnBlock
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

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

