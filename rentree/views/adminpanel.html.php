<?php
if( empty($_SESSION['identifiant']) || empty($_SESSION['admin'] )) {
	    // redirection
	   header('Location:' . url_for('/'));
	  }

?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/adminprincipal.css" type="text/css" />

<?php end_content_for();?>

<?php content_for('header'); ?>
	<div class="titre row">
		<div class="col-sm-4" >
			<img rel="logo de l'isen" class="logo" src="images/logo_ISEN.png">
		</div>

		<h1 class="col-sm-4 center" >Panel d'administration</h1>

		<h3	class="col-sm-4 school">BREST-RENNES</h3>

	</div>
	<hr>

<?php end_content_for(); ?>


<?php content_for('body'); ?>

<?php require('adminnavbar.html.php');?>

<div class="row">
		<div class="col-md-6">
            <ul class="nav nav-tabs nav-justified">

              <li><a href="#home" data-toggle="tab">Accueil</a></li>
              <li><a href="#profile" data-toggle="tab">Profil</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="nav nav-tabs nav-justified">

              <li><a href="#home" data-toggle="tab">Accueil</a></li>
              <li><a href="#profile" data-toggle="tab">Profil</a></li>
            </ul>
        </div>
</div>

<?php end_content_for();?>


<?php content_for('footer')?>

<?php end_content_for();?>




<?php content_for('script')?>



<?php end_content_for();?>
