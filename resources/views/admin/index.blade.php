{{-- @props(['tag_item']) --}}
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
                <x-admin.body>

                </x-admin.body>
            @elseif (Route::currentRouteName() == 'admin.config.index')
                <x-admin.config :wilaya="$wilaya" :typeOrg="$typeOrg">
                </x-admin.config>
            @elseif (Route::currentRouteName() == 'admin.doctor.index')
                <x-admin.doctor.index :specializations="$specializations" :doctors="$doctors">
                </x-admin.doctor.index>
            @elseif (Route::currentRouteName() == 'admin.users.index')
                <x-admin.users.index :users="$users" :organization="$organization" :wilaya="$wilaya"
                    :roles="$roles"></x-admin.users.index>
                {{-- This is for confige --}}
            @elseif (Route::currentRouteName() == 'admin.config.permmistion.index')
                <x-admin.permmistion.index :permissions="$permissions" :roles="$roles">
                </x-admin.permmistion.index>
            @endif
        </div>
    </div>
    <x-slot name="tag_item">

        @foreach ($tag as $item)
            new MultiSelectTag('specializationedit{{ $item->id }}')
        @endforeach
    </x-slot>

</x-layout.app>
