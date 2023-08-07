<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>{{ $title }}</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row d-flex flex-align-center justify-content-center align-items-center my-lg-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <img src="{{ asset('theme/src/assets/images/illustrations/img-2.jpg') }}" class="w-100 m-0">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body my-4">
                            <div class="logo-img text-center">
                                <img src="{{ asset('theme/src/assets/images/logos/logo.png') }}" class="m-0 p-0"
                                    width="200">
                            </div>
                            <div class="login-text text-center">
                                <span class="fs-5">Silahkan masuk sebagai</span>
                            </div>
                            <div class="login-button text-center my-4">
                                <button type="button" class="admin-login btn btn-primary btn-md" data-bs-toggle="modal"
                                    data-bs-target="#adminModal">
                                    <span>Admin</span>
                                </button>
                                <button type="button" class="alumni-login btn btn-info btn-md" data-bs-toggle="modal"
                                    data-bs-target="#alumniModal">
                                    <span>Alumni</span>
                                </button>
                                <a href="{{ route('guest.dashboard') }}" class="guest-login btn btn-warning btn-md">
                                    <span>Guest</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Admin Login Modal Start --}}
    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Masuk Sebagai Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <x-input-error :messages="$errors->get('current-password')" class="mt-2" />
                        </div>
                        <div class="admin-login-btn text-end">
                            {{-- <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">
                                <span>Masuk</span></a> --}}
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Admin Login Modal End --}}

    {{-- Alumni Login Modal Start --}}
    <div class="modal fade" id="alumniModal" tabindex="-1" aria-labelledby="alumniModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alumniModalLabel">Masuk Sebagai Alumni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alumni.login') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div style="color: red;">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis"
                                autocomplete="username" required>
                            {{-- <x-input-error :messages="$errors->get('nis')" class="mt-2" /> --}}
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            {{-- <x-input-error :messages="$errors->get('current-password')" class="mt-2" /> --}}
                        </div>
                        <div class="alumni-login-btn text-end">
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Alumni Login Modal End --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
