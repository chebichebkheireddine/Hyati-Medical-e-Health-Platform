@include('layout.app')
<div
    class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center col-md-11">
        <div class="row justify-content-center col-10">
            <div class="col-md-8 col-lg-6 col-md-10 col-md-8 col-lg-6 col-md-11 w-100">
                <div class="card mb-0 ">
                    <div class="card-body px-9">
                        {{-- add Logo from the navbar --}}
                        <div class="d-flex align-items-center justify-content-between  flex-col ">
                            <x-svg.logo></x-svg.logo>

                        </div>

                        <div class="row ">
                            <div class="col-4 px-sm-5 text-center">

                                <img src="./assets/images/icon/docteur.png" class="bg-blue-300 rounded-full ml-16"
                                    alt="" width="100">
                                <a href="/doctor/logein" class="text-blue-400 text-lg-center font-semibold text-3xl">
                                    Doctor
                                </a>


                            </div>
                            <div class="col-4 px-sm-5 text-center">
                                <img src="./assets/images/icon/management.png" class="bg-blue-300 rounded-full ml-16"
                                    alt=""width="100">
                                <a href="{{ route('admin.login') }}"
                                    class="text-blue-400 text-lg-center font-semibold text-3xl">
                                    Maneger
                                </a>
                            </div>
                            <div class="col-4  px-sm-5 text-center">
                                <img src="./assets/images/icon/pharmacien.png" class="bg-blue-300 rounded-full ml-16"
                                    alt=""width="100">
                                <a class="text-blue-400 text-lg-center font-semibold text-3xl">
                                    Phacmacist
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layout.footer')
