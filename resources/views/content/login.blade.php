@extends('layout.layout')

@section('content')
  <div class="container-fluid vh-100 bg-black">
    <div class="row vh-100">
      <section class="col-lg-8 d-flex flex-column justify-content-end">
        <div class="d-flex flex-column container-lg-fluid">
          <h1 class="text-lexend text-big text-dark">
            build
          </h1>
          <h1 class="text-lexend text-big text-dark">your own<span class="text-light">CV</span></h1>
          <h1 class="text-lexend text-big text-dark">with</h1>
          <img src="/asset/logo/APPLY-white.png" alt="" class="img-fluid" width="70%">
        </div>
      </section>
      <section class="col-lg-4 d-flex flex-column justify-content-center align-items-center bg-white mt-lg-0 mt-5">
        <div class="container-fluid container-lg mt-3">
          <div class="mb-4">
            <h3 class="text-black m-0">Login<span class="text-primary">.</span></h3>
            <small class="text-muted">Not have an account? <a href="/" class="btn-link text-decoration-none">Create
                new account</a></small>
          </div>

          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          
          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('loginError ')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif        

          <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label text-secondary">Email address</label>
              <input type="email" class="form-control input @error('email') is-invalid @enderror" id="email" name="email">
              @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label text-secondary">Password</label>
              <input type="password" class="form-control input" id="password" name="password">
            </div>
            <div class="d-flex flex-column my-4">
              <button type="submit" class="btn btn-black">Login</button>
            </div>
          </form>
        </div>
        <div>
          <p>Copyright &copy; 2024 Konohachi-dev</p>
        </div>
      </section>
    </div>
  </div>
@endsection
