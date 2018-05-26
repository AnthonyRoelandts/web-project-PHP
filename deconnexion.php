<?php
include_once ("config.php");

include_once(APP_ROOT . "/admin/connection-history/memberConnectionHandling.php");

	 session_start();
	 setEndToConnection();
	// detruit toute les var de session
	session_unset(); 
	// detruit la session 
	session_destroy();
	header('location: accueil.php');
	exit;
?>