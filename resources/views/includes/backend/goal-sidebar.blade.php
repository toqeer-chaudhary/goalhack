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
    <a class="nav-link" href="{{ route("goal.index") }}">
        <span class="ks-icon la la-bar-chart"></span>
        <span>Goal</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("assign.goal.view") }}" >
        <span class="ks-icon la la-group" ></span>
        <span>Assign Goal</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("goal.details") }}" >
        <span class="ks-icon la la-user" ></span>
        <span>Goal Details</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link d-goals-dashboard" href="{{ route("goal.dashboard") }}">
        <span class="ks-icon la la-dashboard"></span>
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route("block.user")}}" >
        <span class="ks-icon la la-ban" ></span>
        <span>Block User</span>
    </a>
</li>
