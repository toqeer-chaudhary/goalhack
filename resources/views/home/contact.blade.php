<?php
/*$commonAssetsFrontendCssPath      = "assets/frontend/css/"             ;
$commonAssetsFrontendJsPath       = "assets/frontend/js/"              ;
$commonAssetsFrontendFontsPath    = "assets/frontend/"                  ;
$commonAssetsCommonImagesPath     = "assets/frontend/images/"           ;*/
?>
@extends("layouts.frontend-layout")
@section("title")
    GoalHack | Contact
@endsection
<!-- Main Area Start -->
@section("container")
    <!-- Breadcromb Area Start -->
    <section class="lesun-breadcromb-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb">
                        <h2>contact us</h2>
                        <ul>
                            <li><a href={{url('index')}}>Home</a></li>
                            <li>/</li>
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Page Form Start -->
    <br>
    <section class="lesun-contact-page-form section_b_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-form-box">
                        <h2>Say hello !</h2>
                        <div class="heading-line-two"></div>
                        <form id="info" method="post" action="{{route('sendmail')}}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <p>
                                        <input type="text" id="first-name" name="name" placeholder="Your Name"pattern="[A-Za-z]{3,15}"  >
                                        <p id="first-name-has-error"></p>
                                    </p>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <p>
                                        <input type="email" id="user-email" name="email" placeholder="Your Email Address"  >
                                    <p id="user-email-has-error"></p>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <p>
                                        <textarea name="msg"id="message" placeholder="Message Text" ></textarea>
                                    <p id="message-has-error"></p>
                                    </p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <button type="submit" id="submit-contact-form" >send message</button>
                                    <p id="sendemail-error"></p>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Page Form End -->
    @endsection
<!-- Main Area End -->