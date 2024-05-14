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
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                <x-form.model name="add doctor" id="doctidq1" size="modal-xl">

                    <x-slot name="button">
                        <i class="ti ti-user fs-6">Add</i>
                    </x-slot>

                    <form method="POST" action="{{ route('admin.doctor.create') }}">
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
                                    <x-form.panel>
                                        <x-form.label name="User Name" />
                                        <x-form.input name="username" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="Last Name" />
                                        <x-form.input name="lastName" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="First Name" />
                                        <x-form.input name="firstName" />
                                    </x-form.panel>
                                </x-form.modal-body>




                            </div>
                            <div class="col-4">
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
                                {{-- Oganzation --}}
                                <x-form.modal-body>
                                    <x-form.panel>
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
                                    <x-form.panel>
                                        <x-form.label name="National ID" />
                                        <x-form.input name="nationalId" />
                                    </x-form.panel>
                                </x-form.modal-body>
                            </div>
                            <div class="col-4">

                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="email" />
                                        <x-form.input name="email" type="email" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="Phone" />
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
        <style>
            .truncate {
                width: 60px;
                /* Adjust as needed */
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        </style>
        <div class="table-responsive-md">
            <table class="border-collapse w-full">
                <thead>
                    <tr>
                        <th class="p-3 text-gray-800 text-center w-1/6">Name</th>
                        <th class="p-3 text-gray-800 text-center w-1/6">Email</th>
                        <th class="p-3 text-gray-800 text-center w-1/6">Phone Number</th>
                        <th class="p-3 text-gray-800 text-center w-1/6">Address</th>
                        <th class="p-3 text-gray-800 text-center w-1/6">Specializations</th>
                        <th class="p-3 text-gray-800 text-center w-1/6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr
                            class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="p-3 text-gray-800 text-center truncate">{{ $doctor->firstName }}</td>
                            <td class="p-3 text-gray-800 text-center truncate">{{ $doctor->email }}</td>
                            <td class="p-3 text-gray-800 text-center truncate">{{ $doctor->phone_number }}</td>
                            <td class="p-3 text-gray-800 text-center truncate">{{ $doctor->address }}</td>
                            <td class="p-3 text-gray-800 text-center flex flex-col">
                                @foreach ($doctor->specialization as $spec)
                                    <span
                                        class="rounded bg-green-300 py-1 px-3 text-xs font-bold m-1">{{ $spec->specialization_name }}</span>
                                @endforeach
                            </td>
                            <td
                                class="w-1/4 p-2 text-gray-800 text-center text-center block lg:table-cell relative lg:static">
                                {{-- TOOD:create Function  --}}
                                <div
                                    class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                    <x-form.model name="Edit Doctor" id="editDoc{{ $doctor->sysId }}"
                                        class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">

                                        <x-slot name="button">
                                            Edit
                                        </x-slot>

                                        <form method="post"
                                            action="{{ route('admin.doctor.update', ['doctor' => $doctor->sysId]) }}">
                                            @csrf
                                            @method('patch')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {{--  TODO: change the update laren how to change it --}}
                                                    <x-form.modal-body>
                                                        <script></script>
                                                        <x-form.label name="specialization"></x-form.label>
                                                        <select name="specializations[]"
                                                            id="specializationedit{{ $doctor->sysId }}" multiple>
                                                            @foreach ($specializations as $sp)
                                                                <option value="{{ $sp->specialization_id }}">
                                                                    {{-- {{ old(value, default) }} --}}

                                                                    {{ $sp->specialization_name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </x-form.modal-body>
                                                    {{-- {{--  --}}
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="name" />
                                                            <x-form.input name="name" :value="old('name', $doctor->firstName)" />
                                                        </x-form.panel>
                                                    </x-form.modal-body>
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="user Name" />
                                                            <x-form.input name="user_name" :value="old('user_name', $doctor->username)" />
                                                        </x-form.panel>
                                                    </x-form.modal-body>
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="email" />
                                                            <x-form.input name="email" type="email"
                                                                :value="old('email', $doctor->email)" />
                                                        </x-form.panel>
                                                    </x-form.modal-body>

                                                </div>
                                                <div class="col-md-6">
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="Phon Number" />
                                                            <x-form.input name="phone" :value="old('phone', $doctor->phone)" />
                                                        </x-form.panel>
                                                    </x-form.modal-body>
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="address" />
                                                            <x-form.input name="address" :value="old('address', $doctor->address)" />
                                                        </x-form.panel>
                                                    </x-form.modal-body>
                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="password" />
                                                            <x-form.input name="password" type="password"
                                                                :value="old('password', $doctor->password)" />
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
                                </div>
                                <div
                                    class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                    <form method="post"
                                        action="{{ route('admin.doctor.delete', ['doctor' => $doctor->sysId]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                    </form>
                                    {{-- doctor add --}}
                                </div>
                                <div
                                    class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                    <x-form.model name="Permission" id="permision" class="rounded  py-1 px-2 ">

                                        <x-slot name="button">
                                            <span><i class="fa-solid fa-gear"></i></span>
                                        </x-slot>

                                        <form method="POST" action="{{ route('admin.doctor.create') }}">
                                            @csrf

                                            <x-form.modal-body>
                                                <x-form.panel>
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
            </table>
        </div>
    </div>
</div>
