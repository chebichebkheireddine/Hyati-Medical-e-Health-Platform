@props(['specializations'])
<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Doctor Information</h2>
                <p class=" mb-3">This Page for Add doctor To the system
                </p>
                {{-- this is temolet to add user --}}
                <x-form.model name="Add doctor" id="doctidq1">
                    <form method="Post" action="{{ route('admin.doctor.create') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.modal-body>
                                    <x-form.label name="specialization"></x-form.label>
                                    <select name="specialization[]" id="specialization" multiple>

                                        @foreach ($specializations as $sp)
                                            <option value="{{ $sp->specialization_id }}">
                                                {{ $sp->specialization_name }}</option>
                                        @endforeach
                                    </select>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="name"></x-form.label>
                                        <x-form.input name="name"></x-form.input>
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="user Name"></x-form.label>
                                        <x-form.input name="username"></x-form.input>
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="email"></x-form.label>
                                        <x-form.input name="email" type="email"></x-form.input>
                                    </x-form.panel>
                                </x-form.modal-body>

                            </div>
                            <div class="col-md-6">
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="Phon Number"></x-form.label>
                                        <x-form.input name="phone_number" type="tel"></x-form.input>
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="addresse"></x-form.label>
                                        <x-form.input name="addresse"></x-form.input>
                                    </x-form.panel>
                                </x-form.modal-body>
                                <x-form.modal-body>
                                    <x-form.panel>
                                        <x-form.label name="Ppassword"></x-form.label>
                                        <x-form.input name="password" type="password"></x-form.input>
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
                <button type="button" class="btn btn-outline-success  m-1 mt-3 py-3   uppercase ">
                    <i class="ti ti-edit fs-6 "> Edite</i>
                </button>
                {{-- <button type="button" class="btn btn-outline-danger  m-1 mt-3 py-3   uppercase ">
                    <i class="ti ti-trash fs-6 "> Delete</i>
                </button> --}}
            </div>
        </div>
    </div>
