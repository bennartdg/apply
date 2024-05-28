<script>
  $(document).ready(function() {

    loadPreview(
      "#school_name_" + {{ $education->id }},
      "#preview_school_name_" + {{ $education->id }}
    );

    loadPreview(
      "#school_name_" + {{ $education->id }},
      "#education_name_" + {{ $education->id }}
    );

    loadPreviewDash(
      "#school_location_" + {{ $education->id }},
      "#preview_school_location_" + {{ $education->id }}
    );

    loadPreview(
      "#education_start_month_" + {{ $education->id }},
      "#preview_education_start_month_" + {{ $education->id }}
    );

    loadPreview(
      "#education_start_year_" + {{ $education->id }},
      "#preview_education_start_year_" + {{ $education->id }}
    );

    loadPreviewDash(
      "#education_end_month_" + {{ $education->id }},
      "#preview_education_end_month_" + {{ $education->id }}
    );

    loadPreview(
      "#education_end_year_" + {{ $education->id }},
      "#preview_education_end_year_" +
      {{ $education->id }}
    );

    loadPreviewComma(
      "#education_level_" + {{ $education->id }},
      "#preview_education_level_" + {{ $education->id }}
    );

    loadPreviewComma(
      "#education_description_" + {{ $education->id }},
      "#preview_education_description_" + {{ $education->id }}
    );

    loadPreviewSlash(
      "#gpa_" + {{ $education->id }},
      "#preview_gpa_" + {{ $education->id }}
    );

    loadPreview(
      "#max_gpa_" + {{ $education->id }},
      "#preview_max_gpa_" + {{ $education->id }}
    );

    loadPreviewList(
      "#education_achievement_" + {{ $education->id }},
      "#preview_education_achievement_" + {{ $education->id }}
    );

    $("#school_name_" + {{ $education->id }}).on("input", function() {
      loadPreview("#school_name_" + {{ $education->id }}, "#preview_school_name_" + {{ $education->id }});
      loadPreview("#school_name_" + {{ $education->id }}, "#education_name_" + {{ $education->id }});
    });

    $("#school_location_" + {{ $education->id }}).on("input", function() {
      loadPreviewDash("#school_location_" + {{ $education->id }}, "#preview_school_location_" +
        {{ $education->id }});
    });

    $("#education_start_month_" + {{ $education->id }}).on("input", function() {
      loadPreview("#education_start_month_" + {{ $education->id }}, "#preview_education_start_month_" +
        {{ $education->id }});
    });

    $("#education_start_year_" + {{ $education->id }}).on("input", function() {
      loadPreview("#education_start_year_" + {{ $education->id }}, "#preview_education_start_year_" +
        {{ $education->id }});
    });

    $("#education_end_month_" + {{ $education->id }}).on("input", function() {
      loadPreviewDash("#education_end_month_" + {{ $education->id }}, "#preview_education_end_month_" +
        {{ $education->id }});
    });

    $("#education_end_year_" + {{ $education->id }}).on("input", function() {
      loadPreview("#education_end_year_" + {{ $education->id }}, "#preview_education_end_year_" +
        {{ $education->id }});
    });

    $("#education_level_" + {{ $education->id }}).on("input", function() {
      loadPreviewComma("#education_level_" + {{ $education->id }}, "#preview_education_level_" +
        {{ $education->id }});
    });

    $("#education_description_" + {{ $education->id }}).on("input", function() {
      loadPreviewComma(
        "#education_description_" + {{ $education->id }},
        "#preview_education_description_" + {{ $education->id }}
      );
    });

    $("#gpa_" + {{ $education->id }}).on("input", function() {
      loadPreviewSlash("#gpa_" + {{ $education->id }}, "#preview_gpa_" + {{ $education->id }});
    });

    $("#max_gpa_" + {{ $education->id }}).on("input", function() {
      loadPreview("#max_gpa_" + {{ $education->id }}, "#preview_max_gpa_" + {{ $education->id }});
    });

    $("#education_achievement_" + {{ $education->id }}).on("input", function() {
      loadPreviewList(
        "#education_achievement_" + {{ $education->id }},
        "#preview_education_achievement_" + {{ $education->id }}
      );
    });
  })
</script>
