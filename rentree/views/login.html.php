<?php content_for('link')?>

<link rel="stylesheet" href="css/style_login.css" type="text/css" />

<?php end_content_for();?>

<?php content_for('header'); ?>
	<div class="titre">
		<p class="center"><img src="images/logo_ISEN.png"  width="300"><br>Documents de rentrée</p>
	</div>
<?php end_content_for();?>

<?php content_for('body'); ?>
	<div class="row">
		<!-- Formulaire de login -->
		<div class="col-md-4 col-md-offset-4">
			<form action="index.php/user_acess" class="form-horizontal" method="post">
				
				<div class="form-group">
					<label class="col-sm-3 control-label monLabel" for="mail">Courriel :</label>
					<div class="col-sm-6">
						<input required type="email" name="mail" class="form-control" id="mail">
					</div>
				</div>

				<p class="texte">(Cette adresse électronique sera votre identifiant)</p>

				<div class="form-group">
					<label class="col-sm-3 control-label monLabel" for="password">Mot de passe :</label>
					<div class="col-sm-6">
						<input required type="password" class="form-control" name="password" id="password">
					</div>
				</div>

				<p class="texte">(Le mot de passe qui vous a été envoyé par courrier)</p>

				<button type="submit" class="btn btn-primary">Enregistrer</button>
				


			</form>
		</div>
	</div>

<?php end_content_for(); ?>

<?php content_for('footer')?>
<hr/>
<div class="texte" align="left">© ISEN Bretagne (2014)  - Contact : <a href="mailto:jean-pierre.gerval@isen.fr?subject=Documents de rentrée">jean-pierre.gerval@isen.fr</a></div>
<?php end_content_for();?>
