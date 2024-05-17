{{-- @props(['tag_item']) --}}
<x-layout.app>
    <x-nav.doctor.slide-bar-d>

    </x-nav.doctor.slide-bar-d>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->

        <header class="app-header">
            <x-nav.doctor.nav-bar-d>
            </x-nav.doctor.nav-bar-d>
        </header>

        <!--  Header End -->
        <div class="container-fluid">
            @if (Route::currentRouteName() == 'heathcar.doctor.index')
                <x-doctor.index>

                </x-doctor.index>
            @endif
        </div>
    </div>
</x-layout.app>
