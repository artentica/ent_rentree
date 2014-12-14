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
	Charge la liste des promos et cache l'autre onglet
*/
function loadPromotionsList() {

	// OSEF, c'est juste pour tester
 	var content = "";
	for (var key in promotionsList){
	   content += promotionsList[key];
	   content += " <br/> ";
	}

	$("#documentSelected_content").addClass("hidden");
	$("#promotionsList_content").html(content);
	$("#promotionsList_content").removeClass("hidden");

}
$(window.document).on('click', '#promotionsList', loadPromotionsList);

/**
	Affiche les promos concernées par le doc (si un doc est selectionné)
*/
$(window.document).on('click', '#documentSelected', function() {

	var content = "No selected document";
	if(typeof selectedDoc != 'undefined' && selectedDoc != null) {
		// On affiche les promos qui possèdent le document
		content = "* les promos qui possèdent le document *";
	}

	$("#promotionsList_content").addClass("hidden");
	$("#documentSelected_content").html(content);
	$("#documentSelected_content").removeClass("hidden");

});

/**
	Charge la liste des documents et cache les autres onglets
*/
function loadDocumentsList() {

	// OSEF, c'est juste pour tester
	var content = "";
	for (var key in documentsList){
	   content += documentsList[key]["libelle"];
	   content += "&nbsp &nbsp &nbsp";
	   content += documentsList[key]["fichier"];
	   content += " <br/> ";
	}

	$("#promotionSelected_content").addClass("hidden");
	$("#documentsList_content").html(content);
	$("#documentsList_content").removeClass("hidden");

}
$(window.document).on('click', '#documentsList', loadDocumentsList);

/**
	Affiche les documents appartenant à la promos (si une promo est selectionnée)
*/
$(window.document).on('click', '#promotionSelected', function() {

	var content = "No selected document";
	if(typeof selectedPromo != 'undefined' && selectedPromo != null) {
		// On affiche les documents que possède la promo
		content = "* les documents que possède la promo *";
	}

	$("#documentsList_content").addClass("hidden");
	$("#promotionSelected_content").html(content);
	$("#promotionSelected_content").removeClass("hidden");

});