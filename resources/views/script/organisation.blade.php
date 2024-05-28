<script>
  $(document).ready(function() {
    loadPreviewSubSectionDash(
      "#position_title_" + {{ $organisation->id }},
      "#organisation_name_" + {{ $organisation->id }},
      "#organisation_subsection_name_" + {{ $organisation->id }}
    );

    loadPreview(
      "#organisation_name_" + {{ $organisation->id }},
      "#preview_organisation_name_" + {{ $organisation->id }}
    );

    loadPreview(
      "#position_title_" + {{ $organisation->id }},
      "#preview_position_title_" + {{ $organisation->id }}
    );

    loadPreview(
      "#organisation_description_" + {{ $organisation->id }},
      "#preview_organisation_description_" + {{ $organisation->id }}
    );

    loadPreviewDash(
      "#organisation_location_" + {{ $organisation->id }},
      "#preview_organisation_location_" + {{ $organisation->id }}
    );

    loadPreview(
      "#organisation_start_month_" + {{ $organisation->id }},
      "#preview_organisation_start_month_" + {{ $organisation->id }}
    );

    loadPreview(
      "#organisation_start_year_" + {{ $organisation->id }},
      "#preview_organisation_start_year_" + {{ $organisation->id }}
    );

    loadPreviewDash(
      "#organisation_end_month_" + {{ $organisation->id }},
      "#preview_organisation_end_month_" + {{ $organisation->id }}
    );

    loadPreview(
      "#organisation_end_year_" + {{ $organisation->id }},
      "#preview_organisation_end_year_" + {{ $organisation->id }}
    );

    if ({{ $organisation->currently_active }} == 0) {
      loadPreviewDash(
        "#end_month_" + {{ $organisation->id }},
        "#preview_end_month_" + {{ $organisation->id }}
      );

      loadPreview(
        "#end_year_" + {{ $organisation->id }},
        "#preview_end_year_" + {{ $organisation->id }}
      );
    }

    loadPreviewList(
      "#role_description_" + {{ $organisation->id }},
      "#preview_role_description_" + {{ $organisation->id }}
    );

    $("#organisation_section_name_" + {{ $organisation->id }}).on("input", function() {
      loadPreviewSection(
        "#organisation_section_name_" + {{ $organisation->id }},
        "#preview_organisation_section_name_" + {{ $organisation->id }},
        "#title_organisation_section_name_" + {{ $organisation->id }}
      );
    });

    $("#organisation_name_" + {{ $organisation->id }}).on("input", function() {
      loadPreview("#organisation_name_" + {{ $organisation->id }}, "#preview_organisation_name_" + {{ $organisation->id }});
      loadPreviewSubSectionDash(
        "#position_title_" + {{ $organisation->id }},
        "#organisation_name_" + {{ $organisation->id }},
        "#organisation_subsection_name_" + {{ $organisation->id }}
      );
    });

    $("#position_title_" + {{ $organisation->id }}).on("input", function() {
      loadPreview("#position_title_" + {{ $organisation->id }}, "#preview_position_title_" + {{ $organisation->id }});
      loadPreviewSubSectionDash(
        "#position_title_" + {{ $organisation->id }},
        "#organisation_name_" + {{ $organisation->id }},
        "#organisation_subsection_name_" + {{ $organisation->id }}
      );
    });

    $("#organisation_description_" + {{ $organisation->id }}).on("input", function() {
      loadPreview(
        "#organisation_description_" + {{ $organisation->id }},
        "#preview_organisation_description_" + {{ $organisation->id }}
      );
    });

    $("#organisation_location_" + {{ $organisation->id }}).on("input", function() {
      loadPreviewDash(
        "#organisation_location_" + {{ $organisation->id }},
        "#preview_organisation_location_" + {{ $organisation->id }}
      );
    });

    $("#organisation_start_month_" + {{ $organisation->id }}).on("input", function() {
      loadPreview(
        "#organisation_start_month_" + {{ $organisation->id }},
        "#preview_organisation_start_month_" + {{ $organisation->id }}
      );
    });

    $("#organisation_start_year_" + {{ $organisation->id }}).on("input", function() {
      loadPreview(
        "#organisation_start_year_" + {{ $organisation->id }},
        "#preview_organisation_start_year_" + {{ $organisation->id }}
      );
    });

    $("#organisation_end_month_" + {{ $organisation->id }}).on("input", function() {
      loadPreviewDash(
        "#organisation_end_month_" + {{ $organisation->id }},
        "#preview_organisation_end_month_" + {{ $organisation->id }}
      );
    });

    $("#organisation_end_year_" + {{ $organisation->id }}).on("input", function() {
      loadPreview("#organisation_end_year_" + {{ $organisation->id }}, "#preview_organisation_end_year_" + {{ $organisation->id }});
    });

    $("#role_description_" + {{ $organisation->id }}).on("input", function() {
      loadPreviewList("#role_description_" + {{ $organisation->id }}, "#preview_role_description_" + {{ $organisation->id }});
    });

    $("#currently_active_" + {{ $organisation->id }}).on("change", function() {
      loadPreviewCheck(
        this,
        "#organisation_end_month_" + {{ $organisation->id }},
        "#organisation_end_year_" + {{ $organisation->id }},
        "#preview_organisation_end_month_" + {{ $organisation->id }},
        "#preview_organisation_end_year_" + {{ $organisation->id }}
      );
    });
  });
</script>
