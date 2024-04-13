@props(['specializations'])
<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <div class="">
                    <h2 class="card-title fw-semibold mb-4 ">Doctor Information</h2>


                    {{-- this is temolet to add user --}}
                    <p class=" mb-3">This Page for Add doctor To the system
                    </p>
                    <div class="">

                        {{-- <x-form.model name="Add doctor" id="doctidq1"> --}}
                        <form method="POST" action="/admin/doctor/add">
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
                                    {{-- <x-form.modal-body> --}}
                                    <x-form.panel>
                                        <x-form.label name="name" />
                                        <x-form.input name="name" />
                                    </x-form.panel>
                                    {{-- </x-form.modal-body> --}}
                                    {{-- <x-form.modal-body> --}}
                                    <x-form.panel>
                                        <x-form.label name="user Name" />
                                        <x-form.input name="user_name" />
                                    </x-form.panel>
                                    {{-- </x-form.modal-body> --}}
                                    {{-- <x-form.modal-body> --}}
                                    <x-form.panel>
                                        <x-form.label name="email" />
                                        <x-form.input name="email" type="email" />
                                    </x-form.panel>
                                    {{-- </x-form.modal-body> --}}

                                </div>
                                <div class="col-md-6">
                                    {{-- <x-form.modal-body> --}}
                                    <x-form.panel>
                                        <x-form.label name="Phon Number" />
                                        <x-form.input name="phone_number" />
                                    </x-form.panel>
                                    {{-- </x-form.modal-body> --}}
                                    {{-- <x-form.modal-body> --}}
                                    <x-form.panel>
                                        <x-form.label name="addresse" />
                                        <x-form.input name="addresse" />
                                    </x-form.panel>
                                    {{-- </x-form.modal-body> --}}
                                    {{-- <x-form.modal-body> --}}
                                    <x-form.panel>
                                        <x-form.label name="password" />
                                        <x-form.input name="password" type="password" />
                                    </x-form.panel>
                                    {{-- </x-form.modal-body> --}}
                                </div>
                            </div>
                            <!-- Modal footer -->
                            {{-- <div class="modal-footer"> --}}
                            <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add</button>
                            {{-- </div> --}}
                        </form>
                    </div>

                    {{-- </x-form.model> --}}
                    <button type="button" class="btn btn-outline-success  m-1 mt-3 py-3   uppercase ">
                        <i class="ti ti-edit fs-6 "> Edite</i>
                    </button>
                </div>
                {{-- <button type="button" class="btn btn-outline-danger  m-1 mt-3 py-3   uppercase ">
                    <i class="ti ti-trash fs-6 "> Delete</i>
                </button> --}}
            </div>
        </div>
    </div>
