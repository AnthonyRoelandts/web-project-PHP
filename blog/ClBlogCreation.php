
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

