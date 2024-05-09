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
                <label for="user_first_name"
                  class="form-label @error('user_first_name') text-danger @enderror text-secondary">
                  First Name
                  @error('user_first_name')
                    <span class="text-danger">*</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('user_first_name') is-invalid @enderror"
                  id="user_first_name" name="user_first_name" value="{{ old('user_first_name') }}">
              </div>
              <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <label for="user_last_name"
                  class="form-label @error('user_last_name') text-danger @enderror text-secondary">
                  Last Name
                  @error('user_last_name')
                    <span class="text-danger">*</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('user_last_name') is-invalid @enderror"
                  id="user_last_name" name="user_last_name" value="{{ old('user_last_name') }}">
              </div>
            </div>
            <div class="mb-3">
              <label for="user_email" class="form-label @error('user_email') text-danger @enderror text-secondary">
                Email Address
                @error('user_email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </label>
              <input type="email" class="form-control input @error('user_email') is-invalid @enderror" id="user_email"
                name="user_email" value="{{ old('user_email') }}">
            </div>
            <div class="mb-3 row">
              <div class="col-12 col-lg-6">
                <label for="user_username"
                  class="form-label text-secondary @error('user_username') text-danger @enderror">
                  Username
                  @error('user_username')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('user_username') is-invalid @enderror"
                  id="user_username" name="user_username" value="{{ old('user_username') }}">
              </div>
              <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <label for="user_status"
                  class="form-label @error('user_status') is-invalid @enderror text-secondary">Status
                  @error('user_status')
                    *
                  @enderror
                </label>
                <select class="form-select input @error('user_status') is-invalid @enderror" id="user_status"
                  name="user_status">
                  @if (old('user_status') == 'student')
                    <option value="student" selected>Student</option>
                  @else
                    <option value="student">Student</option>
                  @endif
                  @if (old('user_status') == 'fresh graduate')
                    <option value="fresh graduate" selected>Fresh Graduate</option>
                  @else
                    <option value="fresh graduate">Fresh Graduate</option>
                  @endif
                  @if (old('user_status') == 'experienced')
                    <option value="experienced" selected>Experienced</option>
                  @else
                    <option value="experienced">Experienced</option>
                  @endif
                </select>
              </div>
            </div>
            {{-- <div class="mb-3 row">
              <div class="col-12 col-lg-6">
                <label for="user_city" class="form-label @error('user_city') text-danger @enderror text-secondary">
                  City
                  @error('user_city')
                    *
                  @enderror
                </label>
                <input type="text" class="form-control input" id="user_city" name="user_city"
                  value="{{ old('user_city') }}">
              </div>
              <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <label for="user_country"
                  class="form-label  @error('user_country') text-danger @enderror text-secondary">
                  Country
                  @error('user_country')
                    *
                  @enderror
                </label>
                <input type="text" class="form-control input" id="user_country" name="user_country"
                  value="{{ old('user_country') }}">
              </div>
            </div> --}}
            <div class="mb-3">
              <label for="user_password"
                class="form-label @error('user_password') text-danger @enderror text-secondary">Password
                @error('user_password')
                  {{ $message }}
                @enderror
              </label>
              <input type="password" class="form-control input @error('user_password') is-invalid @enderror"
                id="user_password" name="user_password">
            </div>
            <div class="mb-4">
              <label for="user_password_confirm"
                class="form-label @error('user_password_confirm') text-danger @enderror text-secondary">Confirm Password
                @error('user_password_confirm')
                  {{ $message }}
                @enderror
              </label>
              <input type="password" class="form-control input @error('user_password_confirm') is-invalid @enderror"
                id="user_password_confirm" name="user_password_confirm">
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
