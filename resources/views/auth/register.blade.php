@extends("layouts.frontend-layout")
@section("title")
    GoalHack | Register
@endsection
<!-- Main Area Start -->
@section("container")
    <!-- Breadcromb Area Start -->
    <section class="lesun-breadcromb-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb">
                        <h2>register</h2>
                        <ul>
                            <li><a href={{url('index')}}>Home</a></li>
                            <li>/</li>
                            <li>register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcromb Area End -->
    <!-- Login Area Start -->

    <section class="lesun-login-area section_t_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box">
                        {{--<div class="login-heading">--}}
                            {{--<h3>sign up</h3>--}}
                        {{--</div>--}}
                        <div class="social-account-login">
                            <a href="#" class="twitter-login">
                                <span><i class="fa fa-sign-in"></i></span>
                                Sign Up
                            </a>
                        </div>
                        {{--<div class="social-account-login">--}}
                            {{--<a href="#" class="facebook-login">--}}
                                {{--<span><i class="fa fa-facebook"></i></span>--}}
                                {{--Facebook--}}
                            {{--</a>--}}
                            {{--<a href="#" class="twitter-login">--}}
                                {{--<span><i class="fa fa-twitter"></i></span>--}}
                                {{--twitter--}}
                            {{--</a>--}}
                            {{--<a href="#" class="google-login">--}}
                                {{--<span><i class="fa fa-google-plus"></i></span>--}}
                                {{--google+--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="login-heading">--}}
                            {{--<h3>or</h3>--}}
                        {{--</div>--}}
                            @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger">{{$error}}</p>
                                @endforeach
                            @endif
                        <form id="registration-form" method="POST" action="{{ route('register') }}">
                            {{csrf_field()}}
                            <div class="account-form-group">
                                <input type="text" placeholder="Company Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus id="company-name" >
                                <i class="fa fa-building"></i>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <p id="company-name-has-error" ></p>
                            <div class="account-form-group">
                                <input type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="company-email" >
                                <i class="fa fa-envelope-o"></i>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-email-has-error" ></p>
                            <div class="account-form-group">
                                <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" >
                                <i class="fa fa-lock"></i>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-password-has-error" ></p>
                            <div class="account-form-group">
                                <input type="password" placeholder="Confirm Password" name="password_confirmation" id="confirm-password">
                                <i class="fa fa-lock"></i>
                            </div>
                            <p id="confirm-password-has-error" ></p>
                            <div class="account-form-group">
                                <input type="text" placeholder="Company Address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" name="address" id="company-address">
                                <i class="fa fa-address-card"></i>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-address-has-error" ></p>
                            <div class="account-form-group">
                                <input type="text" placeholder="Company Contact" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" value="{{ old('contact') }}" name="contact" id="company-contact" >
                                <i class="fa fa-phone"></i>
                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-contact-has-error" ></p>
                            <div class="account-form-group">
                                <input type="text" placeholder="Company Website" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" value="{{ old('website') }}"  name="website" id="company-website" >
                                <i class="fa fa-globe"></i>
                                @if ($errors->has('website'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-website-has-error" ></p>
                            <div class="account-form-group">
                                {{--<input type="text" placeholder="Country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}" name="country" id="company-country"  >--}}
                                <select id="company-country" size="1" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}" name="country">
                                    <option value="" selected="selected">-- Select Country --</option>
                                </select>

                                <i class="fa fa-flag"></i>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-country-has-error" ></p>
                            <div class="account-form-group">
                                {{--<input type="text" placeholder="Province" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" value="{{ old('province') }}" name="province" id="company-province" >--}}
                                <select  size="1" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" value="{{ old('province') }}" name="province" id="company-province" >
                                    <option value="" selected="selected">-- Select State --</option>
                                </select>
                                <i class="fa fa-map"></i>
                                @if ($errors->has('province'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-province-has-error" ></p>
                            <div class="account-form-group">
                                {{--<input type="text" placeholder="City" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}" name="city" id="company-city" >--}}
                                <select  size="1"  class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}" name="city" id="company-city" >
                                    <option value="" selected="selected">-- Select City --</option>
                                </select>
                                <i class="fa fa-building"></i>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p id="company-city-has-error" ></p>
                            <div class="account-form-group">
                                {!! Recaptcha::render() !!}</span>
                            </div>
                            <p id="recapcha-has-error" ></p>
                            <div class="remember-row clearfix">
                                <p class="remember reg_rem">
                                    <input id="rememberme" value="forever" name="rememberme" type="checkbox">
                                    <label class="inline" for="rememberme">I agree the term’s & conditions </label>
                                </p>
                            </div>
                            <p>
                                <button type="submit" id="submit-registration-form">create account</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="success"></div>
    <!-- Login Area End -->
@endsection