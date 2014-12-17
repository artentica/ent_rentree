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
				NULL ,  '0',  '".$_POST["promotionName"]."',  '',  ''
				)"
			);

			return generatePromosHTMLTable();
		}
		return "error";

	}

?>