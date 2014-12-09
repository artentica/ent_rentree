<script>

$(".chosen-select-deselect").chosen({allow_single_deselect:true,
	disable_search_threshold: 10,
	no_results_text: "Aucun résultat pour votre recherche"});

tabshowrow = "instanciepasnull";

$('.chosen-select-deselect').on('change', function() {
    var value=$(".chosen-select-deselect").val();
    $("."+tabshowrow).hide();
    if(value!=tabshowrow)tabshowrow=value;
    if(value=="") tabshowrow="instanciepasnull";
    if(value!="")$("."+value).val(value).show();
});

function choosefile(){
   if($('#choosedown').is(':checked')){
        $('.downcheck').show().css({width: "6%"});
       $('.docfield').css({width: "64%"});
       $('#downchoose').attr('disabled', false);
	}
	else {
        $('#downchoose').attr('disabled', true);
        $('.docfield').css({width: "70%"});
        $('.downcheck').hide().css({width: "0%"});
	}
}


function change_value_input(divname){

	studentname = <?php echo '"'.studentname.'"';  ?>;
	studentfirstname = <?php echo '"'.studentfirstname.'"';  ?>;
	birthday = <?php echo '"'.birthday.'"';  ?>;
	phone = <?php echo '"'.phone.'"';  ?>;
	email = <?php echo '"'.email.'"';  ?>;

	if(<?php if (!empty($_SESSION['save']) && $_SESSION['save']) echo '1'; else echo '0'; ?>){
		switch(divname) {
		    case "emaildiv":
		        if ($('#emaildiv input').val() != email) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "phonediv":
		        if ($('#phonediv input').val() != phone) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "birthdaydiv":
		        if ($('#birthdaydiv input').val() != email) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "studentfirstnamediv":
		        if ($('#studentfirstnamediv input').val() != studentfirstname) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "studentnamediv":
		        if ($('#studentnamediv input').val() != studentname) delete_success(divname);
		        else add_success(divname);
                console.log("studentnamediv")
		        break;
		    default:
		        console.log("switch error: 'change_value_input(string)'");
		}

	}
}

function add_success(divname){
	$('#' + divname).removeClass( "has-warning has-error" );
	$('#' + divname).addClass( "has-success has-feedback" );
    $('#' + divname + ' span').remove();
	$('#' + divname).append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
}

function delete_success(divname){
	$('#' + divname).removeClass( "has-success has-feedback has-error" );
	$('#' + divname + ' span').remove();
	$('#' + divname).addClass( "has-warning" );
}

$(document).ready(function(){

	if(<?php if (!empty($_SESSION['save']) && $_SESSION['save']) echo '1'; else echo '0'; ?>){
			$('#birthdaydiv,#phonediv, #emaildiv, #studentfirstnamediv, #studentnamediv ').addClass( "has-success has-feedback" );
			$('#birthdaydiv,#phonediv, #emaildiv, #studentfirstnamediv, #studentnamediv ').append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-²="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
			$('#birthdaydiv span').css("right","17px");
	}else $('#birthdaydiv,#phonediv, #emaildiv, #studentfirstnamediv, #studentnamediv ').removeClass( "has-success has-feedback" );

  $("form").submit(function(event){
  	var error_text="";
	date_split = $('#birthday').val().split('/', 3);
	date = date_split[1]+"/"+date_split[0]+"/"+ date_split[2];
	dateV = new Date(date);
	$('#birthdaydiv').removeClass( "has-error has-feedback" );

	if (dateV.getFullYear() != date_split[2] && (dateV.getMonth()+1)  != parseInt(date_split[1]) && dateV.getDate() != date_split[0]){
		error_text="La date d'anniversaire n'est pas valide veuillez corriger cela avant de pouvoir poursuivre.";
		$('#birthdaydiv').addClass( "has-error has-feedback" );
		$('#birthdaydiv').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');

	}

	compteur = $('#phone').val().length;
	$('#phonediv').removeClass( "has-error" );
		var regex = /[0-9]|\./;
	if(isNaN($('#phone').val())) {
		$('#phonediv').addClass( "has-error has-feedback" );
		$('#phonediv').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
		if (error_text!="") error_text = error_text +"\n";
		error_text += "Le numéro de téléphone doit exclusivement être constitué de chiffres.";
	}

	else if (compteur!=10){
		$('#phonediv').addClass( "has-error has-feedback" );
		$('#phonediv').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
		if (error_text!="") error_text = error_text +"\n";
		error_text = error_text + "Assurez-vous de rentrer un numéro à 10 chiffres (0123456789)";
		num_less = 10 - compteur;
		if (num_less>0) error_text = error_text + " il vous en manque " + num_less +".";
		else error_text = error_text + " vous en avez " + (-num_less) +" de trop.";
	}
	if (error_text!="") {
		$("#myModal").modal({backdrop: true});
		$('.error').text(error_text);
		event.preventDefault ();
		return false;//TODO do not work on firefox find how we can do
	}

  });
});

// Met l'url de l'archive dans le href
$( window.document ).on( 'click', '#downall', function() {

	var url=$(".chosen-select-deselect").val();
    $(this).attr("href","<?=url_for('/documents/download'); ?>" +"/" + url);

});

// Met l'url contenant le nom de tous les fichiers selectionnés dans le href
$( window.document ).on( 'click', '#downchoose', function() {

	var start=0;
    var list= '';

    $('.checkboxdown:checked').each(function(){
            if(start){
                list += "*!*";
            }
            start =1;
               var name = $(this).val().replace('/','-_-');
                list += name;

    });


    if(list!=''){
    	$(this).attr("href","<?=url_for('/documents/downselect'); ?>" +"/" + list);
    }
    else{
    	$(this).removeAttr("href");
        $("#myModal").modal({backdrop: true});
		$('.error').text("Vous devez choisir au moins un fichier");
    }

});

</script>
