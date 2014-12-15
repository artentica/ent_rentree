<?php
	require_once( 'framework/limonade/limonade.php' );

	dispatch('/' , 'log_in');
	dispatch('/logout' , 'log_out');

	dispatch_post('/user_acess' , 'user_access');//vérifie si la personne à le droit d'accés et si oui il est redirigé vers la page adéquate

	dispatch('/documentseleves' , 'studentinformation'); 

	dispatch_post('/save_data_student' , 'save_student');

    //dispatch( '/documents/download', 'generate_zip' );
    dispatch( '/documents/download/:promo', 'generate_zip' );
    dispatch( '/documents/downselect/:list', 'generate_zip_select' );

    dispatch('/adminpanel' , 'adminpanel');

    dispatch('/adminpanelstudent' , 'adminpanelstudent');

    dispatch_post('/admin/MAJ_BDD' , 'MAJ_BDD');




	run();
?>

