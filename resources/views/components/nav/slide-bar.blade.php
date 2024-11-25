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
                    <li class="sidebar-item" x-data="{ open: false }">
                        <a class="sidebar-link" href="#" @click.prevent="open = !open">
                            <span>
                                <i class="fa-solid fa-gears"></i>
                            </span>
                            <span class="hide-menu">Configuration</span>
                        </a>
                        <ul x-show="open" class="transition-all ease-in-out duration-300">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.config.permmistion.index') }}">
                                    <i class="fa-solid fa-user"></i> Role and Permission
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.config.index') }}">
                                    <i class="fa-solid fa-cog"></i> General Configuration
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li class="sidebar-item" x-data="{ open: false }">
                    <a class="sidebar-link" href="#" @click.prevent="open = !open">
                        <span>
                            <i class="fa-solid fa-people-roof"></i>
                        </span>
                        <span class="hide-menu">Healthcare Management</span>
                    </a>
                    <ul x-show="open" class="transition-all ease-in-out duration-300">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.healthcare.index') }}">
                                <span class="hide-menu">Healthcare list</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.doctor.index') }}">
                                <span>
                                    <i class="fa-solid fa-user-doctor"></i>
                                </span>
                                <span class="hide-menu">Doctor</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.doctor.index.config') }}">
                                <span>
                                    <i class="fa-solid fa-gears"></i>
                                </span>
                                <span class="hide-menu">Doctor Configuration</span>
                            </a>
                        </li>
                    </ul>
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
