  <style type="text/css">
           #fleche{
            font-size: 15px;
           }
           .date{
            font-size: 12px;
            color:green;
           }
                      .panel-google-plus, .panel-heading, .panel-footer, .panel-body{
border: 2px solid #fff;


}
                      .text{
border: 1px solid red;
border-radius: 30px;

}

       </style>
       <?php

         $reqArtInfo = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
  $reqArtInfo->execute(array($reqsms1['idusershare']));
  $info = $reqArtInfo->fetch();

       ?>

            <div class="[ panel panel-default ] panel-google-plus" width ="370" height="370" >




              <div class="panel-heading" id="rollers<?php echo $reqsms1['idpost'];?>">
                  <?php
                    if($reqsms1['username'] == "scolaire"){
                      ?>
                       <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/scolaire.jpg" alt="txtalternatif">
                      <?php
                    }
                    ?>
                    <?php
                    if($reqsms1['username'] == "vestimentaire"){
                      ?>
                       <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/vetement.jpg" alt="txtalternatif">
                      <?php
                    }
                    ?>
                    <?php
                    if($reqsms1['username'] == "electronique"){
                      ?>
                       <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/electronique.jpg" alt="txtalternatif">
                      <?php
                    }
                    ?>

                    <?php
                    if($reqsms1['username'] == "aliment"){
                      ?>
                       <img width="50" height="50" class="[ img-circle pull-left ]" src="../ressources/images_site/aliment.jpg" alt="txtalternatif">
                      <?php
                    }
                    ?>
                    <span align="left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $info['nom'];?></font></font></span>
                    <h5 align="left"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">le</font></font></span> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo date('d/m/Y' ,$reqsms1['timestamp']);?></font></font></span> </h5>
                   <center> <span><b><?php echo $reqsms1['nom'];?></b></span> </center>


                </div>
                <style>
                .panel-body{
    word-break:break-all;
    ms-word-break:break-all;
}
</style>
                <div  class="panel-body">
                    &nbsp;&nbsp;<div class="text"><p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

                           <center>





                <?php







 $nb = 300;
                     $court = $reqsms1['posttext'];
                if (strlen($court) > $nb) {

                $court = substr($court, 0, $nb);
                $position_espace = strrpos($court, " ");
                $texte = substr($court, 0, $position_espace);

                $court = $texte.' ... <a  href="#">Tout Afficher</a> ' ;


                }


                ?>





<p class="jj">
    <?php
    print $court;
    ?>

    </p>






                </center>

                     </font></font></div>

                                    <?php
          if(isset($reqsms1['nbfichier'])){
 if ($reqsms1['nbfichier'] >= 1) {

      include("lecteur_lisant_1erefois_fichier.php");

    }





}
    ?>
           <?php


           ?>

                </div>
                <style type="text/css">
                    a:hover{
                        text-decoration: none;
                    }
                     a:focus{
                        text-decoration: none;
                    }
                </style>

            </p>
            <span><b>  Prix: <?php echo $reqsms1['prix']; ?> FCFA </b></span>
              <?php
if (!isset($_GET['id'])) {           ?>
            <center><a href="../commande/index.php?id=<?php echo $reqsms1['idpost']; ?>" class="btn-primary btn-sm">Passer Une Commande</a></center><?php if(isset($_SESSION['admin']) AND $_SESSION['admin'] == $reqsms1['idusershare']){ ?><a href="../commande/delete.php?id=<?php echo $reqsms1['idpost']; ?>" class="btn-danger btn-sm pull-right">Suprimer</a><?php } ?>

          <?php } ?>

</div>






