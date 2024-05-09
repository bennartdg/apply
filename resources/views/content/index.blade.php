@extends('layout.layout')

@section('content')
  <div class="container-fluid min-vh-100 bg-black">
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
            <h3 class="text-black m-0">Create new account<span class="text-primary">.</span></h3>
            <small class="text-muted">Already have an account? <a href="/login"
                class="btn-link text-decoration-none text-primary">Login</a></small>
          </div>
          <form action="/register" method="POST">
            @csrf
            <div class="mb-3 row">
              <div class="col-12 col-lg-6">
                <label for="first_name" class="form-label @error('first_name') text-danger @enderror text-secondary">
                  First Name
                  @error('first_name')
                    <span class="text-danger">*</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('first_name') is-invalid @enderror" id="first_name"
                  name="first_name" value="{{ old('first_name') }}">
              </div>
              <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <label for="last_name" class="form-label @error('last_name') text-danger @enderror text-secondary">
                  Last Name
                  @error('last_name')
                    <span class="text-danger">*</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('last_name') is-invalid @enderror" id="last_name"
                  name="last_name" value="{{ old('last_name') }}">
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label @error('email') text-danger @enderror text-secondary">
                Email Address
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </label>
              <input type="email" class="form-control input @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3 row">
              <div class="col-12 col-lg-6">
                <label for="username" class="form-label text-secondary @error('username') text-danger @enderror">
                  Username
                  @error('username')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('username') is-invalid @enderror" id="username"
                  name="username" value="{{ old('username') }}">
              </div>
              <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <label for="status" class="form-label @error('status') is-invalid @enderror text-secondary">Status
                  @error('status')
                    *
                  @enderror
                </label>
                <select class="form-select input @error('status') is-invalid @enderror" id="status" name="status">
                  @if (old('status') == 'student')
                    <option value="student" selected>Student</option>
                  @else
                    <option value="student">Student</option>
                  @endif
                  @if (old('status') == 'fresh graduate')
                    <option value="fresh graduate" selected>Fresh Graduate</option>
                  @else
                    <option value="fresh graduate">Fresh Graduate</option>
                  @endif
                  @if (old('status') == 'experienced')
                    <option value="experienced" selected>Experienced</option>
                  @else
                    <option value="experienced">Experienced</option>
                  @endif
                </select>
              </div>
            </div>
            {{-- <div class="mb-3 row">
              <div class="col-12 col-lg-6">
                <label for="city" class="form-label @error('city') text-danger @enderror text-secondary">
                  City
                  @error('city')
                    *
                  @enderror
                </label>
                <input type="text" class="form-control input" id="city" name="city"
                  value="{{ old('city') }}">
              </div>
              <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <label for="country"
                  class="form-label  @error('country') text-danger @enderror text-secondary">
                  Country
                  @error('country')
                    *
                  @enderror
                </label>
                <input type="text" class="form-control input" id="country" name="country"
                  value="{{ old('country') }}">
              </div>
            </div> --}}
            <div class="mb-3">
              <label for="password" class="form-label @error('password') text-danger @enderror text-secondary">Password
                @error('password')
                  {{ $message }}
                @enderror
              </label>
              <input type="password" class="form-control input @error('password') is-invalid @enderror" id="password"
                name="password">
            </div>
            <div class="mb-4">
              <label for="password_confirm"
                class="form-label @error('password_confirm') text-danger @enderror text-secondary">Confirm Password
                @error('password_confirm')
                  {{ $message }}
                @enderror
              </label>
              <input type="password" class="form-control input @error('password_confirm') is-invalid @enderror"
                id="password_confirm" name="password_confirm">
            </div>
            <div class="d-flex flex-column my-4">
              <button type="submit" class="btn btn-black">Create account</button>
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
