<div class="row">
    <div class="col-4">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Genral Confegration</h2>
                <p class=" mb-3">This Page to setup the confgration of system </p>

                <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                    {{-- this is temolet to add user --}}
                    <x-form.model name="Add configration " id="addconfig">
                        <x-slot name="button">
                            <i class="fa fa-user">add</i>
                        </x-slot>
                        <form method="Post" action="{{ route('admin.confg.index') }}">
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

                    <div class="row">
                        <div class="col-12">
                            {{-- <table class="border-collapse w-full">
                            <thead>
                                <tr>
                                    <th class="p-3 text-gray-800 text-center border border-b">Specialization Name
                                    </th>
                                    <th class="p-3 text-gray-800 text-center border border-b">Description</th>
                                    <th class="p-3 text-gray-800 text-center border border-b">Status</th>
                                    <th class="p-2 text-gray-800 text-center border border-b">Actions</th>
                                </tr>
                            </thead>
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

                                            <span
                                                class="rounded bg-green-300 py-1 px-3 text-xs font-bold">Active</span>
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
                        </table> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>