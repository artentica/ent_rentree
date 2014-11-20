<?php

	function connect_bdd(){

		// Options de connection
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8" ,  // indiquer à MySQL d'échanger nos données en UTF8.
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION , //http://fr2.php.net/manual/fr/pdo.error-handling.php
			PDO::ATTR_PERSISTENT => true //connexion persistante
		);

		try{

			$GLOBALS['pdo'] = new PDO('mysql:host='.DbHost.';dbname='.DbName.', '.dbuser.', '.dbpass , $options);
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
			$sth->closeCursor(); //pas vraiment utile puisque nous ne faisons qu'une seul éxécution mais plus sûr
			$tab = $sth->fetchAll(PDO::FETCH_ASSOC);
		}
	}

?>