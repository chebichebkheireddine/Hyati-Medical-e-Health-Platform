<aside class=" left-sidebar  border-t-0 border-bottom border-solid">
    <!-- Sidebar scroll-->
    <div class="bg-blue-50">
        @include('layout.logo')
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                @can('create-admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Panel Control</span>
                    </li>
                    <li
                        class="sidebar-item {{ Route::currentRouteName() == 'admin.config.permmistion.index' ? 'selected' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.config.index') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-gears"></i> </span>
                            <span class="hide-menu">Configaration</span>
                        </a>
                    </li>
                @endcan

                <li class="sidebar-item {{ Route::currentRouteName() == 'admin.doctor.index' ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.healthcare.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-people-roof"></i>
                        </span>
                        <span class="hide-menu"> Healthcare Mangement</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link"
                        aria-expanded="false"><!-- a href begin -->

                        <span>
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="hide-menu"> Users Manengement</span>
                    </a>

                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.patients.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-stethoscope"></i>
                        </span>
                        <span class="hide-menu">Patient Manengement</span>
                    </a>
                </li>


        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
