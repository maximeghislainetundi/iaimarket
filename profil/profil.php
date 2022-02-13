<?php  include("../entete/entete.php"); ?>


<br><br><br>
<?php
$limit = intval($_GET['limit']);
$id = intval($_GET['idadmin']);
if (!isset($_GET['idadmin'])) {
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}
if (!isset($_GET['limit'])) {
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}
if ($limit == 0) {
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}
if ($id == 0) {
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}
include("../conectionbd/connection.php");
  $reqrecep1 = $bdd->prepare("SELECT * FROM publication where idpost < ? AND idusershare = ? order by idpost  DESC   limit 0, 7" );
  $reqrecep1->execute(array($limit, $id));

  $userr = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
  $userr->execute(array($id));
  $userinfo = $userr->fetch();

  $debu = $reqrecep1->rowcount();
  if ($debu == 0) {
    header("location:../home");
  }



$lastid = 0;
?>


    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-6 col-xs-12 col-md-6 col-sm-6 main-section" id="contenu">
<center><h2>Liste Des Produits De <i><?php echo $userinfo['nom']; ?></i></h2><br></center>

          <?php


  while($reqsms1 = $reqrecep1->fetch() ){
    $reqsms1['idannonce'] = $reqsms1['idpost'];







                                                            ?>



             <article  class="texte" id="<?php echo $reqsms1['idannonce'];?>">

              <div id="#lien<?php echo $reqsms1['idannonce'];?>">
              <?php

      include("../home/afichpost.php");

     ?>
    </div>

    </article>



  <br/>


  <?php


$lastid = $reqsms1['idpost'];


  }
$limitt = intval($limit) + 7;

$reqLimit = $bdd->prepare("SELECT * from publication where idpost < ? AND idusershare = ? order by idpost  DESC   limit 0, 7");
$reqLimit->execute(array($lastid, $id));
$coun = $reqLimit->rowcount();

$reqLimitpre = $bdd->prepare("SELECT idpost from publication WHERE idusershare = ? order by idpost  DESC limit 0, 1");
$reqLimitpre->execute(array($id));
$req = $reqLimitpre->fetch();



  ?>

<center><?php if($limit < $req[0]){ ?><a href="../profil/profil.php?limit=<?php echo($limitt);?>&idadmin=<?php echo($id);?>" class="btn-success btn-lg"><<-- Precedent</a> <?php } if($coun > 0){ ?><a href="../profil/profil.php?limit=<?php echo($lastid);?>&idadmin=<?php echo($id);?>" class="btn-danger btn-lg">Suivant -->></a><?php }
?></center>
<br>
<center><b><h3><a href="../profil/index.php?idadmin=<?php echo($id);?>"> Retour à L'acceuil Du Profil</a></h3></b></center>


        </div><br><br>

        <?php
//include("../post/article.php");

        ?>







      </div>
      <!-- /row -->


    <!-- /container -->

  <script type="text/javascript">
            $(window).scroll(function() {
      if ($(document).scrollTop() > 150) {
      $('.navbar').addClass('shrink');
      }
      else {
      $('.navbar').removeClass('shrink'); }
      });

  </script>


</div>
<?php  include("../pied/pied.php"); ?>

