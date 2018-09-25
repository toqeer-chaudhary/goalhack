
<!DOCTYPE html>
<html lang="en">

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">

    {{--following yield is for the title--}}
    <title>@yield("title")</title>

    {{--includig all required files for css--}}
    @include("includes.backend.style-files")

</head>
<!-- END HEAD -->

<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-info ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->

<!-- BEGIN HEADER -->
<nav class="navbar ks-navbar" style="background: #25628f;">
    <!-- BEGIN HEADER INNER -->
    <!-- BEGIN LOGO -->
    <div href="index.html" class="navbar-brand">
        <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
        <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <!-- END RESPONSIVE SIDEBAR TOGGLER -->

        <div class="ks-navbar-logo">
            {{--following yield is for the page heading on top left side--}}
            <span class="ks-logo">@yield("page-title")</span>
        </div>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN MENUS -->
    <div class="ks-wrapper">
        <nav class="nav navbar-nav">
            <!-- BEGIN NAVBAR ACTIONS -->
            <div class="ks-navbar-menu">
                {{--the following yield is for nav bar links--}}
                @yield("navigation-links")
            </div>

            <!-- BEGIN NAVBAR USER -->
            <div class="ks-navbar-actions">
                {{--this yield is for the notficiations on goal data user;s action bar--}}
                @yield("notifications")
                {{--the following yield is for the right nav items--}}
                @include("includes.backend.user-profile")
            </div>
            <!-- END NAVBAR USER -->

        </nav>

        <!-- BEGIN NAVBAR ACTIONS TOGGLER -->
        <nav class="nav navbar-nav ks-navbar-actions-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-ellipsis-h ks-icon ks-open"></span>
                <span class="la la-close ks-icon ks-close"></span>
            </a>
        </nav>
        <!-- END NAVBAR ACTIONS TOGGLER -->

        <!-- BEGIN NAVBAR MENU TOGGLER -->
        <nav class="nav navbar-nav ks-navbar-menu-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-th ks-icon ks-open"></span>
                <span class="la la-close ks-icon ks-close"></span>
            </a>
        </nav>
        <!-- END NAVBAR MENU TOGGLER -->
    </div>
    <!-- END MENUS -->
    <!-- END HEADER INNER -->

</nav>
<!-- END HEADER -->


<div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs">

    <!-- BEGIN DEFAULT SIDEBAR -->
    <div class="ks-column ks-sidebar ks-primary">
        <div class="ks-wrapper ks-sidebar-wrapper">
            <ul class="nav nav-pills nav-stacked">
                {{--the following yield is for the side bar tabs--}}
               @yield("sidebar-tabs")
            </ul>
        </div>
    </div>
    <!-- END DEFAULT SIDEBAR -->

    {{--the following yield is for the main area of the page--}}
    <div class="ks-column ks-page">
        {{--for the header section of the page before main container--}}
        <div class="ks-page-header">
            <br>
            <div class="row">
                @yield("page-header")
            </div>
        </div>
        {{--for the main container of the page--}}
        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="ks-nav-body-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            @yield("main-container")
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{--includig all required files for css--}}
@include("includes.backend.script-files")

</body>
</html>