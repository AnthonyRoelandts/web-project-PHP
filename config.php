<?php
/**
 * Created by PhpStorm.
 * User: chaouki
 * Date: 26/05/2018
 * Time: 16:46
 */

define("APP_ROOT", dirname(__FILE__));

function redirectToErrorPage()
{
    header('This is not the page you are looking for', true, 404);
    include(__DIR__ . '/notFound.php');
}

?>