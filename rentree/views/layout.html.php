<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo h($title) ?></title>
<<<<<<< HEAD
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="css/default.css" type="text/css" />
=======
		<link rel="stylesheet" href="views/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="views/css/default.css" type="text/css" />
>>>>>>> origin/master
		<?php if(!empty($link))://non obligatoire
			echo $link;
			endif;
		?>
	</head>

	<body>
		<div class="header">
			<?php 
				if(!empty($header))://non obligatoire
				echo $header;
				endif; 
			?>
		</div>
		
		<div class="body">
			<?php 
				echo $body;
			?>
		</div>
<<<<<<< HEAD
		
=======

>>>>>>> origin/master
		<?php if(!empty($footer))://non obligatoire
			echo $footer;
			endif;
		?>
<<<<<<< HEAD
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<?php //non obligatoire
		if(!empty($script)):
			echo $script;
		endif;
	?>
	</body>
</html>
=======
	</body>
</html>
>>>>>>> origin/master
