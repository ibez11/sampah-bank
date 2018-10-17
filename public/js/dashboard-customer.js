
$(document).ready(function () {
  $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $('#report-form').submit(function (e) {
    toggleLoader(true);
    $('#report-btn').attr('disabled', true);

    var startdate = new Date($('#calendar-1').val()).getTime();
    var enddate = new Date($('#calendar-2').val()).getTime();
    if (startdate > enddate) {
      sendErrorNotification('Tanggal akhir harus lebih besar dibandingkan tanggal mulai');
      e.preventDefault();
    }
    else {
      removeNotification();
    }
    toggleLoader(false);
    $('#report-btn').removeAttr('disabled');
  });

  $('#report-type').change(function () {
    var optionSelected = $(this).find('option:selected');
    var val = optionSelected.val();
    $('#calendar-1').datepicker('remove');
    $('#calendar-2').datepicker('remove');
    if (val == 1) {
      //usual date picker
      $('#calendar-1').datepicker({
      });
      $('#calendar-2').datepicker({
      });
    }
    else {
      $('#calendar-1').datepicker({
        format: 'mm-yyyy',
        minViewMode: 1,
      });
      $('#calendar-2').datepicker({
        format: 'mm-yyyy',
        startView: 'months',
        minViewMode: 'months',
        pickTime: false
      });
    }

    $('#calendar-1').val('');
    $('#calendar-2').val('');
  });
});

function sendErrorNotification(message) {
  $('#notification').html('<div class="alert alert-danger" role="alert">' +
    '<span class="fa fa-exclamation-triangle"></span> <strong>' + message + '</strong> ' +
    '</div>');
  $('html, body').scrollTop(0);
}

function removeNotification() {
  $('#notification').html('');
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})