<?php
	 session_start();
	// detruit toute les var de session
	session_unset(); 
	// detruit la session 
	session_destroy();
	header('location: accueil.php');
	exit;
?>