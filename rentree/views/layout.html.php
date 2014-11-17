<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo h($title) ?></title>
		<link rel="stylesheet" href="views/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="views/css/default.css" type="text/css" />
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

		<?php if(!empty($footer))://non obligatoire
			echo $footer;
			endif;
		?>
	</body>
</html>