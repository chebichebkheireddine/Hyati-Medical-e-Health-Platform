@props(['users', 'wilaya', 'organization', 'roles'])
<div class="card">
    <div class="card-body rounded-xl ">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                <h2 class="card-title fw-semibold mb-4 ">Users Information </h2>
                <p class=" mb-3">This Page for Add users To the system</p>
            </div>
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                @can('create-admin')
                    <x-form.model name="Add user" id="UserID1" size="modal-xl">

                        <x-slot name="button">
                            <i class="ti ti-user fs-6">Add User</i>
                        </x-slot>

                        <form method="POST" action="{{ route('admin.users.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="ogranization" />
                                            <select name="orgId" id="org" class="form-select">

                                                @foreach ($organization as $org)
                                                    <option value="{{ $org->org_id }}">
                                                        {{ $org->org_name }}</option>
                                                @endforeach

                                            </select>
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="national ID" />
                                            <x-form.input name="nationalID" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="First name" />
                                            <x-form.input name="firstName" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="Last name" />
                                            <x-form.input name="lastname" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    @can('create-admin')
                                        <x-form.modal-body>
                                            <x-form.panel class="mb-1">
                                                <x-form.label name="Role" />
                                                <select name="role" id="role" class="form-select">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">
                                                            {{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </x-form.panel>
                                        </x-form.modal-body>
                                    @endcan

                                </div>
                                <div class="col-md-4">
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="User name" />
                                            <x-form.input name="username" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="wilaya" />
                                            <select name="wilayaId" id="SelectW"class="form-select">

                                                @foreach ($wilaya as $item1)
                                                    <option value="{{ $item1->id }}">
                                                        {{ $item1->name }}</option>
                                                @endforeach
                                            </select>
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="baldya" />
                                            <select name="baldyaid" id="SelectBaldya" class="form-select">

                                            </select>
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="email" />
                                            <x-form.input name="email" type="email" />
                                        </x-form.panel>
                                    </x-form.modal-body>

                                </div>
                                <div class="col-md-4">
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="Phon Number" />
                                            <x-form.input name="phone" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="address" />
                                            <x-form.input name="address" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="password" />
                                            <x-form.input name="password" type="password" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel class="mb-1">
                                            <x-form.label name="Picture" />
                                            <x-form.input name="picture" type="file" />
                                        </x-form.panel>
                                    </x-form.modal-body>

                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add</button>
                            </div>
                        </form>



                    </x-form.model>
                @endcan
            </div>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8" style="max-height: 300px; overflow-y: auto;">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                    Users
                                </th>


                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                    Organization
                                </th>

                                <th scope="col" class="relative py-2 px-1">
                                    Actions </th>
                            </tr>
                        </thead>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>

                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                <img class="object-cover w-16 h-16 rounded-full"
                                                    src="data:image/png;base64,{{ $user->picture }}" alt="">
                                                <div>
                                                    <h1 class="text-sm font-medium text-gray-800  ">
                                                        {{ $user->firstName }} {{ $user->lastName }}</h1>
                                                    <h2 class="text-xs font-normal text-gray-600 ">
                                                        {{ $user->email }}</h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap flex flex-col">
                                            users
                                        </td>
                                        <td class="px-2 py-2 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <x-form.model name="Edit User" id="editUser{{ $user->sysId }}"
                                                    class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400"
                                                    size="modal-xl">

                                                    <x-slot name="button">
                                                        <i class="fa fa-user-pen text-white"></i>
                                                    </x-slot>
                                                    <form method="POST"
                                                        action="{{ route('admin.users.update', ['user' => $user->sysId]) }}">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="ogranization" />
                                                                        <select name="orgId" id="org"
                                                                            class=" form-select block appearance-none w-full bg-white border border-gray-400 hover:border-bule-500 px-4 py-2 pr-8 ">
                                                                            <option
                                                                                class="bg-blue-300 text-light hover:text-white"
                                                                                selected value="{{ $user->orgID }}">
                                                                                {{ $user->organization->org_name }}
                                                                            </option>
                                                                            @foreach ($organization as $org)
                                                                                <option value="{{ $org->org_id }}">

                                                                                    {{ $org->org_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="national ID" />
                                                                        <x-form.input name="nationalID" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="First name" />
                                                                        <x-form.input name="firstName" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="Last name" />
                                                                        <x-form.input name="lastname" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                @can('create-admin')
                                                                    <x-form.modal-body>
                                                                        <x-form.panel class="mb-1">
                                                                            <x-form.label name="Role" />
                                                                            <select name="role" id="role"
                                                                                class="form-select">
                                                                                @foreach ($roles as $role)
                                                                                    <option value="{{ $role->name }}">
                                                                                        {{ $role->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </x-form.panel>
                                                                    </x-form.modal-body>
                                                                @endcan

                                                            </div>
                                                            <div class="col-md-4">
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="User name" />
                                                                        <x-form.input name="username" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="wilaya" />
                                                                        <select name="wilayaId"
                                                                            id="SelectW"class="form-select">

                                                                            @foreach ($wilaya as $item1)
                                                                                <option value="{{ $item1->id }}">
                                                                                    {{ $item1->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="baldya" />
                                                                        <select name="baldyaid" id="SelectBaldya"
                                                                            class="form-select">

                                                                        </select>
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="email" />
                                                                        <x-form.input name="email" type="email" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="Phon Number" />
                                                                        <x-form.input name="phone" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="address" />
                                                                        <x-form.input name="address" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="password" />
                                                                        <x-form.input name="password"
                                                                            type="password" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="Picture" />
                                                                        <x-form.input name="picture" type="file" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>

                                                            </div>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success "
                                                                data-bs-dismiss="modal">Edite</button>
                                                        </div>
                                                    </form>
                                                </x-form.model>
                                                <form method="post"
                                                    action="{{ route('admin.users.delete', ['user' => $user->sysId]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">
                                                        <i class="fa fa-user-xmark text-white"></i>
                                                    </button>
                                                </form>
                                                <x-form.model name="Permission" id="permision"
                                                    class="rounded  py-1 px-2 ">

                                                    <x-slot name="button">

                                                        <span><i class="fa-solid fa-plus"></i></span>
                                                    </x-slot>

                                                    <form method="POST" action="#">
                                                        @csrf

                                                        <x-form.modal-body>
                                                            <x-form.panel class="mb-1">
                                                                <x-form.label name="name" />
                                                                <x-form.input name="name" />
                                                            </x-form.panel>
                                                        </x-form.modal-body>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success "
                                                                data-bs-dismiss="modal">Add</button>
                                                        </div>
                                                    </form>



                                                </x-form.model>


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
