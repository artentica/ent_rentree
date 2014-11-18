<?php content_for('link')?>


<link rel="stylesheet" href="css/style_login.css" type="text/css" />

<link rel="stylesheet" href="views/css/style_login.css" type="text/css" />


<?php end_content_for();?>

<?php content_for('header'); ?>
	<div class="titre">

		<p class="center"><img src="images/logo_ISEN.png"  width="300"><br>Documents de rentrée</p>

		<p style="text-align:center"><img src="views/images/logo_ISEN.png"  width="270"><br>Documents de rentrée</p>

	</div>
<?php end_content_for();?>

<?php content_for('body'); ?>

	<form action="index.php/user_acess" method="post">
		<p>

		<label for="mail" class="monLabel">Courriel </label> :  <input  required size="30" type="email" name="mail" id="mail"/><br/>
		<p class="texte">(Cette adresse électronique sera votre identifiant)</p>
		<label for="password" class="monLabel">Mot de passe </label> : <input  required size="30" type="password" name="password" id="password"/><br/>

		<label for="mail" class="monLabel">Courriel </label> :  <input  required type="email" name="mail" id="mail"/><br/>
		<p class="texte">(Cette adresse électronique sera votre identifiant)</p>
		<label for="password" class="monLabel">Mot de passe </label> : <input  required type="password" name="password" id="password"/><br/>

		<p class="texte">(Le mot de passe qui vous a été envoyé par courrier)</p>
		<input type="submit" value="Valider" class="button" />
		</p>
	</form>

<?php end_content_for(); ?>

<?php content_for('footer')?>
<hr/>
<div class="texte" align="left">© ISEN Bretagne (2014)  - Contact : <a href="mailto:jean-pierre.gerval@isen.fr?subject=Documents de rentrée">jean-pierre.gerval@isen.fr</a></div>

<?php end_content_for();?>


