<?php
include("menu.php");
include("connection-history/memberConnectionHandling.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="projet.css" media="all" type="text/css" /></head>
<body>
<form method="post" action="">

    <legend>Connexion au site</legend>

    <div class="form-group">
      <label class="col-lg-2 control-label">Login</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="login" placeholder="Login">
      </div>
    </div><br/>

    <div class="form-group">
      <label class="col-lg-2 control-label">Mot de passe</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
      </div>
    </div>

<br/><br/><button type="submit" name="submit" class="btn btn-primary">Connexion</button>
</form>
</body>
<?php
  if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {
  extract($_POST);
  // on recup�re le password de la table qui correspond au login du visiteur
  $sql = "select id, password from membre where login='".$login."'";
  $req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error());

  $data = mysqli_fetch_assoc($req);

  if($data['password'] != $password) {
    echo '<div class="alert alert-dismissable alert-danger">
  <strong>Oh Non !</strong> Mauvais login / password. Merci de recommencer !
</div>';
  } else {
    $_SESSION['login'] = $login;
    $_SESSION['membre_id'] = $data['id'];
    addConnectionEntryInDatabase($data['id']);

    $sql = "select imageProfil from membre where login='".$login."'";
                    $result = $db->query($sql);
    // pas d'image de profil
    $image = $result->fetch_assoc()['imageProfil'];
   if ($image == '') { 
    $_SESSION['imageProfil'] = './uploads/default.jpg';
    } else {
     $_SESSION['imageProfil'] = $image;
    }
    echo '<div class="alert alert-dismissable alert-success">
  <strong>Yes !</strong> Vous etes bien logu&eacute;, Redirection dans 5 secondes ! <meta http-equiv="refresh" content="5; URL=accueil.php">
</div>';
  }    
}else {
     echo '<div class="alert alert-dismissable alert-danger">
  Remplissez tous les champs pour vous connectez !
</div>';
  $champs = '<p><b>(Remplissez tous les champs pour vous connectez !)</b></p>';
}
?>