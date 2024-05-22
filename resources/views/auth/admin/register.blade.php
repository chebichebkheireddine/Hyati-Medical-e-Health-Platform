<x-layout.app>
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center col-md-10">
            <div class="row justify-content-center col-10">
                <div class="col-md-8 col-lg-6 col-md-10">
                    <div class="card mb-0">
                        <div class="card-body">
                            {{-- add Logo from the navbar --}}
                            <div class="flex items-center justify-between flex-col">
                                <x-svg.logo></x-svg.logo>
                                <h1 class="text-lg font-semibold mb-4">Register</h1>
                            </div>
                            <form method="Post" action="{{ route('Register.admin') }}" enctype="multipart/form-data">
                                @csrf
                                <div id="step1">
                                    <x-form.panel class="mb-3">
                                        <x-form.label name="ogranization" />
                                        <select name="orgId" id="org" class="form-select">

                                            @foreach ($organization as $org)
                                                <option value="{{ $org->org_id }}">
                                                    {{ $org->org_name }}</option>
                                            @endforeach

                                        </select>
                                    </x-form.panel>
                                    <x-form.panel class="mb-3">
                                        <x-form.label name="national ID" />
                                        <x-form.input name="nationalID" />
                                    </x-form.panel>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <x-form.panel class="mb-3">
                                                <x-form.label name="First name" />
                                                <x-form.input name="firstName" />
                                            </x-form.panel>
                                        </div>
                                        <div class="col-md-6">
                                            <x-form.panel class="mb-3">
                                                <x-form.label name="Last name" />
                                                <x-form.input name="lastname" />
                                            </x-form.panel>
                                        </div>
                                    </div>
                                    <div class="inline-flex">

                                        <button type="button" onclick="nextStep(2)"
                                            class="bg-blue-200 hover:bg-blue-400 text-gray-800 font-bold py-2 px-4 rounded-r mb-2">
                                            Next
                                        </button>
                                    </div>
                                </div>

                                <div id="step2" style="display: none;">

                                    <x-form.panel class="mb-3">
                                        <x-form.label name="User name" />
                                        <x-form.input name="username" />
                                    </x-form.panel>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-form.panel class="mb-3">
                                                <x-form.label name="wilaya" />
                                                <select name="wilayaId" id="SelectW"class="form-select">

                                                    @foreach ($wilaya as $item1)
                                                        <option value="{{ $item1->id }}">
                                                            {{ $item1->name }}</option>
                                                    @endforeach
                                                </select>
                                            </x-form.panel>
                                        </div>
                                        <div class="col-md-6">
                                            <x-form.panel class="mb-3">
                                                <x-form.label name="baldya" />
                                                <select name="baldyaid" id="SelectBaldya" class="form-select">

                                                </select>
                                            </x-form.panel>

                                        </div>
                                    </div>
                                    <x-form.panel class="mb-3">
                                        <x-form.label name="email" />
                                        <x-form.input name="email" type="email" />
                                    </x-form.panel>
                                    <div class="inline-flex">
                                        <button type="button" onclick="previousStep(2)"
                                            class="bg-blue-200 hover:bg-blue-400 text-gray-800 font-bold py-2 px-4 rounded-l mb-2">
                                            Prev
                                        </button>
                                        <button type="button" onclick="nextStep(3)"
                                            class="bg-blue-200 hover:bg-blue-400 text-gray-800 font-bold py-2 px-4 rounded-r mb-2">
                                            Next
                                        </button>
                                    </div>


                                </div>
                                <div id="step3" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <x-form.panel class="mb-3">
                                                <x-form.label name="Phon Number" />
                                                <x-form.input name="phone" />
                                            </x-form.panel>
                                        </div>
                                        <div class="col-md-4">
                                            <x-form.panel class="mb-3">
                                                <x-form.label name="address" />
                                                <x-form.input name="address" />
                                            </x-form.panel>
                                        </div>
                                        <div class="col-md-4">
                                            <x-form.panel class="mb-3">
                                                <x-form.label name="Picture" />
                                                <x-form.input name="picture" type="file" />
                                            </x-form.panel>
                                        </div>
                                    </div>
                                    <x-form.panel class="mb-3">
                                        <x-form.label name="password" />
                                        <x-form.input name="password" type="password" />
                                    </x-form.panel>

                                    <div class="inline-flex">
                                        <button type="button"
                                            class="bg-blue-200 hover:bg-blue-400 text-gray-800 font-bold py-2 px-4 rounded-l mb-2"
                                            onclick="previousStep(3)">
                                            Prev
                                        </button>

                                    </div>

                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">
                                        create account
                                    </button>
                                </div>
                            </form>
                            <script>
                                function nextStep(step) {
                                    // Hide all steps
                                    for (let i = 1; i <= 3; i++) {
                                        document.getElementById('step' + i).style.display = 'none';
                                    }

                                    // Show the next step
                                    document.getElementById('step' + step).style.display = 'block';
                                }

                                function previousStep(step) {
                                    // Hide all steps
                                    for (let i = 1; i <= 3; i++) {
                                        document.getElementById('step' + i).style.display = 'none';
                                    }

                                    // Show the previous step
                                    document.getElementById('step' + (step - 1)).style.display = 'block';
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
