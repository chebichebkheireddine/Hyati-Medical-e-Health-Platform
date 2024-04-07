<x-layout.app>
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center col-md-10">
            <div class="row justify-content-center col-10">
                <div class="col-md-8 col-lg-6 col-md-10">
                    <div class="card mb-0">
                        <div class="card-body">
                            {{-- add Logo from the navbar --}}
                            <div class="d-flex align-items-center justify-content-between flex-col">
                                <x-svg.logo></x-svg.logo>
                            </div>


                            <form method="Post" action="#">
                                @csrf
                                <x-form.panel>
                                    <x-form.label name="email"></x-form.label>
                                    <x-form.input name="email" type="email"></x-form.input>
                                </x-form.panel>
                                <x-form.panel>
                                    <x-form.label name="password"></x-form.label>
                                    <x-form.input name="password" type="password"></x-form.input>
                                </x-form.panel>
                                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">
                                    Sign In
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- @include('layout.footer') --}}

</x-layout.app>
