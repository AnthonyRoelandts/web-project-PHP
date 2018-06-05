<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script></head>

<?php if(isset($warning) && !empty($warning)){ ?>
        <div class="alert alert-warning alert-dismissable" style="margin-top:90px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Warning!</strong> <?php echo $warning; ?>
        </div>
<?php }?>
<div class="container" style="margin-top:130px">
    
    <div class="row">
        
        <div class="col-md-3 tchatBoxGauche"> </div>

        <div class="col-md-9 tchatBoxDroit">
            
                <div class="row">
                  
                    <table class="table table-hover">    
                        <!-- code pour boucler sur les message --><!--  <div class="container chatSousBoxDroithaut" >  -->
                        <?php 

                            while($donnees = $data->fetch()){
                                $srcImage = "uploads/default.jpg";
								
								//quand membre aura une image
                                if($donnees["imageProfil"] != NULL) {
                                    $srcImage = $donnees["imageProfil"];
                                    $srcImage = substr($srcImage, 2, strlen ($srcImage));
                                }
                        ?>
                            <tbody>
                              <tr>
                                <td>
                                    <img src="<?php echo $srcImage ?>" class="img-rounded" alt="Cinque Terre" 
                                    width="50" height="30"> 
                                </td>
                                <td><?php echo htmlspecialchars($donnees["texte_ch"]) ?></td>
                                <td><?php echo htmlspecialchars($donnees["date_ch"]) ?></td>
                
                              </tr>
                            </tbody>

                                    

                        <?php
                            }

                        ?> 
                    </table>  

                </div>

                <form method="post" action="">
                    <div class="form-group row" style="margin-top:80px">
                        <div class="col-md-9">
                            <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Enter texte"></textarea>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="idUsr" value="<?php echo  $_SESSION['membre_id']; ?>" >
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>    

                </form>  

        </div>

    </div>


<div>