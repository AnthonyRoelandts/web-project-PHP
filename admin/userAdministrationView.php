<?php
include_once(__DIR__ . '/../config.php');

include_once (APP_ROOT . "/menu.php");
include_once (APP_ROOT . "/connection-history/memberConnectionHandling.php");
include_once (APP_ROOT . "/authentification/authentificationUtils.php");
include_once (APP_ROOT . "/admin/userAdministrationController.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../projet.css" media="all" type="text/css" /></head>
<body>
<legend>Gestion utilisateur</legend>
<?php
//$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');

$members = getMembers();

//foreach($prenoms as $element)
//{
//    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
//}
?>
</body>