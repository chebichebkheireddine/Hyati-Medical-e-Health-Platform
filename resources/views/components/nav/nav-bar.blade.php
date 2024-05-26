<nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link nav-icon-hover " href="{{ route('admin.chat.index') }}">
                <i class="ti ti-mail "></i>
                <div class="notification bg-primary rounded-circle">
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
            </a>
        </li>

    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item">
                <span class="nav-link nav-icon-hover">Welcome,{{ auth()->user()->firstName }}</span>
            </li>
            <li class="nav-item dropdown">
                <x-nav.admin.link-drop-down-admin></x-nav.admin.link-drop-down-admin>
                <x-nav.admin.drop-down-admin></x-nav.admin.drop-down-admin>
            </li>

        </ul>
    </div>
</nav>
