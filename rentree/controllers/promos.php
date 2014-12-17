<?php

	function addPromo() {

		if(isset($_POST["promotionName"]) && !empty($_POST["promotionName"])) {

			// Ouais j'utilise des fonctions dépréciés :p
			$pName = mysql_escape_string($_POST["promotionName"]);

			DbOperation("INSERT INTO  `document` (
				`id` ,
				`rang` ,
				`promo` ,
				`libelle` ,
				`fichier`
				)
				VALUES (
				NULL ,  '0',  '".$pName."',  '',  ''
				)"
			);

			return generatePromosHTMLTable($pName);
		}
		return "error";

	}

	function modifPromo() {

		if(isset($_POST["promotionName"]) && !empty($_POST["promotionName"])) {

			// Ouais j'utilise des fonctions dépréciés :p
			$pName = mysql_escape_string($_POST["promotionName"]);

			DbOperation("INSERT INTO  `document` (
				`id` ,
				`rang` ,
				`promo` ,
				`libelle` ,
				`fichier`
				)
				VALUES (
				NULL ,  '0',  '".$pName."',  '',  ''
				)"
			);

			return generatePromosHTMLTable($pName);
		}
		return "error";

	}

?>