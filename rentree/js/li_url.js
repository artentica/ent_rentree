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
$(window.document).on('click', '#promotionsList', function() {

	$("#documentSelected_content").hide();
	$("#documentSelected").removeClass("active");
	$("#promotionsList_content").show();
	$("#promotionsList").addClass("active");

});

/**
	Affiche les promos concernées par le doc (si un doc est selectionné)
*/
function loadDocumentSelectedContent() {

	var content = "No selected document";
	if(typeof selectedDoc != 'undefined' && selectedDoc != null) {
		// On affiche les promos qui possèdent le document
		content = $("#"+selectedDoc).attr("promos");
		if(content == "") {
			content = "Ce document n'est pas associé à une promo en particulier";
		}
		content = "<tr><td>"+content+"</td></tr>";
	}

	$("#promotionsList_content").hide();
	$("#promotionsList").removeClass("active");
	$("#documentSelected_content").html(content);
	$("#documentSelected_content").show();
	$("#documentSelected").addClass("active");

}
$(window.document).on('click', '#documentSelected', loadDocumentSelectedContent );

/**
	Charge la liste des documents et cache les autres onglets
*/
$(window.document).on('click', '#documentsList', function() {

	$("#promotionSelected_content").hide();
	$("#documentsList_content").show();

});

/**
	Affiche les documents appartenant à la promos (si une promo est selectionnée)
*/
$(window.document).on('click', '#promotionSelected', function() {

	var content = "No selected promo";
	if(typeof selectedPromo != 'undefined' && selectedPromo != null) {
		// On affiche les documents que possède la promo
		content = "* les documents que possède la promo *";
	}

	$("#documentsList_content").hide();
	$("#promotionSelected_content").html(content);
	$("#promotionSelected_content").show();

});


$(".file").click(function() {
	selectedDoc = $(this).attr("id");
	loadDocumentSelectedContent();
});