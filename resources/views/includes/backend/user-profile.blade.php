<div class="nav-item dropdown ks-user">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                 <span class="ks-avatar">
                     <img src="{{asset("assets/backend/images/users/".Auth::user()->image)}}" width="36" height="36">
                 </span>
        <span class="ks-info">
                     <span class="ks-name">{{ Auth::user()->name }}</span>
                    {{--<span class="ks-description">Premium User</span>--}}
                </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
        <a class="dropdown-item" href="{{ route("user.edit",Auth::id()) }}">
            <span class="la la-user ks-icon"></span>
            <span>Profile</span>
        </a>
        {{--the billing link will only be shown to the persone who create vison--}}
        @if(Request::is("vision"))
            <a class="dropdown-item" href="#">
                <span class="la la-dollar ks-icon" aria-hidden="true"></span>
                <span>Billing</span>
            </a>
        @endif
        <a class="dropdown-item" href="{{url('logout')}}">
            <span class="la la-sign-out ks-icon" aria-hidden="true"></span>
            <span>Logout</span>
        </a>
    </div>
</div>