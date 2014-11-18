
<?php


if( !isset($_SESSION['access']) || ($_SESSION['access'] != true ) ) {
    // redirection
   header('Location:' . url_for('/'));
  }

?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/style_documents.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<?php content_for('link')?>

<link rel="stylesheet" href="views/css/style_documents.css" type="text/css" />
>>>>>>> origin/master

<?php end_content_for();?>

<?php content_for('header'); ?>
	<div class="titre row">
		<div class="col-sm-4" >
			<img class="logo" src="images/logo_ISEN.png">
		</div>

		<h1 class="col-sm-4 center" >Documents de rentrée</h1>

		<h3	class="col-sm-4 school">BREST-RENNES</h3>

	</div>
	<hr>
<?php end_content_for();?>


<?php content_for('body'); ?>

	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<form action="index.php/save" method="post" class="form-horizontal" role="form">
				<div class="yellow">
					<p class="formask">Nous vous remercions de bien vouloir compléter ce formulaire avant d'accéder aux documents de rentrée.</p>					
					<div class="form-group">
							<label class="col-sm-5 control-label" for="studentname">Identifiant:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="id" value="<?php echo $_SESSION['mail']; ?>" disabled="disabled" >
							</div>
						</div>
					<fieldset>
						<legend>Etudiant(e)</legend>
						<div class="form-group">
							<label class="col-sm-5 control-label" for="studentname">Nom de l'étudiant(e):</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="studentname">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="studentfirstname">Prénom de l'étudiant(e):</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="studentfirstname">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="birthday">Date de naissance:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="birthday">
							</div>
						</div>
					</fieldset>
				</div>
				<div class="green">
					<fieldset>
						<legend>Parents</legend>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="phone">Téléphone:</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="phone">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label"  for="email">Courriel</label>
							<div class="col-sm-6">
								<input type="email" class="form-control" id="email">
							</div>
						</div>
						<div class="button">
							<button type="submit" class="btn btn-danger">Quitter</button>
							<button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
						</div>
					</fieldset>
				</div>
			</form>
			<small>
				Conformément à la loi "Informatique et Libertés" (loi du 6 janvier 1978 telle que modifiée), vous bénéficiez d'un droit d'accès, de rectification et de suppression des données personnelles vous concernant, que vous pouvez exercer en vous adressant à l'adresse e-mail mentionnée ci-dessous.
			</small>
		</div>
	</div>

<?php end_content_for(); ?>


<?php content_for('footer')?>
<hr/>
<div class="texte" align="left">© ISEN Bretagne (2014)  - Contact : <a href="mailto:jean-pierre.gerval@isen.fr?subject=Documents de rentrée">jean-pierre.gerval@isen.fr</a></div>

<?php end_content_for();?>

<?php content_for('script')?>


<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
	var d = new Date();
	var y = d.getFullYear()-18;
	var m = d.getMonth()+1;
	var day = d.getDate();

	var date = y + '/' + m + '/' + day;

	$('#birthday').datetimepicker({
	 timepicker:false,
	 mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
	 lang:'fr',
	 startDate: date,
	 format:'d/m/Y',
	 //maxDate:'+1960/01/01',


	});
</script>

	<div class="titre">
		<p style="text-align:center"><img src="views/images/logo_ISEN.png"  width="270"><br>Documents de rentrée</p>
	</div>
<?php end_content_for();?>

<?php content_for('body'); ?>

	
<?php end_content_for(); ?>

<?php content_for('footer')?>
<hr/>
<div class="texte" align="left">© ISEN Bretagne (2014)  - Contact : <a href="mailto:jean-pierre.gerval@isen.fr?subject=Documents de rentrée">jean-pierre.gerval@isen.fr</a></div>
<?php end_content_for();?>