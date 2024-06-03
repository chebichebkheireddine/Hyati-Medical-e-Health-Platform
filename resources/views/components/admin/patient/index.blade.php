@props(['wilaya', 'patients'])

{{-- @foreach ($patients as $patient)
    {{ $patient['patientInformation']['firstName'] }}
    {{ $patient['patientInformation']['lastName'] }}
    <!-- Add more fields as needed -->
@endforeach --}}
<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Patient information</h2>
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
                                            <x-form.label name="Blood Type" />
                                            <select name="bloodType" class="form-select">
                                                <option value="">Select Blood Type</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
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
                    {{-- Table --}}
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                        style="max-height: 300px; overflow-y: auto;">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                                Patient Name
                                            </th>


                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right  ">
                                                Address
                                            </th>

                                            <th scope="col" class="relative py-2 px-1">
                                                Actions </th>
                                        </tr>
                                    </thead>
                                    <div style="max-height: 300px; overflow-y: auto;">
                                        <tbody>
                                            @foreach ($patients as $patient)
                                                <tr>

                                                    <td
                                                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                        <div class="flex items-center gap-x-2">
                                                            <img class="object-cover w-16 h-16 rounded-full"
                                                                src="data:image/png;base64,{{ $patient['patientInformation']['picture'] }}"
                                                                alt="">
                                                            <div>
                                                                <h1 class="text-sm font-medium text-gray-800  ">
                                                                    {{ $patient['patientInformation']['firstName'] }}
                                                                    {{ $patient['patientInformation']['lastName'] }}
                                                                </h1>
                                                                <h2 class="text-xs font-normal text-gray-600 ">
                                                                    {{ $patient['patientInformation']['email'] }}</h2>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap flex flex-col">
                                                        <h1 class="text-sm font-medium text-gray-800  ">
                                                            {{ $patient['patientInformation']['street'] }},
                                                            {{ $patient['patientInformation']['municipality'] }},
                                                            {{ $patient['patientInformation']['town'] }}
                                                        </h1>
                                                    </td>
                                                    <td class="px-2 py-2 text-sm whitespace-nowrap">
                                                        <div class="flex items-center gap-x-6">
                                                            <x-form.model name="Edit Patient"
                                                                id="Patient{{ $patient['id'] }}"
                                                                class="rounded bg-green-400 text-white font-weight-bolder py-1 px-2 hover:text-sky-400"
                                                                size="modal-xl">

                                                                <x-slot name="button">
                                                                    Edit
                                                                </x-slot>

                                                                <form method="post"
                                                                    action="{{ route('admin.patient.update', ['patient' => $patient['id']]) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('patch')
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label
                                                                                        name="Gender"></x-form.label>
                                                                                    <select name="gender"
                                                                                        id="Gender"
                                                                                        class="form-select">
                                                                                        <option value="">Select
                                                                                            Gender</option>
                                                                                        <option value="M"
                                                                                            {{ old('gender', $patient['patientInformation']['gender']) == 'M' ? 'selected' : '' }}>
                                                                                            Male</option>
                                                                                        <option value="F"
                                                                                            {{ old('gender', $patient['patientInformation']['gender']) == 'F' ? 'selected' : '' }}>
                                                                                            Female</option>
                                                                                    </select>
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>



                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="Last Name" />
                                                                                    <x-form.input name="lastName"
                                                                                        value="{{ old('lastName', $patient['patientInformation']['lastName']) }}" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>

                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="First Name" />
                                                                                    <x-form.input name="firstName"
                                                                                        value="{{ old('firstName', $patient['patientInformation']['firstName']) }}" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>

                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="Picture" />
                                                                                    <x-form.input name="picture"
                                                                                        type="file" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>
                                                                        </div>

                                                                        <div class="col-4">
                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="wilaya" />
                                                                                    <select name="wilayaId"
                                                                                        id="SelectwilayaPatient"
                                                                                        class="form-select">
                                                                                        @foreach ($wilaya as $item1)
                                                                                            <option
                                                                                                value="{{ $item1->id }}"
                                                                                                {{ old('wilayaId', $patient['patientInformation']['town']) == $item1->id ? 'selected' : '' }}>
                                                                                                {{ $item1->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>

                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="baldya" />
                                                                                    <select name="baldyaid"
                                                                                        id="baldyaidt"
                                                                                        class="form-select">
                                                                                        <!-- Assume baldya options are populated with JavaScript -->
                                                                                    </select>
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>

                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label
                                                                                        name="Birthday"></x-form.label>
                                                                                    <x-form.input name="birthDate"
                                                                                        type="date"
                                                                                        value="{{ old('birthDate', \Carbon\Carbon::createFromTimestampMs($patient['patientInformation']['birthDate'])->format('Y-m-d')) }}" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>

                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="heath ID" />
                                                                                    <x-form.input name="healthId"
                                                                                        value="{{ old('healthId', $patient['patientInformation']['healthId']) }}" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>


                                                                        </div>

                                                                        <div class="col-4">
                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="email" />
                                                                                    <x-form.input name="email"
                                                                                        type="email"
                                                                                        value="{{ old('email', $patient['patientInformation']['email']) }}" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>

                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="Phone" />
                                                                                    <x-form.input name="phone"
                                                                                        value="{{ old('phone', $patient['patientInformation']['phoneNumber']) }}" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>

                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="address" />
                                                                                    <x-form.input name="address"
                                                                                        value="{{ old('address', $patient['patientInformation']['street']) }}" />
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>
                                                                            <x-form.modal-body>
                                                                                <x-form.panel>
                                                                                    <x-form.label name="Blood Type" />
                                                                                    <select name="bloodType"
                                                                                        class="form-select">
                                                                                        <option value="">Select
                                                                                            Blood Type</option>
                                                                                        <option value="A+"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'A+'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            A+</option>
                                                                                        <option value="A-"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'A-'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            A-</option>
                                                                                        <option value="B+"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'B+'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            B+</option>
                                                                                        <option value="B-"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'B-'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            B-</option>
                                                                                        <option value="AB+"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'AB+'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            AB+</option>
                                                                                        <option value="AB-"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'AB-'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            AB-</option>
                                                                                        <option value="O+"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'O+'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            O+</option>
                                                                                        <option value="O-"
                                                                                            {{ old('bloodType', $patient['patientInformation']['generalMedicalRecord']['bloodType']) == 'O-'
                                                                                                ? 'selected'
                                                                                                : '' }}>
                                                                                            O-</option>
                                                                                    </select>
                                                                                </x-form.panel>
                                                                            </x-form.modal-body>


                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success"
                                                                            data-bs-dismiss="modal">Edit</button>
                                                                    </div>
                                                                </form>
                                                            </x-form.model>
                                                            <form method="post"
                                                                action="{{ route('admin.patient.delete', ['patient' => $patient['id']]) }}">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button
                                                                    class="rounded bg-red-400 py-1 px-2 text-white hover:text-sky-400 pl-4">Remove</button>
                                                            </form>
                                                            <x-form.model
                                                                name="Patient : {{ $patient['patientInformation']['firstName'] }} {{ $patient['patientInformation']['lastName'] }}"
                                                                id="{{ $patient['id'] }}"
                                                                class=" font-weight-bolder py-1 px-2 hover:text-sky-400">

                                                                <x-slot name="button">
                                                                    <i class="fa-solid fa-circle-info"></i>
                                                                </x-slot>

                                                                <form method="post"
                                                                    action="{{ route('admin.patient.update.password', ['patient' => $patient['id']]) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('patch')

                                                                    <x-form.modal-body>
                                                                        <x-form.panel>
                                                                            <x-form.label name="Qr Code" />
                                                                            <div
                                                                                style="display: flex; justify-content: center;">
                                                                                {{ QrCode::generate($patient['patientInformation']['healthId']) }}
                                                                            </div>
                                                                        </x-form.panel>
                                                                    </x-form.modal-body>
                                                                    <x-form.modal-body>
                                                                        <x-form.panel>
                                                                            <x-form.label name="Password" />
                                                                            <x-form.input name="password"
                                                                                value="{{ old('password', $patient['patientInformation']['healthCard']['password']) }}" />
                                                                        </x-form.panel>
                                                                    </x-form.modal-body>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success"
                                                                            data-bs-dismiss="modal">Edit</button>
                                                                    </div>
                                                                </form>
                                                            </x-form.model>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
