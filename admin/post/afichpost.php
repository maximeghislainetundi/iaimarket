
   <div class="[ panel panel-default ] panel-google-plus" width ="370" height="370" style="border: solid 2px #fff; border-radius: 10px; background-color: #fff;">
  <style type="text/css">
    a:hover, a:focus{
      text-decoration: none;
    }
  </style>
  <?php
  $reqArtInfo = $bdd->prepare("SELECT * FROM publication WHERE idpost = ?");
  $reqArtInfo->execute(array($reqsms1['idArticle']));
  $info = $reqArtInfo->fetch();

  ?>

<style type="text/css">
  .ee{
    color: black;

  }
</style>
              <div class="panel-heading" id="rollers<?php echo $reqsms1['id'];?>">
                <a class="ee" href="../../commande/index.php?id=<?php echo $info['idpost']; ?>">
                    <img width="70" height="80" class="[ img-circle pull-left ]" src="../../ressources/publication/<?php echo $info['fichier'];?>" alt="txtalternatif">
                    <span align="left"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $info['nom']; ?></font></font></span>
                    <h5 align="left"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">le</font></font></span> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo date('d/m/Y à h:i' ,$reqsms1['tim']);?></font></font></span> </h5>

                      </a>
                </div>
      <p align="center" class="masque"><br><br></p>
      <b>
        <br><i>Client:</i>  <?php echo $reqsms1['nom']; ?><br><i>Addresse De Livraison:</i>  <?php echo $reqsms1['lieu']; ?><span class="pull-right">prix unitaire: <?php echo $info['prix']?> FCFA</span>



        <br><i>Quantié solicité:</i>  <?php echo $reqsms1['quantite']; ?>
     </b>


        <span class="pull-right"><u>Prix TOTAL =   <?php echo ($reqsms1['quantite'] * $info['prix']); ?> FCFA</u></span><br>
        <?php
if (!isset($_GET['id']) AND isset($_SESSION['admin'])) {   
      ?>
       <center><a href="../contact/delete.php?id=<?php echo $reqsms1['id']; ?>" class="btn btn-danger btn-xs">Supprimer</a></center>
       <?php } ?>


  </div><br>
