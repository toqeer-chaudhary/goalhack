@extends("layouts.frontend-layout")

@section("title")
    GoalHack | Account Activation
@endsection

@section('container')
    <!-- Breadcromb Area Start -->
    <section class="lesun-breadcromb-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb">
                        <h2>Account Activation</h2>
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
                        <h2 id="account-activation-message">Congratulations!</h2>
                        <h3 id="account-activation-detail">You have been registered successfully.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Confirm Account Area End -->
@endsection