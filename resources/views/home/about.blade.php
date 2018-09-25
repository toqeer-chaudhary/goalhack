<?php
    /*$commonAssetsFrontendCssPath      = "assets/frontend/css/"              ;
    $commonAssetsFrontendJsPath       = "assets/frontend/js/"               ;
    $commonAssetsFrontendFontsPath    = "assets/frontend/"                  ;
    $commonAssetsCommonImagesPath     = "assets/frontend/images/"           ;*/
    ?>
    @extends("layouts.frontend-layout")
@section("title")
    GoalHack | About Us
@endsection
<!-- Main Body Start -->
@section("container")
        <!-- Breadcromb Area Start -->
        <section class="lesun-breadcromb-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb">
                            <h2>About</h2>
                            <ul>
                                <li><a href={{url('index')}}>Home</a></li>
                                <li>/</li>
                                <li>About</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcromb Area End -->
        <!-- About PAge Area Start -->
        <section class="lesun-about-page-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-page-right">
                            <img src="{{ asset("assets/frontend/images/bg-macbook.png")}}" alt="about" />
                            <a class="popup-youtube" href="https://www.youtube.com/watch?v=k-R6AFn9-ek">
                                <i class="flaticon-play-button"></i>
                            </a>
                            <div class="iq-waves">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-page-left margin-top">
                            <div class="lesun-site-heading-primary">
                                {{--<h4>who we are</h4>--}}
                                <h1>About GoalHack</h1>
                            </div>
                            <h2>Since 2017, GoalHack provides best service for our valuable clients.</h2>
                            <p>GoalHack is a goal management framework that helps companies to execute their visions, improve focus  by organizing employees and the work they do around achieving common goals. GoalHack consists of vision, which defines a target to be achieved within some  duration, strategy, which defines what you’ll do to get your vision, KPI, shows you how you’re progressing towards your vision and goals that are individual tasks. </p>
                            <p>GoalHack helps entire companies communicate company vision to employees in an actionable, measurable way. It also helps companies to move from an output to an outcome-based approach to work.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About PAge Area End -->
        <!-- Mission Area Start -->
        <section class="lesun-mission-area">
            <div class="container">
                <div class="row ">
                    <div class="col-md-6 row_pad_70">
                        <div class="mission-area-left">
                            <div class="single-mission mission-box-one">
                                <h3>What we do?</h3>
                                <p>GoalHack is a popular leadership process for setting, communicating and monitoring quarterly goals and results in organizations. Big part of GoalHack is making sure each individual knows, what's expected of them at work.</p>
                            </div>
                            <div class="single-mission mission-box-two">
                                <h3>Our mission</h3>
                                <p>GoalHack aims to define company and team "visions" along with linked and measurable "goals” to ensure employees work together, focusing their efforts to make measurable contributions. GoalHack  typically set at the company, team and personal levels and may be shared across the organization with the intention of providing teams with visibility of goals and the intention to align and focus effort.</p>
                            </div>
                            <div class="single-mission mission-box-three">
                                <h3>Our goal</h3>
                                <p>The goal of GoalHack is to connect company, team and personal visions  in a hierarchical way to measurable results, making all employees work together in one unified direction. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mission-area-right">
                            <img src="{{ asset("assets/frontend/images/2.png")}}" alt="mission image" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mission Area End -->
        <!-- Team Area Start -->
        <section class="lesun-team-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="lesun-site-heading">
                            <h4>Our Team</h4>
                            <h2>meet our experts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="team-slider">
                            <div class="single-team-member">
                                <div class="team-image">
                                    <img src="{{ asset("assets/frontend/images/agnt1.jpg")}}" alt="team 1" />
                                </div>
                                <div class="team-info-one">
                                    <div class="team-overlay-one">
                                        <h3>Toqeer Chaudhary</h3>
                                        <p>Founder & CEO</p>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-team-member">
                                <div class="team-image">
                                    <img src="{{ asset("assets/frontend/images/agnt3.jpg")}}" alt="team 1" />
                                </div>
                                <div class="team-info-one">
                                    <div class="team-overlay-one">
                                        <h3>Tahira Rasool</h3>
                                        <p>Senior Developer</p>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-team-member">
                                <div class="team-image">
                                    <img src="{{ asset("assets/frontend/images/agnt2.jpg")}}" alt="team 1" />
                                </div>
                                <div class="team-info-one">
                                    <div class="team-overlay-one">
                                        <h3>Maria Saleem</h3>
                                        <p>Senior Developer</p>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-team-member">
                                <div class="team-image">
                                    <img src="{{ asset("assets/frontend/images/agnt4.jpg")}}" alt="team 1" />
                                </div>
                                <div class="team-info-one">
                                    <div class="team-overlay-one">
                                        <h3>Zeeshan Tanveer</h3>
                                        <p>Project Manager</p>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-team-member">
                                <div class="team-image">
                                    <img src="{{ asset("assets/frontend/images/agnt1.jpg")}}" alt="team 1" />
                                </div>
                                <div class="team-info-one">
                                    <div class="team-overlay-one">
                                        <h3>Muneeb Tariq</h3>
                                        <p>Web Developer</p>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Area End -->
    @endsection
    <!-- Main Body End -->