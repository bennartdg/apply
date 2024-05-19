<div class="cv-preview">
  {{-- personal --}}
  <section class="d-flex flex-column gap-1 mb-3">
    <div>
      <h5 class="fw-bold m-0 text-uppercase text-break" id="preview_name"></h5>
    </div>
    <div class="text-small">
      <div>
        <small class="text-primary text-decoration-underline" id="preview_phone"></small>
        <span>|</span>
        <small class="text-primary text-decoration-underline" id="preview_email"></small>
        <span>|</span>
        <small class="text-primary text-decoration-underline" id="preview_linkedin"></small>
        <span>|</span>
        <small class="text-primary text-decoration-underline" id="preview_website"></small>
      </div>
      <div>
        <small class="text-secondary" id="preview_address"></small>
      </div>
    </div>
    <div class="text-small">
      <small id="preview_description">

      </small>
    </div>
  </section>

  {{-- professional --}}
  <section class="d-flex flex-column gap-1">
    <div class="border-bottom border-black border-2">
      <h6 class="fw-bold m-0 mb-1 text-capitalize" id="preview_professional_section_name"></h6>
    </div>

    @if ($cv->professional->count() > 0)
      @foreach ($cv->professional as $professional)
        <div class="text-small">
          <div class="d-flex justify-content-between">
            <small>
              <span class="fw-bold" id="preview_company_name_{{ $professional->id }}">

              </span>
              <span class="text-secondary" id="preview_company_location_{{ $professional->id }}">

              </span>
            </small>
            <small>
              <span id="preview_start_month_{{ $professional->id }}"></span>
              <span id="preview_start_year_{{ $professional->id }}"></span>
              <span id="preview_end_month_{{ $professional->id }}">
                @if ($professional->currently_work == 1)
                  - Present
                @endif
              </span>
              <span id="preview_end_year_{{ $professional->id }}"></span>
            </small>
          </div>
          <div class="fst-italic">
            <small id="preview_role_title_{{ $professional->id }}">
            </small>
          </div>
          <div class="text-secondary" id="preview_company_description_{{ $professional->id }}">

          </div>
          <div>
            <ul class="ps-3 py-0" id="preview_work_achievement_{{ $professional->id }}">

            </ul>
          </div>
        </div>
      @endforeach
      <div class="text-small" id="experience_new" hidden>
        <div class="d-flex justify-content-between">
          <small>
            <span class="fw-bold" id="preview_company_name">

            </span>
            <span class="text-secondary" id="preview_company_location">

            </span>
          </small>
          <small>
            <span id="preview_start_month"></span>
            <span id="preview_start_year"></span>
            <span id="preview_end_month"></span>
            <span id="preview_end_year"></span>
          </small>
        </div>
        <div class="fst-italic">
          <small id="preview_role_title">
          </small>
        </div>
        <div class="text-secondary" id="preview_company_description">

        </div>
        <div>
          <ul class="ps-3 py-0" id="preview_work_achievement">

          </ul>
        </div>
      </div>
    @else
      <div class="text-small">
        <div class="d-flex justify-content-between">
          <small>
            <span class="fw-bold" id="preview_company_name">

            </span>
            <span class="text-secondary" id="preview_company_location">

            </span>
          </small>
          <small>
            <span id="preview_start_month"></span>
            <span id="preview_start_year"></span>
            <span id="preview_end_month"></span>
            <span id="preview_end_year"></span>
          </small>
        </div>
        <div class="fst-italic">
          <small id="preview_role_title">
          </small>
        </div>
        <div class="text-secondary" id="preview_company_description">

        </div>
        <div>
          <ul class="ps-3 py-0" id="preview_work_achievement">

          </ul>
        </div>
      </div>
    @endif


    {{-- endforeach --}}
  </section>

  {{-- education --}}
  <section class="d-flex flex-column gap-1">
    <div class="border-bottom border-black border-2">
      <h6 class="fw-bold m-0 mb-1" id="preview_education_section_name"></h6>
    </div>
    {{-- foreach --}}
    <div class="text-small">
      <div class="d-flex justify-content-between">
        <small>
          <span class="fw-bold" id="preview_school_name"></span>
          <span class="text-secondary" id="preview_school_location"></span>
        </small>
        <small>
          <span id="preview_education_start_month"></span>
          <span id="preview_education_start_year"></span>
          <span id="preview_education_end_month"></span>
          <span id="preview_education_end_year"></span>
        </small>
      </div>
      <div class="fst-italic">
        <small>
          <span id="preview_education_level"></span>
          <span id="preview_education_description"></span>
          <span id="preview_gpa"></span><span id="preview_max_gpa"></span>
        </small>
      </div>
      <div>
        <ul class="ps-3" id="preview_education_achievement">

        </ul>
      </div>
    </div>
    {{-- endforeach --}}
  </section>

  {{-- organisation --}}
  <section class="d-flex flex-column gap-1">
    <div class="border-bottom border-black border-2">
      <h6 class="fw-bold m-0 mb-1" id="preview_organisation_section_name"></h6>
    </div>
    {{-- foreach --}}
    <div class="text-small">
      <div class="d-flex justify-content-between">
        <small>
          <span class="fw-bold" id="preview_organisation_name"></span>
          <span class="text-secondary" id="preview_organisation_location"></span>
        </small>
        <small>
          <span id="preview_organisation_start_month"></span>
          <span id="preview_organisation_start_year"></span>
          <span id="preview_organisation_end_month"></span>
          <span id="preview_organisation_end_year"></span>
        </small>
      </div>
      <div class="fst-italic">
        <small id="preview_position_title"></small>
      </div>
      <div class="text-secondary" id="preview_organisation_description"></div>
      <div>
        <ul class="ps-3" id="preview_role_description"></ul>
      </div>
    </div>
    {{-- endforeach --}}
  </section>

  <section id="other" class="d-flex flex-column gap-1">
    <div class="border-bottom border-black border-2">
      <h6 class="fw-bold m-0 mb-1" id="preview_other_section_name"></h6>
    </div>
    <div class="text-small">
      <div>
        <ul class="ps-3">
          {{-- foreach --}}
          <li>
            <span class="fw-bold" id="preview_activity_name"></span>
            <span id="preview_activity_year"></span>
            <span id="preview_activity_elaboration"></span>
          </li>
          {{-- endforeach --}}
        </ul>
      </div>
    </div>
  </section>
</div>
