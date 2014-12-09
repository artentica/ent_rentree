<?php

	function adminpanel(){

		set ('title', 'Panel admin');
		return html ('adminpanel.html.php', 'layout.html.php');

	}

    function adminpanelstudent(){

		set ('title', 'Panel admin');
		return html ('adminpanelstudent.html.php', 'layout.html.php');

	}

?>
