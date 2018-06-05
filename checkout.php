<?php
// include database configuration file
include_once(__DIR__ . '/config.php');

include_once(APP_ROOT . "/menu.php");
include_once(APP_ROOT . "/db.php");
include_once(APP_ROOT . "/store/purchaseHistoryController.php");

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: accueil.php");
}

// get customer details by session customer ID
$query = getDatabase()->query("SELECT * FROM membre WHERE id = ".$_SESSION['membre_id']);
$custRow = $query->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="projet.css" media="all" type="text/css" /></head>
    <style>
		.container{width: 100%;padding: 50px;}
		.table{width: 65%;float: left;}
		.shipAddr{width: 30%;float: left;margin-left: 30px;}
		.footBtn{width: 95%;float: left;}
		.orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' USD'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
        </tr>
        <?php } getPurchaseOfUser($_SESSION['membre_id']);
		}else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0 && isLogged()){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' USD'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Shipping Details</h4>
        <p><?php echo $custRow['login']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p><?php echo $custRow['nom']; ?></p>
        <p><?php echo $custRow['adresse']; ?></p>
    </div>
    <div class="footBtn">
        <a href="products.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
</div>
</body>
</html>