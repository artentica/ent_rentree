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

function number(){
	// Nombre de chiffres
	compteur = $('#phone').length;
	if (compteur!=10){
		alert("Assurez-vous de rentrer un numéro à 10 chiffres (0123456789)");
	}
}

function dateverifior(){
	date_split = $('#birthday').val().split('/', 3);
	console.log("date_split");
	date = new Date(date_split[2], date_split[1] - 1, date_split[0]);
	if ( date.getFullYear() == date_split[2] && (date.getMonth()+1)  == parseInt(date_split[1]) && date.getDate() == parseInt(date_split[0]) && /^(\d{1,2}\/){2}\d{4}$/.test(date_a_tester)) 
  		alert("La date est valide.");
	else
  		alert("La date n'est pas valide.");
}