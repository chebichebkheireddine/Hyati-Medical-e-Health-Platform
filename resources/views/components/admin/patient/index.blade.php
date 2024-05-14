<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Patient information</h2>
                <p class=" mb-3">This is The genral page to put your patient information </p>
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger mt-4">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="relative w-full px-4 max-w-full  ">
                    {{-- this is temolet to add user --}}
                    <x-form.model name="Add Patient " id="Patient" class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-building-ngo ">
                            </i>
                            Add

                        </x-slot>
                        <form method="Post" action="{{ route('admin.patient.add') }}">
                            @csrf

                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="Name" />
                                    <x-form.input name="name" />
                                </x-form.panel>
                            </x-form.modal-body>
                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="email" />
                                    <x-form.input name="email" type="email" />
                                </x-form.panel>
                            </x-form.modal-body>
                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="Password" />
                                    <x-form.input name="password" />
                                </x-form.panel>
                            </x-form.modal-body>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add
                                    Patient</button>
                            </div>
                        </form>

                    </x-form.model>

                </div>
            </div>
        </div>
    </div>
</div>
