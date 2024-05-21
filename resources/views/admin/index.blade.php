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
                <x-admin.config :users="$users" :wilaya="$wilaya" :typeOrg="$typeOrg">
                </x-admin.config>
            @elseif (Route::currentRouteName() == 'admin.doctor.index')
                <x-admin.doctor.index :users="$users" :specializations="$specializations" :doctors="$doctors" :wilaya="$wilaya"
                    :organization="$organization">
                </x-admin.doctor.index>
            @elseif (Route::currentRouteName() == 'admin.healthcare.index')
                {{--  --}}
                <x-admin.index-healthcare></x-admin.index-healthcare>
            @elseif (Route::currentRouteName() == 'admin.doctor.index.config')
                <x-admin.doctor.doctor-config :specializations="$specializations">
                </x-admin.doctor.doctor-config>
            @elseif (Route::currentRouteName() == 'admin.users.index')
                <x-admin.users.index :users="$users" :organization="$organization" :roles="$roles" :wilaya="$wilaya"
                    :permissions="$permissions"></x-admin.users.index>
                {{-- This is for confige --}}
            @elseif (Route::currentRouteName() == 'admin.config.permmistion.index')
                <x-admin.permmistion.index :permissions="$permissions" :roles="$roles" :wilaya="$wilaya">
                </x-admin.permmistion.index>
            @elseif (Route::currentRouteName() == 'admin.patients.index')
                <x-admin.patient.index :users="$users" :wilaya="$wilaya">
                </x-admin.patient.index>
            @endif
        </div>
    </div>
    <x-slot name="tagitem">
        @foreach ($tag as $item)
            new MultiSelectTag('specializationedit{{ $item->sysId }}')
        @endforeach
    </x-slot>
    <x-slot name="tag_permission">

        @foreach ($permissions as $itemp)
            new MultiSelectTag('permissionedit{{ $itemp->id }}')
        @endforeach
    </x-slot>
    <x-slot name="itemPermission">
        @foreach ($users as $itemp)
            new MultiSelectTag('permissionAdd{{ $itemp->sysId }}')
        @endforeach
    </x-slot>

</x-layout.app>
