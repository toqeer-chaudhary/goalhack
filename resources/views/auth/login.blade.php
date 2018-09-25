@extends("layouts.frontend-layout")
@section("title")
    GoalHack | Login
@endsection
<!-- Main Body Start -->
@section("container")
    <!-- Breadcromb Area Start -->
    <section class="lesun-breadcromb-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb">
                        <h2>login</h2>
                        <ul>
                            <li><a href={{url('index')}}>Home</a></li>
                            <li>/</li>
                            <li>login</li>
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
                            {{--<h3>sign in</h3>--}}
                        {{--</div>--}}
                        <div class="social-account-login">
                            <a href="#" class="twitter-login">
                                <span><i class="fa fa-sign-in"></i></span>
                                Sign in
                            </a>
                        </div>
                        {{--<div class="login-heading">--}}
                            {{--<h3>or</h3>--}}
                        {{--</div>--}}
                        @if(Session::has('success'))
                            <div class="alert  alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="account-form-group">
                                <input type="text" placeholder="Username or Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
                                <i class="fa fa-user"></i>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="account-form-group">
                                <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                <i class="fa fa-lock"></i>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="remember-row clearfix">
                                <p class="remember">
                                    <input id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                    <label class="inline" for="rememberme">Remember me</label>
                                </p>
                                <p class="lost-pass">
                                    <a href="{{ route('password.request') }}">forget your password?</a>
                                </p>
                            </div>
                            <p>
                                <button type="submit" >sign in</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    <!-- Login Area End -->
