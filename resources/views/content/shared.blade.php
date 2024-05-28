@extends('layout.layout')

@section('content')
  <div class="d-flex justify-content-center row">
    <div class="col-12 col-lg-5 min-vh-100 mt-lg-0 mb-5">
      <div class="bg-white p-4">
        <div class="cv-preview">
          {{-- personal --}}
          <section class="d-flex flex-column gap-1 mb-3">
            <div>
              <h5 class="fw-bold m-0 text-uppercase text-break" id="preview_name">{{ $cv->personal->name }}</h5>
            </div>
            <div class="text-small">
              <div>
                <small class="text-primary text-decoration-underline" id="preview_phone">{{ $cv->personal->phone }}</small>
                <span>|</span>
                <small class="text-primary text-decoration-underline"
                  id="preview_email">{{ $cv->personal->email }}</small>
                <span>|</span>
                <small class="text-primary text-decoration-underline"
                  id="preview_linkedin">{{ $cv->personal->linkedin }}</small>
                <span>|</span>
                <small class="text-primary text-decoration-underline"
                  id="preview_website">{{ $cv->personal->website }}</small>
              </div>
              <div>
                <small class="text-secondary" id="preview_address">{{ $cv->personal->address }}</small>
              </div>
            </div>
            <div class="text-small">
              <small id="preview_description">{{ $cv->personal->description }}</small>
            </div>
          </section>

          {{-- professional --}}
          @if ($cv->professional->count() > 0)
            <section class="d-flex flex-column gap-1">
              <div class="border-bottom border-black border-2">
                <h6 class="fw-bold m-0 mb-1 text-capitalize" id="preview_professional_section_name">
                  {{ $cv->professional_section_name }}</h6>
              </div>

              @foreach ($cv->professional as $professional)
                <div class="text-small">
                  <div class="d-flex justify-content-between">
                    <small>
                      <span class="fw-bold" id="preview_company_name_{{ $professional->id }}">
                        {{ $professional->company_name }}
                      </span>
                      <span class="text-secondary" id="preview_company_location_{{ $professional->id }}">
                        - {{ $professional->company_location }}
                      </span>
                    </small>
                    <small>
                      <span id="preview_start_month_{{ $professional->id }}">{{ $professional->start_month }}</span>
                      <span id="preview_start_year_{{ $professional->id }}">{{ $professional->start_year }}</span>
                      <span id="preview_end_month_{{ $professional->id }}">
                        @if ($professional->currently_work == 1)
                          - Present
                        @else
                          - {{ $professional->end_month }}
                        @endif
                      </span>
                      <span id="preview_end_year_{{ $professional->id }}">{{ $professional->end_year }}</span>
                    </small>
                  </div>
                  <div class="fst-italic">
                    <small id="preview_role_title_{{ $professional->id }}">
                      {{ $professional->role_title }}
                    </small>
                  </div>
                  <div class="text-secondary" id="preview_company_description_{{ $professional->id }}">
                    {{ $professional->company_description }}
                  </div>
                  <div>
                    <ul class="ps-3 py-0" id="preview_work_achievement_{{ $professional->id }}">
                      @foreach (explode('|', $professional->work_achievement) as $work_achievement)
                        <li>{{ $work_achievement }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endforeach
            </section>
          @endif

          {{-- education --}}
          @if ($cv->education->count() > 0)
            <section class="d-flex flex-column gap-1">
              <div class="border-bottom border-black border-2">
                <h6 class="fw-bold m-0 mb-1" id="preview_education_section_name">{{ $cv->education_section_name }}
                </h6>
              </div>
              @foreach ($cv->education as $education)
                <div class="text-small">
                  <div class="d-flex justify-content-between">
                    <small>
                      <span class="fw-bold"
                        id="preview_school_name_{{ $education->id }}">{{ $education->school_name }}</span>
                      <span class="text-secondary" id="preview_school_location_{{ $education->id }}"> -
                        {{ $education->school_location }}</span>
                    </small>
                    <small>
                      <span
                        id="preview_education_start_month_{{ $education->id }}">{{ $education->education_start_month }}</span>
                      <span
                        id="preview_education_start_year_{{ $education->id }}">{{ $education->education_start_year }}</span>
                      <span id="preview_education_end_month_{{ $education->id }}"> -
                        {{ $education->education_end_month }}</span>
                      <span
                        id="preview_education_end_year_{{ $education->id }}">{{ $education->education_end_year }}</span>
                    </small>
                  </div>
                  <div class="fst-italic">
                    <small>
                      <span id="preview_education_level_{{ $education->id }}">{{ $education->education_level }},</span>
                      <span
                        id="preview_education_description_{{ $education->id }}">{{ $education->education_description }},</span>
                      <span
                        id="preview_gpa_{{ $education->id }}">{{ $education->gpa }}/{{ $education->max_gpa }}</span>
                    </small>
                  </div>
                  <div>
                    <ul class="ps-3" id="preview_education_achievement_{{ $education->id }}">
                      @foreach (explode('|', $education->education_achievement) as $education_achievement)
                        <li>{{ $education_achievement }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endforeach
            </section>
          @endif

          {{-- organisation --}}
          @if ($cv->organisation->count() > 0)
            <section class="d-flex flex-column gap-1">
              <div class="border-bottom border-black border-2">
                <h6 class="fw-bold m-0 mb-1" id="preview_organisation_section_name">
                  {{ $cv->organisation_section_name }}
                </h6>
              </div>
              @foreach ($cv->organisation as $organisation)
                <div class="text-small">
                  <div class="d-flex justify-content-between">
                    <small>
                      <span class="fw-bold"
                        id="preview_organisation_name_{{ $organisation->id }}">{{ $organisation->organisation_name }}</span>
                      <span class="text-secondary" id="preview_organisation_location_{{ $organisation->id }}"> -
                        {{ $organisation->organisation_location }}</span>
                    </small>
                    <small>
                      <span
                        id="preview_organisation_start_month_{{ $organisation->id }}">{{ $organisation->organisation_start_month }}</span>
                      <span
                        id="preview_organisation_start_year_{{ $organisation->id }}">{{ $organisation->organisation_start_year }}</span>
                      <span id="preview_organisation_end_month_{{ $organisation->id }}"> -
                        {{ $organisation->organisation_end_month }}</span>
                      <span
                        id="preview_organisation_end_year_{{ $organisation->id }}">{{ $organisation->organisation_end_year }}</span>
                    </small>
                  </div>
                  <div class="fst-italic">
                    <small
                      id="preview_position_title_{{ $organisation->id }}">{{ $organisation->position_title }}</small>
                  </div>
                  <div class="text-secondary" id="preview_organisation_description_{{ $organisation->id }}">
                    {{ $organisation->organisation_description }}</div>
                  <div>
                    <ul class="ps-3" id="preview_role_description_{{ $organisation->id }}">
                      @foreach (explode('|', $organisation->role_description) as $role_description)
                        <li>{{ $role_description }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endforeach
            </section>
          @endif

          {{-- other --}}
          @if ($cv->other->count() > 0)
            <section id="other" class="d-flex flex-column gap-1">
              <div class="border-bottom border-black border-2">
                <h6 class="fw-bold m-0 mb-1" id="preview_other_section_name">{{ $cv->other_section_name }}</h6>
              </div>
              <div class="text-small">
                <div>
                  <ul class="ps-3">
                    @foreach ($cv->other as $other)
                      <li>
                        <span class="fw-bold"
                          id="preview_activity_name_{{ $other->id }}">{{ $other->activity_name }}</span>
                        <span id="preview_activity_year_{{ $other->id }}">({{ $other->activity_year }}): </span>
                        <span
                          id="preview_activity_elaboration_{{ $other->id }}">{{ $other->activity_elaboration }}</span>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </section>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
