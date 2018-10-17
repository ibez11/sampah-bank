$(document).ready(function(){
	$('#loader').hide();
	$('#sign-in-form').submit(function(e){
		 toggleLoader(true);
		e.preventDefault();
	});
});


function toggleLoader(isShow){
	if(isShow)
		$('#loader').show();
	else $('#loader').hide();
}
