<?php
include_once(__DIR__ . '/../config.php');

include_once (APP_ROOT . "/menu.php");
include_once(APP_ROOT . "/admin/connection-history/memberConnectionHandling.php");
include_once (APP_ROOT . "/authentification/authentificationUtils.php");
include_once(APP_ROOT . "/admin/memberAccess.php");

if(!isAdmin())
{
    redirectToErrorPage();
    exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../projet.css" media="all" type="text/css" /></head>
<body>
<legend>Gestion utilisateur</legend>
<br />
<?php
$members = getAllMembers(); // todo: add pagination ?

?>

<table border="1">
    <caption class="title">Liste des utilisateurs membres</caption>
    <thead>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>bloqué</th>
        <th>Voir profit</th>
        <th>Voir données de connexions</th>
        <th>Voir achats</th>
        <th>Bloquer/Debloquer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($members as $element)
    {
        $urlToMemberConnection = 'connection-history/memberConnectionView.php' . '?memberId=' . $element['id'];
        $urlToMemberBan = 'memberBan.php' . '?memberId=' . $element['id'];

        echo '<tr>
					<td>'.$element['id'].'</td>
					<td>'.$element['login'].'</td>
					<td>'. ($element['isBanned'] ? 'oui' : 'non') . '</td>
					<td><a href="">GO</a></td>
					<td><a href="' . $urlToMemberConnection . '">GO</a></td>
					<td><a href="">GO</a></td>
					<td><a href="' . $urlToMemberBan . '">GO</a></td>
				</tr>';
    }?>
    </tbody>
</table>
</body>