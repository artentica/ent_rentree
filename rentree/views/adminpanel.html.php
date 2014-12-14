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
        	<li id="promotionsList" class="active"><a class="btn" data-toggle="tab">Liste des promotions</a></li>
        	<li id="documentSelected"><a class="btn" data-toggle="tab">Promos du document sélectionné</a></li>
        </ul>
        <p id="promotionsList_content"></p>
        <p id="documentSelected_content" class="hidden"></p>
    </div>
    <div class="col-md-6">
        <ul class="nav nav-tabs nav-justified">
        	<li id="documentsList" class="active"><a class="btn" data-toggle="tab">Tous les documents</a></li>
        	<li id="promotionSelected"><a class="btn" data-toggle="tab">Documents de la promo sélectionnée</a></li>
        </ul>
        <p id="documentsList_content"></p>
        <p id="promotionSelected_content" class="hidden"></p>
    </div>
</div>

<?php end_content_for();?>


<?php content_for('footer')?>

<?php end_content_for();?>




<?php content_for('script')?>

<script src="js/li_url.js"></script>
<script>
    active_li();

    // OUI, ces trucs sont très moches :

    // On met la liste des promos dans la variable promotionsList
    <?php
		$listnontrie = liste_promo();
		$list = trie_list_annee($listnontrie);
		echo('var promotionsList = ');
		echo json_encode($list);
		echo(';');
	?>
	// On charge le contenu
	loadPromotionsList();

	// On met la liste des docs dans la variable documentsList
    <?php
    	$listdoc = liste_doc();
		foreach ($listdoc as $key => $value) {
			$listdoc[$key]['libelle'] = utf8_encode($value['libelle']);
		}
		echo('var documentsList = ');
		echo json_encode($listdoc);
		echo(';');
	?>
	// On charge le contenu
	loadDocumentsList();
</script>

<?php end_content_for();?>
