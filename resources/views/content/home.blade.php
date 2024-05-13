@extends('layout.layout')

@section('content')
  @include('components.navbar')
  <div class="row m-0">
    <div class="col-lg-2 col-4">

    </div>
    <div class="col-lg-10 col-8">
      {{-- Main Area --}}
      <div class="container-fluid pt-4">
        <div class="d-flex justify-content-between align-items-center">
          <h1>My CV</h1>
          <div>
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add_cv_modal"><i
                class="fa-regular fa-plus"></i> Add CV</button>
          </div>
        </div>
        <div class="border border-bottom border-black mt-4"></div>
      </div>
      <div class="container-fluid py-5">
        {{-- If --}}
        {{-- <p>No CV has been created yet!</p> --}}
        {{-- Else --}}
        <div class="row">
          {{-- @foreach ($collection as $item) --}}
          <div class="col-12 col-lg-4 text-decoration-none mb-4">
            <div class="card p-2 rounded-4">
              <div class="rounded-3 bg-secondary-subtle px-3 py-4">
                <small class="bg-white px-2 py-1 rounded-5 fw-semibold">13 May 2024</small>
                <h4 class="my-3">Nama CV</h4>
              </div>
              <div class="d-flex justify-content-end mt-3">
                <a href="" class="btn btn-black rounded-3">Detail</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 text-decoration-none mb-4">
            <div class="card p-2 rounded-4">
              <div class="rounded-3 bg-secondary-subtle px-3 py-4">
                <small class="bg-white px-2 py-1 rounded-5 fw-semibold">13 May 2024</small>
                <h4 class="my-3">Nama CV</h4>
              </div>
              <div class="d-flex justify-content-end mt-3">
                <a href="" class="btn btn-black rounded-3">Detail</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 text-decoration-none mb-4">
            <div class="card p-2 rounded-4">
              <div class="rounded-3 bg-secondary-subtle px-3 py-4">
                <small class="bg-white px-2 py-1 rounded-5 fw-semibold">13 May 2024</small>
                <h4 class="my-3">Nama CV</h4>
              </div>
              <div class="d-flex justify-content-end mt-3">
                <a href="" class="btn btn-black rounded-3">Detail</a>
              </div>
            </div>
          </div>
          {{-- @endforeach --}}
        </div>
        {{-- End If --}}
      </div>
    </div>
  </div>

  <div class="modal fade" id="add_cv_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-2 border-0 d-flex justify-content-end">
          <button type="button" class="btn btn-link text-dark" data-bs-dismiss="modal" aria-label="Close"><i
              class="fa-regular fa-x"></i></button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="mb-4">
              <h3 class="">Create new CV</h3>
              <p class="text-secondary">
                Enter the name of your CV to make it easier for you to differentiate your CV from one another.
              </p>
            </div>
            <form action="#" method="POST" autocomplete="off">
              @csrf
              <div class="">
                <div class="mb-3">
                  <label for="cv_name" class="form-label @error('cv_name') text-danger @enderror text-secondary">
                    CV Name
                    @error('cv_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="cv_name" class="form-control input @error('cv_name') is-invalid @enderror" id="cv_name"
                    name="cv_name" value="{{ old('cv_name') }}" required>
                </div>
                <div class="d-flex justify-content-end">
                  <button class="btn btn-outline-dark px-5" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                  <input class="btn btn-dark px-5 ms-2" type="submit" value="Create" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
