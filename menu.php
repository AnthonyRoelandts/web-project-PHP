<?php
	 session_start();
?>
<body>
	<div id="menu">
		<ul id="onglets">
			<li class="active"><a href="accueil.php"> Accueil </a></li>
			<?php
				if (isset($_SESSION['login'])) {
			?>
	<li><a href="deconnexion.php">Se d&eacute;connecter</a></li>
	<li><a href="profil.php"> Mon profil </a></li>
	<?php
	$image = $_SESSION['imageProfil'];
	print '<li><img src="' . $image . '" height="42" width="42"/></li>';
	} else {
	?>
    <li><a href="inscription.php"> S'inscrire </a></li>
    <li><a href="login.php"> Se connecter </a></li>
	<?php
	}
	?>
  </ul>
</div>
</body>
<?php
// on se connecte � MySQL 
$db = mysqli_connect($_SERVER["MYSQL_HOST"], $_SERVER["MYSQL_USER"], $_SERVER["MYSQL_PWD"],$_SERVER["MYSQL_DB"]);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
