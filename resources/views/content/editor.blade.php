@extends('layout.layout')

@section('content')
  @include('components.navbar')

  @if (session()->has('success'))
    @include('components.alert', ['message' => session('success')])
  @endif


  <div class="row m-0">

    <div class="col-12 col-lg-7">
      {{-- Personal Section --}}
      <div class="d-flex gap-0">
        <a href="/cv/{{ $cv->id }}#personal" class="tabs p-3 link-dark shadow-sm text-decoration-none rounded-top-3" id="personal_nav">
          <h6 class="m-0">
            <i class="fa-regular fa-address-card"></i>
            Personal
          </h6>
          <i class="bottom right"></i>
        </a>
        <a href="/cv/{{ $cv->id }}#professional" class="tabs p-3 link-dark shadow-sm text-decoration-none rounded-top-3" id="professional_nav">
          <h6 class="m-0">
            <i class="fa-regular fa-business-time"></i>
            Professional
          </h6>
        </a>
        <a href="/cv/{{ $cv->id }}#education" class="tabs p-3 link-dark shadow-sm text-decoration-none rounded-top-3" id="education_nav">
          <h6 class="m-0">
            <i class="fa-regular fa-school"></i>
            Educational
          </h6>
        </a>
        <a href="/cv/{{ $cv->id }}#organisation" class="tabs p-3 link-dark shadow-sm text-decoration-none rounded-top-3" id="organisation_nav">
          <h6 class="m-0">
            <i class="fa-regular fa-users-rectangle"></i>
            Organisation
          </h6>
        </a>
        <a href="/cv/{{ $cv->id }}#other" class="tabs p-3 link-dark shadow-sm text-decoration-none rounded-top-3" id="other_nav">
          <h6 class="m-0">
            <i class="fa-regular fa-file-certificate"></i>
            Other
          </h6>
        </a>
      </div>

      {{-- Personal Section --}}
      <div class="bg-white p-4 mb-4" id="personal">
        <div>
          <h4>Personal Information</h4>
          <small>Help recruiters to get in touch with you.</small>
        </div>
        <div class="mt-3">
          @if ($cv->personal)
            {{-- edit --}}
            <form action="/personal/{{ $cv->personal->id }}" method="POST">
              @method('put')
              @csrf
              <div class="mb-4">
                <label for="name" class="form-label @error('name') text-danger @enderror text-secondary">
                  Name
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('name') is-invalid @enderror" id="name"
                  name="name" value="{{ $cv->personal->name }}">
              </div>

              <div class="mb-4 row">
                <div class="col-6">
                  <label for="phone" class="form-label @error('phone') text-danger @enderror text-secondary">
                    Phone Number (Mobile)
                    @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="text" class="form-control input @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ $cv->personal->phone }}"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <div class="col-6">
                  <label for="email" class="form-label @error('email') text-danger @enderror text-secondary">
                    Email Address
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="email" class="form-control input @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ $cv->personal->email }}">
                </div>
              </div>

              <div class="mb-4">
                <label for="linkedin" class="form-label @error('linkedin') text-danger @enderror text-secondary">
                  Linkedin Profile URL
                  @error('linkedin')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('linkedin') is-invalid @enderror" id="linkedin"
                  name="linkedin" value="{{ $cv->personal->linkedin }}">
              </div>

              <div class="mb-4">
                <label for="website" class="form-label @error('website') text-danger @enderror text-secondary">
                  Portofolio/Website URL (Optional)
                  @error('website')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('website') is-invalid @enderror" id="website"
                  name="website" value="{{ $cv->personal->website }}">
              </div>

              <div class="mb-4">
                <label for="address" class="form-label @error('address') text-danger @enderror text-secondary">
                  Address (Optional)
                  @error('address')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('address') is-invalid @enderror" id="address"
                  name="address" value="{{ $cv->personal->address }}">
              </div>

              <div class="mb-4">
                <label for="description" class="form-label @error('description') text-danger @enderror text-secondary">
                  Short description about yourself
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <textarea class="form-control input @error('description') is-invalid @enderror" name="description" id="description"
                  cols="30" rows="5">{{ $cv->personal->description }}</textarea>
              </div>

              <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

              <div class="d-flex justify-content-end">
                <input type="submit" value="SAVE & NEXT" class="btn btn-black">
              </div>
            </form>
          @else
            <form action="/personal" method="POST">
              @csrf
              <div class="mb-4">
                <label for="name" class="form-label @error('name') text-danger @enderror text-secondary">
                  Name
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('name') is-invalid @enderror" id="name"
                  name="name" value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}">
              </div>

              <div class="mb-4 row">
                <div class="col-6">
                  <label for="phone" class="form-label @error('phone') text-danger @enderror text-secondary">
                    Phone Number (Mobile)
                    @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="text" class="form-control input @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ old('phone') }}"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <div class="col-6">
                  <label for="email" class="form-label @error('email') text-danger @enderror text-secondary">
                    Email Address
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="email" class="form-control input @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ auth()->user()->email }}">
                </div>
              </div>

              <div class="mb-4">
                <label for="linkedin" class="form-label @error('linkedin') text-danger @enderror text-secondary">
                  Linkedin Profile URL
                  @error('linkedin')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('linkedin') is-invalid @enderror"
                  id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
              </div>

              <div class="mb-4">
                <label for="website" class="form-label @error('website') text-danger @enderror text-secondary">
                  Portofolio/Website URL (Optional)
                  @error('website')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('website') is-invalid @enderror" id="website"
                  name="website" value="{{ old('website') }}">
              </div>

              <div class="mb-4">
                <label for="address" class="form-label @error('address') text-danger @enderror text-secondary">
                  Address (Optional)
                  @error('address')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <input type="text" class="form-control input @error('address') is-invalid @enderror" id="address"
                  name="address" value="{{ old('address') }}">
              </div>

              <div class="mb-4">
                <label for="description" class="form-label @error('description') text-danger @enderror text-secondary">
                  Short description about yourself
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </label>
                <textarea class="form-control input @error('description') is-invalid @enderror" name="description" id="description"
                  cols="30" rows="5">{{ old('description') }}</textarea>
              </div>

              <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

              <div class="d-flex justify-content-end">
                <input type="submit" value="SAVE & NEXT" class="btn btn-black">
              </div>
            </form>
          @endif
        </div>
      </div>

      {{-- Professional Section --}}
      <div class="bg-white p-4 mb-4" id="professional" hidden>
        <div>
          <h4 id="title_professional_section_name" class="text-capitalize"></h4>
          <div class="mb-4">
            <form action="/cv/{{ $cv->id }}" method="POST">
              @method('put')
              @csrf
              <label for="professional_section_name"
                class="form-label @error('professional_section_name') text-danger @enderror text-secondary">
                Section Name
                @error('professional_section_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </label>
              <div class="d-flex">
                @if ($cv->professional_section_name)
                  <input type="text"
                    class="form-control input @error('professional_section_name') is-invalid @enderror"
                    id="professional_section_name" name="professional_section_name"
                    value="{{ $cv->professional_section_name }}">
                @else
                  <input type="text"
                    class="form-control input @error('professional_section_name') is-invalid @enderror"
                    id="professional_section_name" name="professional_section_name" value="Work Experiences">
                @endif
                <button type="submit" class="btn btn-black ms-2"><i class="fa-solid fa-floppy-disk"></i></button>
              </div>
            </form>
          </div>

          <div id="experiences">
            <small>Start with your most recent (newest) experiences.</small>
            @if ($cv->professional->count() > 0)
              @foreach ($cv->professional as $professional)
                <div class="my-3 border rounded-3 p-3">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <a class="link-dark d-flex align-items-center text-decoration-none" data-bs-toggle="collapse"
                        href="#professional_form_{{ $professional->id }}" role="button" aria-expanded="false"
                        aria-controls="professional_form_{{ $professional->id }}">
                        <i class="fa-regular fa-chevron-down"></i>
                        <h6 class="m-0 ms-2" id="professional_name_{{ $professional->id }}"></h6>
                      </a>
                    </div>

                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('delete')
                      @csrf
                      <button type="submit" class="link-danger bg-transparent border-0"
                        onclick="return confirm('Are you sure?')"><i
                          class="fa-regular fa-trash-xmark fa-lg"></i></button>
                    </form>

                  </div>

                  <div class="mt-4 collapse" id="professional_form_{{ $professional->id }}">
                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('put')
                      @csrf
                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="company_name_{{ $professional->id }}"
                            class="form-label @error('company_name') text-danger @enderror text-secondary">
                            Company Name
                            @error('company_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                            id="company_name_{{ $professional->id }}" name="company_name"
                            value="{{ $professional->company_name }}">
                        </div>

                        <div class="col-6">
                          <label for="role_title_{{ $professional->id }}"
                            class="form-label @error('role_title') text-danger @enderror text-secondary">
                            Job/Internship/Role Title
                            @error('role_title')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                            id="role_title_{{ $professional->id }}" name="role_title"
                            value="{{ $professional->role_title }}">
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="company_location_{{ $professional->id }}"
                          class="form-label @error('company_location') text-danger @enderror text-secondary">
                          Company Location (City, Country)
                          @error('company_location')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text"
                          class="form-control input @error('company_location') is-invalid @enderror"
                          id="company_location_{{ $professional->id }}" name="company_location"
                          value="{{ $professional->company_location }}">
                      </div>

                      <div class="mb-4">
                        <label for="company_description_{{ $professional->id }}"
                          class="form-label @error('company_description') text-danger @enderror text-secondary">
                          Company Description (Optional)
                          @error('company_description')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                          id="company_description_{{ $professional->id }}" cols="30" rows="5">{{ $professional->company_description }}</textarea>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="start_month_{{ $professional->id }}"
                            class="form-label @error('start_month') text-danger @enderror text-secondary">
                            Start Month
                            @error('start_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                            id="start_month_{{ $professional->id }}" name="start_month"
                            value="{{ $professional->start_month }}">
                        </div>
                        <div class="col-6">
                          <label for="start_year_{{ $professional->id }}"
                            class="form-label @error('start_year') text-danger @enderror text-secondary">
                            Start Year
                            @error('start_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                            id="start_year_{{ $professional->id }}" name="start_year"
                            value="{{ $professional->start_year }}">
                        </div>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="end_month_{{ $professional->id }}"
                            class="form-label @error('end_month') text-danger @enderror text-secondary">
                            End Month
                            @error('end_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                            id="end_month_{{ $professional->id }}" name="end_month"
                            value="{{ $professional->end_month }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>
                        <div class="col-6">
                          <label for="end_year_{{ $professional->id }}"
                            class="form-label @error('end_year') text-danger @enderror text-secondary">
                            End Year
                            @error('end_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                            id="end_year_{{ $professional->id }}" name="end_year"
                            value="{{ $professional->end_year }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>

                        <div class="mt-2">
                          <input class="form-check-input" type="checkbox" id="currently_work_{{ $professional->id }}"
                            name="currently_work" value="1" @if ($professional->currently_work == 1) checked @endif>
                          <label for="currently_work_{{ $professional->id }}" class="text-secondary">I am currently
                            working here</label>
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="work_achievement_{{ $professional->id }}"
                          class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                          Work Portfolio and Achievements
                          @error('work_achievement')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                          id="work_achievement_{{ $professional->id }}" cols="30" rows="5">{{ $professional->work_achievement }}</textarea>
                      </div>

                      <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                      <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-black">SAVE</button>
                      </div>
                    </form>
                  </div>
                </div>

                @include('script.professional')
              @endforeach

              <div class="d-flex flex-column">
                <a class="btn btn-outline-primary" id="btn_experience_add"><i
                    class="fa-regular fa-circle-plus me-1"></i>Add Experience</a>
              </div>

              <div class="my-3 border rounded-3 p-3" id="experience_add" hidden>
                <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <a class="link-dark d-flex align-items-center text-decoration-none" data-bs-toggle="collapse"
                      href="#professional_form" role="button" aria-expanded="false"
                      aria-controls="professional_form">
                      <i class="fa-regular fa-chevron-down"></i>
                      <h6 class="m-0 ms-2" id="professional_name"></h6>
                    </a>
                  </div>

                  <button class="link-danger bg-transparent border-0" id="btn_experience_remove">
                    <i class="fa-regular fa-trash-xmark fa-lg"></i>
                  </button>
                </div>
                <div class="mt-4 collapse show" id="professional_form">
                  <form action="/professional" method="POST">
                    @csrf
                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="company_name"
                          class="form-label @error('company_name') text-danger @enderror text-secondary">
                          Company Name
                          @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                          id="company_name" name="company_name" value="{{ old('company_name') }}">
                      </div>

                      <div class="col-6">
                        <label for="role_title"
                          class="form-label @error('role_title') text-danger @enderror text-secondary">
                          Job/Internship/Role Title
                          @error('role_title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                          id="role_title" name="role_title" value="{{ old('role_title') }}">
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="company_location"
                        class="form-label @error('company_location') text-danger @enderror text-secondary">
                        Company Location (City, Country)
                        @error('company_location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('company_location') is-invalid @enderror"
                        id="company_location" name="company_location" value="{{ old('company_location') }}">
                    </div>

                    <div class="mb-4">
                      <label for="company_description"
                        class="form-label @error('company_description') text-danger @enderror text-secondary">
                        Company Description (Optional)
                        @error('company_description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                        id="company_description" cols="30" rows="5">{{ old('company_description') }}</textarea>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="start_month"
                          class="form-label @error('start_month') text-danger @enderror text-secondary">
                          Start Month
                          @error('start_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                          id="start_month" name="start_month" value="{{ old('start_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="start_year"
                          class="form-label @error('start_year') text-danger @enderror text-secondary">
                          Start Year
                          @error('start_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                          id="start_year" name="start_year" value="{{ old('start_year') }}">
                      </div>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="end_month"
                          class="form-label @error('end_month') text-danger @enderror text-secondary">
                          End Month
                          @error('end_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                          id="end_month" name="end_month" value="{{ old('end_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="end_year"
                          class="form-label @error('end_year') text-danger @enderror text-secondary">
                          End Year
                          @error('end_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                          id="end_year" name="end_year" value="{{ old('end_year') }}">
                      </div>

                      <div class="mt-2">
                        <input class="form-check-input" type="checkbox" id="currently_work" name="currently_work"
                          value="1">
                        <label for="currently_work" class="text-secondary">I am currently working here</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="work_achievement"
                        class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                        Work Portfolio and Achievements
                        @error('work_achievement')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                        id="work_achievement" cols="30" rows="5">{{ old('work_achievement') }}</textarea>
                    </div>

                    <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-black">SAVE</button>
                    </div>
                  </form>
                </div>
              </div>
            @else
              <div class="my-3 border rounded-3 p-3">
                <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <a class="link-dark d-flex align-items-center text-decoration-none" data-bs-toggle="collapse"
                      href="#professional_form" role="button" aria-expanded="false"
                      aria-controls="professional_form">
                      <i class="fa-regular fa-chevron-down"></i>
                      <h6 class="m-0 ms-2" id="professional_name"></h6>
                    </a>
                  </div>
                </div>
                <div class="mt-4 collapse show" id="professional_form">
                  <form action="/professional" method="POST">
                    @csrf
                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="company_name"
                          class="form-label @error('company_name') text-danger @enderror text-secondary">
                          Company Name
                          @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                          id="company_name" name="company_name" value="{{ old('company_name') }}">
                      </div>

                      <div class="col-6">
                        <label for="role_title"
                          class="form-label @error('role_title') text-danger @enderror text-secondary">
                          Job/Internship/Role Title
                          @error('role_title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                          id="role_title" name="role_title" value="{{ old('role_title') }}">
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="company_location"
                        class="form-label @error('company_location') text-danger @enderror text-secondary">
                        Company Location (City, Country)
                        @error('company_location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('company_location') is-invalid @enderror"
                        id="company_location" name="company_location" value="{{ old('company_location') }}">
                    </div>

                    <div class="mb-4">
                      <label for="company_description"
                        class="form-label @error('company_description') text-danger @enderror text-secondary">
                        Company Description (Optional)
                        @error('company_description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                        id="company_description" cols="30" rows="5">{{ old('company_description') }}</textarea>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="start_month"
                          class="form-label @error('start_month') text-danger @enderror text-secondary">
                          Start Month
                          @error('start_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                          id="start_month" name="start_month" value="{{ old('start_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="start_year"
                          class="form-label @error('start_year') text-danger @enderror text-secondary">
                          Start Year
                          @error('start_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                          id="start_year" name="start_year" value="{{ old('start_year') }}">
                      </div>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="end_month"
                          class="form-label @error('end_month') text-danger @enderror text-secondary">
                          End Month
                          @error('end_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                          id="end_month" name="end_month" value="{{ old('end_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="end_year"
                          class="form-label @error('end_year') text-danger @enderror text-secondary">
                          End Year
                          @error('end_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                          id="end_year" name="end_year" value="{{ old('end_year') }}">
                      </div>

                      <div class="mt-2">
                        <input class="form-check-input" type="checkbox" id="currently_work" name="currently_work"
                          value="1">
                        <label for="currently_work" class="text-secondary">I am currently working here</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="work_achievement"
                        class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                        Work Portfolio and Achievements
                        @error('work_achievement')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                        id="work_achievement" cols="30" rows="5">{{ old('work_achievement') }}</textarea>
                    </div>

                    <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-black">SAVE</button>
                    </div>
                  </form>
                </div>
              </div>
            @endif
          </div>

          <div class="d-flex justify-content-end mt-5">
            <a class="btn btn-outline-dark me-3" href="/cv/{{ $cv->id }}#personal">PREVIOUS</a>
            <a href="/cv/{{ $cv->id }}#education" class="btn btn-black">SAVE & NEXT</a>
          </div>
        </div>
      </div>

      {{-- Education Section --}}
      <div class="bg-white p-4 mb-4" id="education" hidden>
        <div>
          <h4 id="title_education_section_name" class="text-capitalize"></h4>
          <div class="mb-4">
            <form action="/cv/education/{{ $cv->id }}" method="POST">
              @method('put')
              @csrf
              <label for="education_section_name"
                class="form-label @error('education_section_name') text-danger @enderror text-secondary">
                Section Name
                @error('education_section_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </label>
              <div class="d-flex">
                @if ($cv->education_section_name)
                  <input type="text"
                    class="form-control input @error('education_section_name') is-invalid @enderror"
                    id="education_section_name" name="education_section_name"
                    value="{{ $cv->education_section_name }}">
                @else
                  <input type="text"
                    class="form-control input @error('education_section_name') is-invalid @enderror"
                    id="education_section_name" name="education_section_name" value="Education Level">
                @endif
                <button type="submit" class="btn btn-black ms-2"><i class="fa-solid fa-floppy-disk"></i></button>
              </div>
            </form>
          </div>

          <div>
            <small>Start with your most recent education.</small>
            {{-- @if ($cv->education->count() > 0)
              @foreach ($cv->education as $education)
                <div class="my-3 border rounded-3 p-3">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <a class="link-dark" data-bs-toggle="collapse" href="#professional_form_{{ $professional->id }}"
                        role="button" aria-expanded="false"
                        aria-controls="professional_form_{{ $professional->id }}">
                        <i class="fa-regular fa-chevron-down"></i>
                      </a>
                      <h6 class="m-0 ms-2" id="professional_name_{{ $professional->id }}"></h6>
                    </div>

                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('delete')
                      @csrf
                      <button type="submit" class="link-danger bg-transparent border-0"
                        onclick="return confirm('Are you sure?')"><i
                          class="fa-regular fa-trash-xmark fa-lg"></i></button>
                    </form>

                  </div>

                  <div class="mt-4 collapse" id="professional_form_{{ $professional->id }}">
                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('put')
                      @csrf
                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="company_name_{{ $professional->id }}"
                            class="form-label @error('company_name') text-danger @enderror text-secondary">
                            Company Name
                            @error('company_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                            id="company_name_{{ $professional->id }}" name="company_name"
                            value="{{ $professional->company_name }}">
                        </div>

                        <div class="col-6">
                          <label for="role_title_{{ $professional->id }}"
                            class="form-label @error('role_title') text-danger @enderror text-secondary">
                            Job/Internship/Role Title
                            @error('role_title')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                            id="role_title_{{ $professional->id }}" name="role_title"
                            value="{{ $professional->role_title }}">
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="company_location_{{ $professional->id }}"
                          class="form-label @error('company_location') text-danger @enderror text-secondary">
                          Company Location
                          @error('company_location')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text"
                          class="form-control input @error('company_location') is-invalid @enderror"
                          id="company_location_{{ $professional->id }}" name="company_location"
                          value="{{ $professional->company_location }}">
                      </div>

                      <div class="mb-4">
                        <label for="company_description_{{ $professional->id }}"
                          class="form-label @error('company_description') text-danger @enderror text-secondary">
                          Company Description (Optional)
                          @error('company_description')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                          id="company_description_{{ $professional->id }}" cols="30" rows="5">{{ $professional->company_description }}</textarea>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="start_month_{{ $professional->id }}"
                            class="form-label @error('start_month') text-danger @enderror text-secondary">
                            Start Month
                            @error('start_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                            id="start_month_{{ $professional->id }}" name="start_month"
                            value="{{ $professional->start_month }}">
                        </div>
                        <div class="col-6">
                          <label for="start_year_{{ $professional->id }}"
                            class="form-label @error('start_year') text-danger @enderror text-secondary">
                            Start Year
                            @error('start_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                            id="start_year_{{ $professional->id }}" name="start_year"
                            value="{{ $professional->start_year }}">
                        </div>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="end_month_{{ $professional->id }}"
                            class="form-label @error('end_month') text-danger @enderror text-secondary">
                            End Month
                            @error('end_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                            id="end_month_{{ $professional->id }}" name="end_month"
                            value="{{ $professional->end_month }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>
                        <div class="col-6">
                          <label for="end_year_{{ $professional->id }}"
                            class="form-label @error('end_year') text-danger @enderror text-secondary">
                            End Year
                            @error('end_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                            id="end_year_{{ $professional->id }}" name="end_year"
                            value="{{ $professional->end_year }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>

                        <div class="mt-2">
                          <input class="form-check-input" type="checkbox" id="currently_work_{{ $professional->id }}"
                            name="currently_work" value="1" @if ($professional->currently_work == 1) checked @endif>
                          <label for="currently_work_{{ $professional->id }}" class="text-secondary">I am currently
                            working here</label>
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="work_achievement_{{ $professional->id }}"
                          class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                          Work Portfolio and Achievements
                          @error('work_achievement')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                          id="work_achievement_{{ $professional->id }}" cols="30" rows="5">{{ $professional->work_achievement }}</textarea>
                      </div>

                      <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                      <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-black">SAVE</button>
                      </div>
                    </form>
                  </div>
                </div>

                @include('script.professional')
              @endforeach

              <div class="d-flex flex-column">
                <a class="btn btn-outline-primary" id="btn_experience_add"><i
                    class="fa-regular fa-circle-plus me-1"></i>Add Experience</a>
              </div>

              <div class="my-3 border rounded-3 p-3" id="experience_add" hidden>
                <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <a class="link-dark" data-bs-toggle="collapse" href="#professional_form" role="button"
                      aria-expanded="false" aria-controls="professional_form">
                      <i class="fa-regular fa-chevron-down"></i>
                    </a>
                    <h6 class="m-0 ms-2" id="professional_name"></h6>
                  </div>

                  <button class="link-danger bg-transparent border-0" id="btn_experience_remove">
                    <i class="fa-regular fa-trash-xmark fa-lg"></i>
                  </button>
                </div>
                <div class="mt-4 collapse show" id="professional_form">
                  <form action="/professional" method="POST">
                    @csrf
                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="company_name"
                          class="form-label @error('company_name') text-danger @enderror text-secondary">
                          Company Name
                          @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                          id="company_name" name="company_name" value="{{ old('company_name') }}">
                      </div>

                      <div class="col-6">
                        <label for="role_title"
                          class="form-label @error('role_title') text-danger @enderror text-secondary">
                          Job/Internship/Role Title
                          @error('role_title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                          id="role_title" name="role_title" value="{{ old('role_title') }}">
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="company_location"
                        class="form-label @error('company_location') text-danger @enderror text-secondary">
                        Company Location
                        @error('company_location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('company_location') is-invalid @enderror"
                        id="company_location" name="company_location" value="{{ old('company_description') }}">
                    </div>

                    <div class="mb-4">
                      <label for="company_description"
                        class="form-label @error('company_description') text-danger @enderror text-secondary">
                        Company Description (Optional)
                        @error('company_description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                        id="company_description" cols="30" rows="5">{{ old('company_description') }}</textarea>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="start_month"
                          class="form-label @error('start_month') text-danger @enderror text-secondary">
                          Start Month
                          @error('start_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                          id="start_month" name="start_month" value="{{ old('start_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="start_year"
                          class="form-label @error('start_year') text-danger @enderror text-secondary">
                          Start Year
                          @error('start_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                          id="start_year" name="start_year" value="{{ old('start_year') }}">
                      </div>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="end_month"
                          class="form-label @error('end_month') text-danger @enderror text-secondary">
                          End Month
                          @error('end_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                          id="end_month" name="end_month" value="{{ old('end_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="end_year"
                          class="form-label @error('end_year') text-danger @enderror text-secondary">
                          End Year
                          @error('end_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                          id="end_year" name="end_year" value="{{ old('end_year') }}">
                      </div>

                      <div class="mt-2">
                        <input class="form-check-input" type="checkbox" id="currently_work" name="currently_work"
                          value="1">
                        <label for="currently_work" class="text-secondary">I am currently working here</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="work_achievement"
                        class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                        Work Portfolio and Achievements
                        @error('work_achievement')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                        id="work_achievement" cols="30" rows="5">{{ old('work_achievement') }}</textarea>
                    </div>

                    <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-black">SAVE</button>
                    </div>
                  </form>
                </div>
              </div>
            @else --}}
            <div class="my-3 border rounded-3 p-3">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <a class="link-dark d-flex align-items-center text-decoration-none" data-bs-toggle="collapse"
                    href="#education_form" role="button" aria-expanded="false" aria-controls="education_form">
                    <i class="fa-regular fa-chevron-down"></i>
                    <h6 class="m-0 ms-2" id="education_name"></h6>
                  </a>
                </div>
              </div>
              <div class="mt-4 collapse show" id="education_form">
                <form action="/education" method="POST">
                  @csrf
                  <div class="mb-4">
                    <label for="school_name"
                      class="form-label @error('school_name') text-danger @enderror text-secondary">
                      School/University Name
                      @error('school_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <input type="text" class="form-control input @error('school_name') is-invalid @enderror"
                      id="school_name" name="school_name" value="{{ old('school_name') }}">
                  </div>

                  <div class="mb-4">
                    <label for="school_location"
                      class="form-label @error('school_location') text-danger @enderror text-secondary">
                      School/University Location (City, Country)
                      @error('school_location')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <input type="text" class="form-control input @error('school_location') is-invalid @enderror"
                      id="school_location" name="school_location" value="{{ old('school_location') }}">
                  </div>

                  <div class="mb-4 row">
                    <div class="col-6">
                      <label for="education_start_month"
                        class="form-label @error('education_start_month') text-danger @enderror text-secondary">
                        Start Month
                        @error('education_start_month')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('education_start_month') is-invalid @enderror"
                        id="education_start_month" name="education_start_month"
                        value="{{ old('education_start_month') }}">
                    </div>
                    <div class="col-6">
                      <label for="education_start_year"
                        class="form-label @error('education_start_year') text-danger @enderror text-secondary">
                        Start Year
                        @error('education_start_year')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('education_start_year') is-invalid @enderror"
                        id="education_start_year" name="education_start_year"
                        value="{{ old('education_start_year') }}">
                    </div>
                  </div>

                  <div class="mb-4 row">
                    <div class="col-6">
                      <label for="education_end_month"
                        class="form-label @error('education_end_month') text-danger @enderror text-secondary">
                        Graduation Month
                        @error('education_end_month')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('education_end_month') is-invalid @enderror"
                        id="education_end_month" name="education_end_month" value="{{ old('education_end_month') }}">
                    </div>
                    <div class="col-6">
                      <label for="education_end_year"
                        class="form-label @error('education_end_year') text-danger @enderror text-secondary">
                        Graduation Year
                        @error('education_end_year')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('education_end_year') is-invalid @enderror"
                        id="education_end_year" name="education_end_year" value="{{ old('education_end_year') }}">
                    </div>
                  </div>

                  <div class="mb-4 row">
                    <div class="col-6">
                      <label for="education_level"
                        class="form-label @error('education_level') text-danger @enderror text-secondary">
                        Education Level
                        @error('education_level')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('education_level') is-invalid @enderror"
                        id="education_level" name="education_level" value="{{ old('education_level') }}">
                    </div>
                    <div class="col-6">
                      <label for="education_description"
                        class="form-label @error('education_description') text-danger @enderror text-secondary">
                        Description
                        @error('education_description')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('education_description') is-invalid @enderror"
                        id="education_description" name="education_description"
                        value="{{ old('education_description') }}">
                    </div>
                  </div>

                  <div class="mb-4 row">
                    <div class="col-6">
                      <label for="gpa" class="form-label @error('gpa') text-danger @enderror text-secondary">
                        GPA (Optional but Strongly Recomended)
                        @error('gpa')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('gpa') is-invalid @enderror"
                        id="gpa" name="gpa" value="{{ old('gpa') }}">
                    </div>
                    <div class="col-6">
                      <label for="max_gpa" class="form-label @error('max_gpa') text-danger @enderror text-secondary">
                        Max GPA
                        @error('max_gpa')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('max_gpa') is-invalid @enderror"
                        id="max_gpa" name="max_gpa" value="{{ old('max_gpa') }}">
                    </div>
                  </div>

                  <div class="mb-4">
                    <label for="education_achievement"
                      class="form-label @error('education_achievement') text-danger @enderror text-secondary">
                      Activities and Achievements
                      @error('education_achievement')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <textarea class="form-control input @error('education_achievement') is-invalid @enderror"
                      name="education_achievement" id="education_achievement" cols="30" rows="5">{{ old('education_achievement') }}</textarea>
                  </div>

                  <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-black">SAVE</button>
                  </div>
                </form>
              </div>
            </div>
            {{-- @endif --}}
          </div>

          <div class="d-flex justify-content-end mt-5">
            <a class="btn btn-outline-dark me-3" href="/cv/{{ $cv->id }}#professional">PREVIOUS</a>
            <a class="btn btn-black" href="/cv/{{ $cv->id }}#organisation">SAVE & NEXT</a>
          </div>
        </div>
      </div>

      {{-- Organisation Section --}}
      <div class="bg-white p-4 mb-4" id="organisation" hidden>
        <div>
          <h4 id="title_organisation_section_name" class="text-capitalize"></h4>
          <div class="mb-4">
            <form action="/cv/organisation/{{ $cv->id }}" method="POST">
              @method('put')
              @csrf
              <label for="organisation_section_name"
                class="form-label @error('organisation_section_name') text-danger @enderror text-secondary">
                Section Name
                @error('organisation_section_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </label>
              <div class="d-flex">
                @if ($cv->organisation_section_name)
                  <input type="text"
                    class="form-control input @error('organisation_section_name') is-invalid @enderror"
                    id="organisation_section_name" name="organisation_section_name"
                    value="{{ $cv->organisation_section_name }}">
                @else
                  <input type="text"
                    class="form-control input @error('organisation_section_name') is-invalid @enderror"
                    id="organisation_section_name" name="organisation_section_name" value="Organisational Experiences">
                @endif
                <button type="submit" class="btn btn-black ms-2"><i class="fa-solid fa-floppy-disk"></i></button>
              </div>
            </form>
          </div>

          <div>
            <small>Start with your most recent (newest) experiences.</small>
            {{-- @if ($cv->education->count() > 0)
              @foreach ($cv->education as $education)
                <div class="my-3 border rounded-3 p-3">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <a class="link-dark" data-bs-toggle="collapse" href="#professional_form_{{ $professional->id }}"
                        role="button" aria-expanded="false"
                        aria-controls="professional_form_{{ $professional->id }}">
                        <i class="fa-regular fa-chevron-down"></i>
                      </a>
                      <h6 class="m-0 ms-2" id="professional_name_{{ $professional->id }}"></h6>
                    </div>

                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('delete')
                      @csrf
                      <button type="submit" class="link-danger bg-transparent border-0"
                        onclick="return confirm('Are you sure?')"><i
                          class="fa-regular fa-trash-xmark fa-lg"></i></button>
                    </form>

                  </div>

                  <div class="mt-4 collapse" id="professional_form_{{ $professional->id }}">
                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('put')
                      @csrf
                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="company_name_{{ $professional->id }}"
                            class="form-label @error('company_name') text-danger @enderror text-secondary">
                            Company Name
                            @error('company_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                            id="company_name_{{ $professional->id }}" name="company_name"
                            value="{{ $professional->company_name }}">
                        </div>

                        <div class="col-6">
                          <label for="role_title_{{ $professional->id }}"
                            class="form-label @error('role_title') text-danger @enderror text-secondary">
                            Job/Internship/Role Title
                            @error('role_title')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                            id="role_title_{{ $professional->id }}" name="role_title"
                            value="{{ $professional->role_title }}">
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="company_location_{{ $professional->id }}"
                          class="form-label @error('company_location') text-danger @enderror text-secondary">
                          Company Location
                          @error('company_location')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text"
                          class="form-control input @error('company_location') is-invalid @enderror"
                          id="company_location_{{ $professional->id }}" name="company_location"
                          value="{{ $professional->company_location }}">
                      </div>

                      <div class="mb-4">
                        <label for="company_description_{{ $professional->id }}"
                          class="form-label @error('company_description') text-danger @enderror text-secondary">
                          Company Description (Optional)
                          @error('company_description')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                          id="company_description_{{ $professional->id }}" cols="30" rows="5">{{ $professional->company_description }}</textarea>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="start_month_{{ $professional->id }}"
                            class="form-label @error('start_month') text-danger @enderror text-secondary">
                            Start Month
                            @error('start_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                            id="start_month_{{ $professional->id }}" name="start_month"
                            value="{{ $professional->start_month }}">
                        </div>
                        <div class="col-6">
                          <label for="start_year_{{ $professional->id }}"
                            class="form-label @error('start_year') text-danger @enderror text-secondary">
                            Start Year
                            @error('start_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                            id="start_year_{{ $professional->id }}" name="start_year"
                            value="{{ $professional->start_year }}">
                        </div>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="end_month_{{ $professional->id }}"
                            class="form-label @error('end_month') text-danger @enderror text-secondary">
                            End Month
                            @error('end_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                            id="end_month_{{ $professional->id }}" name="end_month"
                            value="{{ $professional->end_month }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>
                        <div class="col-6">
                          <label for="end_year_{{ $professional->id }}"
                            class="form-label @error('end_year') text-danger @enderror text-secondary">
                            End Year
                            @error('end_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                            id="end_year_{{ $professional->id }}" name="end_year"
                            value="{{ $professional->end_year }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>

                        <div class="mt-2">
                          <input class="form-check-input" type="checkbox" id="currently_work_{{ $professional->id }}"
                            name="currently_work" value="1" @if ($professional->currently_work == 1) checked @endif>
                          <label for="currently_work_{{ $professional->id }}" class="text-secondary">I am currently
                            working here</label>
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="work_achievement_{{ $professional->id }}"
                          class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                          Work Portfolio and Achievements
                          @error('work_achievement')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                          id="work_achievement_{{ $professional->id }}" cols="30" rows="5">{{ $professional->work_achievement }}</textarea>
                      </div>

                      <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                      <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-black">SAVE</button>
                      </div>
                    </form>
                  </div>
                </div>

                @include('script.professional')
              @endforeach

              <div class="d-flex flex-column">
                <a class="btn btn-outline-primary" id="btn_experience_add"><i
                    class="fa-regular fa-circle-plus me-1"></i>Add Experience</a>
              </div>

              <div class="my-3 border rounded-3 p-3" id="experience_add" hidden>
                <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <a class="link-dark" data-bs-toggle="collapse" href="#professional_form" role="button"
                      aria-expanded="false" aria-controls="professional_form">
                      <i class="fa-regular fa-chevron-down"></i>
                    </a>
                    <h6 class="m-0 ms-2" id="professional_name"></h6>
                  </div>

                  <button class="link-danger bg-transparent border-0" id="btn_experience_remove">
                    <i class="fa-regular fa-trash-xmark fa-lg"></i>
                  </button>
                </div>
                <div class="mt-4 collapse show" id="professional_form">
                  <form action="/professional" method="POST">
                    @csrf
                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="company_name"
                          class="form-label @error('company_name') text-danger @enderror text-secondary">
                          Company Name
                          @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                          id="company_name" name="company_name" value="{{ old('company_name') }}">
                      </div>

                      <div class="col-6">
                        <label for="role_title"
                          class="form-label @error('role_title') text-danger @enderror text-secondary">
                          Job/Internship/Role Title
                          @error('role_title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                          id="role_title" name="role_title" value="{{ old('role_title') }}">
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="company_location"
                        class="form-label @error('company_location') text-danger @enderror text-secondary">
                        Company Location
                        @error('company_location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('company_location') is-invalid @enderror"
                        id="company_location" name="company_location" value="{{ old('company_description') }}">
                    </div>

                    <div class="mb-4">
                      <label for="company_description"
                        class="form-label @error('company_description') text-danger @enderror text-secondary">
                        Company Description (Optional)
                        @error('company_description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                        id="company_description" cols="30" rows="5">{{ old('company_description') }}</textarea>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="start_month"
                          class="form-label @error('start_month') text-danger @enderror text-secondary">
                          Start Month
                          @error('start_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                          id="start_month" name="start_month" value="{{ old('start_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="start_year"
                          class="form-label @error('start_year') text-danger @enderror text-secondary">
                          Start Year
                          @error('start_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                          id="start_year" name="start_year" value="{{ old('start_year') }}">
                      </div>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="end_month"
                          class="form-label @error('end_month') text-danger @enderror text-secondary">
                          End Month
                          @error('end_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                          id="end_month" name="end_month" value="{{ old('end_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="end_year"
                          class="form-label @error('end_year') text-danger @enderror text-secondary">
                          End Year
                          @error('end_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                          id="end_year" name="end_year" value="{{ old('end_year') }}">
                      </div>

                      <div class="mt-2">
                        <input class="form-check-input" type="checkbox" id="currently_work" name="currently_work"
                          value="1">
                        <label for="currently_work" class="text-secondary">I am currently working here</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="work_achievement"
                        class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                        Work Portfolio and Achievements
                        @error('work_achievement')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                        id="work_achievement" cols="30" rows="5">{{ old('work_achievement') }}</textarea>
                    </div>

                    <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-black">SAVE</button>
                    </div>
                  </form>
                </div>
              </div>
            @else --}}
            <div class="my-3 border rounded-3 p-3">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <a class="link-dark d-flex align-items-center text-decoration-none" data-bs-toggle="collapse"
                    href="#organisation_form" role="button" aria-expanded="false" aria-controls="organisation_form">
                    <i class="fa-regular fa-chevron-down"></i>
                    <h6 class="m-0 ms-2" id="organisation_subsection_name"></h6>
                  </a>
                </div>
              </div>
              <div class="mt-4 collapse show" id="organisation_form">
                <form action="/organisation" method="POST">
                  @csrf
                  <div class="mb-4 row">
                    <div class="col-6">
                      <label for="organisation_name"
                        class="form-label @error('organisation_name') text-danger @enderror text-secondary">
                        Organisation/Event Name
                        @error('organisation_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('organisation_name') is-invalid @enderror"
                        id="organisation_name" name="organisation_name" value="{{ old('organisation_name') }}">
                    </div>

                    <div class="col-6">
                      <label for="position_title"
                        class="form-label @error('position_title') text-danger @enderror text-secondary">
                        Role/Position Title
                        @error('position_title')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('position_title') is-invalid @enderror"
                        id="position_title" name="position_title" value="{{ old('position_title') }}">
                    </div>
                  </div>

                  <div class="mb-4">
                    <label for="organisation_description"
                      class="form-label @error('organisation_description') text-danger @enderror text-secondary">
                      Organisation Description (Optional)
                      @error('organisation_description')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <textarea class="form-control input @error('organisation_description') is-invalid @enderror"
                      name="organisation_description" id="organisation_description" cols="30" rows="5">{{ old('organisation_description') }}</textarea>
                  </div>

                  <div class="mb-4">
                    <label for="organisation_location"
                      class="form-label @error('organisation_location') text-danger @enderror text-secondary">
                      Activity/Event/Organisation Location (City, Country)
                      @error('organisation_location')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <input type="text"
                      class="form-control input @error('organisation_location') is-invalid @enderror"
                      id="organisation_location" name="organisation_location"
                      value="{{ old('organisation_location') }}">
                  </div>

                  <div class="mb-4 row">
                    <div class="col-6">
                      <label for="organisation_start_month"
                        class="form-label @error('organisation_start_month') text-danger @enderror text-secondary">
                        Start Month
                        @error('organisation_start_month')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('organisation_start_month') is-invalid @enderror"
                        id="organisation_start_month" name="organisation_start_month"
                        value="{{ old('organisation_start_month') }}">
                    </div>
                    <div class="col-6">
                      <label for="organisation_start_year"
                        class="form-label @error('organisation_start_year') text-danger @enderror text-secondary">
                        Start Year
                        @error('organisation_start_year')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('organisation_start_year') is-invalid @enderror"
                        id="organisation_start_year" name="organisation_start_year"
                        value="{{ old('organisation_start_year') }}">
                    </div>
                  </div>

                  <div class="mb-4 row">
                    <div class="col-6">
                      <label for="organisation_end_month"
                        class="form-label @error('organisation_end_month') text-danger @enderror text-secondary">
                        End Month
                        @error('organisation_end_month')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('organisation_end_month') is-invalid @enderror"
                        id="organisation_end_month" name="organisation_end_month"
                        value="{{ old('organisation_end_month') }}">
                    </div>
                    <div class="col-6">
                      <label for="organisation_end_year"
                        class="form-label @error('organisation_end_year') text-danger @enderror text-secondary">
                        End Year
                        @error('organisation_end_year')
                          <span class="text-danger">*</span>
                        @enderror
                      </label>
                      <input type="text"
                        class="form-control input @error('organisation_end_year') is-invalid @enderror"
                        id="organisation_end_year" name="organisation_end_year"
                        value="{{ old('organisation_end_year') }}">
                    </div>

                    <div class="mt-2">
                      <input class="form-check-input" type="checkbox" id="currently_active" name="currently_active"
                        value="1">
                      <label for="currently_work" class="text-secondary">I am currently active here</label>
                    </div>
                  </div>

                  <div class="mb-4">
                    <label for="role_description"
                      class="form-label @error('role_description') text-danger @enderror text-secondary">
                      Role Description
                      @error('role_description')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <textarea class="form-control input @error('role_description') is-invalid @enderror" name="role_description"
                      id="role_description" cols="30" rows="5">{{ old('role_description') }}</textarea>
                  </div>

                  <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-black">SAVE</button>
                  </div>
                </form>
              </div>
            </div>
            {{-- @endif --}}
          </div>

          <div class="d-flex justify-content-end mt-5">
            <a class="btn btn-outline-dark me-3" href="/cv/{{ $cv->id }}#education">PREVIOUS</a>
            <a class="btn btn-black" href="/cv/{{ $cv->id }}#other">SAVE & NEXT</a>
          </div>
        </div>
      </div>

      {{-- Other Section --}}
      <div class="bg-white p-4 mb-4" id="other" hidden>
        <div>
          <h4 id="title_other_section_name" class="text-capitalize"></h4>
          <div class="mb-4">
            <form action="/cv/other/{{ $cv->id }}" method="POST">
              @method('put')
              @csrf
              <label for="other_section_name"
                class="form-label @error('other_section_name') text-danger @enderror text-secondary">
                Section Name
                @error('other_section_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </label>
              <div class="d-flex">
                @if ($cv->other_section_name)
                  <input type="text" class="form-control input @error('other_section_name') is-invalid @enderror"
                    id="other_section_name" name="other_section_name" value="{{ $cv->other_section_name }}">
                @else
                  <input type="text" class="form-control input @error('other_section_name') is-invalid @enderror"
                    id="other_section_name" name="other_section_name" value="Skills, Achievements & Other Experience">
                @endif
                <button type="submit" class="btn btn-black ms-2"><i class="fa-solid fa-floppy-disk"></i></button>
              </div>
            </form>
          </div>

          <div>
            <small>Add skills and achievements relevant to the job that you’re applying fo</small>
            {{-- @if ($cv->education->count() > 0)
              @foreach ($cv->education as $education)
                <div class="my-3 border rounded-3 p-3">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <a class="link-dark" data-bs-toggle="collapse" href="#professional_form_{{ $professional->id }}"
                        role="button" aria-expanded="false"
                        aria-controls="professional_form_{{ $professional->id }}">
                        <i class="fa-regular fa-chevron-down"></i>
                      </a>
                      <h6 class="m-0 ms-2" id="professional_name_{{ $professional->id }}"></h6>
                    </div>

                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('delete')
                      @csrf
                      <button type="submit" class="link-danger bg-transparent border-0"
                        onclick="return confirm('Are you sure?')"><i
                          class="fa-regular fa-trash-xmark fa-lg"></i></button>
                    </form>

                  </div>

                  <div class="mt-4 collapse" id="professional_form_{{ $professional->id }}">
                    <form action="/professional/{{ $professional->id }}" method="POST">
                      @method('put')
                      @csrf
                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="company_name_{{ $professional->id }}"
                            class="form-label @error('company_name') text-danger @enderror text-secondary">
                            Company Name
                            @error('company_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                            id="company_name_{{ $professional->id }}" name="company_name"
                            value="{{ $professional->company_name }}">
                        </div>

                        <div class="col-6">
                          <label for="role_title_{{ $professional->id }}"
                            class="form-label @error('role_title') text-danger @enderror text-secondary">
                            Job/Internship/Role Title
                            @error('role_title')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                            id="role_title_{{ $professional->id }}" name="role_title"
                            value="{{ $professional->role_title }}">
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="company_location_{{ $professional->id }}"
                          class="form-label @error('company_location') text-danger @enderror text-secondary">
                          Company Location
                          @error('company_location')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text"
                          class="form-control input @error('company_location') is-invalid @enderror"
                          id="company_location_{{ $professional->id }}" name="company_location"
                          value="{{ $professional->company_location }}">
                      </div>

                      <div class="mb-4">
                        <label for="company_description_{{ $professional->id }}"
                          class="form-label @error('company_description') text-danger @enderror text-secondary">
                          Company Description (Optional)
                          @error('company_description')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                          id="company_description_{{ $professional->id }}" cols="30" rows="5">{{ $professional->company_description }}</textarea>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="start_month_{{ $professional->id }}"
                            class="form-label @error('start_month') text-danger @enderror text-secondary">
                            Start Month
                            @error('start_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                            id="start_month_{{ $professional->id }}" name="start_month"
                            value="{{ $professional->start_month }}">
                        </div>
                        <div class="col-6">
                          <label for="start_year_{{ $professional->id }}"
                            class="form-label @error('start_year') text-danger @enderror text-secondary">
                            Start Year
                            @error('start_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                            id="start_year_{{ $professional->id }}" name="start_year"
                            value="{{ $professional->start_year }}">
                        </div>
                      </div>

                      <div class="mb-4 row">
                        <div class="col-6">
                          <label for="end_month_{{ $professional->id }}"
                            class="form-label @error('end_month') text-danger @enderror text-secondary">
                            End Month
                            @error('end_month')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                            id="end_month_{{ $professional->id }}" name="end_month"
                            value="{{ $professional->end_month }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>
                        <div class="col-6">
                          <label for="end_year_{{ $professional->id }}"
                            class="form-label @error('end_year') text-danger @enderror text-secondary">
                            End Year
                            @error('end_year')
                              <span class="text-danger">*</span>
                            @enderror
                          </label>
                          <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                            id="end_year_{{ $professional->id }}" name="end_year"
                            value="{{ $professional->end_year }}" @if ($professional->currently_work == 1) disabled @endif>
                        </div>

                        <div class="mt-2">
                          <input class="form-check-input" type="checkbox" id="currently_work_{{ $professional->id }}"
                            name="currently_work" value="1" @if ($professional->currently_work == 1) checked @endif>
                          <label for="currently_work_{{ $professional->id }}" class="text-secondary">I am currently
                            working here</label>
                        </div>
                      </div>

                      <div class="mb-4">
                        <label for="work_achievement_{{ $professional->id }}"
                          class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                          Work Portfolio and Achievements
                          @error('work_achievement')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                          id="work_achievement_{{ $professional->id }}" cols="30" rows="5">{{ $professional->work_achievement }}</textarea>
                      </div>

                      <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                      <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-black">SAVE</button>
                      </div>
                    </form>
                  </div>
                </div>

                @include('script.professional')
              @endforeach

              <div class="d-flex flex-column">
                <a class="btn btn-outline-primary" id="btn_experience_add"><i
                    class="fa-regular fa-circle-plus me-1"></i>Add Experience</a>
              </div>

              <div class="my-3 border rounded-3 p-3" id="experience_add" hidden>
                <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <a class="link-dark" data-bs-toggle="collapse" href="#professional_form" role="button"
                      aria-expanded="false" aria-controls="professional_form">
                      <i class="fa-regular fa-chevron-down"></i>
                    </a>
                    <h6 class="m-0 ms-2" id="professional_name"></h6>
                  </div>

                  <button class="link-danger bg-transparent border-0" id="btn_experience_remove">
                    <i class="fa-regular fa-trash-xmark fa-lg"></i>
                  </button>
                </div>
                <div class="mt-4 collapse show" id="professional_form">
                  <form action="/professional" method="POST">
                    @csrf
                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="company_name"
                          class="form-label @error('company_name') text-danger @enderror text-secondary">
                          Company Name
                          @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('company_name') is-invalid @enderror"
                          id="company_name" name="company_name" value="{{ old('company_name') }}">
                      </div>

                      <div class="col-6">
                        <label for="role_title"
                          class="form-label @error('role_title') text-danger @enderror text-secondary">
                          Job/Internship/Role Title
                          @error('role_title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('role_title') is-invalid @enderror"
                          id="role_title" name="role_title" value="{{ old('role_title') }}">
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="company_location"
                        class="form-label @error('company_location') text-danger @enderror text-secondary">
                        Company Location
                        @error('company_location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <input type="text" class="form-control input @error('company_location') is-invalid @enderror"
                        id="company_location" name="company_location" value="{{ old('company_description') }}">
                    </div>

                    <div class="mb-4">
                      <label for="company_description"
                        class="form-label @error('company_description') text-danger @enderror text-secondary">
                        Company Description (Optional)
                        @error('company_description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('company_description') is-invalid @enderror" name="company_description"
                        id="company_description" cols="30" rows="5">{{ old('company_description') }}</textarea>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="start_month"
                          class="form-label @error('start_month') text-danger @enderror text-secondary">
                          Start Month
                          @error('start_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_month') is-invalid @enderror"
                          id="start_month" name="start_month" value="{{ old('start_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="start_year"
                          class="form-label @error('start_year') text-danger @enderror text-secondary">
                          Start Year
                          @error('start_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('start_year') is-invalid @enderror"
                          id="start_year" name="start_year" value="{{ old('start_year') }}">
                      </div>
                    </div>

                    <div class="mb-4 row">
                      <div class="col-6">
                        <label for="end_month"
                          class="form-label @error('end_month') text-danger @enderror text-secondary">
                          End Month
                          @error('end_month')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_month') is-invalid @enderror"
                          id="end_month" name="end_month" value="{{ old('end_month') }}">
                      </div>
                      <div class="col-6">
                        <label for="end_year"
                          class="form-label @error('end_year') text-danger @enderror text-secondary">
                          End Year
                          @error('end_year')
                            <span class="text-danger">*</span>
                          @enderror
                        </label>
                        <input type="text" class="form-control input @error('end_year') is-invalid @enderror"
                          id="end_year" name="end_year" value="{{ old('end_year') }}">
                      </div>

                      <div class="mt-2">
                        <input class="form-check-input" type="checkbox" id="currently_work" name="currently_work"
                          value="1">
                        <label for="currently_work" class="text-secondary">I am currently working here</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="work_achievement"
                        class="form-label @error('work_achievement') text-danger @enderror text-secondary">
                        Work Portfolio and Achievements
                        @error('work_achievement')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </label>
                      <textarea class="form-control input @error('work_achievement') is-invalid @enderror" name="work_achievement"
                        id="work_achievement" cols="30" rows="5">{{ old('work_achievement') }}</textarea>
                    </div>

                    <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-black">SAVE</button>
                    </div>
                  </form>
                </div>
              </div>
            @else --}}
            <div class="my-3 border rounded-3 p-3">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <a class="link-dark d-flex align-items-center text-decoration-none" data-bs-toggle="collapse"
                    href="#other_form" role="button" aria-expanded="false" aria-controls="other_form">
                    <i class="fa-regular fa-chevron-down"></i>
                    <h6 class="m-0 ms-2" id="other_subsection_name"></h6>
                  </a>
                </div>
              </div>
              <div class="mt-4 collapse show" id="other_form">
                <form action="/other" method="POST">
                  @csrf
                  <div class="mb-4">
                    <label for="activity_name"
                      class="form-label @error('activity_name') text-danger @enderror text-secondary">
                      Category/Project/Activity
                      @error('activity_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <input type="text" class="form-control input @error('activity_name') is-invalid @enderror"
                      id="activity_name" name="activity_name" value="{{ old('activity_name') }}">
                  </div>

                  <div class="mb-4">
                    <label for="activity_year"
                      class="form-label @error('activity_year') text-danger @enderror text-secondary">
                      Year
                      @error('activity_year')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <input type="text" class="form-control input @error('activity_year') is-invalid @enderror"
                      id="activity_year" name="activity_year" value="{{ old('activity_year') }}">
                  </div>

                  <div class="mb-4">
                    <label for="activity_elaboration"
                      class="form-label @error('activity_elaboration') text-danger @enderror text-secondary">
                      Elaboration
                      @error('activity_elaboration')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </label>
                    <input type="text"
                      class="form-control input @error('activity_elaboration') is-invalid @enderror"
                      id="activity_elaboration" name="activity_elaboration"
                      value="{{ old('activity_elaboration') }}">
                  </div>

                  <input type="text" value="{{ $cv->id }}" name="c_v_id" readonly hidden>

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-black">SAVE</button>
                  </div>
                </form>
              </div>
            </div>
            {{-- @endif --}}
          </div>

          <div class="d-flex justify-content-end mt-5">
            <a class="btn btn-outline-dark me-3" href="/cv/{{ $cv->id }}#organisation">PREVIOUS</a>
            <button class="btn btn-black">COMPLETE & DOWNLOAD</button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-5 min-vh-100 mt-lg-0 mb-5">
      <div class="bg-white bg-white p-4">
        @include('components.preview')
      </div>
    </div>
  </div>

  <script src="/js/cv.js"></script>

@endsection
