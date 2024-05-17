{{-- blade for hethcare users  --}}
<div class="row">
    <div class="col-md-4">
        <div class="card ">
            <div class="card-body rounded-xl">
                <h1 class="card-title fw-semibold text-center mb-4">Doctor</h1>
                <div class="relative flex justify-center items-center">

                    <img src="{{ asset('assets/images/icon/docteur.png') }}" class="w-40 h-40 rounded-full" alt="Doctor">


                </div>
                <div class="card-body">
                    <h6 class="card-title text-center">Doctor panel control</h6>
                    <p class="card-text">This Panle allow to you to Mange your doctor in one plase </p>
                    <div class="relative flex justify-center items-center">
                        <x-form.btn href="{{ route('admin.doctor.index') }}" name="Informattion" type="submit"
                            class="btn btn-outline-primary btn-md  m-1" icon="fa fa-user-doctor"></x-form.btn>
                        <x-form.btn href="#" name="configration" type="submit"
                            class="btn btn-outline-primary btn-md  m-1" icon="fa fa-user-doctor"></x-form.btn>
                        <x-form.btn href="#" name="Acsepted" type="submit"
                            class="btn btn-outline-danger btn-md  m-1" icon="fa fa-circle-info"></x-form.btn>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card ">
            <div class="card-body rounded-xl">
                <h1 class="card-title fw-semibold text-center mb-4">Pharmacist</h1>
                <div class="relative flex justify-center items-center">

                    <img src="{{ asset('assets/images/icon/docteur.png') }}" class="w-40 h-40 rounded-full"
                        alt="Doctor">


                </div>
                <div class="card-body">
                    <h6 class="card-title text-center">pharmasist panel control</h6>
                    <p class="card-text">This Panle allow to you to Mange your doctor in one plase </p>
                    <div class="relative flex justify-center items-center">
                        <x-form.btn href="{{ route('admin.doctor.index') }}" name="Informattion" type="submit"
                            class="btn btn-outline-primary btn-md  m-1" icon="fa fa-user-doctor"></x-form.btn>
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
