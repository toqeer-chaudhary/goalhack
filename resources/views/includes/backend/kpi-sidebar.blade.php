<li class="nav-item ks-user dropdown">
    <a class="nav-link"  href="#">
        <img src="{{asset("assets/backend/images/users/".Auth::user()->image)}}"
             width="36" height="36" class="ks-avatar rounded-circle">
        <div class="ks-info">
            <div class="ks-name">{{ Auth::user()->name }}</div>
            <div class="ks-text">{{ Auth::user()->designation }}</div>
        </div>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("kpi.index") }}">
        <span class="ks-icon la la-bar-chart"></span>
        <span>KPI</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("assign.kpi.view") }}" >
        <span class="ks-icon la la-group" ></span>
        <span>Assign KPI</span>
    </a>
</li>

{{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="" >--}}
        {{--<span class="ks-icon la la-user" ></span>--}}
        {{--<span>Goal Users</span>--}}
    {{--</a>--}}
{{--</li>--}}

<li class="nav-item">
    <a class="nav-link" href="{{ route("kpi.dashboard") }}">
        <span class="ks-icon la la-dashboard"></span>
        <span>Dashboard</span>
    </a>
</li>
