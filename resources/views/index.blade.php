@include('layout.app')

<!-- Sidebar Start -->
<x-slide-bar>
</x-slide-bar>
<!--  Sidebar End -->
<!--  Main wrapper -->
<div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header">
        <x-nav-bar>
        </x-nav-bar>
    </header>
    <!--  Header End -->
    <div class="container-fluid">
        @if (Route::currentRouteName() == 'index-test')
            <x-content></x-content>
        @elseif (Route::currentRouteName() == 'doctor')
            <x-doctor></x-doctor>
        @endif

    </div>
</div>
</div>
@include('layout.footer')
