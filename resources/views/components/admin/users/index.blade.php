ogra@props(['users', 'organization', 'wilaya', 'roles'])
<div class="row">
    <div class="col-12">
        <x-admin.users.manager :users="$users" :organization="$organization" :wilaya="$wilaya" :roles="$roles">
        </x-admin.users.manager>
        {{-- :baldya="$baldya" --}}

    </div>

    <div class="row">
        <div class="col-7">
            <div class="card ">
                <div class="card-body   rounded-xl ">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                            <h2 class="card-title fw-semibold mb-4 ">Healthe Provider Roles</h2>
                            <p class=" mb-3">This Page for Add user in health care provider</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
