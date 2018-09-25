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
    <a class="nav-link" href="" >
        <span class="ks-icon la la-sticky-note" ></span>
        <span>Packages</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="">
        <span class="ks-icon la la-dashboard"></span>
        <span>Dashboard</span>
    </a>
</li>
