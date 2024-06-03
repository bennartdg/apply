@extends('layout.layout')

@section('content')
  <div class="container-fluid">
    <div class="row vh-100">
      @include('content.tagline')

      <section class="col-lg-4 d-flex flex-column justify-content-center align-items-center bg-white mt-lg-0">
        <div class="container-fluid container-lg mt-3">
          <div class="mb-4">
            <h3 class="text-black m-0">Create new account</h3>
            <small class="text-muted">Already have an account? <a href="/login"
                class="btn-link link-dark text-decoration">Login</a></small>
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
                  name="first_name" value="{{ old('first_name') }}" required>
              </div>
              <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <label for="last_name" class="form-label @error('last_name') text-danger @enderror text-secondary">
                  Last Name
                  @error('last_name')
                    <span class="text-danger">*</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('last_name') is-invalid @enderror" id="last_name"
                  name="last_name" value="{{ old('last_name') }}" required>
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
                name="email" value="{{ old('email') }}" required>
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
                  name="username" value="{{ old('username') }}" required>
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
            
            <div class="mb-3">
              <label for="password" class="form-label @error('password') text-danger @enderror text-secondary">Password
                @error('password')
                  {{ $message }}
                @enderror
              </label>
              <input type="password" class="form-control input @error('password') is-invalid @enderror" id="password"
                name="password" required>
            </div>
            <div class="mb-4">
              <label for="password_confirm"
                class="form-label @error('password_confirm') text-danger @enderror text-secondary">Confirm Password
                @error('password_confirm')
                  {{ $message }}
                @enderror
              </label>
              <input type="password" class="form-control input @error('password_confirm') is-invalid @enderror"
                id="password_confirm" name="password_confirm" required>
            </div>
            <div class="d-flex flex-column my-4">
              <button type="submit" class="btn btn-black">Create account</button>
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
