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
            @if (Route::currentRouteName() == 'admin.dashboard')
                <x-.admin.body></x-.admin.body>
            @elseif (Route::currentRouteName() == 'admin.config')
                <x-admin.config></x-admin.config>
            @elseif (Route::currentRouteName() == 'admin.doctor.index')
                {{-- You must pass to any parameter to do it with simple --}}
                <x-admin.doctor.index :specializations="$specializations" :doctors="$doctors">

                </x-admin.doctor.index>
            @endif
        </div>
    </div>

</x-layout.app>
