<x-layout.app>
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center col-md-11">
            <div class="row justify-content-center col-10">
                <div class="col-md-8 col-lg-6 col-md-10 col-md-8 col-lg-6 col-md-11 w-100">
                    <div class="card mb-0 ">
                        <div class="card-body ">
                            {{-- add Logo from the navbar --}}
                            <div class="d-flex align-items-center justify-content-between  flex-row ">
                                <div>

                                    <x-svg.logo class="w-full"></x-svg.logo>
                                </div>


                                <div class="flex-1 align-items-center justify-content-center flex-col ">

                                    <div class="container">
                                        <div class="row ">
                                            <div
                                                class="col-4 d-flex flex-column align-items-center justify-content-center py-11 ">

                                                <a href="{{ route('doctor.login') }}">

                                                    <img src="./assets/images/icon/docteur.png"
                                                        class="bg-blue-300 rounded-full " alt="" width="100">
                                                    <a class="text-blue-400 text-lg-center font-semibold text-3xl ">
                                                        Doctor
                                                    </a>
                                                </a>

                                            </div>
                                            <div
                                                class="col-4 d-flex flex-column align-items-center justify-content-center py-11  ">

                                                <a href="{{ route('admin.login') }}">
                                                    <img src="./assets/images/icon/management.png"
                                                        class="bg-blue-300 rounded-full  " alt=""width="100px">
                                                    <a class="text-blue-400 text-lg-center font-semibold text-3xl ">
                                                        Users
                                                    </a>
                                                </a>
                                            </div>
                                            <div
                                                class="col-4  d-flex flex-column align-items-center justify-content-center py-11 ">
                                                <img src="./assets/images/icon/pharmacien.png"
                                                    class="bg-blue-300 rounded-full " alt=""width="100">
                                                <a class="text-blue-400 text-sm-center font-semibold ">
                                                    Pharmacist
                                                </a>

                                            </div>
                                            <div
                                                class="col-4  d-flex flex-column align-items-center justify-content-center py-11 ">
                                                <img src="./assets/images/icon/pharmacien.png"
                                                    class="bg-blue-300 rounded-full " alt=""width="100">
                                                <a class="text-blue-400 text-lg-center font-semibold text-3xl">
                                                    Nurse
                                                </a>
                                            </div>
                                            <div
                                                class="col-4  d-flex flex-column align-items-center justify-content-center py-11 ">
                                                <img src="./assets/images/icon/pharmacien.png"
                                                    class="bg-blue-300 rounded-full " alt=""width="100">
                                                <a class="text-blue-400 text-lg-center font-semibold text-3xl">
                                                    Paramedical
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout.app>
