{{-- blade for hethcare users  --}}
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body rounded-xl">
                <h1 class="text-center text-lg font-semibold mb-4">Doctor</h1>
                <div class="flex justify-center items-center">
                    <img src="{{ asset('assets/images/icon/docteur.png') }}" class="w-40 h-40 " alt="Doctor">
                    <div class="ml-6">
                        <div class="flex flex-col items-center space-y-2">
                            <x-form.btn href="{{ route('admin.doctor.index') }}" name="Informattion" type="submit"
                                class="btn btn-outline-primary btn-md  m-1" icon="fa fa-user-doctor" :notfiy="20">

                            </x-form.btn>
                            <x-form.btn href="{{ route('admin.doctor.index.config') }}" name="configration"
                                type="submit" class="btn btn-outline-primary btn-md  m-1"
                                icon="fa fa-user-doctor"></x-form.btn>
                            <x-form.btn href="#" name="Acsepted" type="submit"
                                class="btn btn-outline-danger btn-md  m-1" icon="fa fa-circle-info"></x-form.btn>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body rounded-xl">
                <h1 class="text-center text-lg font-semibold mb-4">pharmacien</h1>
                <div class="flex justify-center items-center">
                    <img src="{{ asset('assets/images/icon/pharmacien.png') }}" class="w-40 h-40 " alt="Doctor">
                    <div class="ml-6">
                        <div class="flex flex-col items-center space-y-2">
                            <x-form.btn href="{{ route('admin.doctor.index') }}" name="Informattion" type="submit"
                                class="btn btn-outline-primary btn-md  m-1" icon="fa fa-user-doctor" :notfiy="20">

                            </x-form.btn>
                            <x-form.btn href="#" name="configration" type="submit"
                                class="btn btn-outline-primary btn-md  m-1" icon="fa fa-user-doctor"></x-form.btn>
                            <x-form.btn href="#" name="Acsepted" type="submit"
                                class="btn btn-outline-danger btn-md  m-1" icon="fa fa-circle-info"></x-form.btn>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
