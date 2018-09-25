@extends("layouts.frontend-layout")

@section("title")
    GoalHack | Account Confirmation
@endsection

@section('container')
    <!-- Breadcromb Area Start -->
    <section class="lesun-breadcromb-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb">
                        <h2>Account Confirmation</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Confirm Account Area Start -->
    <br>
    <section class="lesun-contact-page-form section_b_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-form-box">
                        <h2><img src="{{ asset("assets/frontend/images/like-icon.png")}}" alt="thanks image" style="width:100px;border-width:0px;" /></h2>
                        <h2 id="success-message">Congratulations!</h2>
                        <h3 id="success-details">You have been registered successfully.</h3>
                        <h4 style="text-align: center">We've sent an account activation email to you at, please check your inbox for an account activation link from GoalHack.</h4>
                        <h6 style="text-align: center"><b>Note:</b> If you don't see the email in your inbox, check other email folders, like your junk, spam, social, etc. If you find your email in spam/junk folders,</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Confirm Account Area End -->
@endsection