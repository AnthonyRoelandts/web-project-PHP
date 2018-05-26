<?php
/**
 * Created by PhpStorm.
 * User: chaouki
 * Date: 26/05/2018
 * Time: 16:31
 */

function getDatabase(){
    $bdd = new PDO('mysql:host='. $_SERVER["MYSQL_HOST"] . ';port='. $_SERVER["MYSQL_PORT"] . ';dbname='. $_SERVER["MYSQL_DB"] . ';charset=utf8', $_SERVER["MYSQL_USER"], $_SERVER["MYSQL_PWD"]);
    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    return $bdd;
}

?>