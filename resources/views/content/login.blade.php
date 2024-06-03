@extends('layout.layout')

@section('content')
  <div class="container-fluid">
    <div class="row vh-100">
      @include('content.tagline')

      <section class="col-12 col-lg-4 d-flex flex-column justify-content-center align-items-center bg-white">
        <div class="container-fluid container-lg mt-3">
          <div class="mb-4">
            <h3 class="text-black m-0">Login</h3>
            <small class="text-muted">Not have an account? <a href="/"
                class="btn-link link-dark text-decoration">Create new account</a></small>
          </div>

          @if (session()->has('success'))
            @include('components.alert', ['message' => session('success')])
          @endif

          @if (session()->has('loginError'))
            @include('components.alert', ['message' => session('loginError')])
          @endif

          <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label text-secondary">Email address @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </label>
              <input type="email" class="form-control input @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label text-secondary">Password</label>
              <input type="password" class="form-control input" id="password" name="password" required>
            </div>
            <div class="d-flex flex-column my-4">
              <button type="submit" class="btn btn-black">Login</button>
            </div>
          </form>
        </div>
        <div>
          <p class="text-body-secondary text-small">Copyright &copy; 2024 Apply-dev</p>
        </div>
      </section>
    </div>
  </div>
@endsection
