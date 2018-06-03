<?php
/**
 * Created by PhpStorm.
 * User: chaouki
 * Date: 26/05/2018
 * Time: 16:28
 */

    include_once(__DIR__ . '/../config.php');

    include_once(APP_ROOT . "/db.php");

    function getAllMembers() {
        $bdd = getDatabase();
        $req = $bdd->prepare('SELECT * FROM membre WHERE isAdmin = false ');
        $req->execute();
        return $req->fetchAll();
    }

?>