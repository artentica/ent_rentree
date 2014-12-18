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

    dispatch_post('/admin/upload' , 'upload_file');

    dispatch_post('/admin/BDD_file_rank' , 'rank_file');

    dispatch_post('/admin/file_update' , 'file_update');

    dispatch_post('/admin/file_suppr' , 'file_suppr');

    dispatch_post('/adminpanel/promos/add' , 'addPromo');
    dispatch_post('/adminpanel/promos/modif' , 'modifPromo');
    dispatch_post('/adminpanel/promos/remove' , 'removePromo');
    dispatch_post('/adminpanel/promos/removeAll' , 'removePromoAll');

	run();
?>

