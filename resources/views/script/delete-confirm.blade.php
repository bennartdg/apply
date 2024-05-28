<script>
  $(document).ready(function() {
    $("#cv_name_confirm_" + {{ $cv->id }}).on('input', function() {
      var name_input = $("#cv_name_confirm_" + {{ $cv->id }}).val();
      var name_confirm =  @json($cv->cv_name);
      $("#cv_name_confirm_" + {{ $cv->id }}).addClass('is-invalid');
      $("#btn_delete_cv_" + {{ $cv->id }}).attr('disabled', true);

      if (name_input.toLowerCase() == name_confirm.toLowerCase()) {
        $("#cv_name_confirm_" + {{ $cv->id }}).removeClass('is-invalid');
        $("#btn_delete_cv_" + {{ $cv->id }}).removeAttr('disabled');
      }
    })
  })
</script>
