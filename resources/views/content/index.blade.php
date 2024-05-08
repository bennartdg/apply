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
            <h3 class="text-black m-0">Create new account<span class="text-primary">.</span></h3>
            <small class="text-muted">Already have an account? <a href="/login"
                class="btn-link text-decoration-none text-primary">Login</a></small>
          </div>
          <form action="">
            <div class="mb-3 row">
              <div class="col-12 col-lg-6">
                <label for="user_first_name" class="form-label text-secondary">First Name</label>
                <input type="text" class="form-control input" id="user_first_name" name="user_first_name">
              </div>
              <div class="col-12 col-lg-6">
                <label for="user_last_name" class="form-label text-secondary">Last Name</label>
                <input type="text" class="form-control input" id="user_last_name" name="user_last_name">
              </div>
            </div>
            <div class="mb-3">
              <label for="user_email" class="form-label text-secondary">Email Address</label>
              <input type="email" class="form-control input" id="user_email" name="user_email">
            </div>
            <div class="mb-3">
              <label for="user_username" class="form-label text-secondary">Username</label>
              <input type="email" class="form-control input" id="user_username" name="user_username" value="@">
            </div>
            <div class="mb-3">
              <label for="user_password" class="form-label text-secondary">Password</label>
              <input type="password" class="form-control input" id="user_password" name="user_password">
            </div>
            <div class="mb-4">
              <label for="user_password_confirm" class="form-label text-secondary">Confirm Password</label>
              <input type="password" class="form-control input" id="user_password_confirm" name="user_password_confirm">
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
