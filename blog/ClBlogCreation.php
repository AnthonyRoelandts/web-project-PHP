<?php
include_once(__DIR__ . '/../config.php');

include_once (APP_ROOT."/menu.php");
include_once (APP_ROOT."/db.php");

?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../projet.css" media="all" type="text/css" /></head>
<body>

<?php 	if(isset($warning) && !empty($warning)){ ?>

	        <div class="alert alert-warning alert-dismissable">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	            <strong>Warning!</strong> <?php echo $warning; ?>
	        </div>
<?php 	}else if(isset($alert) && $alert){?>
			<div class="alert alert-success alert-dismissable">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Success!</strong> Billet crée.
			</div>
<?php 	}?>

<div class="row banderolCreationBillet" style="margin-bottom:80px">
	<div class="col-md-12 tchatBoxDroit">
		Ajouter un nouveau billet :
	</div>
	
</div>


<form class="form-horizontal" method="post" action="">
	<div class="form-group">
	    <label class="control-label col-sm-2" for="titre">Titre :</label>
	    <div class="col-sm-10">
	    	<input type="texte" class="form-control" id="titre" name="titre" placeholder="Titre">
	    </div>
  	</div>

  	<div class="form-group">
    	<label class="control-label col-sm-2" for="texte">Texte :</label>
    	<div class="col-sm-10">
      		<textarea class="form-control" rows="5" id="texte" name="texte" placeholder="Texte"></textarea>
    	</div>
  	</div>

  	<input type="hidden" name="hiden" value="h1">

  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-default">Submit</button>
    	</div>
  	</div>
</form> 

<?php

if(isset($_POST) && !empty($_POST['texte']) && !empty($_POST['titre'])) {
    extract($_POST);
    $_query1 = "insert into post(titre_bil,texte_bil,dateCreation_bil,id_membre) values (?,?,?,?)";

    try {
        $bdd = getDatabase();
        $req = $bdd->prepare($_query1) or die (print_r($bdd->errorinfo()));
        $today = date("Y-m-d");
        $uni = $req->execute(array($_POST["texte"], $_POST["titre"], $today, $_SESSION['membre_id']));

        //si $uni content false alors il ya violation de la contrainte unique
        if (!$uni) {
            throw new Exception("Violation de containt Unique : Changer le Titre du billet ");
        }

        header("Location: ../accueil.php");

    } catch (Exception $e) {
        throw ($e);
    }
}
?>