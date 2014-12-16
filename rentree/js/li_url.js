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

/**
	Charge la liste des documents et cache les autres onglets
*/
$(window.document).on('click', '#documentsList', function() {

	$("#promotionSelected").removeClass("active");
	$("#documentsList_content").show();
	$(".file").show();
	$("#documentsList").addClass("active");

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

$(".promo").click(function() {
	$(".selected").removeClass("selected");
	$(this).addClass("selected");
	selectedPromo = $(this).attr("id");
	loadPromotionSelectedContent();
});

$("#bouton_AjouterPromo").click(function() {

	var promotionName = $("#promotionName").val();

	$.ajax({
		url : '?/adminpanel/promos',
    	type : 'POST',
    	data : 'promotionName='+promotionName,
    	dataType : 'html'
	})
	.success(function(data){
		alert(data);
	})
	.error(function(data){
		alert("error : "+data);
	});

});
