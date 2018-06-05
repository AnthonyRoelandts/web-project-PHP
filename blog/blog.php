<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>
</head>


<?php if (isset($warning) && !empty($warning)) { ?>
    <div class="alert alert-warning alert-dismissable" style="margin-top:90px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> <?php echo $warning; ?>
    </div>
<?php } ?>
<div style="margin-top:90px"></div>
<?php
$i = 0;
$tmpCom = $reponseCom->fetchAll();
while ($donnees = $reponseBil->fetch()) {
    $i++;
    ?>

    <div class="container" style="margin-top:10px">
        <h2> <?php echo htmlentities($donnees["titre_bil"]) ?></h2>
        <p>
            <?php echo htmlspecialchars($donnees["texte_bil"]) ?>
        </p>
        <br>


        <a href=<?php echo "#" . $i; ?> data-toggle="collapse">Commentaire</a>
        <div id=<?php echo $i; ?> class="collapse">

            <ul class="list-group">
                <?php
                foreach ($tmpCom as $com) {

                    if ($donnees["id_bil"] == $com["id_bil"]) {
                        $srcImage = "uploads/default.jpg";
                        //todo quqnd imqge membre ajoutee
                        // if($com["chemainImg_uti"] != NULL)
                        //  $srcImage = $com["chemainImg_uti"];
                        ?>
                        <li class="list-group-item">
                            <!-- Left-aligned media object -->
                            <div class="media">
                                <div class="media-left">
                                    <img src="<?php echo $srcImage ?>" class="media-object" style="width:60px">
                                </div>

                                <div class="media-body">
                                    <h4 class="media-heading"></h4>
                                    <p><?php echo htmlspecialchars($com["texte_com"]) ?> .</p>
                                </div>
                            </div>
                        </li>

                        <?php
                    }
                }
                ?>

            </ul>
            <?php if (isLogged()) {
            ?>
            <div class="panel-footer">

                <form method="post" action="">

                    <div class="form-group row">

                        <div class="col-md-9">
                          <textarea class="form-control" rows="5" id="comment" name="commentaire"
                                    placeholder="Enter votre commentaire"></textarea>
                        </div>

                        <input type="hidden" name="membreId" value="<?php echo $_SESSION['membre_id']; ?>">
                        <input type="hidden" name="idBil" value="<?php echo $donnees["id_bil"] ?> ">

                        <div class="col-md-3">
                            <button type="envoyer" class="btn btn-default">Submit</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
        <?php
        }
        ?>


    </div>

<?php }