<?php

include_once(__DIR__ . '/../../config.php');

include_once(APP_ROOT . "/db.php");

function createProduct($name, $description, $price, $isAvailable) {
    try
    {
        $bdd = getDatabase();
        $sql = 'INSERT INTO products (name, description, price, created, modified, status) VALUES (:name, :description, :price, NOW(), NOW(), :status)';
        $req = $bdd->prepare($sql);
        $req->execute(array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'status' => ($isAvailable ? '1' : '0'),
        ));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

?>