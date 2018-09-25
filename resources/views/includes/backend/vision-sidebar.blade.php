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
    <a class="nav-link" href="{{ route("level.index") }}">
        <span class="ks-icon la la-level-up"></span>
        <span>Levels</span>
    </a>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"  href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="ks-icon la la-list-alt"></span>
        <span>Permission</span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route("resource.index")}}">Create Resources</a>
        <a class="dropdown-item" href="{{route("permission.index")}}">Assign Permission</a>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("vision.index") }}">
        <span class="ks-icon la la-bar-chart"></span>
        <span>Vision</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("assign.vision.view") }}" >
        <span class="ks-icon la la-group" ></span>
        <span>Assign Vision</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("user.index") }}" >
        <span class="ks-icon la la-user" ></span>
        <span>Create Users</span>
    </a>
</li>

{{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="{{ route("payment") }}" >--}}
        {{--<span class="ks-icon la la-dollar" ></span>--}}
        {{--<span>Payment</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="" >--}}
        {{--<span class="ks-icon la la-user-plus" ></span>--}}
        {{--<span>Create Admin</span>--}}
    {{--</a>--}}
{{--</li>--}}
<li class="nav-item">
    <a class="nav-link" href="{{ route("invoices") }}">
        <span class="ks-icon la la-cc-visa"></span>
        <span>Account Book</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route("vision.dashboard") }}">
        <span class="ks-icon la la-dashboard"></span>
        <span>Dashboard</span>
    </a>
</li>
