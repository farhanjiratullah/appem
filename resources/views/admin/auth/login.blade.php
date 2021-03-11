@extends('layouts.applogin')

@section('content')
<main class="form-signin">
    <form action="{{ route('masyarakat.login') }}" method="post">
        @csrf
        
        {{-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="h3 mb-3 fw-normal">Aplikasi Pengaduan Masyarakat</h1>
    
        <label for="username" class="visually-hidden">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
    
        <label for="password" class="visually-hidden">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    
        {{-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
</main>
@endsection