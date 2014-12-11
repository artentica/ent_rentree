<?php	
	function save_student(){
		//$_SESSION['student_registered'] = true;
		//empty do more than an isset
		if (  !empty($_POST['identifiant'])
		   && !empty($_POST['studentname'])
		   && !empty($_POST['studentfirstname'])
		   && !empty($_POST['birthday'])
		   && !empty($_POST['phone'])
		   && !empty($_POST['email'])){

			
			define ('identifiant', $_SESSION['identifiant']);
			define ('studentname', $_POST['studentname']);
			define ('studentfirstname', $_POST['studentfirstname']);
			define ('birthday', $_POST['birthday']);
			define ('phone', $_POST['phone']);
			define ('email', $_POST['email']);
			define ('date_server', date('y-m-d H:i:s'));
			define ('addr_ip', $_SERVER["REMOTE_ADDR"]);

			if ($_SESSION['save']==false) {
				DbOperation("INSERT INTO data (identifiant, nom_fils, prenom_fils, ddn_fils, tel_mobile, courriel, date, ip)
						VALUES('". identifiant ."', '". studentname ."', '". studentfirstname ."', '".birthday ."', '". phone ."', '". email ."', '". date_server ."', '". addr_ip ."')");
			}
			else{
				DbOperation("UPDATE `data` SET `nom_fils`='".studentname."',`prenom_fils`='".studentfirstname."',`ddn_fils`='".birthday."',`tel_mobile`='".phone."',`courriel`='".email."',`date`='".date_server."',`ip`='".addr_ip."'
				 WHERE `identifiant`='".identifiant."'");
			}
			$_SESSION["register"]=0;
		}
		else $_SESSION["register"]+=1;
		header( 'Location:' . url_for('/documentseleves') );
	}
?>