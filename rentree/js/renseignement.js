function emaildisabled(){
	
	if($('#checkmail').is(':checked')){
		saveemail = $('#samemail').val();
		$('#samemail').attr('readonly', 'readonly');
		$('#samemail').val($('#identifiant').val());
	}
	else {
		$('#samemail').attr('readonly', false);
		$('#samemail').val(saveemail);
	}

}
