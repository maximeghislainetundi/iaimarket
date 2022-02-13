<?php

include("../entete/entete_admin.php");

include("../../conectionbd/connection.php");
if(isset($_GET['id'])){
$id = intval($_GET['id']);
$reqartcle = $bdd->prepare("select * FROM clients WHERE id = ?");
$reqartcle->execute(array($id));
$count = $reqartcle->rowcount();
if ($count == 1) {
  $reqsms1 = $reqartcle->fetch();

    if (isset($_POST['daccord'])) {


         $del_pub = $bdd->prepare(" DELETE  FROM clients WHERE id = ? ");
         $del_pub->execute(array($id));


         echo "<script>alert('Votre Commande a été Suprimer avec Success .');
         redi();
      function redi(){
        document.location.href='../../admin';
      }</script>";

    }

}
else{
header("location:../../admin");
}
}
else{
  header("Location:../../admin");
}


?>

<br><br><br>
 <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">

<h1>Etes Vous Sure De Vouloir suprimez Cette Commande </h1>
<br>

  <center>
    <form action="" method="post">
      <input type="hidden" name="rien" value="rien">
      <input type="submit" class="btn-danger btn-lg form-control" value="Supprimer Quand Meme" name="daccord"><br><br>
    </form>
  <a href="../../admin" class="btn-primary btn-lg form-control"> Abandonner Le Processus</a> <br><br><br>


</center>

<?php
$reqsms1['idannonce'] =  $reqsms1['id'];







                                                            ?>



             <article  class="texte" id="<?php echo $reqsms1['idannonce'];?>">

              <div id="#lien<?php echo $reqsms1['idannonce'];?>">
              <?php

      include("../post/afichpost.php");

     ?>
    </div>

    </article>








</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php  include("../../pied/pied2.php"); ?>
