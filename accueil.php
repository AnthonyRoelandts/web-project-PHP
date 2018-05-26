<?php
    include_once(__DIR__ . '/config.php');

    include_once (APP_ROOT."/menu.php");
    include_once (APP_ROOT."/connection-history/memberConnectionHandling.php");
    include_once (APP_ROOT."/authentification/authentificationUtils.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="projet.css" media="all" type="text/css" /></head>
<body>
    <legend>Accueil</legend>
    <?php

    if (isLogged())
    {
        $image = $_SESSION['imageProfil'];
        echo 'Bienvenue ' . $_SESSION['login'];
        print '<img src="' . $image . '" alt="texte alternatif" />';

        echo '<pre>';
        echo 'Nombre de connections aujourd\'hui: ' . getConnectionCountForToday($_SESSION['membre_id']);
        echo '<pre>';
        echo 'Nombre de connections depuis les 7 derniers jours: ' . getConnectionCountForLastWeek($_SESSION['membre_id']);
    }

    // todo: remove this
    if(isMemberUser()) {
        echo '<pre>';
        echo 'Peon va. Lol!';
    }

    if(isAdmin())
    {
        echo '<pre>';
        echo 'Vous etes admin. La classe!';
    }
    ?>
</body>