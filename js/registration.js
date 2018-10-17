$(document).ready(function() {
  var value;
  $("#register input[type=radio]").on('click', function(){
    value = $("input[type=radio]:checked").val();
    if (value == "phone_number") {
      $("#showPhoneNumber").show();
      $("#showPassword").show();
      $("#showEmail").hide();

      $("#showEmail").removeAttr("required");
      $("#showPhoneNumber").attr("required", true);
      $("#showPassword").attr("required", true);
    }
    if (value == "email") {
      $("#showEmail").show();
      $("#showPassword").show();
      $("#showPhoneNumber").hide();

      $("#showPhoneNumber").removeAttr("required");
      $("#showEmail").attr("required", true);
      $("#showPassword").attr("required", true);
    }
  });
});
