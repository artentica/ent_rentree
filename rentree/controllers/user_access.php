<?php	
	function user_access(){

		$_SESSION['mail'] = $_POST['mail'];

		$_SESSION['access'] = ($_POST['password'] == MDPstudent)?true:false;
		//si le mot de passe est celui de l'étudiant le $_SESSION['acess'] est définie comme "true"
		//le MDPstudent est définie dans  lib/conf.php avec toutes les autres variables globales

		($_SESSION['access'])?header( 'Location:' . url_for('/documentseleves') ):header('Location:' . url_for('/'));
		$_SESSION['acess'] = ($_POST['password'] == MDPstudent)?true:false;
		//si le mot de passe est celui de l'étudiant le $_SESSION['acess'] est définie comme "true"
		//le MDPstudent est définie dans  lib/conf.php avec toutes les autres variables globales

		($_SESSION['acess'])?header( 'Location:' . url_for('/documentseleves') ):header('Location:' . url_for('/'));
	}