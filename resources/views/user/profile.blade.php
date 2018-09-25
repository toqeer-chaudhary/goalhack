@extends("layouts.backend")
@section("styles")
    <link rel="stylesheet" href="{{asset("assets/backend/css/styles/profile/settings.min.css")}}">
@endsection
@section("title")
    User
@endsection

@section("page-title")
    Edit Profile
@endsection

@section('sidebar-tabs')
    @include('includes.backend.admin-sidebar')
@endsection


@section("page-header")
    <div class="ks-title {{ session('success') ? ' bg-success' : '' }}">
        @if (session('success'))
            <h3 class="text-white">  {{ session('success') }}</h3>
        @else
            <h3>Profile Settings</h3>
        @endif
    </div>
@endsection

@section('main-container')
    <div class="ks-page-content">
        <div class="ks-page-content-body ks-profile">
            <div class="ks-profile-header">
                <div class="ks-profile-header-user">
                    <img src="{{asset('assets/backend/images/users/'.$user->image )}}"
                         class="ks-avatar" width="100" height="100" alt="No image">
                    <div class="ks-info">
                        <div class="ks-name">Karen Lucas</div>
                        <div class="ks-description">New York, USA</div>

                    </div>
                </div>
                {{--<div class="ks-profile-header-statistics">--}}
                    {{--<div class="ks-item">--}}
                        {{--<div class="ks-amount">{{ $user->level->name }}</div>--}}
                        {{--<div class="ks-text">Level</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator ks-full ks-light ks-open">

                <div class="tab-content">
                        <div class="ks-settings-tab">
                            <div class="ks-settings-form-wrapper">
                                <form method="post" action="{{ route('profile.update',Auth::user()->id) }}" aria-label="{{ __('Profile') }}" enctype="multipart/form-data">
                                    <input name="_method" type="hidden" value="PUT">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6 form-group" >
                                            <label class="col-form-label"><h5>First Name:</h5></label>
                                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="User Name" name="name"
                                            value="{{$user->name}}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group" >
                                            <label class="col-form-label"><h5>Last Name:</h5></label>
                                            <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   placeholder="Last Name" name="last_name" value="{{$user->last_name}}">
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label class="col-form-label"><h5>Email Id:</h5></label>
                                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   placeholder="Email Address" name="email" readonly value="{{$user->email}}">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="col-form-label"><h5>Contact Number</h5></label>
                                            <input type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                                                   placeholder="Contact Number" name="contact" value="{{$user->contact}}">
                                            @if ($errors->has('contact'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="col-form-label"><h5>Country</h5></label>
                                            <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" id="User-country"
                                                   placeholder="User Country" name="country" value="{{$user->country}}">
                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="col-form-label"><h5>Province</h5></label>
                                            <input type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}"
                                                   placeholder="User Province" name="province" value="{{$user->province}}">
                                            @if ($errors->has('province'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('province') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label class="col-form-label"><h5>City</h5></label>
                                            <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                   placeholder="User City" name="city" value="{{$user->city}}">
                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-6 form-group" >
                                            <label class="col-form-label"><h5>Address</h5></label>
                                            <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                   placeholder="User Address" name="address" value="{{$user->address}}">
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group" >
                                            <label class="col-form-label"><h5>Password</h5></label>
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   placeholder="change password if you want" name="password" >
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group" >
                                            <label class="col-form-label"><h5>Image</h5></label>
                                            <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                   placeholder="Your image" name="image" value="{{$user->image}}">
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section("scripts")
@endsection

