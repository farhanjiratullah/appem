@extends('layouts.applogin')

@section('title', 'Register')

@section('content')
<main class="form-signin">
    <form action="{{ route('masyarakat.register') }}" method="post">
        @csrf
        
        {{-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <label for="nik" class="visually-hidden">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" placeholder="NIK" value="{{ old('nik') }}" required autofocus autocomplete="off">
        @if ($errors->has('nik'))
            <div class="invalid-feedback">
                {{ $errors->first('nik') }}
            </div>
        @endif

        <label for="nama" class="visually-hidden">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Nama" value="{{ old('nama') }}" required autocomplete="off">
        @if ($errors->has('nama'))
            <div class="invalid-feedback">
                {{ $errors->first('nama') }}
            </div>
        @endif

        <label for="username" class="visually-hidden">Username</label>
        <input type="text" name="username" id="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="Username"  value="{{ old('username') }}" required autocomplete="off">
        @if ($errors->has('username'))
        <div class="invalid-feedback">
            {{ $errors->first('username') }}
        </div>
        @endif
    
        <label for="password" class="visually-hidden">Password</label>
        <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required>
        @if ($errors->has('password'))
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        @endif

        <label for="password_confirmation" class="visually-hidden">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Password Confirmation" required>
        @if ($errors->has('password_confirmation'))
        <div class="invalid-feedback">
            {{ $errors->first('password_confirmation') }}
        </div>
        @endif

        <label for="telp" class="visually-hidden">Telp</label>
        <input type="text" name="telp" id="telp" class="form-control {{ $errors->has('telp') ? 'is-invalid' : '' }}" placeholder="Telp" value="{{ old('telp') }}" required autocomplete="off">
        @if ($errors->has('telp'))
        <div class="invalid-feedback">
            {{ $errors->first('telp') }}
        </div>
        @endif
    
        {{-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
    
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Register</button>
        <div class="separator mt-2 mb-3">Sudah punya akun?</div>
        <a href="/login" class="text-decoration-none mt-5">Login</a>
    </form>
</main>
@endsection