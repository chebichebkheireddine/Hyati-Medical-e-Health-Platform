@props(['specializations', 'doctors'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body rounded-xl ">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                        <h2 class="card-title fw-semibold mb-4 ">Doctor Information</h2>
                        <p class=" mb-3">This Page for Add doctor To the system</p>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">

                        <x-form.model name="Add doctor" id="doctidq1">
                            <form method="POST" action="{{ route('admin.doctor.create') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        {{--  --}}
                                        {{-- <x-form.modal-body>
                                        <x-form.label name="specialization"></x-form.label>
                                        <select name="specializations[]" id="specialization" multiple>

                                            @foreach ($specializations as $sp)
                                                <option value="{{ $sp->specialization_id }}">
                                                    {{ $sp->specialization_name }}</option>
                                            @endforeach
                                        </select>
                                    </x-form.modal-body> --}}
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



                <div class="row">
                    <div class="col-12">
                        <table class="border-collapse w-full">
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

                                            <span class="rounded bg-green-300 py-1 px-3 text-xs font-bold">Active</span>
                                        </td>
                                        <td
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                            <a href="#"
                                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">Edit</a>
                                            <a href="#"
                                                class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</a>
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
    <div class="col-6">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-left">
                        <h2 class="card-title fw-semibold mb-4 ">Healthe Provider Roles</h2>
                        <p class=" mb-3">This Page for Add health care provider</p>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                        {{-- this is temolet to add user --}}
                        <x-form.model name="Add Spesfcation" id="addMe">
                            <form method="Post" action="{{ route('admin.specialization.index') }}">
                                @csrf
                                <div class="modal-body">
                                    <x-form.panel>
                                        <x-form.label name="name" />
                                        <x-form.input name="specialization_name" />
                                    </x-form.panel>
                                </div>
                                <div class="modal-body">
                                    <x-form.textarea name="specialization_description"></x-form.textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add</button>
                                </div>
                            </form>

                        </x-form.model>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="border-collapse w-full">
                            <tbody>
                                @foreach ($specializations as $sp)
                                    <tr
                                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                        <td
                                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                            {{ $sp->specialization_name }}
                                        </td>
                                        <td
                                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                            {{ $sp->specialization_description }}
                                        </td>
                                        <td
                                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                            <span class="rounded bg-green-300 py-1 px-3 text-xs font-bold">Active</span>
                                        </td>
                                        <td
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                            <a href="#"
                                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">Edit</a>
                                            <a href="#"
                                                class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</a>
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

</div>
