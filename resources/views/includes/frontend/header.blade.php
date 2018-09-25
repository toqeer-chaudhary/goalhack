<!-- Header Area Start -->
<header class="lesun-header-area">
    <div class="lesun-header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="header-top-left">
                        <p><i class="fa fa-map-marker"></i> 57 - Lawrence Road, Lahore</p>
                        <p><i class="fa fa-phone"></i> +92 (42) 111 880 880 </p>
                        <p><i class="fa fa-clock-o"></i> Mon-Sat 9.00am - 7.00pm</p>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5">
                    <div class="header-top-right">
                        <div class="header-search-box">
                            <div class="search-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="search-form">
                                <form>
                                    <input type="search" placeholder="Search" />
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <ul class="header-top-social">
                            <li><a href="#" class="header_fb"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="header_twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="header_google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="header_linkdin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="header_insta"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lesun-main-header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="site-logo">
                        <a href={{url('index')}}>
                            <img size="32x32" src="{{ asset("assets/frontend/images/goalHack-logo.png") }}" alt="site logo" />
                        </a>
                    </div>
                    <!-- Responsive Menu Start -->
                    <div class="lesun-responsive-menu"></div>
                    <!-- Responsive Menu Start -->
                </div>
                <div class="col-md-7">
                    <div class="mainmenu">
                        <nav>
                            @if (Route::has('login'))
                            <ul id="lesun_navigation">
                                <li class="nav-item {{ Request::is("index") ? "current-page-item" : "" }}"><a href={{url('home')}}>home</a></li>
                                <li class="nav-item {{ Request::is("about") ? "current-page-item" : "" }}"><a href={{url('about')}}>about</a></li>
                                <li class="nav-item {{ Request::is("plans") ? "current-page-item" : "" }}"><a href={{url('plans')}}>Plans</a>
                                <li class="nav-item {{ Request::is("contact") ? "current-page-item" : "" }}"><a href={{url('contact')}}>contact</a></li>
                                @auth
                                    <li class="nav-item {{ Request::is("logout") ? "current-page-item" : "" }}"><a href={{url('logout')}} id="logout" class="float-right">Logout</a></li>
                                @else
                                    <li class="nav-item {{ Request::is("login") ? "current-page-item" : "" }}"><a href={{url('logout')}} id="login" class="float-right">Login</a></li>
                                @endauth
                            @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->