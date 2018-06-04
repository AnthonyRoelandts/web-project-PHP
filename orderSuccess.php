<?php

include_once(__DIR__ . '/config.php');

include_once(APP_ROOT . "/menu.php");
include_once(APP_ROOT . "/db.php");

if(!isset($_REQUEST['id'])){
    header("Location: accueil.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success</title>
    <meta charset="utf-8">
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
    <h1>Order Status</h1>
    <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
</div>
</body>
</html>