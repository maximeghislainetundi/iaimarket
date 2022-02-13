<?php
include("../entete/entete_admin.php");


include("../../conectionbd/connection.php");



 ?>



<br><br><br>
<?php

$limit = intval($_GET['limit']);
$scolaire = "scolaire";

    $reqrecep1 = $bdd->prepare("SELECT * FROM clients where idAdmin = ? AND id < ? AND username = ? order by id  DESC   limit 0, 7" );
  $reqrecep1->execute(array($_SESSION['admin'], $limit, $scolaire));



  $debu = $reqrecep1->rowcount();
  if ($debu == 0) {
    header("location:../scolaire");
  }



$lastid = 0;

?>


    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">
         <h2 align="center">Outils scolaire</h2>

          <?php

$first = 0;
  while($reqsms1 = $reqrecep1->fetch() ){
    $reqsms1['idannonce'] = $reqsms1['id'];

    if ($first == 0) {
      $first = $reqsms1['id'];
    }







                                                            ?>



             <article  class="texte" id="<?php echo $reqsms1['idannonce'];?>">

              <div id="#lien<?php echo $reqsms1['idannonce'];?>">
              <?php

      include("../post/afichpost.php");

     ?>
    </div>

    </article>



  <br/>


  <?php


$lastid = $reqsms1['id'];


  }

$limitt = intval($limit) + 7;

$reqLimit = $bdd->prepare("SELECT * FROM clients WHERE idAdmin = ? AND id < ? AND username = ? ORDER BY id  DESC   limit 0, 7");
$reqLimit->execute(array($_SESSION['admin'], $lastid, $scolaire));
$coun = $reqLimit->rowcount();

$reqLimitpre = $bdd->prepare("SELECT id FROM clients WHERE idAdmin = ? AND username = ? order BY id  DESC limit 0, 1");
$reqLimitpre->execute(array($_SESSION['admin'], $scolaire));
$req = $reqLimitpre->fetch();



  ?>

<center><?php if(($limit < $req[0]) AND ((intval($req[0])-6) != $first)){ ?><a href="../scolaire/scolaire.php?limit=<?php echo($limitt);?>" class="btn-success btn-lg"><<-- Precedent</a> <?php } if($coun > 0){ ?><a href="../scolaire/scolaire.php?limit=<?php echo($lastid);?>" class="btn-danger btn-lg">Suivant -->></a><?php }
?></center>



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
<?php  include("../../pied/pied2.php"); ?>

