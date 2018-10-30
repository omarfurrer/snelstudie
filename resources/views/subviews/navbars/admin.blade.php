<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/admin/dashboard">
        <h3 class="navbar-brand-full m-0">{{ config('app.name', 'Laravel') }}</h3>
        <h3 class="navbar-brand-minimized m-0">{{ config('app.name', 'Laravel')[0] }}</h3>
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
        <!--        <li class="nav-item px-3">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>-->
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{ Auth::user()->gravatar }}" alt="{{ Auth::user()->email }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item disabled" href="#">
                    <i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</header>