<?php	
	function save_student(){
		$_SESSION['student_registered'] = true;
		
		//empty do more than an isset
		if (!empty($_POST['identifiant'])
		   && !empty($_POST['studentname'])
		   && !empty($_POST['studentfirstname'])
		   && !empty($_POST['birthday'])
		   && !empty($_POST['phone'])
		   && !empty($_POST['email'])){

			//On met les variable dans des defines car cela rend le travail suivant plus simple et la personne ne change pas ces variables
			define ('identifiant', $_POST['identifiant']);
			define ('studentname', $_POST['studentname']);
			define ('studentfirstname', $_POST['studentfirstname']);
			define ('birthday', $_POST['birthday']);
			define ('phone', $_POST['phone']);
			define ('email', $_POST['email']);
			define ('date_server', date('y-m-d H:i:s'));
			define ('addr_ip', $_SERVER["REMOTE_ADDR"]);

			
			DbOperation("INSERT INTO data (identifiant, nom_fils, prenom_fils, ddn_fils, tel_mobile, courriel, dateI, ip)
						VALUES('". identifiant ."', '". studentname ."', '". studentfirstname ."', '".birthday ."', '". phone ."', '". email ."', '". date_server ."', '". addr_ip ."')");

		}

		header( 'Location:' . url_for('/documentseleves') );
	}
?>