@props(['wilaya', 'typeOrg', 'organizations'])

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Genral Confegration</h2>
                <p class=" mb-3">The General Configuration to setup your organization Like Name and permission and Roles
                    name </p>

                <div class="relative w-full px-4 max-w-full  ">
                    {{-- this is temolet to add user --}}
                    <x-form.model name="Add Oganzation " id="OgaIdSys" class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-building-ngo ">
                            </i>
                            Create Organization
                        </x-slot>
                        <form method="Post" action="{{ route('admin.config.oganzation') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="name" />
                                            <x-form.input name="org_name" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="Email" />
                                            <x-form.input name="org_email" type="email" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="Phone" />
                                            <x-form.input name="org_phone" />
                                        </x-form.panel>
                                    </x-form.modal-body>

                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="Address" />
                                            <x-form.input name="org_address" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                </div>
                                <div class="col-6">
                                    <x-form.modal-body>
                                        <x-form.panel>
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
                                        <x-form.panel>
                                            <x-form.label name="baldya" />
                                            <select name="baldyaid" id="SelectBaldya" class="form-select">

                                            </select>
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="ogranization Type" />
                                            <select name="org_type" id="org" class="form-select">

                                                @foreach ($typeOrg as $org)
                                                    <option value="{{ $org->type_id }}">
                                                        {{ $org->type_name }}</option>
                                                @endforeach

                                            </select>
                                        </x-form.panel>
                                    </x-form.modal-body>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add
                                    Oganzation</button>
                            </div>
                        </form>

                    </x-form.model>
                    <x-form.model name="Add Type Oganzation " id="TypeOgaIdSys"
                        class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-layer-group">
                            </i>
                            Add Type
                        </x-slot>
                        <form method="Post" action="{{ route('admin.config.oganzationType') }}">
                            @csrf

                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="name" />
                                    <x-form.input name="nameOge" />
                                </x-form.panel>
                            </x-form.modal-body>
                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="Description" />
                                    <x-form.textarea name="descriptionOrg"></x-form.textarea>
                                </x-form.panel>
                            </x-form.modal-body>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add
                                    Oganzation Type</button>
                            </div>
                        </form>

                    </x-form.model>


                    {{-- TODO Edit This code --}}
                    <x-form.btn href="{{ route('admin.config.permmistion.index') }}" name="Permission and Roles"
                        type="submit" class="btn btn-outline-primary btn-lg  m-1" icon="fa fa-key"></x-form.btn>
                </div>


            </div>
        </div>
    </div>
    {{-- This is for type oganization --}}
    <div class="col-md-4">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Type Organization</h2>
                <div class="table-responsive-sm"style="max-height: 300px; overflow-y: auto;">
                    <!-- For screens less than 576px wide -->

                    <table class="border-collapse w-full">
                        <thead class=" stickyt top-0  z-50">
                            <tr>
                                <th class="p-3 text-gray-800 text-center border border-b">Name
                                </th>
                                <th class="p-3 text-gray-800 text-center border border-b">Descripsion

                                </th>
                                <th class="p-2 text-gray-800 text-center border border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($typeOrg as $item3)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        {{ $item3->type_name }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto px-3 p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">

                                        {{ $item3->type_des }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">


                                        <x-form.model name="Update Type" id="UpdateTypeOganzation{{ $item3->type_id }}"
                                            class="font-weight-bolder py-1 px-2 hover:text-sky-400" size="modal-lg">
                                            <x-slot name="button">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </x-slot>

                                            <form method="POST"
                                                action="{{ route('admin.config.update.oganzationType', ['type' => $item3->type_id]) }}">
                                                @csrf
                                                @method('PATCH')

                                                <x-form.modal-body>
                                                    <x-form.panel>
                                                        <x-form.label name="name" />
                                                        <x-form.input name="nameOge" value="{{ $item3->type_name }}" />
                                                    </x-form.panel>
                                                </x-form.modal-body>
                                                <x-form.modal-body>
                                                    <x-form.panel>
                                                        <x-form.label name="Description" />
                                                        <x-form.textarea
                                                            name="descriptionOrg">{{ $item3->type_des }}</x-form.textarea>
                                                    </x-form.panel>
                                                </x-form.modal-body>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info"
                                                        data-bs-dismiss="modal">Update</button>
                                                </div>
                                            </form>
                                        </x-form.model>
                                        <form method="post"
                                            action="{{ route('admin.config.delete.oganzationType', ['type' => $item3->type_id]) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- This is for Oganization --}}
    <div class="col-md-8">
        <div class="card ">
            <div class="card-body rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Organization List</h2>
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                    style="max-height: 300px; overflow-y: auto;">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                            Organizations
                                        </th>


                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                            Information
                                        </th>

                                        <th scope="col" class="relative py-2 px-1">
                                            Actions </th>
                                    </tr>
                                </thead>
                                <div style="max-height: 300px; overflow-y: auto;">
                                    <tbody>
                                        @foreach ($organizations as $organi)
                                            <tr>

                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    <div class="flex items-center gap-x-2">
                                                        <div>
                                                            <h1 class="text-sm font-medium text-gray-800  ">
                                                                {{ $organi->org_name }}</h1>
                                                            <h2 class="text-xs font-normal text-gray-600 ">
                                                                {{ $organi->org_email }}</h2>
                                                            <h1 class="text-xs font-normal text-gray-600 ">
                                                                {{ $organi->org_phone }}</h1>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap flex flex-col">
                                                    <h1 class="text-sm font-medium text-gray-800  ">
                                                        {{ $organi->organizationType->type_name }}
                                                    </h1>
                                                    <h2 class="text-xs font-normal text-gray-600 ">
                                                        {{ $organi->org_address }}</h2>

                                                </td>
                                                <td class="px-2 py-2 text-sm whitespace-nowrap">
                                                    <div class="flex items-center gap-x-6">
                                                        <x-form.model name="Update Oganization"
                                                            id="UpdateOganization{{ $organi->org_id }}"
                                                            class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400"
                                                            size="modal-xl">

                                                            <x-slot name="button">
                                                                Edit
                                                            </x-slot>

                                                            <form method="post"
                                                                action="{{ route('admin.config.oganzation.update', ['org' => $organi->org_id]) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <x-form.modal-body>
                                                                            <x-form.panel>
                                                                                <x-form.label name="name" />
                                                                                <x-form.input name="org_name"
                                                                                    :value="old(
                                                                                        'org_name',
                                                                                        $organi->org_name,
                                                                                    )" />
                                                                            </x-form.panel>
                                                                        </x-form.modal-body>
                                                                        <x-form.modal-body>
                                                                            <x-form.panel>
                                                                                <x-form.label name="Email" />
                                                                                <x-form.input name="org_email"
                                                                                    type="email" :value="old(
                                                                                        'org_email',
                                                                                        $organi->org_email,
                                                                                    )" />
                                                                            </x-form.panel>
                                                                        </x-form.modal-body>
                                                                        <x-form.modal-body>
                                                                            <x-form.panel>
                                                                                <x-form.label name="Phone" />
                                                                                <x-form.input name="org_phone"
                                                                                    :value="old(
                                                                                        'org_phone',
                                                                                        $organi->org_phone,
                                                                                    )" />
                                                                            </x-form.panel>
                                                                        </x-form.modal-body>

                                                                        <x-form.modal-body>
                                                                            <x-form.panel>
                                                                                <x-form.label name="Address" />
                                                                                <x-form.input name="org_address"
                                                                                    :value="old(
                                                                                        'org_address',
                                                                                        $organi->org_address,
                                                                                    )" />
                                                                            </x-form.panel>
                                                                        </x-form.modal-body>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <x-form.modal-body>
                                                                            <x-form.panel>
                                                                                <x-form.label name="wilaya" />
                                                                                <select name="wilayaId"
                                                                                    id="Selectwilaya"class="form-select">

                                                                                    @foreach ($wilaya as $item1)
                                                                                        <option
                                                                                            value="{{ $item1->id }}">
                                                                                            {{ $item1->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </x-form.panel>
                                                                        </x-form.modal-body>
                                                                        <x-form.modal-body>
                                                                            <x-form.panel>
                                                                                <x-form.label name="baldya" />
                                                                                <select name="baldyaid"
                                                                                    id="BaladyaSelect"
                                                                                    class="form-select">
                                                                                </select>
                                                                            </x-form.panel>
                                                                        </x-form.modal-body>
                                                                        <x-form.modal-body>
                                                                            <x-form.panel>
                                                                                <x-form.label
                                                                                    name="ogranization Type" />
                                                                                <select name="org_type" id="org"
                                                                                    class="form-select">
                                                                                    @foreach ($typeOrg as $orgs)
                                                                                        <option
                                                                                            value="{{ $orgs->type_id }}"
                                                                                            {{ old('org_type') == $orgs->type_id ? 'selected' : '' }}>
                                                                                            {{ $orgs->type_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </x-form.panel>
                                                                        </x-form.modal-body>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success "
                                                                        data-bs-dismiss="modal">Update</button>
                                                                </div>
                                                            </form>



                                                        </x-form.model>
                                                        <form method="post"
                                                            action="{{ route('admin.config.oganzation.delete', ['org' => $organi->org_id]) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button
                                                                class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                                        </form>
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
