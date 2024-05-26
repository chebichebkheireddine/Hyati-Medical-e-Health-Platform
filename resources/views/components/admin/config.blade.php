@props(['wilaya', 'typeOrg'])

<div class="row">

    <div class="col-9">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Genral Confegration</h2>
                <p class=" mb-3">The General Configuration to setup your organization Like Name and permission and Roles
                    name </p>

                <div class="relative w-full px-4 max-w-full  ">
                    {{-- this is temolet to add user --}}
                    <x-form.model name="Add Oganzation " id="OgaIdSys" class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-building-ngo ">
                            </i>
                            Create Organization
                        </x-slot>
                        <form method="Post" action="{{ route('admin.config.oganzation') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="name" />
                                            <x-form.input name="org_name" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="Email" />
                                            <x-form.input name="org_email" type="email" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="Phone" />
                                            <x-form.input name="org_phone" />
                                        </x-form.panel>
                                    </x-form.modal-body>

                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="Address" />
                                            <x-form.input name="org_address" />
                                        </x-form.panel>
                                    </x-form.modal-body>
                                </div>
                                <div class="col-6">
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
                                    <x-form.modal-body>
                                        <x-form.panel>
                                            <x-form.label name="ogranization Type" />
                                            <select name="org_type" id="org" class="form-select">

                                                @foreach ($typeOrg as $org)
                                                    <option value="{{ $org->type_id }}">
                                                        {{ $org->type_name }}</option>
                                                @endforeach

                                            </select>
                                        </x-form.panel>
                                    </x-form.modal-body>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add
                                    Oganzation</button>
                            </div>
                        </form>

                    </x-form.model>
                    <x-form.model name="Add Type Oganzation " id="TypeOgaIdSys"
                        class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-layer-group">
                            </i>
                            Add Type
                        </x-slot>
                        <form method="Post" action="{{ route('admin.config.oganzationType') }}">
                            @csrf

                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="name" />
                                    <x-form.input name="nameOge" />
                                </x-form.panel>
                            </x-form.modal-body>
                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="Description" />
                                    <x-form.textarea name="Oganzation"></x-form.textarea>
                                </x-form.panel>
                            </x-form.modal-body>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add
                                    Oganzation Type</button>
                            </div>
                        </form>

                    </x-form.model>


                    {{-- TODO Edit This code --}}
                    <x-form.btn href="{{ route('admin.config.permmistion.index') }}" name="Permission and Roles"
                        type="submit" class="btn btn-outline-primary btn-lg  m-1" icon="fa fa-key"></x-form.btn>
                </div>


            </div>
        </div>
    </div>
</div>
