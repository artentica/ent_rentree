<?php

	function connect_bdd(){

		// Options de connection
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8" ,  // indiquer à MySQL d'échanger nos données en UTF8.
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION , //http://fr2.php.net/manual/fr/pdo.error-handling.php
			PDO::ATTR_PERSISTENT => true //connexion persistante
		);

		try{

			$GLOBALS['pdo'] = new PDO("mysql:host=".DbHost.";dbname=".DbName.";","".dbuser."","".dbpass."");
		}
		catch (Exception $e){

			$logfile = fopen("logs/log_bdd.txt", "a+") or die("Unable to open file!");
			fwrite($logfile, $e);
			fclose($logfile);
		    die('Erreur : ' . $e->getMessage());
		    return false;
		}
		return true;
	}


	function DbOperation($sql){
		//prepare: http://fr2.php.net/manual/fr/pdo.prepare.php
		if (connect_bdd()) {
			$sth = $GLOBALS['pdo']->prepare($sql);
			// $sth->execute(array(':calories' => 150, ':couleur' => 'red')); SI ON MET DES PARAM VERSION SURE
			$sth->execute();
			$tab = $sth->fetchAll(PDO::FETCH_ASSOC);
			$sth->closeCursor(); //pas vraiment utile puisque nous ne faisons qu'une seul éxécution mais plus sûr
			if (empty($tab)) {
				return "nothing";
			}
			return $tab;
		}
		return false;
	}

	function liste_promo(){
		//TODO ajouter le mot du bde dans document
		$doc = DbOperation("SELECT DISTINCT promo FROM document WHERE promo!='' ");
		$y=1;
		for ($i=0; $i < count($doc); $i++) {
			$doctrie[$y]=$doc[$i]["promo"];
			$y++;
		}
		return ($doctrie);
	}

    function liste_doc(){

		$doc = DbOperation("SELECT * FROM document ORDER BY promo,rang");
		return ($doc);
	}

	function generatePromosHTMLTable($pName) {

		$list = trie_list_annee(liste_promo());

		$content="";
		foreach ($list as $key => $value) {
			$class="";
			if(isset($pName)) {
				if($value == $pName) {
					// C'est pour identifier le nouvel élément si y'en a un ... Pour l'instant ça sert pas
					$class="newElement";
				}
			}

			$keyPlus2 = $key + 2;
			$content .= '<tr><td id="promo_'.$keyPlus2.'" class="promo '.$class.'">'.$value."</td></tr>";
		}

		return('
			<table id="promotionsList_content" class="table table-striped table-hover sortable">
	   			<tbody style="cursor: pointer;">
	   				<tr><td id="promo_0" class="promo">Communs à toutes les promotions</td></tr>
	   				<tr><td id="promo_1" class="promo">Fichiers isolés</td></tr>
	   				'.$content.'
	   			</tbody>
			</table>
		');

	}

?>
