<?php	
	function user_access(){
		if (!empty($_POST['mail']) && !empty($_POST['password'])) {//normalement non utile grace au required de login mais plus de sécurité
		
			$_SESSION['identifiant'] = $_POST['mail'];

			$_SESSION['access'] = ($_POST['password'] == MDPstudent)?true:false;
			//si le mot de passe est celui de l'étudiant le $_SESSION['acess'] est définie comme "true"
			//le MDPstudent est définie dans  lib/conf.php avec toutes les autres variables globales
			
			($_SESSION['access'])?header( 'Location:' . url_for('/documentseleves') ):header('Location:' . url_for('/'));
		}
		else{
			flash(0, 'has-error');
			header('Location:' . url_for('/'));
		} 
	}