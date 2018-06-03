<?php
    include_once(__DIR__ . '/config.php');

    include_once(APP_ROOT . "/admin/connection-history/memberConnectionHandling.php");
    include_once(APP_ROOT."/authentification/authentificationUtils.php");
    session_start();
?>
<body>
	<div id="menu">
		<ul id="onglets">
			<li class="active"><a href="accueil.php"> Accueil </a></li>
			<?php
				if (isLogged()) {
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

            <?php
            if (isAdmin()) {
            ?>
            <li><a href="admin/userAdministrationView.php"> Gestion utilisateur </a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>
<?php
?>
