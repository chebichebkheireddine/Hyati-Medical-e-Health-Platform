@props(['users', 'organization', 'wilaya', 'roles', 'permissions', 'userNoActive'])
<div class="row">
    <div class="col-12">
        <x-admin.users.manager :users="$users" :organization="$organization" :wilaya="$wilaya" :roles="$roles"
            :permissions="$permissions">
        </x-admin.users.manager>
        {{-- :baldya="$baldya" --}}

    </div>

    <div class="row">
        <div class="col-7">
            <div class="card ">
                <div class="card-body   rounded-xl ">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                            <h2 class="card-title fw-semibold mb-4 ">Registration Waiting List</h2>
                        </div>
                    </div>
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                        style="max-height: 300px; overflow-y: auto;">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                                Users
                                            </th>


                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                                Organization
                                            </th>

                                            <th scope="col" class="relative py-2 px-1">
                                                Actions </th>
                                        </tr>
                                    </thead>
                                    <div style="max-height: 300px; overflow-y: auto;">
                                        <tbody>

                                            @foreach ($userNoActive as $user)
                                                <tr>

                                                    <td
                                                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                        <div class="flex items-center gap-x-2">
                                                            <img class="object-cover w-16 h-16 rounded-full"
                                                                src="data:image/png;base64,{{ $user->picture }}"
                                                                alt="">
                                                            <div>
                                                                <h1 class="text-sm font-medium text-gray-800  ">
                                                                    {{ $user->firstName }} {{ $user->lastName }}
                                                                </h1>
                                                                <h2 class="text-xs font-normal text-gray-600 ">
                                                                    {{ $user->email }}</h2>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap flex flex-col">
                                                        {{ $user->organization->org_name }}
                                                    </td>
                                                    <td class="px-2 py-2 text-sm whitespace-nowrap">
                                                        <div class="flex items-center gap-x-6">
                                                            @can('delete-admin')
                                                                <form method="post"
                                                                    action="{{ route('admin.users.delete', ['user' => $user->sysId]) }}">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button
                                                                        class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">
                                                                        <i class="fa fa-user-xmark text-white"></i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                            @can('accept-admin')
                                                                <form method="post"
                                                                    action="{{ route('admin.users.accept', ['user' => $user->sysId]) }}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button
                                                                        class="rounded bg-green-400 py-1 px-2 text-white hover:text-sky-400 pl-4">
                                                                        <i class="fa-solid fa-check text-white"></i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
