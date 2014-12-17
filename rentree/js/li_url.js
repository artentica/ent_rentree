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
	$("#dropzone").addClass("active");
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
	}

	$("#documentsList_content").show();
	$("#documentsList").removeClass("active");
	$("#promotionSelected").addClass("active");

	$(".file").hide();
	$(".file[promos='']").hide();
	$(".file[promos='"+promos+"']").show();

}


$(window.document).on('click', '#promotionSelected', loadPromotionSelectedContent );
$("#dropzonediv").hide();
$("#suppr_modif_file_div").removeClass("active");
$("#suppr_modif_file_div").hide();

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


//ajout de la classe select sur la promo cliqué
$(".promo").click(function() {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	selectedPromo = $(this).attr("id");
	loadPromotionSelectedContent();
});


//Ajout une promotion
$("#bouton_AjouterPromo").click(function() {

	var promotionName = $("#promotionName").val() + $("#ANumber").val();

	$.ajax({
		url : '?/adminpanel/promos',
    	type : 'POST',
    	data : 'promotionName='+promotionName,
    	dataType : 'html'
	})
	.success(function(data){
		$('#promotionsList_content').html(data);
		$('#promotionName').val("");
	})
	.error(function(data){
		alert("error : "+data);
	});

});
