<!--<script src="{{ asset('js/lumino/jquery-1.11.1.min.js') }}"></script>-->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/lumino/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/lumino/chart.2.4.min.js') }}"></script>
<script src="{{ asset('js/lumino/chart-data.js') }}"></script>
<script src="{{ asset('js/lumino/easypiechart.js') }}"></script>
<script src="{{ asset('js/lumino/easypiechart-data.js') }}"></script>
<script src="{{ asset('js/lumino/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/lumino/custom.js') }}"></script>
<script src="{{ asset('js/simple-loader.js') }}"></script>
<script src="{{ asset('js/jquery.priceformat.min.js') }}"></script>
<script src="{{ asset('js/accounting.min.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.money').priceFormat({
    prefix: '',
    centsSeparator: ',',
    thousandsSeparator: '.'
  });
});
</script>
