<?php	
	function user_access(){
		if (!empty($_POST['mail']) && !empty($_POST['password'])) {//normalement non utile grace au required de login mais plus de sécurité
		
			$_SESSION['identifiant'] = $_POST['mail'];

			$_SESSION['access'] = ($_POST['password'] == MDPstudent)?true:false;
			//si le mot de passe est celui de l'étudiant le $_SESSION['acess'] est définie comme "true"
			//le MDPstudent est définie dans  lib/conf.php avec toutes les autres variables globales



			if ($_SESSION['access']) {
				$_SESSION['rightToBeConnected'] = true;
				header( 'Location:' . url_for('/documentseleves'));
			}
			else{


                $_SESSION['access'] = ($_POST['password'] == MDPadmin)?true:false;
                if ($_SESSION['access']) {
                    $_SESSION['rightToBeConnected'] = true;
                    $_SESSION['admin']=true;
                    header( 'Location:' . url_for('/adminpanel'));
                }
                else{
                    $_SESSION['rightToBeConnected'] = false;
                    header('Location:' . url_for('/'));
                }

			}
				
		}
		else{
			$_SESSION['rightToBeConnected'] = false;
			header('Location:' . url_for('/'));
		} 
	}
