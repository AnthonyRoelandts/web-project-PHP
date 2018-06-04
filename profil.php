<?php
include_once(__DIR__ . '/config.php');

include_once(APP_ROOT . "/db.php");
include_once(APP_ROOT . "/menu.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="projet.css" media="all" type="text/css" />
    </head>
    <body>

        <!--enctype="multipart/form-data" n�cessaire pour upload fichier -->
        <form method="post" action="" enctype="multipart/form-data">

            <legend>Mes donn&eacute;es</legend>
        </br>

		<?php
		 $bdd = getDatabase();
		 
		 if (empty($_GET["memberId"])) {
		  $sql = "Select nom,prenom,adresse,codePostal,dateNaissance,email,login from membre where login = :login";
		  $req = $bdd->prepare($sql);
		  $req->execute(array(
			  'login' => $_SESSION['login']
		  ));
		  $isAdmin='';
		 } else {
			$memberId = $_GET["memberId"];
			$sql = "Select nom,prenom,adresse,codePostal,dateNaissance,email,login from membre where id = :id";
			$req = $bdd->prepare($sql);
		  $req->execute(array(
			  'id' => $memberId
		  ));
			$isAdmin="disabled";
		 }
		  
		  $data=$req->fetch();
		?>
        <div class="form-group">
            <label class="col-lg-2 control-label">Nom</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="nom" value="<?php print $data['nom']; ?>" disabled="true"> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Pr&eacute;nom</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="prenom" value="<?php print $data['prenom']; ?>" disabled="true">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Adresse</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="adresse" value="<?php print $data['adresse']; ?>" <?php echo $isAdmin; ?>> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Code postal</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="codePostal" value="<?php print $data['codePostal']; ?>" <?php echo $isAdmin; ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Date de naissance</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="dateNaissance" value="<?php print $data['dateNaissance']; ?>" disabled="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Login</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="login" value="<?php print $data['login']; ?>" disabled="true">
                                    </div>
                                </div>
								<?php
								if (empty($memberId)) { 
								?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nouveau mot de passe</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                                        </div>
                                    </div>
								<?php
								}
								?>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">email</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="email" value="<?php print $data['email']; ?>" <?php echo $isAdmin; ?>>
                                            </div>
                                        </div>

										<?php
										if (empty($memberId)) { 
										?>
                                            <button type="submit" name="sauver" class="btn btn-primary">Sauver</button>
										<?php
										} else { 
										?>
										<button name="retour" class="btn btn-primary"><a href="admin/userAdministrationView.php"> Retour</a></button>
										<?php
										}
										?>
                                        </form>
                                    </body>

<?php
// Si on clic sur le bouton qui a le nom inscrire alors
if (ISSET($_POST['sauver'])) {
    
    if (empty($_POST['email'])) {
        echo '<div class="alert alert-dismissable alert-danger">
               e-mail vide !
              </div>';
    } else {
        
        //On cr�er les variables
        $adresse       = $_POST['adresse'];
        $codePostal    = $_POST['codePostal'];
        $password      = $_POST['password'];
        $mail          = $_POST['email'];

        // hash password
        $hash  = password_hash($password, PASSWORD_DEFAULT );
        
        try
        {
            $bdd = getDatabase();
            $sql = "UPDATE membre set `adresse`=:adresse, `codePostal`=:codePostal,";
			if (!empty($_POST['email'])) {
				$sql .= "`password`=:password,";
			}
			$sql .= " `email`=:email where login=:login";
            $req = $bdd->prepare($sql);
            $req->execute(array(
                'adresse' => $adresse,
                'codePostal' => $codePostal,
                'login' => $_SESSION['login'],
                'password' => $hash,
                'email' => $mail,
            ));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        //page de redirection
        echo '<div class="alert alert-dismissable alert-success">
        Modification sauvegard&eacute;e <meta http-equiv="refresh" content="5; URL=accueil.php">
        </div>';
    }
}
?>

