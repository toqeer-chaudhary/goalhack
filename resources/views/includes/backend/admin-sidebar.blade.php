<li class="nav-item ks-user dropdown">
    <a class="nav-link"  href="#">
        <img src="{{secure_asset("assets/backend/images/users/".Auth::user()->image)}}"
             width="36" height="36" class="ks-avatar rounded-circle">
        <div class="ks-info">
            <div class="ks-name">{{ Auth::user()->name }}</div>
            <div class="ks-text">{{ Auth::user()->designation }}</div>
        </div>
    </a>
</li>

<li class="nav-item dropdown">
    <a class="nav-link"  href="{{ URL::previous()  }}" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="ks-icon la la-backward"></span>
        <span>Go Back</span>
    </a>
</li>

{{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="">--}}
        {{--<span class="ks-icon la la-user"></span>--}}
        {{--<span>Users</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="">--}}
        {{--<span class="ks-icon la la-level-up"></span>--}}
        {{--<span>Level</span>--}}
    {{--</a>--}}
{{--</li>--}}
