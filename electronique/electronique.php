<?php
include("../entete/entete.php");


include("../conectionbd/connection.php");


 ?>



<br><br><br>
<?php

$limit = intval($_GET['limit']);
$electronique = "electronique";

  $reqrecep1 = $bdd->prepare("SELECT * FROM publication where idpost < ? AND username = ? order by idpost  DESC   limit 0, 7" );
  $reqrecep1->execute(array($limit, $electronique));


  $debu = $reqrecep1->rowcount();
  if ($debu == 0) {
    header("location:../electronique");
  }



$lastid = 0;

?>


    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-6 col-xs-12 col-md-6 col-sm-6 main-section" id="contenu">
          <h2 align="center">Produits Electronique</h2>

          <?php

$first = 0;
  while($reqsms1 = $reqrecep1->fetch() ){
    $reqsms1['idannonce'] = $reqsms1['idpost'];

    if ($first == 0) {
      $first = $reqsms1['idpost'];
    }







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

$reqLimit = $bdd->prepare("SELECT * FROM publication WHERE idpost < ? AND username = ? ORDER BY idpost  DESC   limit 0, 7");
$reqLimit->execute(array($lastid, $electronique));
$coun = $reqLimit->rowcount();

$reqLimitpre = $bdd->prepare("SELECT idpost FROM publication WHERE username = ? order BY idpost  DESC limit 0, 1");
$reqLimitpre->execute(array($electronique));
$req = $reqLimitpre->fetch();



  ?>

<center><?php if(($limit < $req[0]) AND ((intval($req[0])-6) != $first)){ ?><a href="../electronique/electronique.php?limit=<?php echo($limitt);?>" class="btn-success btn-lg"><<-- Precedent</a> <?php } if($coun > 0){ ?><a href="../electronique/electronique.php?limit=<?php echo($lastid);?>" class="btn-danger btn-lg">Suivant -->></a><?php }
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
<?php  include("../pied/pied.php"); ?>

