<script>
  $(document).ready(function() {

    loadPreviewSubSection(
      "#role_title_" + {{ $professional->id }},
      "#company_name_" + {{ $professional->id }},
      "#professional_name_" + {{ $professional->id }},
    )

    loadPreview(
      "#company_name_" + {{ $professional->id }},
      "#preview_company_name_" + {{ $professional->id }}
    );

    loadPreview(
      "#role_title_" + {{ $professional->id }},
      "#preview_role_title_" + {{ $professional->id }}
    );

    loadPreviewDash(
      "#company_location_" + {{ $professional->id }},
      "#preview_company_location_" + {{ $professional->id }}
    );

    loadPreview(
      "#company_description_" + {{ $professional->id }},
      "#preview_company_description_" + {{ $professional->id }}
    );

    loadPreview(
      "#start_month_" + {{ $professional->id }},
      "#preview_start_month_" + {{ $professional->id }}
    );

    loadPreview(
      "#start_year_" + {{ $professional->id }},
      "#preview_start_year_" + {{ $professional->id }}
    );

    if ({{ $professional->currently_work }} == 0) {
      loadPreviewDash(
        "#end_month_" + {{ $professional->id }},
        "#preview_end_month_" + {{ $professional->id }}
      );

      loadPreview(
        "#end_year_" + {{ $professional->id }},
        "#preview_end_year_" + {{ $professional->id }}
      );
    }

    loadPreviewList(
      "#work_achievement_" + {{ $professional->id }},
      "#preview_work_achievement_" + {{ $professional->id }}
    );

    $('#company_name_' + {{ $professional->id }}).
    on('input', function() {
      loadPreview(
        "#company_name_" + {{ $professional->id }},
        "#preview_company_name_" + {{ $professional->id }}
      );
      loadPreviewSubSection(
        "#role_title_" + {{ $professional->id }},
        "#company_name_" + {{ $professional->id }},
        "#professional_name_" + {{ $professional->id }},
      );
    })

    $('#role_title_' + {{ $professional->id }}).
    on('input', function() {
      loadPreview(
        "#role_title_" + {{ $professional->id }},
        "#preview_role_title_" + {{ $professional->id }}
      );
      loadPreviewSubSection(
        "#role_title_" + {{ $professional->id }},
        "#company_name_" + {{ $professional->id }},
        "#professional_name_" + {{ $professional->id }},
      );
    })

    $('#company_location_' + {{ $professional->id }}).
    on('input', function() {
      loadPreviewDash(
        "#company_location_" + {{ $professional->id }},
        "#preview_company_location_" + {{ $professional->id }}
      );
    })

    $('#company_description_' + {{ $professional->id }}).
    on('input', function() {
      loadPreview(
        "#company_description_" + {{ $professional->id }},
        "#preview_company_description_" + {{ $professional->id }}
      );
    })

    $('#start_month_' + {{ $professional->id }}).
    on('input', function() {
      loadPreview(
        "#start_month_" + {{ $professional->id }},
        "#preview_start_month_" + {{ $professional->id }}
      );
    })

    $('#start_year_' + {{ $professional->id }}).
    on('input', function() {
      loadPreview(
        "#start_year_" + {{ $professional->id }},
        "#preview_start_year_" + {{ $professional->id }}
      );
    })

    $('#end_month_' + {{ $professional->id }}).
    on('input', function() {
      loadPreviewDash(
        "#end_month_" + {{ $professional->id }},
        "#preview_end_month_" + {{ $professional->id }}
      );
    })

    $('#end_year_' + {{ $professional->id }}).
    on('input', function() {
      loadPreview(
        "#end_year_" + {{ $professional->id }},
        "#preview_end_year_" + {{ $professional->id }}
      );
    })

    $('#work_achievement_' + {{ $professional->id }}).
    on('input', function() {
      loadPreviewList(
        "#work_achievement_" + {{ $professional->id }},
        "#preview_work_achievement_" + {{ $professional->id }}
      );
    })

    $("#currently_work_" + {{ $professional->id }}).on("change", function() {
      loadPreviewCheck(
        this,
        "#end_month_" + {{ $professional->id }},
        "#end_year_" + {{ $professional->id }},
        "#preview_end_month_" + {{ $professional->id }},
        "#preview_end_year_" + {{ $professional->id }}
      );
    });
  })
</script>
