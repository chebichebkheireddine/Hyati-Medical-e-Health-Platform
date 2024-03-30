@include('layout.app')
<div
    class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        {{-- add Logo from the navbar --}}
                        <div class="text-nowrap logo-img text-center d-block py-3 w-100 ">
                            <x-logo-v1></x-logo-v1>
                        </div>
                        <form method="Post" action="/register">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="name" class="form-control" id="exampleInputEmail1"name="name"
                                    value="{{ old('name') }}" aria-describedby="emailHelp">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">User Name</label>
                                <input type="name" class="form-control" id="exampleInputEmail1"name="username"
                                    value="{{ old('username') }}" aria-describedby="emailHelp">
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"name="email"
                                    value="{{ old('email') }}" aria-describedby="emailHelp">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">
                                create account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layout.footer')
