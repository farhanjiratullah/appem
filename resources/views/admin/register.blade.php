@extends('layouts.appadmin')

@section('title', 'Register Admin & Petugas')

@section('content')
<main class="form-signin">
    <div class="col-md-5">
        <form action="{{ route('admin.register') }}" method="post">
            @csrf
            
            {{-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3">Register Admin & Petugas</h1>

            <div class="mb-2">
                <a href="/admin/akun">
                    <span data-feather="arrow-left-circle" style="width: 32px; height: 32px;"></span>
                </a>
            </div>

            <label for="nama_petugas" class="form-label">Nama Petugas</label>
            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control {{ $errors->has('nama_petugas') ? 'is-invalid' : '' }} mb-3" placeholder="Nama Petugas" required autofocus autocomplete="off">
            @if ($errors->has('nama_petugas'))
            <div class="invalid-feedback">
                {{ $errors->first('nama_petugas') }}
            </div>
            @endif

            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }} mb-3" placeholder="Username" required autocomplete="off">
            @if ($errors->has('username'))
            <div class="invalid-feedback">
                {{ $errors->first('username') }}
            </div>
            @endif

            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} mb-3" placeholder="Password" required>
            @if ($errors->has('password'))
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
            @endif

            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} mb-3" placeholder="Password Confirmation" required>
            @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </div>
            @endif

            <label for="telp" class="form-label">Telp</label>
            <input type="text" name="telp" id="telp" class="form-control {{ $errors->has('telp') ? 'is-invalid' : '' }} mb-3" placeholder="Telp" required autocomplete="off">
            @if ($errors->has('telp'))
            <div class="invalid-feedback">
                {{ $errors->first('telp') }}
            </div>
            @endif

            <label for="level" class="form-label">Level</label>
            <div class="form-group mb-3">
                <select class="form-select {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level" id="level" required>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            @if ($errors->has('level'))
            <div class="invalid-feedback">
                {{ $errors->first('level') }}
            </div>
            @endif
        
            {{-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div> --}}
        
            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Tambah</button>
        </form>
    </div>
</main>
@endsection