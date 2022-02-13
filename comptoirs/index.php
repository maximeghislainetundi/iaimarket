<?php

include("../entete/entete.php");


include("../conectionbd/connection.php");

 ?>


<br><br><br>
<?php


  $reqrecep1 = $bdd->query("SELECT * FROM admin order by id  DESC   limit 0, 5" );





$lastid = 0;

?>


    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">
          <h2 align="center">Liste comptoirs</h2>

          <?php


  while($reqsms1 = $reqrecep1->fetch() ){
    $reqsms1['idannonce'] = $reqsms1['id'];



include("../comptoirs/affichcompt.php");

$lastid = $reqsms1['id'];


  }




$lastid;
$reqLimit = $bdd->prepare("SELECT * FROM admin WHERE  id < ?");
$reqLimit->execute(array($lastid));
$coun = $reqLimit->rowcount();
if($coun > 0){
  ?>

<center><a href="../comptoirs/comptoirs.php?limit=<?php echo($lastid);?>" class="btn-danger btn-lg">Suivant -->></a></center>

<?php }
?>

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

