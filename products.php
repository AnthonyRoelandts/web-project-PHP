<?php
    include_once(__DIR__ . '/config.php');

    include_once(APP_ROOT . "/menu.php");
    include_once(APP_ROOT . "/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
		.container{padding: 50px;}
		.cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="projet.css" media="all" type="text/css" />
</head>
<body>
	<div class="container">
		<h1>Products</h1>
		<a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
		<div id="products" class="row list-group">
			<?php
			//get rows query
			$query = getDatabase()->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
			if($query->rowCount() > 0){ 
				while($row = $query->fetch()){
			?>
			<div class="item col-lg-4">
				<div class="thumbnail">
					<div class="caption">
						<h4 class="list-group-item-heading"><?php echo $row["name"]; ?></h4>
						<p class="list-group-item-text"><?php echo $row["description"]; ?></p>
						<div class="row">
							<div class="col-md-6">
								<p class="lead"><?php echo '$'.$row["price"].' USD'; ?></p>
							</div>
							<div class="col-md-6">
								<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } }else{ ?>
			<p>Product(s) not found.....</p>
			<?php } ?>
		</div>
	</div>
</body>
</html>