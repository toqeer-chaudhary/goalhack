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
                            <h2>Change Password</h2>
                            <ul>
                                <li><a href={{--{{url('index')}}--}}>Home</a></li>
                                <li>/</li>
                                <li>Change Password</li>
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
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{route("company.store")}}" method="post">
                                {{csrf_field()}}
                                <div class="account-form-group">
                                    <input type="password" placeholder="Old Password" name="current-password">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <p id="company-password-has-error" ></p>
                                <div class="account-form-group">
                                    <input type="password" placeholder="New Password" name="new-password">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <p id="new-password-has-error" ></p>
                                <div class="account-form-group">
                                    <input type="password" placeholder="Confirm New Password" name="confirm_new_password">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <p id="confirm-new-password-has-error" ></p>
                                <div class="account-form-group">
                                    {!! Recaptcha::render() !!}</span>
                                </div>
                                <div class="remember-row clearfix">
                                    <p class="remember reg_rem">
                                        <input id="rememberme" value="forever" name="rememberme" type="checkbox">
                                        <label class="inline" for="rememberme">I agree the term’s & conditions </label>
                                    </p>
                                </div>
                                <p>
                                    <button type="submit">Change Passwordt</button>
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