@include('layout.app')

<!-- Sidebar Start -->
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
            <x-.admin.body></x-.admin.body>
        @endif

    </div>
</div>
</div>
@include('layout.footer')
