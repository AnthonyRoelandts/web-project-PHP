
<?php 	if(isset($warning) && !empty($warning)){ ?>

	        <div class="alert alert-warning alert-dismissable">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	            <strong>Warning!</strong> <?php echo $warning; ?>
	        </div>
<?php 	}else if(isset($alert) && $alert){?>
			<div class="alert alert-success alert-dismissable">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Success!</strong> Billet Supprimé.
			</div>
<?php 	}?>


	<div class="row banderolCreationBillet" style="margin-bottom:80px">
		<div class="col-md-12 tchatBoxDroit">
			Les billets :
		</div>
	</div>

	<?php 
	$i = 0;
	while($donnees = $reponse->fetch()){
		$i++;
	?>
		<div class="row" style="margin-bottom:20px">
			<div class="col-md-12">
				<div class="row" style="margin-bottom:20px">
					<div class="col-md-7">Titre : <?php echo htmlspecialchars($donnees["titre_bil"]) ?></div>
					<div class="col-md-3">date  : <?php echo htmlspecialchars($donnees["dateCreation_bil"]) ?></div>
					<div class="col-md-2">
						<form method="post" action="">
							<input type="hidden" name="hiden" value="h2">
							<input type="hidden" name="titre" value="<?php echo $donnees['titre_bil'] ?>">
							<input type="submit" class="btn btn-danger" value=".. Supprimer ..">
						</form>
						
					</div>
				</div>
				<div class="row">
					<a href=<?php echo "#".$i; ?> data-toggle="collapse">
						<button type="button" class="btn btn-default btn-sm btn-block">Texte</button>
					</a>
					<div class="col-md-12 collapse" id=<?php echo htmlspecialchars($i); ?>>
						<?php echo $donnees["texte_bil"] ?> 
					</div>
				</div>
			</div>
		</div>
	<?php 
	}	
		$reponse->closeCursor();
	?>
