@props(['permissions'])
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
                        <form method="Post" action="{{ route('admin.config.permmistion.create') }}">
                            @csrf
                            <div class="modal-body">
                                <x-form.panel>
                                    <x-form.label name="name" />
                                    <x-form.input name="name" />
                                </x-form.panel>
                            </div>


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
                            @foreach ($permissions as $sp)
                                <tr
                                    class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td
                                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        {{ $sp->name }}
                                    </td>
                                    <td
                                        class="w-full lg:w-auto p-2 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">

                                        <div
                                            class="w-full lg:w-auto p-2 text-gray-800 text-center  text-center block lg:table-cell relative lg:static">
                                            <x-form.model name="Edit Doctor" id="editPermisstion{{ $sp->id }}"
                                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">

                                                <x-slot name="button">
                                                    Edit
                                                </x-slot>

                                                <form method="post"
                                                    action="{{ route('admin.config.permmistion.update', ['id' => $sp->id]) }}">
                                                    @csrf
                                                    @method('patch')

                                                    {{--  TODO: change the update laren how to change it --}}

                                                    {{-- {{--  --}}

                                                    <x-form.modal-body>
                                                        <x-form.panel>
                                                            <x-form.label name="name" />
                                                            <x-form.input name="name" :value="old('name', $sp->name)" />
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
                                                action="{{ route('admin.config.permmistion.delete', ['id' => $sp->id]) }}">
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
