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
                @can('create-admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.control') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-user-doctor"></i>
                            </span>
                            <span class="hide-menu"> Permission & Roles </span>
                        </a>
                    </li>
                @endcan
                @can('create-doctor')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.doctor.index') }}" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-user-doctor"></i>
                            </span>
                            <span class="hide-menu">Doctors Information</span>
                        </a>
                    </li>
                @endcan


        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
