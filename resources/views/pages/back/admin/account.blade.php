@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-lg-md-12 col-lg-12">
                <div class="breadcrumb shadow rounded">
                    @include('partials.back.breadcrumb')
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-title border-bottom border-2 border-primary">
                    <h4 class="px-3 py-3 px-lg-4 py-lg-4 mb-0">Account Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <h5 class="mb-4">Informasi Akun</h5>
                            <form action="">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ Auth::user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control" name="role" id="role"
                                        value="{{ Auth::user()->role }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark btn-md">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <h5 class="mb-4">Ubah Password?</h5>
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <input type="password" class="form-control" name="current_password"
                                        id="current_password" autocomplete="current-password">
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        autocomplete="new-password">
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Ulangi Password Baru</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" autocomplete="new-password">
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>
                                <button type="submit" class="btn btn-dark btn-md" style="float: right;">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection()
