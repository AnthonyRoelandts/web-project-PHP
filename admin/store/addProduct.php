<?php
include_once(__DIR__ . '/../../config.php');

include_once(APP_ROOT . "/menu.php");
include_once(APP_ROOT . "/authentification/authentificationUtils.php");
include_once(APP_ROOT . "/admin/store/productManager.php");

if (!isAdmin()) {
    redirectToErrorPage();
    exit();
}

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function displayBadInputError($field) {
    echo 'Champ requis: ' . $field;
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="../../projet.css" media="all" type="text/css"/>
</head>
<body>

<form method="post" action="">

    <legend>Ajouter un produit</legend>
    </br>

    <div class="form-group">
        <label class="col-lg-2 control-label">Nom</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="name" placeholder="Nom">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
            <textarea name="description" rows="5" cols="40"></textarea>

        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Prix</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="price" placeholder="Prix">
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10">
            <input type="radio" name="isAvailable" value="true">Disponible
            <input type="radio" name="isAvailable" value="false">Non disponible
        </div>
    </div>


    <br/>
    <button type="submit" name="add" class="btn btn-primary">Ajouter</button>
</form>
</body>

<?php

if (!isset($_POST['add']) || $_SERVER["REQUEST_METHOD"] != "POST") {
    return;
}

if (empty($_POST["name"])) {
    displayBadInputError("Nom");
} else {
    $name = clean_input($_POST["name"]);
}

if (empty($_POST["description"])) {
    displayBadInputError("Description");
} else {
    $description = clean_input($_POST["description"]);
}

if (empty($_POST["price"])) {
    displayBadInputError("Prix");
} else {
    $price = (float) clean_input($_POST["price"]);
    if($price <= 0) {
        echo 'Prix invalide';
        exit;
    }
}

if (empty($_POST["isAvailable"])) {
    displayBadInputError("Disponibilité");
} else {
    $isAvailable = clean_input($_POST["isAvailable"]);
    $isAvailable = $isAvailable == 'true';
}

createProduct($name, $description, $price, $isAvailable);

echo 'Le produit a été ajouté!';

?>