<?php
if( empty($_SESSION['identifiant']) || empty($_SESSION['admin'] )) {
	    // redirection
	   header('Location:' . url_for('/'));
	  }

?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/adminprincipal.css" type="text/css" />
<link rel="stylesheet" href="css/adminPanel.css" type="text/css" />

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

	<div class="col-md-4">

        <ul class="nav nav-tabs nav-justified">
        	<li id="promotionsList" class="active"><a class="btn" data-toggle="tab">Liste des promotions</a></li>
        </ul>


        <div class="col-md-8">
        	<input id="promotionName" class="form-control" placeholder="Nouvelle promotion">
       </div>
       <div class="col-md-4">
        	<button id="bouton_AjouterPromo" title="Ajouter une promotion" class="btn generation_element_to_change btn-success" style="display: inline-block;">
        		<span class="glyphicon glyphicon-saved" aria-hidden="true"> Valider</span>
        	</button>
       </div>



        <table id="promotionsList_content" class="table table-striped table-hover sortable">
       		<tbody style="cursor: pointer;">
			<?php
				$list = trie_list_annee(liste_promo());
				echo('<tr><td id="promo_0" class="promo">Communs à toutes les promotions</td></tr>');
				foreach ($list as $key => $value) {
					echo('<tr><td id="promo_'.++$key.'" class="promo">'.$value."</td></tr>");
				}
			?>
			</tbody>
		</table>
    </div>

    <div class="col-md-8">

        <ul class="nav nav-tabs nav-justified">
        	<li id="documentsList" class="active"><a class="btn" data-toggle="tab">Tous les documents</a></li>
        	<li id="promotionSelected"><a class="btn" data-toggle="tab">Documents de la promo sélectionnée</a></li>
        	<li id="dropzone"><a class="btn" data-toggle="tab">Ajouter des documents</a></li>
        </ul>

		<table id="documentsList_content" class="table table-striped table-hover sortable">
			<tbody style="cursor: pointer;">
				<tr>
					<td>
						<div class="css-treeview">
						    <ul>
								<?php
									/* id 		rang 	promo 	libelle 	fichier */
									$listdoc = liste_doc();
									foreach ($listdoc as $key => $value) {
										$listdoc[$key]['libelle'] = utf8_encode($value['libelle']);
									}
									/* <li id="file_42" class="file" promos="CIR3"><a>NOMDUFICHIER</a></li> */
									foreach ($listdoc as $key => $value) {
										echo('<li id="file_'.$value["id"].'" class="file');
										if($value["promo"] == "") {
											echo(' generic');
										}
										echo('" promos="'.$value["promo"].'"><a>');
										echo($value["fichier"]);
										echo("</a></li>");
									}
								?>
						    </ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
    <div id="dropzonediv">
        <form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone"></form>
    </div>

    </div>

</div>

<?php end_content_for();?>


<?php content_for('footer')?>

<?php end_content_for();?>




<?php content_for('script')?>

<script src="js/li_url.js"></script>
<script src="js/dropzone.js"></script>
<script>
    active_li();
</script>

<?php end_content_for();?>














<!-- <li><input type="checkbox" id="item-1" /><label for="item-1">This One is Open by Default...</label>
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
								</li> -->
