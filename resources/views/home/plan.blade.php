<?php
$commonAssetsFrontendCssPath      = "assets/frontend/css/"              ;
$commonAssetsFrontendJsPath       = "assets/frontend/js/"               ;
$commonAssetsFrontendFontsPath    = "assets/frontend/"                  ;
$commonAssetsCommonImagesPath     = "assets/frontend/images/"           ;
?>
@extends("layouts.frontend-layout")
@section("title")
    GoalHack | Plans
@endsection

@section("slider")
    <section class="lesun-quote-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="quote-box">
                        <h2>THE RIGHT PLAN FOR EVERYONE</h2>
                        <p>Simple and flexibel plans that adopt to your business needs.</p>
                        <a href="#plans" class="lesun-secondary-btn">See Plans </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<br><br>--}}
    <hr>
@endsection

<!-- Main Body Start -->
@section("container")
    <div class="container" id="plans">
        <div class="row">
            @foreach($plans as $plan)
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <span class="icon"><i class="fa fa-globe"></i></span>
                    <div class="pricingTable-header">

                        <h3 class="title">{{$plan->package_name}}</h3>

                        <span class="price-value">${{$plan->package_amount}}</span><span class="month">/Month</span>
                    </div>
                    <ul class="pricing-content">
                        <li>{{$plan->users}} Users</li>
                        <li>Unlimited Visions</li>
                        <li>Unlimited Strategies</li>
                        <li>Unlimited KPIs</li>
                        <li>Unlimited Goals</li>
                        <li>Objectives & Key-Results Management</li>
                        <li>Task Management</li>
                    </ul>
                    <a href={{url('register')}} class="pricingTable-signup">Choose Plan</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="text_center">
        {{ $plans->links()}}
    </div>
    <hr>

    @endsection
<!-- Main Body End -->