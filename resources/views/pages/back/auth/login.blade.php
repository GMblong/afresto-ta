<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>{{ $title }}</title>
</head>

<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">
                <div
                    class="col-12 col-md-6 col-lg-6 p-0 d-none d-lg-flex d-flex flex-align-center justify-content-center">
                    <img src="{{ asset('theme/src/assets/images/illustrations/img-2.jpg') }}" class="w-100 m-0"
                        alt="">
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="logo text-center">
                                <img src="{{ asset('theme/src/assets/images/logos/logo.png') }}" class="m-0"
                                    width="180" alt="">
                            </div>
                            <div class="login-text my-4">
                                <h5>Masuk</h5>
                                <span>Silahkan masuk dengan email dan kata sandi yang valid</span>
                            </div>
                            <div class="login-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            :value="old('email')" autofocus autocomplete="username" required
                                            placeholder="Masukkan email valid">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            autocomplete="current-password" required placeholder="Masukkan password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input remember" type="checkbox"
                                            id="remember_me gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            <span>Ingat Saya</span>
                                        </label>
                                    </div>
                                    <div class="btn-login mt-2">
                                        <button type="submit" class="btn btn-primary btn-md rounded-pill w-100 my-2">
                                            <span>Masuk</span>
                                        </button>
                                        <a href="{{ route('guest.dashboard') }}"
                                            class="btn btn-outline-primary btn-md rounded-pill w-100 my-2">
                                            <span>Masuk Sebagai Tamu</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
