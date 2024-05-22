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

                            <form method="Post" action="{{ route('admin.login_post') }}">
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
                                    LogIn
                                </button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('Register.admin.index') }}">Sign
                                        In</a>
                                </div>
                                @if (session('messeg'))
                                    <script>
                                        window.onload = function() {
                                            alert('{{ session('messeg') }}');
                                        }
                                    </script>
                                @endif

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const form = document.querySelector('form');
                                        form.addEventListener('submit', function() {
                                            const btn = document.querySelector('button[type="submit"]');
                                            btn.setAttribute('disabled', true);
                                            btn.innerHTML = 'Please wait...';
                                        });
                                    });
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-layout.app>
