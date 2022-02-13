<?php

include("../entete/entete_admin.php");


include("../../conectionbd/connection.php");

 ?>


<br><br><br>
<?php

$electronique = "electronique";
  $reqrecep1 = $bdd->prepare("SELECT * FROM clients WHERE idAdmin = ? AND username = ? order by id  DESC   limit 0, 7" );
  $reqrecep1->execute(array($_SESSION['admin'], $electronique));




$lastid = 0;

?>


    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">
          <h2 align="center">Produits Electronique</h2>

          <?php


  while($reqsms1 = $reqrecep1->fetch() ){
    $reqsms1['idannonce'] = $reqsms1['id'];







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




$lastid;
$reqLimit = $bdd->prepare("SELECT * FROM clients WHERE idAdmin = ? AND id < ? AND username = ?");
$reqLimit->execute(array($_SESSION['admin'], $lastid, $electronique));
$coun = $reqLimit->rowcount();
if($coun > 0){
  ?>

<center><a href="../electronique/electronique.php?limit=<?php echo($lastid);?>" class="btn-danger btn-lg">Suivant -->></a></center>

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
<?php  include("../../pied/pied2.php"); ?>

