<?php
	require_once( 'framework/limonade/limonade.php' );

	dispatch('/' , 'log_in');
	dispatch('/logout' , 'log_out');

	dispatch_post('/user_acess' , 'user_access');//vérifie si la personne à le droit d'accés et si oui il est redirigé vers la page adéquate

	dispatch('/documentseleves' , 'studentinformation'); 


	run();
?>

