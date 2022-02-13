<?php
include("../entete/entete.php");


include("../conectionbd/connection.php");


 ?>



<br><br><br>
<?php

$limit = intval($_GET['limit']);
$comptoirs = "comptoirs";

  $reqrecep1 = $bdd->prepare("SELECT * FROM admin where  id < ?  order by id  DESC   limit 0, 7" );
  $reqrecep1->execute(array($limit));


  $debu = $reqrecep1->rowcount();
  if ($debu == 0) {
    echo "<script>
         redi();
      function redi(){
        document.location.href='../comptoirs';
      }</script>";
  }



$lastid = 0;

?>


    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">
          <h2 align="center">Listes Des comptoirs </h2>

          <?php

$first = 0;
  while($reqsms1 = $reqrecep1->fetch() ){
    $reqsms1['idannonce'] = $reqsms1['id'];

    if ($first == 0) {
      $first = $reqsms1['id'];
    }




include("../comptoirs/affichcompt.php");



$lastid = $reqsms1['id'];


  }

$limitt = intval($limit) + 7;

$reqLimit = $bdd->prepare("SELECT * FROM admin WHERE id < ?  ORDER BY id  DESC   limit 0, 7");
$reqLimit->execute(array($lastid));
$coun = $reqLimit->rowcount();

$reqLimitpre = $bdd->query("SELECT id FROM admin  order BY id  DESC limit 0, 1");

$req = $reqLimitpre->fetch();



  ?>

<center><?php if(($limit < $req[0]) AND ((intval($req[0])-6) != $first)){ ?><a href="../comptoirs/comptoirs.php?limit=<?php echo($limitt);?>" class="btn-success btn-lg"><<-- Precedent</a> <?php } if($coun > 0){ ?><a href="../comptoirs/comptoirs.php?limit=<?php echo($lastid);?>" class="btn-danger btn-lg">Suivant -->></a><?php }
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

