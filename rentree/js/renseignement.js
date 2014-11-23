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
	date = date_split[1]+"/"+date_split[0]+"/"+ date_split[2];
	console.log(date);
	dateV = new Date(date);
	console.log(dateV);
	if ( dateV.getFullYear() == date_split[2] && (dateV.getMonth()+1)  == parseInt(date_split[1]) && dateV.getDate() == date_split[0]) 
  		alert("La date est valide.");
	else
  		alert("La date n'est pas valide.");
}