<x-layout.app>
    <x-nav.slide-bar>

    </x-nav.slide-bar>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <x-nav.nav-bar>
            </x-nav.nav-bar>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
            @if (Route::currentRouteName() == 'Dashboard')
                {{-- <x-.admin.body></x-.admin.body> --}}
                @include("components.admin.body")
            @elseif (Route::currentRouteName() == 'control')
                {{-- <x-admin.control></x-admin.control> --}}
                @include("components.admin.control")
            @elseif (Route::currentRouteName() == 'admin.doctor.create')
                {{-- <x-admin.doctor.index></x-admin.doctor.index> --}}
                @include("components.admin.doctor.index")
            @endif
        </div>
    </div>

</x-layout.app>
