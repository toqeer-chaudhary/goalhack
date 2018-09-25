@extends("layouts.frontend-layout")
@section("title")
    GoalHack | Payment
@endsection
<!-- Main Area Start -->
@section("container")
    <!-- Breadcromb Area Start -->
    <section class="lesun-breadcromb-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb">
                        <h2>Package Payment</h2>
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
    @if(Session::has('congrats'))
        <div class="alert-success">{{Session::get('congrats')}}</div>
    @elseif(Session::has('warning'))
        <div class="alert-danger text-center" style="font-size: 34px"><strong>{{Session::get('warning')}}</strong></div>
    @endif

    <div class="container" id="payment-form_id">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="text-xs-center">Payment Details</h3>
                            <img class="img-fluid cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                        </div>
                    </div>
                    <div class="card-block">
                        <form id="paymentForm">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Subscription Plan</label>
                                        <div class="input-group">

                                            <select name="subscription" class="form-control" id="package-option">
                                                @foreach($packages as $package)
                                                    <option value="{{$package->nickname}}" data-id="{{$package->id}}">{{$package->nickname}}</option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Card Name</label>
                                        <input type="tel" class="form-control" placeholder="Valid Card Name" name="card_brand" />
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="tel" class="form-control" placeholder="Valid Email" name="email" id="payment-email"/>
                                        <p id="email_has_error_message"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Valid Password" name="password" />
                                    </div>
                                </div>
                            </div>--}}

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>CARD NUMBER</label>
                                            <input type="tel" class="form-control" placeholder="Valid Card Number" data-stripe="number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-md-4">
                                    <div class="form-group">
                                        <label>DATE</label>
                                        <input type="tel" class="form-control" placeholder="MM" data-stripe="exp-month" />
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-4">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="tel" class="form-control" placeholder="YYYY" data-stripe="exp-year" />
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-4">
                                    <div class="form-group">
                                        <label>CV CODE</label>
                                        <input type="tel" class="form-control" placeholder="CVC" data-stripe="cvc"  />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="token" value="" />
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" class="subscribe btn btn-success btn-lg btn-block" type="button" onclick="normal();">Start Subscription</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2 offset-md-2">
            </div>
            <div class="col-xs-12 col-md-4 offset-md-4">
                <div id="selected-package">

                </div>
            </div>
        </div>

    </div>
    <!-- Package Payment Area End -->

@endsection
@section('scripts')
    <script>
        function loadingOut(loading) {
            setTimeout(() => loading.out(), 16000);
        }

        function normal() {
            var loading = new Loading();

            loadingOut(loading);
        }
    </script>
    @stop