$(document).ready(function() {

  $("#select-type").change(function() {
    initializeType();
    resetValue();
  });

  $("input[name='amount_kg']").focusout(function() {
    calculateTotal();
  });

  $("select[name='products']").change(function(){
      getAmountByProductId();
  });

  //initialize as debit
  initializeType();
  getAmountByProductId();
});

function calculateTotal(){
  amount_kg = $("input[name='amount_kg']").val();
  amount_unit = $('#amount-unit').val();
  amount_profit = $('#amount-profit-kg').val();
  total = amount_kg * amount_unit;
  total_profit = amount_kg * amount_profit;
  totalstr = accounting.formatMoney(total, "", 2, ".", ",");
  $("input[name='amount_money']").val(totalstr);
  $("input[name='amount_profit']").val(total_profit);
}

function getAmountByProductId(){
  var productid = $("select[name='products']").val();
  var cityid = $('#city-id').val();

  $('#loading').show();

  $.ajax({
   url: '/api/settings?cityid=' + cityid +'&productid=' + productid,
   method: 'GET'
 }).done(function(data){
   var obj = JSON.parse(data);
   $('#amount-unit').val(obj.amount_unit);
   $('#amount-profit-kg').val(obj.amount_profit);
   $('#loading').hide();
   calculateTotal();
 }).fail(function(e){
   window.location.reload();
 });
}

function initializeType(){
  is_debit = $("#select-type option:selected").val();
  if (is_debit == 0) {
    $("input[name='amount_kg']").attr('readonly', 'readonly');
    $("input[name='amount_used']").removeAttr('readonly');

    $('#amount-used-div').show();
    $('#amount-kg-div').hide();
    $('#amount-unit-div').hide();
    $('#amount-money-div').hide();
    $('#product-div').hide();
    $('#amount-unit-div').hide();
  } else {
    $("input[name='amount_used']").attr('readonly', 'readonly');
    $("input[name='amount_kg']").removeAttr('readonly');

    $('#amount-used-div').hide();
    $('#product-div').show();
    $('#amount-unit-div').show();
    $('#amount-kg-div').show();
    $('#amount-unit-div').show();
    $('#amount-money-div').show();

    getAmountByProductId();
  }
}

function resetValue(){
  $("input[name='amount_kg']").val('');
  $("input[name='amount_unit']").val('');
  $("input[name='amount_used']").val('');
  $("input[name='amount_money']").val('');
}
