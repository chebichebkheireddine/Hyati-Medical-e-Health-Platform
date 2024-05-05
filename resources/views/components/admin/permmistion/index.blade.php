@props(['permissions', 'roles', 'itemPermission'])
<div class="row">
    <div class="col-6">
        <div class="card ">
            <div class="card-body rounded-xl ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="card-title fw-semibold mb-4">Permmistion </h2>
                    <x-form.model name="Add permmistion" id="Permestion" class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-plus"> </i>
                            Add Permmistion
                        </x-slot>
                        <form method="Post" action="{{ route('admin.config.permissions.create') }}">
                            @csrf
                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="name" />
                                    <x-form.input name="name" />
                                </x-form.panel>
                            </x-form.modal-body>


                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add</button>
                            </div>
                        </form>

                    </x-form.model>
                </div>

                <div class="table-responsive-sm"style="max-height: 300px; overflow-y: auto;">
                    <!-- For screens less than 576px wide -->

                    <table class="border-collapse w-full">
                        <thead class=" stickyt top-0 bg-gray-200 z-50">
                            <tr>
                                <th class="p-3 text-gray-800 text-center border border-b">Name
                                </th>

                                <th class="p-2 text-gray-800 text-center border border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $perme)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        {{ $perme->name }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                        <div
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                            <x-form.model name="Edit Permisstion"
                                                id="editPermisstion{{ $perme->id }}"
                                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">

                                                <x-slot name="button">
                                                    Edit
                                                </x-slot>

                                                <form method="POST"
                                                    action="{{ route('admin.config.permissions.update', ['permissions' => $perme->id]) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="name" />
                                                            <x-form.input name="name" :value="old('name', $perme->name)" />
                                                        </x-form.panel>
                                                    </x-form.modal-body>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success "
                                                            data-bs-dismiss="modal">Edite</button>
                                                    </div>
                                                </form>

                                            </x-form.model>
                                        </div>
                                        <div
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                            <form method="POST"
                                                action="{{ route('admin.config.permissions.delete', ['permissions' => $perme->id]) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                            </form>
                                            {{-- doctor add --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card ">
            <div class="card-body rounded-xl ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="card-title fw-semibold mb-4">Roles </h2>
                    <x-form.model name="Add Role" id="Role1" class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-plus"> </i>
                            Add Roles
                        </x-slot>
                        <form method="Post" action="{{ route('admin.config.role.create') }}">
                            @csrf
                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="name" />
                                    <x-form.input name="name" />
                                </x-form.panel>
                            </x-form.modal-body>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add</button>
                            </div>
                        </form>

                    </x-form.model>
                </div>

                <div class="table-responsive-sm"style="max-height: 300px; overflow-y: auto;">
                    <!-- For screens less than 576px wide -->

                    <table class="border-collapse w-full">
                        <thead class=" stickyt top-0 bg-gray-200 z-50">
                            <tr>
                                <th class="p-3 text-gray-800 text-center border border-b">Name
                                </th>

                                <th class="p-2 text-gray-800 text-center border border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        {{ $role->name }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                        <div
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                            <x-form.model name="Edit Doctor" id="editRole{{ $role->id }}"
                                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">

                                                <x-slot name="button">
                                                    Edit
                                                </x-slot>

                                                <form method="post"
                                                    action="{{ route('admin.config.role.update', ['roles' => $role->id]) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="name" />
                                                            <x-form.input name="name" :value="old('name', $role->name)" />
                                                        </x-form.panel>
                                                    </x-form.modal-body>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success "
                                                            data-bs-dismiss="modal">Edite</button>
                                                    </div>
                                                </form>



                                            </x-form.model>
                                        </div>
                                        <div
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                            <form method="post"
                                                action="{{ route('admin.config.role.delete', ['roles' => $role->id]) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                            </form>
                                            {{-- doctor add --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- this to assing rile to permissions --}}
<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body rounded-xl ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="card-title fw-semibold mb-4">Assing role to perrmistion </h2>
                </div>

                <div class="table-responsive-sm"style="max-height: 300px; overflow-y: auto;">
                    <!-- For screens less than 576px wide -->

                    <table class="border-collapse w-full">
                        <thead class=" stickyt top-0 bg-gray-200 z-50">
                            <tr>
                                <th class="p-3 text-gray-800 text-center border border-b">Name Role
                                </th>
                                <th class="p-3 text-gray-800 text-center border border-b">Permissions

                                </th>
                                <th class="p-2 text-gray-800 text-center border border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item3)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        {{ $item3->name }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        @foreach ($item3->permissions->pluck('name') as $itemRole)
                                            <span
                                                class="block inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">{{ $itemRole }}</span>
                                        @endforeach
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                        <div
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                            <x-form.model name="Edit Permisstion" id="hasRole{{ $item3->id }}"
                                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">

                                                <x-slot name="button">
                                                    Edit
                                                </x-slot>

                                                <form method="POST"
                                                    action="{{ route('admin.config.permissions.update', ['permissions' => $item3->id]) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="Selected" />
                                                            <select name="permestions[]"
                                                                id="permissionedit{{ $item3->id }}" multiple>
                                                                @foreach ($permissions as $sp)
                                                                    <option value="{{ $sp->id }}">
                                                                        {{-- {{ old(value, defaudoclt) }} --}}

                                                                        {{ $sp->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </x-form.panel>
                                                    </x-form.modal-body>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success "
                                                            data-bs-dismiss="modal">Edite</button>
                                                    </div>
                                                </form>

                                            </x-form.model>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
