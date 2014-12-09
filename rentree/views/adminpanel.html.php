<?php
if( empty($_SESSION['identifiant'])) {
	    // redirection
	   header('Location:' . url_for('/'));
	  }

?>

<?php content_for('link')?>



<?php end_content_for();?>

<?php content_for('header'); ?>


<?php end_content_for(); ?>


<?php content_for('footer')?>

<?php end_content_for();?>

<?php content_for('script')?>



<?php end_content_for();?>
