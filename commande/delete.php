<?php

include("../entete/entete.php");
if (!isset($_SESSION['admin'])) {
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";}
include("../conectionbd/connection.php");
if(isset($_GET['id'])){
$id = intval($_GET['id']);
$reqartcle = $bdd->prepare("select * FROM publication WHERE idpost = ?");
$reqartcle->execute(array($id));
$count = $reqartcle->rowcount();
if ($count == 1) {
  $reqsms1 = $reqartcle->fetch();

    if (isset($_POST['daccord'])) {


         $del_pub = $bdd->prepare(" DELETE  FROM publication WHERE idpost = ? ");
         $del_pub->execute(array($id));

         $del_client = $bdd->prepare(" DELETE  FROM clients WHERE idArticle = ? ");
         $del_client->execute(array($id));

         $del_recherche = $bdd->prepare(" DELETE  FROM recherche WHERE idpost = ? ");
         $del_recherche->execute(array($id));

         echo "<script>alert('Votre Article a été Suprimer avec Success .');
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
    }

}
else{
echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";}

}else{

  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";}

?>

<br><br><br>
 <div class="col-lg-6 col-xs-12 col-md-6 col-sm-6 main-section" id="contenu">

<h1>Etes Vous Sure De Vouloir suprimez Cette Article </h1>
<span>NB: sa supression entrainera egalement la suppression des commandes des clients concernant cette article <br></span><br>

  <center>
    <form action="" method="post">
      <input type="hidden" name="rien" value="rien">
      <input type="submit" class="btn-danger btn-lg form-control" value="Supprimer Quand Meme" name="daccord"><br><br>
    </form>
  <a href="../home" class="btn-primary btn-lg form-control"> Abandonner Le Processus</a> <br><br><br>


</center>

<?php
$reqsms1['idannonce'] =  $reqsms1['idpost'];







                                                            ?>



             <article  class="texte" id="<?php echo $reqsms1['idannonce'];?>">

              <div id="#lien<?php echo $reqsms1['idannonce'];?>">
              <?php

      include("../home/afichpost.php");

     ?>
    </div>

    </article>








</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php  include("../pied/pied.php"); ?>
