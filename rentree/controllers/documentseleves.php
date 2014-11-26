<?php
	function studentinformation(){

		set ('title', 'Documents');

		if( empty($_SESSION['identifiant'])) {// redirection 
			header('Location:' . url_for('/'));
	  	}

	  	define ('identifiant', $_SESSION['identifiant']);

		$tabinfo = DbOperation("SELECT * FROM data WHERE identifiant = '".identifiant."'");
		if ($tabinfo=="nothing" ){
			$_SESSION['save']=false;
			define ('studentname',  '');
			define ('studentfirstname',  '');
			define ('birthday',  '');
			define ('phone',  '');
			define ('email', '');
			define ('date_server', date('y-m-d H:i:s'));
			define ('addr_ip', $_SERVER["REMOTE_ADDR"]);
		}
		elseif (!$tabinfo) {
			$_SESSION['save']=false;
			//TODO: faire un affiche erreur connexion BDD
		}
		else{
			$_SESSION['save']=true;
			//On met les variable dans des defines car cela rend le travail suivant plus simple
			define ('studentname', $tabinfo[0]['nom_fils']);
			define ('studentfirstname', $tabinfo[0]['prenom_fils']);
			define ('birthday', $tabinfo[0]['ddn_fils']);
			define ('phone', $tabinfo[0]['tel_mobile']);
			define ('email', $tabinfo[0]['courriel']);
			define ('date_server', date('y-m-d H:i:s'));
			define ('addr_ip', $_SERVER["REMOTE_ADDR"]);
		}

		if (isset($_SESSION["register"])) {
			$_SESSION["register"]+=1;//for see if it is a refresh or a sending of informations
		}

		return html('documentseleves.html.php', 'layout.html.php');

	}
?>