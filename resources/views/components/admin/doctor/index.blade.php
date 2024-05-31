@props(['specializations', 'doctors', 'wilaya', 'organization', 'users', 'doctorNotActive'])
<div class="row">
    <div class="col-md-12">
        <x-admin.doctor.doctor-add :users="$users" :specializations="$specializations" :doctors="$doctors" :wilaya="$wilaya"
            :organization="$organization">
        </x-admin.doctor.doctor-add>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Doctor Registration Waiting List</h2>
                <div class="flex flex-wrap items-center">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                        style="max-height: 300px; overflow-y: auto;">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                                Doctor
                                            </th>

                                            <th scope="col" class="relative py-2 px-1">
                                                Actions </th>
                                        </tr>
                                    </thead>
                                    <div style="max-height: 300px; overflow-y: auto;">
                                        <tbody>
                                            @foreach ($doctorNotActive as $doctor)
                                                <tr>

                                                    <td
                                                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                        <div class="flex items-center gap-x-2">
                                                            <img class="object-cover w-16 h-16 rounded-full"
                                                                src="data:image/png;base64,{{ $doctor->picture }}"
                                                                alt="">
                                                            <div>
                                                                <h1 class="text-sm font-medium text-gray-800  ">
                                                                    {{ $doctor->firstName }} {{ $doctor->firstName }}
                                                                </h1>
                                                                <h2 class="text-xs font-normal text-gray-600 ">
                                                                    {{ $doctor->email }}</h2>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-2 py-2 text-sm whitespace-nowrap">
                                                        <div class="flex items-center gap-x-6">
                                                            @can('delete-doctor')
                                                                <form method="post"
                                                                    action="{{ route('admin.doctor.delete', ['doctor' => $doctor->sysId]) }}">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button
                                                                        class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                                                </form>
                                                            @endcan
                                                            @can('accept-admin')
                                                                <form method="post"
                                                                    action="{{ route('admin.doctor.accept', ['doctor' => $doctor->sysId]) }}">
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
