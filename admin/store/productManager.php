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

function getAllProducts()  {
    try
    {
        $bdd = getDatabase();
        $req = $bdd->prepare('SELECT * FROM products');
        $req->execute();
        return $req->fetchAll();
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function deleteProduct($productId) {
    try
    {
        $bdd = getDatabase();
        $req = $bdd->prepare('DELETE FROM products WHERE id = :productId');
        $req->execute(array(
            'productId' => $productId
        ));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function toggleAvailability($productId) {
    try
    {
        $bdd = getDatabase();
        $req = $bdd->prepare('UPDATE products SET status = \'0\' WHERE id = :productId AND status = \'1\'');
        $req->execute(array(
            'productId' => $productId
        ));

        if($req->rowCount() > 0)
            return;

        $req = $bdd->prepare('UPDATE products SET status = \'1\' WHERE id = :productId AND status = \'0\'');
        $req->execute(array(
            'productId' => $productId
        ));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

?>