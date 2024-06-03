@extends('layout.layout')

@section('content')
  @include('components.sidebar')

  <div class="row m-0">

    <div class="col-lg-2 col-4">

    </div>
    <div class="col-lg-10 col-8">

      @if (session()->has('success'))
        @include('components.alert', ['message' => session('success')])
      @endif

      <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="m-0">My CV</h3>
          @if (!$cvs->isEmpty())
            <div>
              <button class="btn btn-black" data-bs-toggle="modal" data-bs-target="#add_cv_modal"><i
                  class="fa-regular fa-plus"></i> New CV</button>
            </div>
          @endif
        </div>
        <div class="border border-bottom border-black mt-3"></div>
      </div>
      <div class="container-fluid py-5">
        @if ($cvs->isEmpty())
          <div class="text-center py-5 my-5">
            <h1 class="mb-4">
              <svg class="svg-icon"
                style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M855.6 427.2H168.5c-12.7 0-24.4 6.9-30.6 18L4.4 684.7C1.5 689.9 0 695.8 0 701.8v287.1c0 19.4 15.7 35.1 35.1 35.1H989c19.4 0 35.1-15.7 35.1-35.1V701.8c0-6-1.5-11.8-4.4-17.1L886.2 445.2c-6.2-11.1-17.9-18-30.6-18zM673.4 695.6c-16.5 0-30.8 11.5-34.3 27.7-12.7 58.5-64.8 102.3-127.2 102.3s-114.5-43.8-127.2-102.3c-3.5-16.1-17.8-27.7-34.3-27.7H119c-26.4 0-43.3-28-31.1-51.4l81.7-155.8c6.1-11.6 18-18.8 31.1-18.8h622.4c13 0 25 7.2 31.1 18.8l81.7 155.8c12.2 23.4-4.7 51.4-31.1 51.4H673.4zM819.9 209.5c-1-1.8-2.1-3.7-3.2-5.5-9.8-16.6-31.1-22.2-47.8-12.6L648.5 261c-17 9.8-22.7 31.6-12.6 48.4 0.9 1.4 1.7 2.9 2.5 4.4 9.5 17 31.2 22.8 48 13L807 257.3c16.7-9.7 22.4-31 12.9-47.8zM375.4 261.1L255 191.6c-16.7-9.6-38-4-47.8 12.6-1.1 1.8-2.1 3.6-3.2 5.5-9.5 16.8-3.8 38.1 12.9 47.8L337.3 327c16.9 9.7 38.6 4 48-13.1 0.8-1.5 1.7-2.9 2.5-4.4 10.2-16.8 4.5-38.6-12.4-48.4zM512 239.3h2.5c19.5 0.3 35.5-15.5 35.5-35.1v-139c0-19.3-15.6-34.9-34.8-35.1h-6.4C489.6 30.3 474 46 474 65.2v139c0 19.5 15.9 35.4 35.5 35.1h2.5z" />
              </svg>
            </h1>
            <div>
              <h6 class="">No CV has been created yet!</h6>
              <p class="text-secondary text-small">Click New CV button below to build your first CV.</p>
            </div>
            <div>
              <button class="btn btn-outline-black" data-bs-toggle="modal" data-bs-target="#add_cv_modal"><i
                  class="fa-regular fa-plus"></i> New CV</button>
            </div>
          </div>
        @else
          <div class="row">
            @foreach ($cvs as $cv)
              <div class="col-12 col-lg-4 mb-4">
                <div class="card p-2 rounded-4">
                  <div class="rounded-3 bg-secondary-subtle px-3 py-4">
                    <small class="bg-white px-2 py-1 rounded-5 fw-semibold">{{ $cv->created_at->diffForHumans() }}</small>
                    <h4 class="my-3 text-capitalize">{{ $cv->cv_name }}</h4>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-3">
                    <div class="d-flex gap-4">
                      <div class="d-flex">
                        {{-- <a href="/cv/share/{{ $cv->id }}" class="btn link-dark" target="_blank">
                          <i class="fa-regular fa-eye fa-lg"></i>
                        </a> --}}
                        <a href="/cv/export/{{ $cv->id }}" class="btn link-dark">
                          <i class="fa-regular fa-arrow-down-to-square fa-lg"></i>
                        </a>
                        <button type="submit" class="btn link-dark" data-bs-toggle="modal"
                          data-bs-target="#delete_cv_modal_{{ $cv->id }}">
                          <i class="fa-regular fa-trash-can fa-lg"></i>
                        </button>
                      </div>
                    </div>
                    <div>
                      <a href="/cv/{{ $cv->id }}" class="btn btn-black rounded-3">Detail</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="delete_cv_modal_{{ $cv->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header py-2 border-0 d-flex justify-content-end">
                      <button type="button" class="btn btn-link text-dark" data-bs-dismiss="modal" aria-label="Close"><i
                          class="fa-regular fa-x"></i></button>
                    </div>
                    <div class="modal-body">
                      <div class="">
                        <div class="mb-4">
                          <h3 class="">Delete <span class="">"{{ $cv->cv_name }}"</span> CV</h3>
                          <p class="text-secondary">
                            Your CV data will not be restored! Are you sure?
                          </p>
                        </div>
                        <div class="mb-3">
                          <label for="cv_name" class="form-label text-secondary">
                            To confirm, type "{{ $cv->cv_name }}" in the form below.
                          </label>
                          <input type="cv_name" class="form-control input is-invalid"
                            id="cv_name_confirm_{{ $cv->id }}" name="cv_name" value="" autofocus required>
                        </div>
                        <form action="/cv/{{ $cv->id }}" method="POST">
                          @method('delete')
                          @csrf
                          <div class="">
                            <div class="d-flex justify-content-end mt-5">
                              <a class="btn btn-outline-black px-5" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                              <input class="btn btn-black px-5 ms-2" id="btn_delete_cv_{{ $cv->id }}" type="submit" value="Delete" disabled />
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @include('script.delete-confirm')
            @endforeach
          </div>
        @endif
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
            <form action="/cv" method="POST">
              @csrf
              <div class="">
                <div class="mb-3">
                  <label for="cv_name" class="form-label @error('cv_name') text-danger @enderror text-secondary">
                    CV Name
                    @error('cv_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="cv_name" class="form-control input @error('cv_name') is-invalid @enderror"
                    id="cv_name" name="cv_name" value="" autofocus required>
                </div>
                <div class="d-flex justify-content-end mt-5">
                  <a class="btn btn-outline-black px-5" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                  <input class="btn btn-black px-5 ms-2" type="submit" value="Create" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
