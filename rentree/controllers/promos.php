<?php

	function addPromo() {

		if(isset($_POST["promotionName"]) && !empty($_POST["promotionName"])) {

			DbOperation("INSERT INTO  `document` (
				`id` ,
				`rang` ,
				`promo` ,
				`libelle` ,
				`fichier`
				)
				VALUES (
				NULL ,  '-1',  '".$_POST["promotionName"]."',  'Cette promotion ne contient aucun fichier',  'Cette promotion ne contient aucun fichier'
				)"
			);

			return "success";
		}
		return "error";
	}

?>