<div class="row">
    <div class="col-5">
        <div class="card ">
            <div class="card-body   rounded-xl ">
                <h2 class="card-title fw-semibold mb-4 ">Healthe Provider Roles</h2>
                <p class=" mb-3">This Page for Add health care provider
                </p>
                {{-- this is temolet to add user --}}
                <x-form.model name="Add" id="addMe">
                    <form method="Post" action="{{ route('admin.specialization.index') }}">
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
                <button type="button" class="btn btn-outline-success  m-1 mt-3 py-3   uppercase ">
                    <i class="ti ti-edit fs-6 "> Edite</i>
                </button>
                {{-- <button type="button" class="btn btn-outline-danger  m-1 mt-3 py-3   uppercase ">
                    <i class="ti ti-trash fs-6 "> Delete</i>
                </button> --}}
            </div>
        </div>
    </div>
