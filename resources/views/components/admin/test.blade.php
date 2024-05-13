<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Genral Test Page</h2>
                <p class=" mb-3">The Genral Confegration to sutep you ogranzation Like Name and permesstion and Roles
                    name </p>

                <div class="relative w-full px-4 max-w-full  ">
                    {{-- this is temolet to add user --}}
                    <x-form.model name="Add Oganzation " id="OgaIdSys" class="btn btn-outline-primary btn-lg  m-1">
                        <x-slot name="button">
                            <i class="fa fa-building-ngo ">
                            </i>
                            Add

                        </x-slot>
                        <form method="Post" action="#">
                            @csrf

                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="name" />
                                    <x-form.input name="name" />
                                </x-form.panel>
                            </x-form.modal-body>
                            <x-form.modal-body>
                                <x-form.panel>
                                    <x-form.label name="Email" />
                                    <x-form.input name="test" type="email" />
                                </x-form.panel>
                            </x-form.modal-body>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add
                                    Oganzation</button>
                            </div>
                        </form>

                    </x-form.model>

                </div>
            </div>
        </div>
    </div>
</div>
