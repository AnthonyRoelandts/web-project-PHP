<?php
include_once(__DIR__ . '/../../config.php');

include_once(APP_ROOT . "/menu.php");
include_once(APP_ROOT . "/userInput.php");
include_once(APP_ROOT . "/authentification/authentificationUtils.php");
include_once(APP_ROOT . "/admin/store/productManager.php");

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
    <link rel="stylesheet" href="../../projet.css" media="all" type="text/css" /></head>
<body>
<legend>Gestion des produits</legend>
<br />
<?php
$products = getAllProducts(); // todo: add pagination ?

?>

<table border="1">
    <caption class="title">Liste des produits</caption>
    <thead>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Date de création</th>
        <th>Disponible</th>
        <th>Supprimer</th>
        <th>Rendre (in)disponible</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($products as $element)
    {
        $urlToDelete = 'deleteProduct.php' . '?productId=' . $element['id'];
        $urlToToggleAvailability= 'toggleAvailabilityProduct.php' . '?productId=' . $element['id'];

        echo '<tr>
					<td>'.$element['id'].'</td>
					<td>'.$element['name'].'</td>
					<td>'.$element['description'].'</td>
					<td>'.$element['price'].'</td>
					<td>'.$element['created'].'</td>
					<td>'. ($element['status'] == '1' ? 'oui' : 'non') . '</td>
					<td><a href="' . $urlToDelete . '">GO</a></td>
					<td><a href="' . $urlToToggleAvailability . '">GO</a></td>
				</tr>';
    }?>
    </tbody>
</table>
</body>