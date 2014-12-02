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
				<table class="table">
					<thead>
				        <tr>
					        <th class="glyph">#</th>
					        <th>Documents</th>
					        <th class="glyph">Visualiser</th>
					        <th class="glyph">Télécharger</th>
				        </tr>
        			</thead>';

        	
        	foreach ($listdoc as $key => $value) {
        		if(empty($value['promo'])){
                    $rang++;

                    echo '<tr>
						<td class="active">'.$rang.'</td>
						<td class="docname success">'.utf8_encode($value['libelle']).'</td>
						<td class="tdglyph warning"><a href="#"><span class="glyphicon glyphicon-eye-open " aria-hidden="true"></span></a></td>
						<td class="tdglyph info" ><a href="#"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a></td>
					</tr>';

               }
        	}
        	echo '
				</table>
			</div>
			<div class="row" id="zip_zone">
				<p>Télécharger tous les fichiers</p>
				<a class="col-xs-4 col-xs-offset-5" href="#" id="promo_zip_link"></a>
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

<script>

$(".chosen-select-deselect").chosen({allow_single_deselect:true,
	disable_search_threshold: 10,
	no_results_text: "Aucun résultat pour votre recherche"});


function change_value_input(divname){

	studentname = <?php echo '"'.studentname.'"';  ?>;
	studentfirstname = <?php echo '"'.studentfirstname.'"';  ?>;
	birthday = <?php echo '"'.birthday.'"';  ?>;
	phone = <?php echo '"'.phone.'"';  ?>;
	email = <?php echo '"'.email.'"';  ?>;

	if(<?php if (!empty($_SESSION['save']) && $_SESSION['save']) echo '1'; else echo '0'; ?>){
		switch(divname) {
		    case "emaildiv":
		        if ($('#emaildiv input').val() != email) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "phonediv":
		        if ($('#phonediv input').val() != phone) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "birthdaydiv":
		        if ($('#birthdaydiv input').val() != email) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "studentfirstnamediv":
		        if ($('#studentfirstnamediv input').val() != studentfirstname) delete_success(divname);
		        else add_success(divname);
		        break;
		    case "studentnamediv":
		        if ($('#studentnamediv input').val() != studentname) delete_success(divname);
		        else add_success(divname);
                console.log("studentnamediv")
		        break;
		    default:
		        console.log("switch error: 'change_value_input(string)'");
		}

	}
}

function add_success(divname){
	$('#' + divname).removeClass( "has-warning" );
	$('#' + divname).addClass( "has-success has-feedback" );
	$('#' + divname).append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
}

function delete_success(divname){
	$('#' + divname).removeClass( "has-success has-feedback" );
	$('#' + divname + ' span').remove();
	$('#' + divname).addClass( "has-warning" );
}

$(document).ready(function(){

	if(<?php if (!empty($_SESSION['save']) && $_SESSION['save']) echo '1'; else echo '0'; ?>){
			$('#birthdaydiv,#phonediv, #emaildiv, #studentfirstnamediv, #studentnamediv ').addClass( "has-success has-feedback" );
			$('#birthdaydiv,#phonediv, #emaildiv, #studentfirstnamediv, #studentnamediv ').append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
			$('#birthdaydiv span').css("right","17px");
			/*$("p").css("background-color","yellow");
			position: absolute;
			right: 17px;*/
	}else $('#birthdaydiv,#phonediv, #emaildiv, #studentfirstnamediv, #studentnamediv ').removeClass( "has-success has-feedback" );

  $("form").submit(function(event){
  	var error_text="";
	date_split = $('#birthday').val().split('/', 3);
	date = date_split[1]+"/"+date_split[0]+"/"+ date_split[2];
	dateV = new Date(date);
	$('#birthdaydiv').removeClass( "has-error has-feedback" );

	if (dateV.getFullYear() != date_split[2] && (dateV.getMonth()+1)  != parseInt(date_split[1]) && dateV.getDate() != date_split[0]){
		error_text="La date d'anniversaire n'est pas valide veuillez corriger cela avant de pouvoir poursuivre.";
		$('#birthdaydiv').addClass( "has-error has-feedback" );
		$('#birthdaydiv').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
	
	} 

	compteur = $('#phone').val().length;
	$('#phonediv').removeClass( "has-error" );
		var regex = /[0-9]|\./;
	if(isNaN($('#phone').val())) {
		$('#phonediv').addClass( "has-error has-feedback" );
		$('#phonediv').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
		if (error_text!="") error_text = error_text +"\n";
		error_text += "Le numéro de téléphone doit exclusivement être constitué de chiffres.";
	}

	else if (compteur!=10){
		$('#phonediv').addClass( "has-error has-feedback" );
		$('#phonediv').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
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
		return false;//TODO do not work on firefox find how we can do
	}
 
  });
});
</script>

<?php end_content_for();?>
