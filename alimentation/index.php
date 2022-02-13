<?php
 include("../entete/entete.php");


 ?>


<br><br><br>
<?php

include("../conectionbd/connection.php");
$ali = "aliment";
  $reqrecep1 = $bdd->prepare("SELECT * FROM publication WHERE username = ? order by idpost  DESC   limit 0, 7" );
  $reqrecep1->execute(array($ali));




$lastid = 0;

?>


    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-6 col-xs-12 col-md-6 col-sm-6 main-section" id="contenu">
          <h2 align="center">Produits Alimentaires</h2>

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




$lastid;
$reqLimit = $bdd->prepare("SELECT * FROM publication WHERE idpost < ? AND username = ?");
$reqLimit->execute(array($lastid, $ali));
$coun = $reqLimit->rowcount();
if($coun > 0){
  ?>

<center><a href="../alimentation/aliment.php?limit=<?php echo($lastid);?>" class="btn-danger btn-lg">Suivant -->></a></center>

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

