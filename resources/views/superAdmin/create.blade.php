@extends("layouts.backend")

@section("title")
    Package
@endsection

@section("page-title")
    Package
@endsection

@section("sidebar-tabs")
    @include("includes.backend.superAdmin-sidebar")
@endsection

@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
            <button type="button" data-toggle="modal" data-target="#CreateModal" class="btn btn-outline-primary ks-solid">
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Create Package</span>
            </button>
        </div>
        <div class="col-sm-offset-5">
        </div>
    </div>

@endsection


    <!-- Modal -->
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Package Specifications</h2>
                    <button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close" id="cross">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create" autocomplete="off">
                        {{csrf_field()}}

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="package-id" placeholder="Package Name" name="package-id">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Package Name:</label>
                            <input type="text" class="form-control" id="package-name" placeholder="Package Name" name="package-name">
                            <p id="package-name-has-error" ></p>
                        </div>


                        <div class="form-group">
                            <label class="col-form-label">Package Charges:</label><br>
                           {{--<input type="text" class="form-control" id="package-amount" placeholder="package Amount" name="package-amount">--}}
                            {{--<span class="currencyinput">$<input type="text" name="currency" class="form-control" id="package-amount" placeholder="package Amount"></span>--}}
                            {{--<p id="package-amount-has-error" ></p>--}}
                            <span class="input-euro left form-control" >
                                 <input type="text"  name="package-amount" placeholder="Package Amount" id="package-amount"/>
                            </span>
                            <p id="package-amount-has-error" ></p>

                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Maximum Users:</label>
                            <input type="text" class="form-control" id="users" placeholder="Maximum user" name="users">
                            <p id="package-users-has-error" ></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@section('main-container')
    {{--for output--}}
    <table class="table" id="packageTable">
        <thead class="thead-light">
        <tr>
            {{--<th scope="col">id</th>--}}
            <th scope="col">Package Name</th>
            <th scope="col">Package Charges</th>
            <th scope="col">Users</th>
            <th colspan="1">Action</th>


        </tr>
        </thead>
        <tbody>
        @foreach( $packages as $package)
            <tr id="package{{$package->id}}">
                {{--<td scope="row">{{$package->id}}</td>--}}
                <td>{{$package->nickname}}</td>
                <td>{{$package->amount}} $</td>
                <td>{{$package->metadata->users}}</td>
               <td>
                   <button class="btn btn-outline-danger ks-no-text ks-solid deleteButton"
                             title="Delete" data-id="{{$package->id}}" data-name="{{$package->nickname}}">
                        <span class="la la-trash ks-icon"></span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endsection

