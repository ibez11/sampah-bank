$(document).ready(function(){
	validationLoader(false);
});

function validationLoader(isShow){
	if(isShow) {
		$('#validation-loader').show();
		$('#first-form').hide();
	} else $('#validation-loader').hide(); 
}