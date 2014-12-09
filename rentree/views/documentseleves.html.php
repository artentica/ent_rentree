<?php
if( empty($_SESSION['identifiant'])) {
	    // redirection
	   header('Location:' . url_for('/'));
	  }

?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/style_documents.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<link rel="stylesheet" href="css/chosen.css" />

<?php end_content_for();?>

<?php content_for('header'); ?>
	<div class="titre row">
		<div class="col-sm-4" >
			<img rel="logo de l'isen" class="logo" src="images/logo_ISEN.png">
		</div>

		<h1 class="col-sm-4 center" >Documents de rentrée</h1>

		<h3	class="col-sm-4 school">BREST-RENNES</h3>

	</div>
	<hr>
<?php end_content_for();?>


<?php content_for('body'); ?>
		<!--Message d'enregistrement ou d'update -->
		<?php if (!empty($_SESSION['save']) && $_SESSION['save'] && isset($_SESSION["register"]) && $_SESSION["register"]==1) echo '<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div style="text-align:center;" class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span></button>
						<span class="glyphicon glyphicon-ok" aria-hidden="true">&nbsp;</span>
						<span class="sr-only">Success:</span>
						Vos informations ont bien été enregistrées à '.date("H:i:s").'.
					</div>
				</div>
			</div>';
		?>
	</div>


	<div class="row">






		<!-- Formulaire de rentree -->
		<div class="col-md-4 col-md-offset-1">
			<form action="index.php/save_data_student" method="post" class="form-horizontal" role="form">
				<div class="yellow">
					<p class="formask">Nous vous remercions de bien vouloir compléter ce formulaire avant d'accéder aux documents de rentrée.</p>
					<div class="form-group">
						<label class="col-sm-5 control-label" for="identifiant">Identifiant:</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="identifiant"  id="identifiant" value="<?php echo $_SESSION['identifiant']; ?>" readonly="readonly" >
						</div>
					</div>
					<fieldset>
						<legend>Etudiant(e)</legend>
						<div class="form-group">
							<label class="col-sm-5 control-label" for="studentname">Nom de l'étudiant(e):</label>
							<div class="col-sm-6" id="studentnamediv">
								<input required type="text" name="studentname" onchange="change_value_input('studentnamediv');"  class="form-control" id="studentname" value="<?php echo studentname;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="studentfirstname">Prénom de l'étudiant(e):</label>
							<div class="col-sm-6" id="studentfirstnamediv">
								<input required type="text" name="studentfirstname" onchange="change_value_input('studentfirstnamediv');" class="form-control" id="studentfirstname" value="<?php echo studentfirstname;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="birthday">Date de naissance:</label>
							<div class="col-sm-6"  id="birthdaydiv">
								<input required type="text" name="birthday" onchange="change_value_input('birthdaydiv');" class="form-control" id="birthday" value="<?php echo birthday;?>">
							</div>
						</div>
					</fieldset>
				</div>
				<div class="green">
					<fieldset>
						<legend>Parents</legend>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="phone">Téléphone:</label>
							<div class="col-sm-6" id="phonediv">
								<input required type="tel" onchange="change_value_input('phonediv');" name="phone" class="form-control" id="phone" value="<?php echo phone;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="email">Courriel</label>
							<div class="col-sm-6" id="emaildiv">
								<input  id="samemail" onchange="change_value_input('emaildiv');" required type="email" name="email" class="form-control" id="email" value="<?php echo email;?>">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-7">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="checkmail" onchange ="emaildisabled()" <?php if($_SESSION['identifiant']== email) echo "checked"; ?> >Même email que l'identifiant
									</label>
								</div>
							</div>
						</div>

						<div class="button">
							<a href="<?= url_for('/'); ?>" class="btn btn-danger">Quitter</a>
							<button type="submit" class="btn <?php if ( (empty($_SESSION['save'])) || ($_SESSION['save']==false) ) echo "btn-primary"; else echo "btn-success";?> pull-right"><?php if ( (empty($_SESSION['save'])) || ($_SESSION['save']==false) ) echo "Enregistrer"; else echo "Mettre à jour";?></button>
						</div>
					</fieldset>
				</div>
			</form>
			<small>
				Conformément à la loi "Informatique et Libertés" (loi du 6 janvier 1978 telle que modifiée), vous bénéficiez d'un droit d'accès, de rectification et de suppression des données personnelles vous concernant, que vous pouvez exercer en vous adressant à l'adresse e-mail mentionnée ci-dessous.
			</small>
		</div>

		<!-- GIF and file -->
		<?php
			if ( (empty($_SESSION['save'])) || ($_SESSION['save']==false) ) {
				echo '<div class="col-md-5 col-md-offset-1">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="center-block item active">
							<img src="images/1.jpg" alt="image de présentation de l\'isen">
						</div>
						<div class="center-block item">
							<img src="images/2.jpg" alt="image de présentation de l\'isen">
						</div>
						<div class="center-block item">
							<img src="images/3.jpg" alt="image de présentation de l\'isen">
						</div>
					</div>
				</div> <!-- Carousel -->
			</div>';
			}
			else {
				$listnontrie = liste_promo();
				$list = trie_list_annee($listnontrie);
                $listdoc = liste_doc();
                $rang=0;
				echo '<div class="col-md-6 " >
			<p>
				Vous trouverez sur cette page toutes les informations utiles pour la rentrée 2014 en sélectionnant l\'année qui vous concerne. Vous pouvez télécharger chaque fichier (format
				<a href="http://get.adobe.com/fr/reader/" target="_blank">PDF</a>) ou bien l\'ensemble des fichiers (format
				<a type="button" style="cursor: pointer;"  data-toggle="modal" data-target="#decompresseur">ZIP</a>) pour l\'année choisie. A imprimer avec modération...
			</p>
			<select data-placeholder="Choisissez votre classe de rentrée" class="chosen-select-deselect form-control input-lg">
				';
				echo optionField($list);
				echo '
			</select>
			<div class="table-responsive">
				<table class="table table-hover notmovingtable">
					<thead>
				        <tr>
					        <th>#</th>
					        <th>Documents</th>
					        <th class="glyph">Visualiser</th>
					        <th class="glyph">Télécharger</th>
                            <th class="downcheck" style="display:none"></th>
				        </tr>
        			</thead><tbody class="notmovingtable">';


        	foreach ($listdoc as $key => $value) {
        		if(empty($value['promo'])){
                    $rang++;

                    echo '<tr>
						<td class="glyph2 active">'.$rang.'</td>
						<td class="docfield docname success">'.utf8_encode($value['libelle']).'</td>
						<td class="tdglyph warning iconetable"><a target="_blank" href="pdf/'.utf8_encode($value['fichier']).'"><span class="glyphicon glyphicon-eye-open " aria-hidden="true"></span></a></td>
						<td class="tdglyph info iconetable" ><a download href="pdf/'.utf8_encode($value['fichier']).'"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a></td>
                        <td class="active downcheck"><label><input value="'.utf8_encode($value['fichier']).'" class="checkboxdown" type="checkbox"></label></td>
					</tr>';

               }
        	}
          echo '</tbody><tbody class="movingtable">';

            foreach ($listdoc as $key => $value) {
                if(!empty($value['promo'])){
                    $rang2=$rang+$value['rang'];
                    echo '<tr class="'.$value['promo'].' tabchange" style="display:none" value="'.$value['promo'].'">
						<td class="active glyph2">'.$rang2.'</td>
						<td class="docfield docname success">'.utf8_encode($value['libelle']).'</td>
						<td class="glyph tdglyph warning"><a target="_blank" href="pdf/'.utf8_encode($value['fichier']).'"><span class="glyphicon glyphicon-eye-open " aria-hidden="true"></span></a></td>
						<td class="glyph tdglyph info" ><a download href="pdf/'.utf8_encode($value['fichier']).'"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a></td>
                        <td class="active downcheck"><label><input value="'.utf8_encode($value['fichier']).'" class="checkboxdown" type="checkbox"></label></td>
					</tr>';
                }
            }

        	echo '</tbody>
				</table>

			<div id="zip_zone">
				<p>Télécharger tous les fichiers</p>
				<a class="col-xs-4 col-xs-offset-5" href="#" id="promo_zip_link"></a>
			</div>


        <div class="checkbox">
			<label>
				<input type="checkbox" id="choosedown" onchange ="choosefile()" >Choisir le fichier que vous voulez télécharger
			</label>
		</div>
        </div>
            <div class="col-md-4 col-md-offset-2">
            	<a id="downall" class="btn btn-primary btn-lg">Télécharger tous les fichiers</a>
            </div>
        	<div class="col-md-4">
            	<a id="downchoose" disabled="disabled" class="btn btn-success btn-lg">Télécharger la sélections de fichiers</a>
			</div>
		</div>';
			}
		?>


	</div>


			<!-- Modal Alert error-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">Erreur(s) à corriger</h4>
			      </div>
			      <div class="modal-body">
			        <p class="error"></p>
			      </div>
			      <div class="modal-footer">
			      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>

			      </div>
			    </div>
			  </div>
			</div>



			<!-- Modal zip rar-->
			<div class="modal fade" id="decompresseur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">Décompresseur d'archives</h4>
			      </div>
			      <div class="modal-body">
			        <p>Vous pouvez décompresser les archives avec (par exemple) <a href="http://www.7-zip.org/download.html" target="_blank">7zip</a> ou <a href="http://www.win-rar.com/start.html?&L=10" target="_blank">RAR</a>:</p><br/>
			        <p style="width:100%">
			        <a href="http://www.7-zip.org/download.html" target="_blank"><img class="modal_image" style="margin-left:15%;margin-right:15%" src="images/7z.png" alt="7zip icone"></a>
			        <a href="http://www.win-rar.com/start.html?&L=10" target="_blank"><img class="modal_image" style="margin-right:15%" src="images/rar.png" alt="winrar icone"></a>
			        </p>

			      </div>
			      <div class="modal-footer">
			      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>

			      </div>
			    </div>
			  </div>
			</div>





<?php end_content_for(); ?>


<?php content_for('footer')?>
<hr/>
<div class="texte" align="left">© ISEN Bretagne (2014)  - Contact : <a href="mailto:jean-pierre.gerval@isen.fr?subject=Documents de rentrée">jean-pierre.gerval@isen.fr</a></div>

<?php end_content_for();?>

<?php content_for('script')?>


<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script src="js/datepickerconf.js"></script>
<script src="js/renseignement.js"></script>
<?php require("js/renseignement_formulaire_table.js");?>


<?php end_content_for();?>
