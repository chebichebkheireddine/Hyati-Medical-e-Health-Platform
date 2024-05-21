@props(['specializations'])
<div class="row">
    <div class="col-7">
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
                            <x-slot name="button">
                                <i class="fa fa-star">
                                </i>
                                specialization

                            </x-slot>
                            <form method="Post" action="{{ route('admin.specialization.create') }}">
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
                    <div class="col-6">
                        <div class="table-responsive-sm"> <!-- For screens less than 576px wide -->

                            <table class="border-collapse w-full">
                                <thead>
                                    <tr>
                                        <th class="p-3 text-gray-800 text-center ">Specialization
                                            Name
                                        </th>
                                        <th class="p-3 text-gray-800 text-center ">Description</th>

                                        <th class="p-2 text-gray-800 text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($specializations as $sp)
                                        <tr>
                                            <td class="px-2 py-2 text-sm whitespace-nowrap">
                                                {{ $sp->specialization_name }}
                                            </td>
                                            <td class="px-2 py-2 text-sm whitespace-nowrap">

                                                {{ $sp->specialization_description }}
                                            </td>

                                            <td class="px-2 py-2 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6">



                                                    <a href="#"
                                                        class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">Edit</a>
                                                    <x-form.model name="Edit Spesfcation"
                                                        id="edit{{ $sp->specialization_id }}"
                                                        class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400">
                                                        <x-slot name="button">

                                                            Edit

                                                        </x-slot>
                                                        <form method="Post"
                                                            action="{{ route('admin.specialization.update', ['specialization' => $sp->specialization_id]) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-body">
                                                                <x-form.panel>
                                                                    <x-form.label name="name" />
                                                                    <x-form.input name="specialization_name"
                                                                        :value="old(
                                                                            'specialization_name',
                                                                            $sp->specialization_name,
                                                                        )" />
                                                                </x-form.panel>
                                                            </div>
                                                            <div class="modal-body">
                                                                <x-form.textarea name="specialization_description">
                                                                    {{ old('specialization_description', $sp->specialization_description) }}
                                                                </x-form.textarea>

                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success "
                                                                    data-bs-dismiss="modal">Update</button>
                                                            </div>
                                                        </form>

                                                    </x-form.model>
                                                    <form method="post"
                                                        action="{{ route('admin.specialization.delete', ['specialization' => $sp->specialization_id]) }}">
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
