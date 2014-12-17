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

			// Pour supprimer la promos ET LES FICHIERS
			DbOperation("DELETE FROM `document` WHERE `document`.`promo` = '".$pName."'");

			// Pour remplacer le nom de la promo par : Documents sans promotions
			// DbOperation("UPDATE `document` SET `promo` = 'Documents sans promotions' WHERE `document`.`promo` = '".$pName."'");

			return generatePromosHTMLTable();
		}
		return "error";

	}

?>