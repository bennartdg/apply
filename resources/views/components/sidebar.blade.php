<aside class="col-lg-2 col-4 vh-100 fixed-top bg-black d-flex">
  <div class="py-5 px-3 text-white d-flex flex-column justify-content-between">
    <div>
      <div>
        <img src="/asset/logo/APPLY-white.png" alt="" class="img-fluid">
        <p>
          <span class="text-dark-emphasis">for</span>
          <span id="changing-text">building CV</span>
        </p>
      </div>
      <div class="pt-5">
        <div class="d-flex flex-column gap-3">
          <div class="">
            <h5 class="">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
            <p class="text-dark-emphasis">{{ '@' . auth()->user()->username }}</p>
            <small class="d-flex align-items-center">
              @if (auth()->user()->status == 'student')
                <ion-icon name="school"></ion-icon>
              @else
                <ion-icon name="briefcase"></ion-icon>
              @endif
              <span class="ms-1 text-capitalize">{{ auth()->user()->status }}</span>
            </small>
          </div>
        </div>
        <hr>
        {{-- <div class="">
          <small class="d-flex align-items-center">
            <ion-icon name="location"></ion-icon>
            <span class="ms-1"></span>
          </small>
        </div> --}}
        <div class="d-flex flex-column mt-4">
          <button class="btn btn-black" data-bs-toggle="modal" data-bs-target="#edit_profile_modal">Edit
            Profile</button>
        </div>
      </div>
    </div>

    <div class="d-flex">
      <div class="btn-group bg-black dropup">
        <a class="btn bg-black btn-black dropdown-toggle" href="#" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img class="rounded-circle img-fluid"
            src="https://miro.medium.com/v2/resize:fill:100:100/1*dmbNkD5D-u45r44go_cf0g.png" width="36"
            height="36" loading="lazy">
          {{-- <ion-icon name="cog-outline"></ion-icon> --}}
        </a>
        <ul class="dropdown-menu bg-near-black mb-3">
          <li class="w-100">
            <button type="button" class="btn btn-link link-light text-decoration-none d-flex align-items-center"
              data-bs-toggle="modal" data-bs-target="#logout_modal">
              <span class="ms-1">Logout</span>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</aside>

<div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header py-2 border-0 d-flex justify-content-end">
        <button type="button" class="btn btn-link text-dark" data-bs-dismiss="modal" aria-label="Close"><i
            class="fa-regular fa-x"></i></button>
      </div>
      <div class="modal-body">
        <div class="">
          <div class="mb-4">
            <h3 class="">Are you sure want to Logout?</h3>
            <p class="text-secondary">
              After you logged out, you need to re-login for apply.
            </p>
          </div>
          <form id="logout_form" action="/logout" method="POST">
            @csrf
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-outline-black px-5" data-bs-dismiss="modal"
                aria-label="Close">Cancel</button>
              <button type="submit" class="btn btn-black ms-2 px-5">
                Logout
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal modal fade" id="edit_profile_modal" tabindex="-1" aria-labelledby="edit_profile_modal_label"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header py-2 border-0 d-flex justify-content-end">
        <button type="button" class="btn btn-link text-dark" data-bs-dismiss="modal" aria-label="Close"><i
            class="fa-regular fa-x"></i></button>
      </div>
      <div class="modal-body">
        <div class="">
          <div class="mb-4">
            <h3 class="">Edit Profile</h3>
            <p class="text-secondary">
              Fill the form to complete your account profile.
            </p>
          </div>
          <form action="/user/{{ auth()->user()->id }}" method="POST">
            @method('put')
            @csrf
            <div class="">
              <div class="row mb-3">
                <div class="d-flex align-items-center justify-content-center col-4">
                  <img class="rounded-circle img-fluid"
                    src="https://miro.medium.com/v2/resize:fill:100:100/1*dmbNkD5D-u45r44go_cf0g.png" width="68"
                    height="68" loading="lazy">
                </div>
                <div class="col-8">
                  <div class="col-12">
                    <label for="first_name"
                      class="form-label @error('first_name') text-danger @enderror text-secondary">
                      First Name
                      @error('first_name')
                        <span class="text-danger">*</span>
                      @enderror
                    </label>
                    <input type="text" class="form-control input @error('first_name') is-invalid @enderror"
                      id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}">
                  </div>
                  <div class="col-12">
                    <label for="last_name"
                      class="form-label @error('last_name') text-danger @enderror text-secondary">
                      Last Name
                      @error('last_name')
                        <span class="text-danger">*</span>
                      @enderror
                    </label>
                    <input type="text" class="form-control input @error('last_name') is-invalid @enderror"
                      id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                  </div>
                </div>
              </div>
              <div class="col-12 mb-3">
                <label for="status" class="form-label @error('status') is-invalid @enderror text-secondary">Status
                  @error('status')
                    *
                  @enderror
                </label>
                <select class="form-select input @error('status') is-invalid @enderror" id="status"
                  name="status">
                  @if (auth()->user()->status == 'student')
                    <option value="student" selected>Student</option>
                  @else
                    <option value="student">Student</option>
                  @endif
                  @if (auth()->user()->status == 'fresh graduate')
                    <option value="fresh graduate" selected>Fresh Graduate</option>
                  @else
                    <option value="fresh graduate">Fresh Graduate</option>
                  @endif
                  @if (auth()->user()->status == 'experienced')
                    <option value="experienced" selected>Experienced</option>
                  @else
                    <option value="experienced">Experienced</option>
                  @endif
                </select>
              </div>
              {{-- <div class="row mb-3">
                <div class="col-6">
                  <label for="city" class="form-label @error('city') text-danger @enderror text-secondary">
                    City
                    @error('city')
                      *
                    @enderror
                  </label>
                  <input type="text" class="form-control input" id="city" name="city"
                    value="{{ old('city') }}">
                </div>
                <div class="col-6">
                  <label for="country" class="form-label  @error('country') text-danger @enderror text-secondary">
                    Country
                    @error('country')
                      *
                    @enderror
                  </label>
                  <input type="text" class="form-control input" id="country" name="country"
                    value="{{ old('country') }}">
                </div>
              </div> --}}
              <div class="d-flex justify-content-end mt-5">
                <a class="btn btn-outline-black px-5" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                <input class="btn btn-black px-5 ms-2" type="submit" value="Save Changes" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const textArray = [
    "building CV",
    "get a job",
    "your future",
    "you"
  ];
  let currentIndex = 0;

  function changeText() {
    $("#changing-text").text(textArray[currentIndex]);
    currentIndex = (currentIndex + 1) % textArray.length;
  }

  $(document).ready(function() {
    setInterval(changeText, 2000);
  });
</script>
