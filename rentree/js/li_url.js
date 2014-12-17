// fonction pour savoir quel onglet du nav général activer
function active_li(){
    var location = document.location.href;
    // indexOf indique si la string se trouve dans l'url
    var n = location.indexOf("adminpanelstudent");
    if(n==-1){
        $('#gest_promo').addClass( "active" );
    }
    else $('#gest_student').addClass( "active" );
}

$(window.document).on('click', '#suppr_modif_file', function() {
    $("#promotionSelected").removeClass("active");
	$("#dropzone").removeClass("active");
	$("#suppr_modif_file_div").show();
	$(".file").show();
    $("#dropzonediv").hide();
    $("#documentsList_content").hide();
	$("#suppr_modif_file_div").addClass("active");
});
/**
	Charge la liste des documents et cache les autres onglets
*/
$(window.document).on('click', '#documentsList', function() {
    $("#suppr_modif_file_div").removeClass("active");
	$("#promotionSelected").removeClass("active");
	$("#dropzone").removeClass("active");
	$("#documentsList_content").show();
	$(".file").show();
    $("#dropzonediv").hide();
    $("#suppr_modif_file_div").hide();
	$("#documentsList").addClass("active");

});

//onglet ajout de fichiers
$(window.document).on('click', '#dropzone', function() {
    $("#suppr_modif_file_div").removeClass("active");
	$("#promotionSelected").removeClass("active");
    $("#documentsList").removeClass("active");
	$("#dropzonediv").addClass("active");
    $("#documentsList_content").hide();
    $("#dropzonediv").show();
    $("#suppr_modif_file_div").hide();


});

/**
	Affiche les documents appartenant à la promos (si une promo est selectionnée)
*/
function loadPromotionSelectedContent() {

	var promos = "";
	if(typeof selectedPromo != 'undefined' && selectedPromo != null && selectedPromo != "promo_0") {
		promos = $("#"+selectedPromo).html();
		var tmp = promos.split("<a");
		promos = tmp[0];
	}
    $("#suppr_modif_file_div").removeClass("active");
    $("#suppr_modif_file_div").hide();
	$("#documentsList_content").show();
	$("#documentsList").removeClass("active");
	$("#promotionSelected").addClass("active");
    $("#dropzonediv").hide();

	$(".file").hide();
	$(".file[promos='']").hide();
	$(".file[promos='"+promos+"']").show();

}


$(window.document).on('click', '#promotionSelected', loadPromotionSelectedContent );
$("#dropzonediv").hide();


$(".file").click(function() {
	$(".selected").removeClass("selected");
	if($(this).hasClass("generic")) {
		$("#promo_0").addClass("selected");
	}
	else {
		selectedDoc = $(this).attr("id");
		selectedDoc = $("#"+selectedDoc).attr("promos");
		$(".promo:contains('"+selectedDoc+"')" ).addClass("selected");
	}
});

function promoOnClick() {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	selectedPromo = $(this).attr("id");
	loadPromotionSelectedContent();
}
//ajout de la classe select sur la promo cliqué
$(".promo").click(promoOnClick);


//Ajout une promotion
$("#bouton_AjouterPromo").click(function() {

	var promotionName = $("#promotionName").val() + $("#ANumber").val();

	$.ajax({
		url : '?/adminpanel/promos/add',
    	type : 'POST',
    	data : 'promotionName='+promotionName,
    	dataType : 'html'
	})
	.success(function(data) {
		$('#promotionsList_content').html(data);
		$('#promotionName').val("");
		recontructionAfterAjax();
		//Je voulais faire en sorte de mettre une petite animation quand on a ajouté un fichier, mais j'ai pas encore réussi :/
		// window.setTimeout( function(){
  //               $('.yolo').addClass('animated bounce');
  //       }, 1000);
	})
	.error(function(data){
		alert("error : "+data);
	});

});

// Ajout des boutons suppr et modif onHover
function appendGliphicons() {
	$(this).append('<a onclick="delPromo()" id="bouton_SupprimerPromo"><span class="glyphicon glyphicon-remove"></span></a>');
	$(this).append('<a onclick="editPromo()" id="bouton_ModifierPromo"><span class="glyphicon glyphicon-pencil"></span></a>');
}
function removeGliphicons() {
    $( this ).find( "a:last" ).remove();
    $( this ).find( "a:last" ).remove();
}
$(".promo").hover(appendGliphicons, removeGliphicons);

// Suppression de promo
function delPromo() {
	var promoId = $("#bouton_SupprimerPromo").parent().attr('id');
	var promoName = $("#"+promoId).html();
	var tmp = promoName.split("<a");
	promoName = tmp[0];
	alert("Ajouter un modal pour demander si l'on veut supprimer aussi les fichiers associés à cette promo ... suppression de "+promoName);

	$.ajax({
		url : '?/adminpanel/promos/remove',
    	type : 'POST',
    	data : 'promotionName='+promoName,
    	dataType : 'html'
	})
	.success(function(data) {

			$('#promotionsList_content').html(data);
			$('#promotionName').val("");
			recontructionAfterAjax();

	})
	.error(function(data){
		alert("error : "+data);
	});
};

// Modification de promo
function editPromo() {
	var promoId = $("#bouton_ModifierPromo").parent().attr('id');
	var promoName = $("#"+promoId).html();
	var tmp = promoName.split("<a");
	promoName = tmp[0];

	alert("Ajouter un modal pour demander le nouveau nom de la promo ... modif de "+promoName);

	$.ajax({
		url : '?/adminpanel/promos/modif',
    	type : 'POST',
    	data : 'oldName='+promoName+'&'+'newName=azerty42_A5',
    	dataType : 'html'
	})
	.success(function(data) {

			$('#promotionsList_content').html(data);
			$('#promotionName').val("");
			recontructionAfterAjax();

	})
	.error(function(data){
		alert("error : "+data);
	});

};

function recontructionAfterAjax() {
	$(".promo").click(promoOnClick);
	$(".promo").hover(appendGliphicons, removeGliphicons);
};