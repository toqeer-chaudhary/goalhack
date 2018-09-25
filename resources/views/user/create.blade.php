@extends("layouts.backend")
@section("styles")
    {{--for contact--}}
    <link rel="stylesheet" href="{{asset("assets/backend/plugins/telephone/css/intlTelInput.css")}}">
    <link rel="stylesheet" href="{{asset("assets/backend/css/telephone.css")}}">
@endsection
@section("title")
   Admin
@endsection

@section("page-title")
    Users
@endsection

@section('sidebar-tabs')
    @include('includes.backend.vision-sidebar')
@endsection


@section("page-header")
    <div class="ks-title">
        <div class="col-sm-offset-5">
        </div>
        <div class="col-sm-2">
            <button type="button" data-toggle="modal" data-target="#CreateUser" class="btn btn-outline-primary ks-solid">
                <span class="ks-icon la la-pencil">&nbsp;&nbsp;</span>
                <span>Add User</span>
            </button>
        </div>
        <div class="col-sm-offset-5">
        </div>
    </div>
@endsection
{{--create user modal--}}
<div class="modal fade" id="CreateUser"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="levelModalLabel">User Information</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="crosssign">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-user">
                    {{csrf_field()}}
                <div class="row">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user-id" name="user-id">
                    </div>
                    <div class="col-sm-6 form-group" >
                        <label class="col-form-label"><h5>First Name:</h5></label>
                        <input type="text" class="form-control" id="user-name" placeholder="First Name" name="user-name">
                        <p id="user-name-has-error" ></p>
                    </div>
                    <div class="col-sm-6 form-group" >
                        <label class="col-form-label"><h5>Last Name:</h5></label>
                        <input type="text" class="form-control" id="last-name" placeholder="Last Name" name="last-name">
                        <p id="user-lastname-has-error" ></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label class="col-form-label"><h5>Email Id:</h5></label>
                        <input type="text" class="form-control" id="user-email" placeholder="Email Address" name="user-email">
                        <p id="user-email-has-error" ></p>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="col-form-label"><h5>Password:</h5></label>
                        <input type="password" class="form-control" id="user-password" placeholder="Password" name="user-password">
                        <p id="user-password-error" ></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label class="col-form-label"><h5>Designation</h5></label>
                        <input type="text" class="form-control" id="user-designation" placeholder="User Designation" name="user-designation">
                        <p id="user-designation-has-error" ></p>
                    </div>
                    {{--<div class="col-sm-6 form-group">--}}
                        {{--<label class="col-form-label"><h5>Contact Number</h5></label>--}}
                        {{--<input type="text" class="form-control" id="user-contact" placeholder="Contact Number" name="user-contact">--}}
                        {{--<p id="user-contact-has-error" ></p>--}}
                    {{--</div>--}}
                    <div class="col-sm-6 form-group">
                        <label class="col-form-label"><h5>Contact No.</h5></label><br>
                        <input id="user-contact" type="tel"class="js-example-basic-single form-control" name="user-contact"><br>
                        <span id="error-msg" class="hide"  style="color: red">Invalid number</span>
                        <p id="user-contact-has-error" ></p>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label class="col-form-label"><h5>Country</h5></label><br>
                        {{--<input type="text" class="form-control" id="user-country" placeholder="User Country" name="user-country">--}}
                        {{--<p id="user-country-has-error" ></p>--}}
                        <select id="countySel" size="1" class="js-example-basic-single form-control country">
                            <option value="" selected="selected">-- Select Country --</option>
                        </select>
                        <p id="user-country-has-error" ></p>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="col-form-label"><h5>Province</h5></label><br>
                        <select id="stateSel" size="1" class="js-example-basic-single form-control state">
                            <option value="" selected="selected">-- Select State--</option>
                        </select>
                        <p id="user-state-has-error" ></p>
                    </div>
                      <div class="col-sm-6 form-group">
                        <label class="col-form-label"><h5>City</h5></label><br>
                        {{--<input type="text" class="form-control" id="user-city" placeholder="User city" name="user-city">--}}
                        {{--<p id="user-city-has-error" ></p>--}}
                        <select id="citySel" size="1" class="js-example-basic-single form-control city">
                            <option value="" selected="selected">-- Select City--</option>
                        </select>
                        <p id="user-city-has-error" ></p>
                    </div>
                    {{--<select id="countySel" size="1">--}}
                        {{--<option value="" selected="selected">-- Select Country --</option>--}}
                    {{--</select>--}}
                    {{--<br>--}}
                    {{--<br>--}}

                    {{--<select id="stateSel" size="1">--}}
                        {{--<option value="" selected="selected">-- Select State--</option>--}}
                    {{--</select>--}}
                    {{--<br>--}}
                    {{--<br>--}}
                    {{--<select id="citySel" size="1">--}}
                        {{--<option value="" selected="selected">-- Select City--</option>--}}
                    {{--</select>--}}
                    <br>
                    <br>
                    <select id="zipSel" size="1" style="display: none">
                        <option value="" selected="selected">-- Select Zip--</option>
                    </select>

                    <div class="col-sm-6 form-group" >
                        <label class="col-form-label"><h5>Address</h5></label>
                        <input type="text" class="form-control" id="user-address" placeholder="User Address" name="user-address">
                        <p id="user-address-has-error" ></p>
                    </div>
                    <div class="col-sm-12 form-group" >
                        <label for="visionDropDown"><h5>Select Level</h5></label>
                        <select class="js-example-basic-single form-control" id="levelDropDown">
                            <option value="" hidden><h5>Select level</h5></option>
                            @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                        </select>
                        <p class="selectlevelError red"></p>
                    </div>

                    <div class="col-sm-6 form-group" >

                    </div>
                    <div class="modal-footer col-sm-6 form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeUsermodal">Close</button>
                        <button class="btn btn-primary" id="add-user">Submit</button>
                    </div>
             </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Edit User Modal-->
<div class="modal fade" id="EditUserModal"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="levelModalLabel">User Information</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="crossEditModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditUserForm" >
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="User-id" name="User-id">
                        </div>
                        <div class="col-sm-6 form-group" >
                            <label class="col-form-label"><h5>First Name:</h5></label>
                            <input type="text" class="form-control" id="User-name" placeholder="User Name" name="User-name">
                            <p id="User-name-has-error" ></p>
                        </div>
                        <div class="col-sm-6 form-group" >
                            <label class="col-form-label"><h5>Last Name:</h5></label>
                            <input type="text" class="form-control" id="Last-name" placeholder="Last Name" name="Last-name">
                            <p id="User-name-has-error" ></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Email Id:</h5></label>
                            <input type="text" class="form-control" id="User-email" placeholder="Email Address" name="User-email">
                            <p id="User-email-has-error" ></p>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Designation</h5></label>
                            <input type="text" class="form-control" id="User-designation" placeholder="User Designation" name="User-designation">
                            <p id="User-designation-has-error" ></p>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Contact Number</h5></label><br>
                            {{--<input type="text" class="form-control" id="User-contact" placeholder="Contact Number" name="User-contact">--}}
                            <input id="User-contact" type="tel"class="js-example-basic-single form-control" name="User-contact"><br>
                            <span id="Error-msg" class="hide"  style="color: red">Invalid number</span>
                            <p id="User-contact-has-error" ></p>
                        </div>
                        {{--<div class="col-sm-6 form-group">--}}
                        {{--<label class="col-form-label"><h5>Country</h5></label>--}}
                        {{--<input type="text" class="form-control" id="User-country" placeholder="User Country" name="User-country">--}}
                        {{--<p id="User-country-has-error" ></p>--}}
                        {{--</div>--}}

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Country</h5></label>
                            {{--<input type="text" class="form-control" id="User-country" placeholder="User Country" name="User-country">--}}
                            <select id="CountySel" size="1" class="js-example-basic-single form-control">
                                <option value="" selected="selected">-- Select Country --</option>
                            </select>
                            <p id="user-country-has-error" ></p>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Province</h5></label>
                            {{--<input type="text" class="form-control" id="User-province" placeholder="User Province" name="User-province">--}}
                            <select id="StateSel" size="1" class="js-example-basic-single form-control">
                                <option value="" selected="selected">-- Select State--</option>
                            </select>
                            <p id="User-province-has-error" ></p>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>City</h5></label>
                            {{--<input type="text" class="form-control" id="User-city" placeholder="User City" name="User-city">--}}
                            <select id="CitySel" size="1" class="js-example-basic-single form-control">
                                <option value="" selected="selected">-- Select City--</option>
                            </select>
                            <p id="User-city-has-error" ></p>
                        </div>
                        <br>
                        <br>
                        <select id="ZipSel" size="1" style="display: none">
                            <option value="" selected="selected">-- Select Zip--</option>
                        </select>

                        <div class="col-sm-6 form-group" >
                            <label class="col-form-label"><h5>Address</h5></label>
                            <input type="text" class="form-control" id="User-address" placeholder="User Address" name="User-address">
                            <p id="User-address-has-error" ></p>
                        </div>
                        <div class="col-sm-6 form-group" >
                            <label for="visionDropDown"><h5>Select Level</h5></label>
                            <select class="js-example-basic-single form-control" id="UserlevelDropDown-edit">
                                @foreach($levels as $level)
                                    <option value="{{$level->id}}" selected="selected">{{$level->name}}</option>
                                @endforeach
                            </select>
                            <p class="selectlevelError red"></p>
                        </div>

                        <div class="col-sm-6 form-group" >

                        </div>
                        <div class="modal-footer col-sm-6 form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="CloseUsermodal">Close</button>
                            <button class="btn btn-primary" type="submit" id="edit-user-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--User Detail Modal-->
<div class="modal fade" id="user-detail-modal"  role="dialog"
     aria-labelledby="levelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="levelModalLabel">User Detail</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="crossEditModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="user-detail-id" name="user_id">
                        </div>
                        <div class="col-sm-6 form-group" >
                            <label class="col-form-label"><h5>First Name:</h5></label>
                            <input type="text" class="form-control" id="user-detail-name" placeholder="User Name" name="user_name" disabled="readonly">
                        </div>

                        <div class="col-sm-6 form-group" >
                            <label class="col-form-label"><h5>Last Name:</h5></label>
                            <input type="text" class="form-control" id="user-detail-last-name" placeholder="Last Name" name="last_name" disabled="readonly">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Email Id:</h5></label>
                            <input type="text" class="form-control" id="user-detail-email" placeholder="Email Address" name="user_email" disabled="readonly">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Designation</h5></label>
                            <input type="text" class="form-control" id="user-detail-designation" placeholder="User Designation" name="User-designation" disabled="readonly">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Contact Number</h5></label><br>
                            {{--<input type="text" class="form-control" id="User-contact" placeholder="Contact Number" name="User-contact">--}}
                            <input id="user-detail-contact" type="tel"class="js-example-basic-single form-control" name="user_contact" disabled="readonly">
                        </div>
                        {{--<div class="col-sm-6 form-group">--}}
                        {{--<label class="col-form-label"><h5>Country</h5></label>--}}
                        {{--<input type="text" class="form-control" id="User-country" placeholder="User Country" name="User-country">--}}
                        {{--<p id="User-country-has-error" ></p>--}}
                        {{--</div>--}}

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Country</h5></label>
                            <input type="text" class="form-control" id="user-detail-country" placeholder="User Country" name="user_country" disabled="readonly">
                            {{--<select id="CountySel" size="1" class="js-example-basic-single form-control">
                                <option value="" selected="selected">-- Select Country --</option>
                            </select>--}}
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>Province</h5></label>
                            <input type="text" class="form-control" id="user-detail-province" placeholder="User Province" name="user_province" disabled="readonly">
                           {{-- <select id="StateSel" size="1" class="js-example-basic-single form-control">
                                <option value="" selected="selected">-- Select State--</option>
                            </select>--}}
                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="col-form-label"><h5>City</h5></label>
                            <input type="text" class="form-control" id="user-detail-city" placeholder="User City" name="user_city" disabled="readonly">
                            {{--<select id="CitySel" size="1" class="js-example-basic-single form-control">
                                <option value="" selected="selected">-- Select City--</option>
                            </select>--}}
                        </div>

                        {{--<br>
                        <br>
                        <select id="ZipSel" size="1" style="display: none">
                            <option value="" selected="selected">-- Select Zip--</option>
                        </select>--}}

                        <div class="col-sm-6 form-group" >
                            <label class="col-form-label"><h5>Address</h5></label>
                            <input type="text" class="form-control" id="user-detail-address" placeholder="User Address" name="user_address" disabled="readonly">
                        </div>

                        <div class="col-sm-6 form-group" >
                            <label for="levelDropDown"><h5>Select Level</h5></label>
                            <input type="text" class="form-control" id="user-detail-level" placeholder="User level" name="level" disabled="readonly">
                           {{-- <select class="js-example-basic-single form-control" id="UserlevelDropDown-edit">
                                @foreach($levels as $level)
                                    <option value="{{$level->id}}" selected="selected">{{$level->name}}</option>
                                @endforeach
                            </select>
                            <p class="selectlevelError red"></p>--}}
                        </div>

                        <div class="col-sm-6 form-group" >

                        </div>
                       {{-- <div class="modal-footer col-sm-6 form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="CloseUsermodal">Close</button>
                            <button class="btn btn-primary" type="submit" id="edit-user-button">Submit</button>
                        </div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('main-container')
    {{--for output--}}

    <table class="table" id="userTable" >
        <thead class="thead-light">
        <tr>
            <th scope="col">id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
           {{-- <th scope="col">Designation</th>
            <th scope="col">Country</th>
            <th scope="col">Province</th>
            <th scope="col">City</th>
            <th scope="col">Address</th>--}}
            {{--<th colspan="1">Contact</th>--}}
            <th colspan="2">Action</th>


        </tr>
        </thead>
        <tbody>
        @foreach( $users as $user)
            <tr id="user{{$user->id}}">
                <td scope="row">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->level ? $user->level->name : '-' }}</td>
                {{--<td>{{$user->designation}}</td>


                --}}{{--<td>{{$user->level->name}}</td>--}}{{--


                <td>{{$user->country}}</td>
                <td>{{$user->province}}</td>
                <td>{{$user->city}}</td>
                <td>{{$user->address}}</td>--}}
                {{--<td>{{$user->contact}}</td>--}}

                   {{-- <button class="btn btn-outline-primary ks-no-text ks-solid userEditButton" type="button" data-toggle="modal"
                            data-target="#EditUserModal" title="Edit" data-id="{{$user->id}}">
                        <span class="la la-edit ks-icon"></span>
                    </button>
                    <button class="btn btn-outline-danger ks-no-text ks-solid deleteuserButton"
                            title="Delete" data-id="{{$user->id}}">
                        <span class="la la-trash ks-icon"></span>
                    </button>--}}
                <td>
                    <div class='ks-controls dropdown'>
                        <a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <span class='la la-ellipsis-h'></span></a>
                        <div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end'
                             style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>
                            <a class='dropdown-item userEditButton' href='#' data-id="{{$user->id}}"  data-toggle='modal' data-target='#EditUserModal'>
                                <span class='la la-pencil ks-icon'></span>Edit</a>
                            <a class='dropdown-item deleteuserButton' href='#' data-id="{{$user->id}}">
                                <span class='la la-trash ks-icon'></span>Delete</a>
                            {{--<a class='dropdown-item assignVisionLink' href='#' data-id="{{$vision->id}}" data-toggle='modal' data-target=''>--}}
                            {{--<span class='la la-users ks-icon'></span>Assign</a>--}}
                            <a class='dropdown-item user-detail-button' href='#' data-id="{{$user->id}}" data-target="#user-detail-modal"  data-toggle='modal'>
                                <span class='la la-bar-chart-o ks-icon'></span>Details</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section("scripts")
    <script src="{{asset("assets/backend/js/country.js")}}"></script>
@endsection

