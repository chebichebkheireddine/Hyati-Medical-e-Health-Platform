@props(['users', 'wilaya', 'organization', 'roles'])
<div class="card">
    <div class="card-body rounded-xl ">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                <h2 class="card-title fw-semibold mb-4 ">Users Information </h2>
                <p class=" mb-3">This Page for Add users To the system</p>
            </div>
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                <x-form.model name="Add user" id="UserID1" size="modal-lg">

                    <x-slot name="button">
                        <i class="ti ti-user fs-6">Add User</i>
                    </x-slot>

                    <form method="POST" action="{{ route('admin.users.create') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                {{--  --}}
                                {{-- {{--  --}}
                                <x-form.modal-body>
                                    <x-form.panel>
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
                                    <x-form.panel>
                                        <x-form.label name="national ID" />
                                        <x-form.input name="nationalID" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="First name" />
                                        <x-form.input name="firstName" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="Last name" />
                                        <x-form.input name="lastname" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="User name" />
                                        <x-form.input name="username" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                @can('create-admin')
                                    <x-form.modal-body>
                                        <x-form.panel>
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
                            <div class="col-md-6">

                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="email" />
                                        <x-form.input name="email" type="email" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="Phon Number" />
                                        <x-form.input name="phone" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="address" />
                                        <x-form.input name="address" />
                                    </x-form.panel>
                                </x-form.modal-body>

                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="password" />
                                        <x-form.input name="password" type="password" />
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
            </div>
        </div>

        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th class="p-3 text-gray-800 text-center border border-b">Name</th>
                    <th class="p-3 text-gray-800 text-center border border-b">Email</th>
                    <th class="p-3 text-gray-800 text-center border border-b">Phone Number</th>
                    <th class="p-3 text-gray-800 text-center border border-b">Address</th>
                    <th class="p-3 text-gray-800 text-center border border-b">specializations</th>
                    <th class="p-2 text-gray-800 text-center border border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)
                    <tr
                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            {{ $users->name }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            {{ $users->email }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            {{ $users->phone }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            {{ $users->address }}

                        </td>
                        <td
                            class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            {{-- TOOD:create Function  --}}
                            <x-form.model name="Edit Doctor" id="editUser{{ $users->sysId }}"
                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">

                                <x-slot name="button">
                                    Edit
                                </x-slot>
                            </x-form.model>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
