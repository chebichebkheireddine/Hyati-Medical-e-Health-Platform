@props(['specializations', 'doctors', 'wilaya', 'organization'])
<div class="card">
    <div class="card-body rounded-xl ">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                <h2 class="card-title fw-semibold mb-4 ">Doctor Information</h2>
                <p class=" mb-3">This Page for Add doctor To the system</p>
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger mt-4">
                        {{ session('error') }}
                    </div>
                @endif

            </div>
            <div class= "flex-col  h-25">
                <form method="Post" action="#">
                    <div class="relative mx-auto text-gray-600">
                        <x-form.input-sherch name="search" type="search" />
                    </div>
                </form>
            </div>
            <div class="flex-col ">
                <x-form.model name="add doctor" id="doctidq1" size="modal-xl">

                    <x-slot name="button">
                        <i class="ti ti-user fs-6">Add</i>
                    </x-slot>

                    <form method="POST" action="{{ route('admin.doctor.create') }}"enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                {{--  --}}
                                <x-form.modal-body>
                                    <x-form.label name="specialization"></x-form.label>
                                    <select name="specializations[]" id="specialization" multiple>

                                        @foreach ($specializations as $sp)
                                            <option value="{{ $sp->specialization_id }}">
                                                {{ $sp->specialization_name }}</option>
                                        @endforeach
                                    </select>
                                </x-form.modal-body>
                                {{-- {{--  --}}
                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="User Name" />
                                        <x-form.input name="username" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="Last Name" />
                                        <x-form.input name="lastName" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="First Name" />
                                        <x-form.input name="firstName" />
                                    </x-form.panel>
                                </x-form.modal-body>

                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="Picture" />
                                        <x-form.input name="picture" type="file" />
                                    </x-form.panel>
                                </x-form.modal-body>
                            </div>
                            <div class="col-4">
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
                                {{-- Oganzation --}}
                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="oganization"></x-form.label>
                                        <select name="organization" id="oganization" class="form-select">

                                            @foreach ($organization as $org)
                                                <option value="{{ $org->org_id }}">
                                                    {{ $org->org_name }}</option>
                                            @endforeach
                                        </select>
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="National ID" />
                                        <x-form.input name="nationalId" />
                                    </x-form.panel>
                                </x-form.modal-body>
                            </div>
                            <div class="col-4">

                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="email" />
                                        <x-form.input name="email" type="email" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel class="mb-1">
                                        <x-form.label name="Phone" />
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

        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8" style="max-height: 300px; overflow-y: auto;">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                    Doctor
                                </th>


                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                    Specialite
                                </th>

                                <th scope="col" class="relative py-2 px-1">
                                    Actions </th>
                            </tr>
                        </thead>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>

                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                <img class="object-cover w-16 h-16 rounded-full"
                                                    src="data:image/png;base64,{{ $doctor->picture }}" alt="">
                                                <div>
                                                    <h1 class="text-sm font-medium text-gray-800  ">
                                                        {{ $doctor->firstName }} {{ $doctor->firstName }}</h1>
                                                    <h2 class="text-xs font-normal text-gray-600 ">
                                                        {{ $doctor->email }}</h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap flex flex-col">
                                            <h1 class="text-sm font-medium text-gray-800  ">
                                                @foreach ($doctor->specialization as $spec)
                                                    {{ $spec->specialization_name . '-' }}
                                                @endforeach
                                            </h1>
                                        </td>
                                        <td class="px-2 py-2 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <x-form.model name="Edit Doctor" id="editDoc{{ $doctor->sysId }}"
                                                    class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400"
                                                    size="modal-xl">

                                                    <x-slot name="button">
                                                        Edit
                                                    </x-slot>

                                                    <form method="post"
                                                        action="{{ route('admin.doctor.update', ['doctor' => $doctor->sysId]) }}"enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="row">
                                                            <div class="col-4">
                                                                {{--  --}}
                                                                <x-form.modal-body>
                                                                    <x-form.label name="specialization"></x-form.label>
                                                                    <select name="specializations[]"
                                                                        id="specializationedit{{ $doctor->sysId }}"
                                                                        multiple>

                                                                        @foreach ($specializations as $sp)
                                                                            <option
                                                                                {{ in_array($sp->specialization_id, $doctor->specialization()->pluck('specializations.specialization_id')->toArray()) ? 'selected' : '' }}
                                                                                value="{{ $sp->specialization_id }}">

                                                                                {{ $sp->specialization_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </x-form.modal-body>

                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="User Name" />
                                                                        <x-form.input name="username"
                                                                            :value="old(
                                                                                'username',
                                                                                $doctor->username,
                                                                            )" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="Last Name" />
                                                                        <x-form.input name="lastName"
                                                                            :value="old(
                                                                                'lastName',
                                                                                $doctor->lastName,
                                                                            )" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="First Name" />
                                                                        <x-form.input name="firstName"
                                                                            :value="old(
                                                                                'firstName',
                                                                                $doctor->firstName,
                                                                            )" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="Picture" />
                                                                        <x-form.input name="picture" type="file"
                                                                            req=" " />
                                                                        <div>
                                                                            <img class="object-cover w-16 h-16 rounded-full"
                                                                                src="data:image/png;base64,{{ old('picture', $doctor->picture) }}"
                                                                                alt="" />

                                                                        </div>
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                            </div>
                                                            <div class="col-4">
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="wilaya" />
                                                                        <select name="wilayaId" id="editW"
                                                                            class="form-select">
                                                                            @foreach ($wilaya as $item1)
                                                                                <option value="{{ $item1->id }}">
                                                                                    {{ $item1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="baldya" />
                                                                        <select name="baldyaid" id="SelectBaldyaE"
                                                                            class="form-select">

                                                                        </select>
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                {{-- Oganzation --}}
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label
                                                                            name="oganization"></x-form.label>
                                                                        <select name="organization" id="oganization"
                                                                            class="form-select">

                                                                            @foreach ($organization as $org)
                                                                                <option value="{{ $org->org_id }}">
                                                                                    {{ $org->org_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="National ID" />
                                                                        <x-form.input name="nationalId"
                                                                            :value="old(
                                                                                'nationalId',
                                                                                $doctor->nationalId,
                                                                            )" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                            </div>
                                                            <div class="col-4">

                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="email" />
                                                                        <x-form.input name="email" type="email"
                                                                            :value="old('email', $doctor->email)" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="Phone" />
                                                                        <x-form.input name="phone"
                                                                            :value="old(
                                                                                'phone',
                                                                                $doctor->phone_number,
                                                                            )" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="address" />
                                                                        <x-form.input name="address"
                                                                            :value="old(
                                                                                'address',
                                                                                $doctor->lastName,
                                                                            )" />
                                                                    </x-form.panel>
                                                                </x-form.modal-body>
                                                                <x-form.modal-body>
                                                                    <x-form.panel class="mb-1">
                                                                        <x-form.label name="password" />
                                                                        <x-form.input name="password" type="password"
                                                                            :value="old(
                                                                                'password',
                                                                                $doctor->password,
                                                                            )" />
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
                                                    action="{{ route('admin.doctor.delete', ['doctor' => $doctor->sysId]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                                </form>
                                                <x-form.model name="Permission" id="permision"
                                                    class="rounded  py-1 px-2 ">

                                                    <x-slot name="button">

                                                        <span><i class="fa-solid fa-plus"></i></span>
                                                    </x-slot>

                                                    <form method="POST" action="{{ route('admin.doctor.create') }}">
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
