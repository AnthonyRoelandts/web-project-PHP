<?php
    include_once(__DIR__ . '/config.php');

    include_once (APP_ROOT."/menu.php");
    include_once(APP_ROOT . "/admin/connection-history/memberConnectionHandling.php");
    include_once (APP_ROOT."/authentification/authentificationUtils.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="projet.css" media="all" type="text/css" /></head>
<body>
    <legend>Accueil</legend>

    <?php

    if (isLogged())
    {
        $image = $_SESSION['imageProfil'];
        echo 'Bienvenue ' . $_SESSION['login'];
        print '<img src="' . $image . '" alt="texte alternatif" />';
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

    function chargerClasse($classe){

        if (preg_match("/chat/i",$classe))
            $racine = 'chat/';
        else
            $racine = 'blog/';

        require $racine.''.$classe.'.php' ;// on inclut la classe
    }

    spl_autoload_register('chargerClasse');
    if(isset($_GET["page"])){
        $p = $_GET["page"];
    }else{
        $p = 'acceuil';
    }

    switch ($p){

        case "chat":
            $controler = new ChatControler();
            $controler->showMessage();
            break;
        case "blog":
            $controler = new BlogControler();
            $controler->showBlog();
            break;

        default :
            require_once'accueil.php';

    }
    ?>
</body>