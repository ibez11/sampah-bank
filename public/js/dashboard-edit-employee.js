$(document).ready(function() {
  var is_change;
  $("#password_old").hide();
  $("#password_new").hide();
  $("#password_new_cfm").hide();

  $("#change_pass").change(function() {
    is_change = $("#change_pass option:selected").val();
    if (is_change == 0 || is_change == '') {
      $("#password_old").hide();
      $("#password_new").hide();
      $("#password_new_cfm").hide();
    } else {
      $("#password_old").show();
      $("#password_new").show();
      $("#password_new_cfm").show();
    }
  });
});
