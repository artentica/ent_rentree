<?php
if( empty($_SESSION['identifiant'])) {
	    // redirection 
	   header('Location:' . url_for('/'));
	  }
?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/style_documents.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >

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
		<?php if (!empty($_SESSION['save']) && $_SESSION['save'] && $_SESSION["register"]==1) echo '<div class="row">
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
							<div class="col-sm-6">
								<input required type="text" name="studentname"  class="form-control" id="studentname" value="<?php echo studentname;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="studentfirstname">Prénom de l'étudiant(e):</label>
							<div class="col-sm-6">
								<input required type="text" name="studentfirstname" class="form-control" id="studentfirstname" value="<?php echo studentfirstname;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="birthday">Date de naissance:</label>
							<div class="col-sm-6"  id="birthdaydiv">
								<input required type="text" name="birthday" class="form-control" id="birthday" value="<?php echo birthday;?>">
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
								<input required type="tel" name="phone" class="form-control" id="phone" value="<?php echo phone;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="email">Courriel</label>
							<div class="col-sm-6">
								<input  id="samemail" required type="email" name="email" class="form-control" id="email" value="<?php echo email;?>">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-7">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="checkmail" onchange ="emaildisabled()">Même email que l'identifiant
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
				echo '<div class="col-md-6 " >
			<p>
				Vous trouverez sur cette page toutes les informations utiles pour la rentrée 2014 en sélectionnant l\'année qui vous concerne. Vous pouvez télécharger chaque fichier (format 
				<a href="http://get.adobe.com/fr/reader/" target="_blank">PDF</a>) ou bien l\'ensemble des fichiers (format 
				<a href="http://www.7-zip.org/" target="_blank">ZIP</a>) pour l\'année choisie. A imprimer avec modération...
			</p>
			<select class="form-control">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
			<div class="table-responsive">
			<table class="table">
			<thead>
          <tr>
            <th style="width:10%;">#</th>
            <th>Documents</th>
            <th style="width:10%;">Visualiser</th>
            <th style="width:10%;">Télécharger</th>
          </tr>
        </thead>';
        	$list = liste_promo();
        	foreach ($list as $key => $value) {
        		echo '<tr>
  <td class="active">'.$key.'</td>
  <td class="docname success">'.$list[$key].'</td>
  <td class="tdglyph warning"><a href="#"><span class="glyphicon glyphicon-eye-open " aria-hidden="true"></span></a></td>
  <td class="tdglyph info" ><a href="#"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a></td>
</tr>';
        	}
        	echo '
			</table></div>
			<div class="row" id="zip_zone">
				<p>
				<b id="promo_libelle"></b>
				Télécharger tous les fichiers</p>
				<a class="col-xs-4 col-xs-offset-5" href="#" id="promo_zip_link">
				</a>
			</div>	
		</div>';
			}
		?>


	</div>
					

			<!-- Modal -->
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






<?php end_content_for(); ?>


<?php content_for('footer')?>
<hr/>
<div class="texte" align="left">© ISEN Bretagne (2014)  - Contact : <a href="mailto:jean-pierre.gerval@isen.fr?subject=Documents de rentrée">jean-pierre.gerval@isen.fr</a></div>

<?php end_content_for();?>

<?php content_for('script')?>

<script>
$(document).ready(function(){
  $("form").submit(function(event){
  	var error_text="";
	date_split = $('#birthday').val().split('/', 3);
	date = date_split[1]+"/"+date_split[0]+"/"+ date_split[2];
	dateV = new Date(date);
	$('#birthdaydiv').removeClass( "has-error" );

	if (dateV.getFullYear() != date_split[2] && (dateV.getMonth()+1)  != parseInt(date_split[1]) && dateV.getDate() != date_split[0]){
		error_text="La date d'anniversaire n'est pas valide veuillez corriger cela avant de pouvoir poursuivre.";
		$('#birthdaydiv').addClass( "has-error" );
	} 

	compteur = $('#phone').val().length;
	$('#phonediv').removeClass( "has-error" );
		var regex = /[0-9]|\./;
	if(isNaN($('#phone').val())) {
		$('#phonediv').addClass( "has-error" );
		if (error_text!="") error_text = error_text +"\n";
		error_text = "Le numéro de téléphone doit exclusivement être constitué de chiffres.";
	}

	else if (compteur!=10){
		$('#phonediv').addClass( "has-error" );
		if (error_text!="") error_text = error_text +"\n";
		error_text = error_text + "Assurez-vous de rentrer un numéro à 10 chiffres (0123456789)";
		num_less = 10 - compteur;
		if (num_less>0) error_text = error_text + " il vous en manque " + num_less +".";
		else error_text = error_text + " vous en avez " + (-num_less) +" de trop.";
	}
	if (error_text!="") {
		$("#myModal").modal({backdrop: true});
		$('.error').text(error_text);
		event.preventDefault ();
	}
 
  });
});
</script>


<script src="js/jquery.datetimepicker.js"></script>
<script src="js/datepickerconf.js"></script>
<script src="js/renseignement.js"></script>
<?php end_content_for();?>