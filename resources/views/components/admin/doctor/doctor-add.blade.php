@props(['specializations', 'doctors'])
<div class="card">
    <div class="card-body rounded-xl ">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                <h2 class="card-title fw-semibold mb-4 ">Doctor Information</h2>
                <p class=" mb-3">This Page for Add doctor To the system</p>
            </div>
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                <x-form.model name="add doctor" id="doctidq1">

                    <x-slot name="button">
                        <i class="ti ti-user fs-6">Add</i>
                    </x-slot>

                    <form method="POST" action="{{ route('admin.doctor.create') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

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
                                        <x-form.label name="name" />
                                        <x-form.input name="name" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="user Name" />
                                        <x-form.input name="user_name" />
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="email" />
                                        <x-form.input name="email" type="email" />
                                    </x-form.panel>
                                </x-form.modal-body>

                            </div>
                            <div class="col-md-6">
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="Phon Number" />
                                        <x-form.input name="phone_number" />
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
                @foreach ($doctors as $doctor)
                    <tr
                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            {{ $doctor->name }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            {{ $doctor->email }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            {{ $doctor->phone_number }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            {{ $doctor->address }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            @foreach ($doctor->specialization as $spec)
                                <span
                                    class="rounded bg-green-300 py-1 px-3 text-xs font-bold">{{ $spec->specialization_name }}</span>
                            @endforeach
                        </td>
                        <td
                            class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                            <a href="#"
                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">Edit</a>
                            <a href="#"
                                class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</a>
                            {{-- doctor add --}}
                            <a href="#" class="rounded  hover:text-sky-400 pl-4">
                            </a>
                            <x-form.model name="Permesion" id="Parss1">

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
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="user Name" />
                                            <x-form.input name="user_name" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="email" />
                                            <x-form.input name="email" type="email" />
                                        </x-form.panel>
                                    </x-form.modal-body>


                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success "
                                            data-bs-dismiss="modal">Update</button>
                                    </div>
                                </form>



                            </x-form.model>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
