    {{--this file is for the sidebar-tabs and it is dynamic--}}

<li class="nav-item ks-user dropdown">
    <a class="nav-link"  href="#">
        <img src="{{asset("assets/backend/images/avatars/avatar-12.jpg")}}"
             width="36" height="36" class="ks-avatar rounded-circle">
        <div class="ks-info">

            {{--the follwoing yield is for the user name--}}
            <div class="ks-name">@yield("user-name")</div>

            {{--the follwoing yield is for the user desgination--}}
            <div class="ks-text">@yield("user-designation")</div>
        </div>
    </a>
</li>

    {{--This link will be shown to the vision page which our level 1 user--}}
    @if(Request::is("strategy") or Request::is("level") )
        <li class="nav-item">
            <a class="nav-link" href="{{ route("level") }}">
                <span class="ks-icon la la-level-up"></span>
                <span>Levels</span>
            </a>
        </li>
    @endif

<li class="nav-item">
    {{-- this yield is for dynamic page link i.e for vision its vision for kpi its kpi and so on--}}
    <a class="nav-link" href="@yield("page-title-link")">
        <span class="ks-icon la la-bar-chart"></span>

        {{--this page title yield is also using in layout changing in one yield will cause
        change in both places one in the nav bar and one in sidebar-tab --}}
        <span>@yield("page-title")</span>
    </a>
</li>

<li class="nav-item">
    {{-- this yield is for dynamic user page link i.e level 2 , 3--}}
    <a class="nav-link" href="@yield("users-page-link")" >
        <span class="ks-icon la la-user" ></span>
        {{--this yield is for the user type in case of vision it strategy , kpi its goal etc--}}
        <span>@yield("user-type") Users</span>
    </a>
</li>

    {{-- this if condition will check if the requested url is not equal to goal-data
    then it will not display this <li> tag--}}
@if(!(Request::is("goal-data")))
    <li class="nav-item">
        <a class="nav-link" href="@yield("assign-page-link")">

            {{-- this yield is for dynamic assign  page link it's different for  all--}}
            <span class="ks-icon la la-user-plus"></span>

            {{--this page title yield is also using in layout changing in one yield will cause
          change in both places one in the nav bar and one in sidebar-tab --}}
            <span>Assign @yield("page-title")</span>
        </a>
    </li>
@endif

<li class="nav-item">
    <a class="nav-link" href="@yield("dashboard-page-link")">

        {{-- this yield is for dynamic dashboard page link it's different for  all--}}
        <span class="ks-icon la la-dashboard"></span>
        <span>Dashboard</span>
    </a>
</li>

    {{--this yield is for the dynamic purpose if we want to create another <li> we can get benifit
    from it--}}
@yield("additional-sidebar-tabs")