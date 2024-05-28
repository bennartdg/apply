<script>
  $(document).ready(function() {

    loadPreview(
      "#activity_name_" + {{ $other->id }}, 
      "#other_subsection_name_" + {{ $other->id }}
    );

    loadPreview(
      "#activity_name_" + {{ $other->id }}, 
      "#preview_activity_name_" + {{ $other->id }}
    );

    loadPreviewActivityYear(
      "#activity_year_" + {{ $other->id }}, 
      "#preview_activity_year_" + {{ $other->id }}
    );

    loadPreview(
      "#activity_elaboration_" + {{ $other->id }}, 
      "#preview_activity_elaboration_" + {{ $other->id }}
    );

    $("#activity_name_" + {{ $other->id }}).on("input", function() {
      loadPreview("#activity_name_" + {{ $other->id }}, "#other_subsection_name_" + {{ $other->id }});
      loadPreview("#activity_name_" + {{ $other->id }}, "#preview_activity_name_" + {{ $other->id }});
    });

    $("#activity_year_" + {{ $other->id }}).on("input", function() {
      loadPreviewActivityYear("#activity_year_" + {{ $other->id }}, "#preview_activity_year_" + {{ $other->id }});
    });

    $("#activity_elaboration_" + {{ $other->id }}).on("input", function() {
      loadPreview("#activity_elaboration_" + {{ $other->id }}, "#preview_activity_elaboration_" + {{ $other->id }});
    });
  });
</script>
