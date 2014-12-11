<?php

	function log_in(){

		set ('title', 'Page de connexion');
		return html ('login.html.php', 'layout.html.php');

	}

?>