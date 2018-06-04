<?php
/**
 * Created by PhpStorm.
 * User: chaouki
 * Date: 27/05/2018
 * Time: 14:13
 */

function getPurchaseOfUser($memberId)
{
	$query = getDatabase()->prepare("SELECT * FROM orders WHERE membre_id = " .$memberId);
	$query->execute();
    $result = $query->fetchAll(\PDO::FETCH_ASSOC);
	return $result;
}

?>