<?php
        /*$commonAssetsFrontendCssPath      = "assets/frontend/css/"             ;
        $commonAssetsFrontendJsPath       = "assets/frontend/js/"              ;
        $commonAssetsFrontendFontsPath    = "assets/frontend/"                  ;
        $commonAssetsCommonImagesPath     = "assets/frontend/images/"           ;*/
?>
@extends("layouts.frontend-layout")
    @section("title")
       GoalHack | Home
    @endsection
    @section("slider")
        @include('includes.frontend.slider-area')
    @endsection
    @section("container")
        <!-- Features Area Start -->
        <section class="lesun-features-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="features-heading">
                            <h2>Helping big organizations to grow and measure progress <span>can easily track the employees performance</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="single-features">
                            <div class="features-image">
                                <a href="#">
                                    <img src="{{ secure_asset("assets/frontend/images/business-advisor.jpg") }}" alt="business advisor" />
                                </a>
                            </div>
                            <div class="features-info">
                                <a href="#">
                                    <h3>Team co-ordination </h3>
                                </a>
                                <p>you can easily co-ordinate with your team</p>
                                <div class="feature-hover">
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-arrow-right"></i>--}}
                                    {{--</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="single-features">
                            <div class="features-image">
                                <a href="#">
                                    <img src="{{ secure_asset("assets/frontend/images/market-analyze.jpg")}}" alt="Business Market Analyze" />
                                </a>
                            </div>
                            <div class="features-info">
                                <a href="#">
                                    <h3>Progress Analysis</h3>
                                </a>
                                <p>you can easily analyze the progress and take appropriate action on time</p>
                                <div class="feature-hover">
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-arrow-right"></i>--}}
                                    {{--</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="single-features">
                            <div class="features-image">
                                <a href="#">
                                    <img src="{{ secure_asset("assets/frontend/images/consultation.jpg")}}" alt="Business Consultation" />
                                </a>
                            </div>
                            <div class="features-info">
                                <a href="#">
                                    <h3>Team work</h3>
                                </a>
                                <p>you can easily manage teams and track individuals progress</p>
                                <div class="feature-hover">
                                    {{--<a href="#">--}}
                                        {{--<i class="fa fa-arrow-right"></i>--}}
                                    {{--</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Area End -->
        <!-- Home About Area Start -->
        <section class="lesun-home-about-area section_100 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="lesun-site-heading-primary">
                            <h4>About us</h4>
                            <h2>Who we are</h2>
                        </div>
                        <div class="home-about-left">
                            <p>GoalHack is a goal management framework that helps companies to execute their visions, improve focus  by organizing employees and the work they do around achieving common goals.</p>
                            <blockquote>
                                <p>"There are three responses to any action – yes, no, and WOW! Wow is the one to aim for."</p>
                            </blockquote>
                            <p>GoalHack helps entire companies communicate company vision to employees in an actionable, measurable way. It also helps companies to move from an output to an outcome-based approach to work.</p>
                            <a href={{url('about')}} class="lesun-default-btn">Know More </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="home-about-right">
                            <img src="{{ secure_asset("assets/frontend/images/business-meeting.jpg")}}" alt="business man" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Home About Area End -->
        <!--Quote Area Start-->
        <section class="lesun-quote-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="quote-box">
                            <p>“WITH GOALHACK OUR TEAM IS ALIGNED AND FOCUSED. WE GET MORE DONE OF THE THINGS THAT MATTER MOST”.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Quote Area End-->
        <!-- Service Area Start -->
        <section class="lesun-service-area section_t_100 section_b_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="lesun-site-heading">
                            <h4>our services</h4>
                            <h2>We Specialize in</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-service-item">
                            <div class="service-heading-icon">
                                <div class="service-icon">
                                    <i class="flaticon-strategical-planning"></i>
                                </div>
                                <div class="service-heading">
                                    <a href="#">
                                        <h3>Business Planning</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="service-info">
                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned </p>
                                <a href="#">Read more <i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="service-hover">
                                <div class="service-hob-one"></div>
                                <div class="service-hob-two"></div>
                                <div class="service-hob-three"></div>
                                <div class="service-hob-four"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-service-item">
                            <div class="service-heading-icon">
                                <div class="service-icon">
                                    <i class="flaticon-search"></i>
                                </div>
                                <div class="service-heading">
                                    <a href="#">
                                        <h3>Market Research</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="service-info">
                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned </p>
                                <a href="#">Read more <i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="service-hover">
                                <div class="service-hob-one"></div>
                                <div class="service-hob-two"></div>
                                <div class="service-hob-three"></div>
                                <div class="service-hob-four"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-service-item">
                            <div class="service-heading-icon">
                                <div class="service-icon">
                                    <i class="flaticon-warning"></i>
                                </div>
                                <div class="service-heading">
                                    <a href="#">
                                        <h3>Risk Management</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="service-info">
                                <p>Coordinates for abs po oordinates for abs potioning the closest potioned </p>
                                <a href="#">Read more <i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="service-hover">
                                <div class="service-hob-one"></div>
                                <div class="service-hob-two"></div>
                                <div class="service-hob-three"></div>
                                <div class="service-hob-four"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{--<div class="col-md-4">--}}
                        {{--<div class="single-service-item">--}}
                            {{--<div class="service-heading-icon">--}}
                                {{--<div class="service-icon">--}}
                                    {{--<i class="flaticon-report"></i>--}}
                                {{--</div>--}}
                                {{--<div class="service-heading">--}}
                                    {{--<a href="#">--}}
                                        {{--<h3>Audit & Assurance</h3>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="service-info">--}}
                                {{--<p>Coordinates for abs po oordinates for abs potioning the closest potioned </p>--}}
                                {{--<a href="#">Read more <i class="fa fa-angle-right"></i></a>--}}
                            {{--</div>--}}
                            {{--<div class="service-hover">--}}
                                {{--<div class="service-hob-one"></div>--}}
                                {{--<div class="service-hob-two"></div>--}}
                                {{--<div class="service-hob-three"></div>--}}
                                {{--<div class="service-hob-four"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="single-service-item">--}}
                            {{--<div class="service-heading-icon">--}}
                                {{--<div class="service-icon">--}}
                                    {{--<i class="flaticon-calculator"></i>--}}
                                {{--</div>--}}
                                {{--<div class="service-heading">--}}
                                    {{--<a href="#">--}}
                                        {{--<h3>Tax Planning</h3>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="service-info">--}}
                                {{--<p>Coordinates for abs po oordinates for abs potioning the closest potioned </p>--}}
                                {{--<a href="#">Read more <i class="fa fa-angle-right"></i></a>--}}
                            {{--</div>--}}
                            {{--<div class="service-hover">--}}
                                {{--<div class="service-hob-one"></div>--}}
                                {{--<div class="service-hob-two"></div>--}}
                                {{--<div class="service-hob-three"></div>--}}
                                {{--<div class="service-hob-four"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="single-service-item">--}}
                            {{--<div class="service-heading-icon">--}}
                                {{--<div class="service-icon">--}}
                                    {{--<i class="flaticon-save-money"></i>--}}
                                {{--</div>--}}
                                {{--<div class="service-heading">--}}
                                    {{--<a href="#">--}}
                                        {{--<h3>Saving Solutions</h3>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="service-info">--}}
                                {{--<p>Coordinates for abs po oordinates for abs potioning the closest potioned </p>--}}
                                {{--<a href="#">Read more <i class="fa fa-angle-right"></i></a>--}}
                            {{--</div>--}}
                            {{--<div class="service-hover">--}}
                                {{--<div class="service-hob-one"></div>--}}
                                {{--<div class="service-hob-two"></div>--}}
                                {{--<div class="service-hob-three"></div>--}}
                                {{--<div class="service-hob-four"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </section>
        <!-- Service Area End -->
        <!-- Choose Us Area Start -->
        <section class="lesun-choose-us-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="choose-us-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="choose-wrap-heading">
                                        <h2>why you should choose us</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-choose-left">
                                        <div class="choose-icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <div class="choose-info">
                                            <h4>Awesome Stuff</h4>
                                            <p>GoalHack</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-choose-right">
                                        <div class="choose-icon">
                                            <i class="fa fa-cogs"></i>
                                        </div>
                                        <div class="choose-info">
                                            <h4>creative process</h4>
                                            <p>GoalHack</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-choose-left">
                                        <div class="choose-icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="choose-info">
                                            <h4>good planning</h4>
                                            <p>GoalHack</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-choose-right">
                                        <div class="choose-icon">
                                            <i class="fa fa-thumbs-up"></i>
                                        </div>
                                        <div class="choose-info">
                                            <h4>24/7 support</h4>
                                            <p>GoalHack</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Choose Us Area End -->
        <!-- Project Area Start -->
        <section class="lesun-project-area section_t_100 section_b_70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="lesun-site-heading">
                            <h4>our works</h4>
                            <h2>what we did</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="protfolio_content">
                        <div id="da-thumbs" class="da-thumbs">
                            <div class="project_row">
                                <div class="col-md-3 single_portfolio col-sm-6">
                                    <div class="project_list">
                                        <a href="{{ secure_asset("assets/frontend/images/project-1.jpg")}}" class="gallery-lightbox">
                                            <img src="{{ secure_asset("assets/frontend/images/project-1.jpg")}}" alt="portfolio 1" />
                                            <div class="project-overlay">
                                                <div class="project-overlay-inner">
                                                    <h3>Business Planning</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 single_portfolio col-sm-6">
                                    <div class="project_list">
                                        <a href="{{ secure_asset("assets/frontend/images/project-2.jpg")}}" class="gallery-lightbox">
                                            <img src="{{ secure_asset("assets/frontend/images/project-2.jpg")}}" alt="portfolio 1" />
                                            <div class="project-overlay">
                                                <div class="project-overlay-inner">
                                                    <h3>Progress Tracking</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 single_portfolio col-sm-6">
                                    <div class="project_list">
                                        <a href="{{ secure_asset("assets/frontend/images/project-3.jpg")}}" class="gallery-lightbox">
                                            <img src="{{ secure_asset("assets/frontend/images/project-3.jpg")}}" alt="portfolio 1" />
                                            <div class="project-overlay">
                                                <div class="project-overlay-inner">
                                                    <h3>Risk Management</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 single_portfolio col-sm-6">
                                    <div class="project_list">
                                        <a href="{{ secure_asset("assets/frontend/images/project-3.jpg")}}" class="gallery-lightbox">
                                            <img src="{{ secure_asset("assets/frontend/images/roadmap.jpeg")}}" alt="portfolio 1" />
                                            <div class="project-overlay">
                                                <div class="project-overlay-inner">
                                                    <h3>Road Map to Success</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Project Area End -->
        <!-- Counter Area Start -->
        <section class="lesun-counter-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="counter-text">
                            <h3>We are served since 2 years to our customer with trust and we are happy</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter">
                            <div class="counter-icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="counter-info">
                                <h3 class="counter">2200</h3>
                                <p>global locations</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter">
                            <div class="counter-icon">
                                <i class="fa fa-heartbeat"></i>
                            </div>
                            <div class="counter-info">
                                <h3 class="counter">1350</h3>
                                <p>happy customer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter">
                            <div class="counter-icon">
                                <i class="fa fa-commenting"></i>
                            </div>
                            <div class="counter-info">
                                <h3 class="counter">720</h3>
                                <p>consultants</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-counter">
                            <div class="counter-icon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            <div class="counter-info">
                                <h3 class="counter">1500</h3>
                                <p>Our Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Counter Area End -->
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
                                    <img src="{{ secure_asset("assets/frontend/images/agnt1.jpg")}}" alt="team 1" />
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
                                    <img src="{{ secure_asset("assets/frontend/images/agnt3.jpg")}}" alt="team 1" />
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
                                    <img src="{{ secure_asset("assets/frontend/images/agnt2.jpg")}}" alt="team 1" />
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
                                    <img src="{{ secure_asset("assets/frontend/images/agnt4.jpg")}}" alt="team 1" />
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
                                    <img src="{{ secure_asset("assets/frontend/images/agnt1.jpg")}}" alt="team 1" />
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
        <!-- Faqs Testimonial Area Start -->
        <section class="lesun-faqs-testimonial-area section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="lesun-site-heading-primary">
                            <h4>Testimonial</h4>
                            <h2>client's reviews</h2>
                        </div>
                        <div class="testimonial-slide">
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p>"GoalHack is a great choice for us as a start-up as it helps us to focus on our goals and keep track of relevant indicators of our business. The usability is great and intuitive."</p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="{{ secure_asset("assets/frontend/images/testimonial-1.jpg")}}" alt="testimonial 1" />
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h3>Jhon Smith</h3>
                                        <p>Head of Marketing & Communicatio, BPS Consulting AG</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p>"GoalHack helps us to manage our client projects efficiently and with an extra twist of transparency. That is a great value for us and our clients to see the value and progress of our work."</p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="{{ secure_asset("assets/frontend/images/agnt3.jpg")}}" alt="testimonial 1" />
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h3>Daniel Riljic</h3>
                                        <p>CEO & Co-Founder, MICEview</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p>"GoalHack is a valuable partner for us. The team at GoalHack really understands our wishes and fulfils them with willingness and excellent know-how. Thanks to the work with GoalHack we can measure our strategies and progress with ease."</p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="{{ secure_asset("assets/frontend/images/agnt1.jpg")}}" alt="testimonial 1" />
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h3>Dr. Alexander Bradel</h3>
                                        <p>Director Information Services, s.Oliver</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 margin-top">
                        <div class="lesun-site-heading-primary">
                            <h4>FAQs</h4>
                            <h2>Fequently asked question</h2>
                        </div>
                        <div class="faqs-section">
                            <div class="panel-group accordion"  id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title finance-panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse02" aria-expanded="false">
                                                <i class="switch fa fa-plus"></i>
                                                1. What are the benefits of GoalHack for employees?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse02">
                                        <div class="panel-body">For team members and employees, some of the benefits include:
                                            <ol>
                                                <li>i. Doing more by doing less;</li>
                                                <li>ii. Being heard by your leader;</li>
                                                <li>iii.Getting praise and hearing from your co-workers;</li>
                                                <li>iv.Having a lightweight task manager for big goals and weekly objectives.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title finance-panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse03" aria-expanded="false">
                                                <i class="switch fa fa-plus"></i>
                                                2. What are common mistakes made when using GoalHack?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse03">
                                        <div class="panel-body">One of the main problems with any sort of goal setting technique is that after a lot of effort has been put into designing and shaping goals, people forget them and only remember them when they are due. GoalHack methodology addresses this problem with constant monitoring. The progress toward goals should be measured weekly or daily basis to see how much has been done. If a week has passed and you’ve got no progress, there is a problem that should be addressed by the team leader and the person responsible for the goal.</div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title finance-panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse04" aria-expanded="false">
                                                <i class="switch fa fa-plus"></i>
                                                3. How should GoalHack be reviewed and graded?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse04">
                                        <div class="panel-body">With GoalHack, it’s important to set them high enough that 100% is uncommon. Getting 100% should be a near-impossible feat that only a few teams accomplish. GoalHack should be reviewed weekly or daily to avoid discovering that you have no results at the end of the quarter.</div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title finance-panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse05" aria-expanded="false">
                                                <i class="switch fa fa-plus"></i>
                                                4. What is important to look for in an GoalHack tracking platform?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse05">
                                        <div class="panel-body">Once you’ve decided that tracking and measuring vision will be critical to your organization’s performance management process, it is important to find the right medium to conduct these processes. While many companies start off using Google docs for this purpose, they soon outgrow spreadsheets and need a platform that manages and stores past data. Here is what to keep an eye out for when selecting the right GoalHack tracking system for you</div>
                                    </div>
                                </div>
                                {{--<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title finance-panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse07" aria-expanded="false">
                                                <i class="switch fa fa-plus"></i>
                                                5. How Do I Back Up My Database?
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse07">
                                        <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Faqs Testimonial Area End -->
        <!-- Subscribe Area Start -->
        <section class="lesun-subscribe-area section_50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="subscribe-box">
                            <h3>Subscribe Our Newsletter</h3>
                            <p>Sign up today for hints, tips and the latest product news.</p>
                            <div class="subscribe-right">
                                <form>
                                    <input type="email" placeholder="Enter Email Address">
                                    <button type="submit" >Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Subscribe Area End -->
    @endsection