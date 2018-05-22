<?php
include("menu.php");
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

            <legend>S'inscrire sur le site</legend>
        </br>

        <div class="form-group">
            <label class="col-lg-2 control-label">Nom</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="nom" placeholder="Nom">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Pr&eacute;nom</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="prenom" placeholder="Pr&eacute;nom">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Adresse</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Code postal</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="codePostal" placeholder="Code postal">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Date de naissance</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="dateNaissance">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Login</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="login" placeholder="Login">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Mot de passe</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">email</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="email" placeholder="e-mail">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">image de profil</label>
                                            <div class="col-lg-10">
                                                <input type="file" name="imageProfil">
                                                </div>
                                            </div>
                                            <br/>
                                            <button type="submit" name="inscrire" class="btn btn-primary">S'Inscrire</button>
                                        </form>
                                    </body>

<?php
// Si on clic sur le bouton qui a le nom inscrire alors
if (ISSET($_POST['inscrire'])) {
    
    if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email'])) {
        echo '<div class="alert alert-dismissable alert-danger">
                Pseudo, MDP ou e-mail vide !
              </div>';
    } else {
        $login  = $_POST['login'];
        $sql    = "Select login from membre where login='$login'";
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<div class="alert alert-dismissable alert-danger">
                Pseudo d&eacute;ja utilis&eacute; !
              </div>';
            return;
        }
        
        $file_name = '';
        
        // target directory
        
        $target_dir = "./uploads/";
        
        if (!empty($_FILES['imageProfil']['name'])) {
            $infosfichier          = pathinfo($_FILES['imageProfil']['name']);
            $extension_upload      = "." . $infosfichier['extension'];
            $file_name             = $infosfichier['filename'];
            $extensions_autorisees = array(
                '.jpg',
                '.jpeg',
                '.gif',
                '.png'
            );
            if (!in_array($extension_upload, $extensions_autorisees)) {
                echo '<div class="alert alert-dismissable alert-danger">
                L\'image de profil doit �tre au format jpg, jpeg, gif ou png !
                </div>';
                return;
            }
        }
        
        //On cr�er les variables
        $nom           = $_POST['nom'];
        $prenom        = $_POST['prenom'];
        $adresse       = $_POST['adresse'];
        $codePostal    = $_POST['codePostal'];
        $dateNaissance = $_POST['dateNaissance'];
        $password      = $_POST['password'];
        $mail          = $_POST['email'];
        
        $uploaddir  = './uploads/';
        $uploadfile = $uploaddir . basename($_FILES['imageProfil']['name']);
        if (!empty($file_name) && move_uploaded_file($_FILES['imageProfil']['tmp_name'], $uploadfile)) {
            $sql = "INSERT INTO membre(`nom`, `prenom`, `adresse`, `codePostal`, `dateNaissance`, `login`, `password`, `email`, `imageProfil`) VALUES ('" . $nom . "', '" . $prenom . "', '" . $adresse . "', '" . $codePostal . "', '" . $dateNaissance . "', '" . $login . "', '" . $password . "', '" . $mail . "', '" . $target_dir . $file_name . $extension_upload . "')";
        } else {
            $sql = "INSERT INTO membre(`nom`, `prenom`, `adresse`, `codePostal`, `dateNaissance`, `login`, `password`, `email`) VALUES ('" . $nom . "', '" . $prenom . "', '" . $adresse . "', '" . $codePostal . "', '" . $dateNaissance . "', '" . $login . "', '" . $password . "', '" . $mail . "')";
        }
        $req = mysqli_query($db, $sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysqli_error());
        //page de redirection
        echo '<div class="alert alert-dismissable alert-success">
        Vous etes bien inscrit, Redirection dans 5 secondes ! <meta http-equiv="refresh" content="5; URL=login.php">
        </div>';
    }
}
?>

