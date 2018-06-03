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

    function getMember($memberId) {
        try
        {
            $bdd = getDatabase();
            $sql = "SELECT * FROM membre WHERE id = :memberId";
            $req = $bdd->prepare($sql);
            $req->execute(array(
                'memberId' => $memberId
            ));

            return $req->fetch();
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    function banMember($memberId) {
        try
        {
            $bdd = getDatabase();
            $req = $bdd->prepare('UPDATE membre SET isBanned = true WHERE id = :memberId');
            $req->execute(array(
                'memberId' => $memberId
            ));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    function unbanMember($memberId) {
        try
        {
            $bdd = getDatabase();
            $req = $bdd->prepare('UPDATE membre SET isBanned = false WHERE id = :memberId');
            $req->execute(array(
                'memberId' => $memberId
            ));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
?>