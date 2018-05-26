<?php
/**
 * Created by PhpStorm.
 * User: chaouki
 * Date: 23/05/2018
 * Time: 21:21
 */
include_once(__DIR__ . '/../../config.php');

include_once(APP_ROOT . "/db.php");

function addConnectionEntryInDatabase($membreId) {
    try
    {
        $bdd = getDatabase();
        $req = $bdd->prepare('INSERT INTO membre_connections (membre_id, start) VALUES (:membreId, NOW())');
        $req->execute(array(
            'membreId' => $membreId,
        ));

        $_SESSION['connectionId'] = $bdd->lastInsertId();;
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
}

function setEndToConnection() {
    $connectionId = $_SESSION['connectionId'];

    if(!isset($connectionId))
        return;

    try
    {
        $bdd = getDatabase();
        $req = $bdd->prepare('UPDATE membre_connections SET end = NOW() WHERE id = :id');
        $req->execute(array(
            'id' => $connectionId
        ));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getConnectionCountForToday($membreId) {
    try
    {
        $bdd = getDatabase();
        $req = $bdd->prepare('SELECT COUNT(*) FROM membre_connections WHERE membre_id = :membre_id AND CAST(start AS DATE) = CAST(NOW() AS DATE)');
        $req->execute(array(
            'membre_id' => $membreId
        ));

        $result=$req->fetch();
        return $result[0];
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getConnectionCountForLastWeek($membreId)
{
    try {
        $bdd = getDatabase();
        $req = $bdd->prepare('SELECT COUNT(*) FROM membre_connections WHERE membre_id = :membre_id AND CAST(start AS DATE) <= CAST(NOW() AS DATE) AND CAST(start AS DATE) >= DATE_SUB(CAST(NOW() AS DATE), INTERVAL 7 DAY)');
        $req->execute(array(
            'membre_id' => $membreId
        ));

        $result = $req->fetch();
        return $result[0];
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>