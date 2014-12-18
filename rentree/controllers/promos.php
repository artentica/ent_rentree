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
				NULL ,  '-1',  '".$pName."',  '',  ''
				)"
			);

			return generatePromosHTMLTable($pName);
		}
		return "error";

	}

	function modifPromo() {

		if(isset($_POST["oldName"]) && !empty($_POST["oldName"]) && isset($_POST["newName"]) && !empty($_POST["newName"])) {

			$oldName = mysql_escape_string($_POST["oldName"]);
			$newName = mysql_escape_string($_POST["newName"]);

			// Pour remplacer le nom de la promo par promotionName
			DbOperation("UPDATE `document` SET `promo` = '".$newName."' WHERE `document`.`promo` = '".$oldName."'");

			return generatePromosHTMLTable($newName);
		}
		return "error";

	}

	function removePromo() {

		if(isset($_POST["promotionName"]) && !empty($_POST["promotionName"])) {

			$pName = mysql_escape_string($_POST["promotionName"]);

			// Pour remplacer le nom de la promo par : Documents sans promotions
			DbOperation("UPDATE `document` SET `rang` = '0', `promo` = 'no_promo' WHERE `document`.`promo` = '".$pName."'");

			return generatePromosHTMLTable();
		}
		return "error";

	}

	function removePromoAll() {

		if(isset($_POST["promotionName"]) && !empty($_POST["promotionName"])) {

			$pName = mysql_escape_string($_POST["promotionName"]);

			// Pour supprimer la promos ET LES FICHIERS
			DbOperation("DELETE FROM `document` WHERE `document`.`promo` = '".$pName."'");

			return generatePromosHTMLTable();
		}
		return "error";

	}


?>