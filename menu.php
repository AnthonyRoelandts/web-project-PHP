<?php
    include_once(__DIR__ . '/config.php');

    include_once(APP_ROOT . "/admin/connection-history/memberConnectionHandling.php");
    include_once(APP_ROOT."/authentification/authentificationUtils.php");
    session_start();

    $prefix = $_SERVER['CONTEXT_PREFIX'];
    if($_SERVER['CONTEXT_PREFIX'] == '/')
        $prefix = '';
    $accueilUrl = $prefix . '/accueil.php';
    $productsUrl = $prefix . '/products.php';
    $deconnectionUrl = $prefix . '/deconnexion.php';
    $profilUrl = $prefix . '/profil.php';
    $inscriptionUrl = $prefix . '/inscription.php';
    $loginUrl = $prefix . '/login.php';
    $userAdministrationViewUrl = $prefix . '/admin/userAdministrationView.php';
    $addProductUrl = $prefix . '/admin/store/addProduct.php';
    $listProductsUrl = $prefix . '/admin/store/listProduct.php';
    $displayPostUrl= $prefix . '/blog/ClBlogAffichage.php';
    $addPostUrl= $prefix . '/blog/ClBlogCreation.php';

?>
<body>
	<div id="menu">
		<ul id="onglets">
			<?php
			echo "<li class=\"active\"><a href=\"$accueilUrl\"> Accueil </a></li>";
			echo "<li><a href=\"$productsUrl\"> Produits </a></li>";
            if (isLogged()) {
                echo "<li><a href=\"$deconnectionUrl\">Se d&eacute;connecter</a></li>";
                echo "<li><a href=\"$profilUrl\"> Mon profil </a></li>";
                $image = $prefix . '/' . $_SESSION['imageProfil'];
                print '<li><img src="' . $image . '" height="42" width="42"/></li>';
            } else {
                echo "<li><a href=\"$inscriptionUrl\"> S'inscrire </a></li>";
                echo "<li><a href=\"$loginUrl\"> Se connecter </a></li>";
            }

            if (isAdmin()) {
                echo "<li><a href=\"$userAdministrationViewUrl\"> Gestion utilisateur</a></li>";
                echo "<li><a href=\"$addProductUrl\"> Ajouter un produit</a></li>";
                echo "<li><a href=\"$listProductsUrl\"> Gerer les produits</a></li>";
            }

            echo  "<li><a href=\"$addPostUrl\" class='list-group-item'>Crate Post (admin)</a></li>";
//            echo  "<li><a href=\"$displayPostUrl\" class='list-group-item'>Display Post (admin)</a></li>";

            ?>
            <li><a href="http://localhost/?page=chat">Chat</a></li>
            <li><a href="http://localhost/?page=blog">Blog</a></li>

        </ul>
    </div>
</body>