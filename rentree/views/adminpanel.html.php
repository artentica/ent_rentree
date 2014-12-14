<?php
if( empty($_SESSION['identifiant']) || empty($_SESSION['admin'] )) {
	    // redirection
	   header('Location:' . url_for('/'));
	  }

?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/adminprincipal.css" type="text/css" />
<link rel="stylesheet" href="css/treeView.css" type="text/css" />

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

        <table id="promotionsList_content" class="table table-striped table-hover sortable">
       		<tbody style="cursor: pointer;">
			<?php
				$list = trie_list_annee(liste_promo());
				foreach ($list as $key => $value) {
					echo("<tr><td>".$value."</td></tr>");
				}
			?>
			</tbody>
		</table>

		<table id="documentSelected_content" class="table table-striped table-hover sortable"></table>

    </div>

    <div class="col-md-6">

        <ul class="nav nav-tabs nav-justified">
        	<li id="documentsList" class="active"><a class="btn" data-toggle="tab">Tous les documents</a></li>
        	<li id="promotionSelected"><a class="btn" data-toggle="tab">Documents de la promo sélectionnée</a></li>
        </ul>

		<table id="documentsList_content" class="table table-striped table-hover sortable">
			<tbody style="cursor: pointer;">
				<tr>
					<td>
						<div class="css-treeview">
						    <ul>
								<li><input type="checkbox" id="item-1" /><label for="item-1">This One is Open by Default...</label>
							        <ul>
							            <li><input type="checkbox" id="item-1-0" checked="checked" /><label for="item-1-0">And Contains More Nested Items...</label>
							                <ul>
							                    <li><a href="./">Look Ma - No Hands</a></li>
							                    <li><a href="./">Another Item</a></li>
							                    <li><a href="./">And Yet Another</a></li>
							                </ul>
							            </li>
							            <li><a href="./">Lorem</a></li>
							            <li><a href="./">Ipsum</a></li>
							            <li><a href="./">Dolor</a></li>
							            <li><a href="./">Sit Amet</a></li>
							        </ul>
								</li>
								<?php

									/*
									id
									rang
									promo
									libelle
									fichier
									*/

									$listdoc = liste_doc();
									foreach ($listdoc as $key => $value) {
										$listdoc[$key]['libelle'] = utf8_encode($value['libelle']);
									}

									foreach ($listdoc as $key => $value) {
										echo('<li id="file_'.$value["id"].'" class="file" promos="'.$value["promo"].'"><a>');
										echo($value["fichier"]."<br/>");
										echo("</a></li>");
									}
								?>
						    </ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<table id="promotionSelected_content" class="table table-striped table-hover sortable"></table>

    </div>

</div>

<?php end_content_for();?>


<?php content_for('footer')?>

<?php end_content_for();?>




<?php content_for('script')?>

<script src="js/li_url.js"></script>
<script>
    active_li();
</script>

<?php end_content_for();?>
