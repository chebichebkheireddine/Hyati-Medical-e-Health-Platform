@props(['wilaya'])
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
                    <x-form.model name="Add Patient " id="Patient" class="btn btn-outline-primary btn-lg  m-1"
                        size="modal-xl">
                        <x-slot name="button">
                            <i class="fa fa-building-ngo ">
                            </i>
                            Add

                        </x-slot>
                        <form method="Post" action="{{ route('admin.patient.add') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    {{--  --}}
                                    <x-form.modal-body>
                                        <x-form.label name="Gender"></x-form.label>
                                        <select name="gender" id="Gender"class="form-select">
                                            <option value="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Fmaile</option>
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

                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="Picture" />
                                            <x-form.input name="picture" type="file" />
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
                                            <x-form.label name="Birthday"></x-form.label>
                                            <x-form.input name="birthDate" type="date" />

                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="heath ID" />
                                            <x-form.input name="healthId" />
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
