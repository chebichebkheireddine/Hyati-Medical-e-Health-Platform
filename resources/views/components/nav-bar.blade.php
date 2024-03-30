<nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="javascript:void(5)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-mail fs-6"></i>
                <div class="notification bg-primary rounded-circle"></div>
            </a>
        </li>

    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item">
                <span class="nav-link nav-icon-hover">Welcome,{{ auth()->user()->name }}</span>
            </li>

            <li class="nav-item  dropdown ">
                <a class="nav-link nav-icon-hover " href="#" id="drop3" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <button type="button" class="btn btn-outline-primary btn-sm m-1">
                        <i class="ti ti-user fs-6 "></i>
                    </button>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop3">
                    <div class="message-body">
                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                            <i class="ti ti-user fs-6"></i>
                            <p class="mb-0 fs-3">Add new one </p>
                        </a>
                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                            <i class="ti ti-mail fs-6"></i>
                            <p class="mb-0 fs-3">Test </p>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <x-linkdropdownAdmin></x-linkdropdownAdmin>
                <x-dropDownAdmin></x-dropDownAdmin>
            </li>

        </ul>
    </div>
</nav>
