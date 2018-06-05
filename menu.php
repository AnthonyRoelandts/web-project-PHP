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
    $chat= $prefix .'/?page=chat';
    $blog= $prefix .'/?page=blog';

?>
<body>
	<div id="menu">
		<ul id="onglets">
			<?php
			echo "<li class=\"active\"><a href=\"$accueilUrl\"> Accueil </a></li>";
			echo "<li><a href=\"$productsUrl\"> Produits </a></li>";
			echo "<li><a href=\"$blog\">Blog</a></li>";

            if (isLogged()) {
                echo "<li><a href=\"$deconnectionUrl\">Se d&eacute;connecter</a></li>";
                echo "<li><a href=\"$profilUrl\"> Mon profil </a></li>";
                echo "<li><a href=\"$chat\">Chat</a></li>";

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
                echo  "<li><a href=\"$addPostUrl\" class='list-group-item'>Crate Post</a></li>";
            }

//            echo  "<li><a href=\"$displayPostUrl\" class='list-group-item'>Display Post (admin)</a></li>";
            ?>

        </ul>
    </div>
</body>

<?php
function chargerClasse($classe){

    if (preg_match("/chat/i",$classe))
        $racine = 'chat/';
    else
        $racine = 'blog/';

    require $racine.''.$classe.'.php' ;// on inclut la classe
}

spl_autoload_register('chargerClasse');
if(isset($_GET["page"])){
    $p = $_GET["page"];
}else{
    $p = 'acceuil';
}

switch ($p){

    case "chat":
        $controler = new ChatControler();
        $controler->showMessage();
        break;
    case "blog":
        $controler = new BlogControler();
        $controler->showBlog();
        break;
    default :
        require_once'accueil.php';

}
?>
</html>