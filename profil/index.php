<?php  include("../entete/entete.php"); ?>


<br><br><br>
<?php
$id = intval($_GET['idadmin']);

include("../conectionbd/connection.php");

  $reqrecep1 = $bdd->prepare("SELECT * FROM publication  WHERE idusershare = ? order by idpost  DESC   limit 0, 7" );
  $reqrecep1->execute(array($id));
   $userr = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
  $userr->execute(array($id));
  $userinfo = $userr->fetch();

$lastid = 0;
?>

<style type="text/css">
  .special-head{
    color: #fff;
    background-color: #428bca;
    background-image: url("");
    background-repeat: no-repeat;
    background-position:center;
    background-size: cover;
    border-color: #428bca;
    min-height:100px;

}
</style>
    <div class="container">


      <div class="row">

       <br><br><br>
        <div class="col-lg-6 col-xs-12 col-md-6 col-sm-6 main-section" id="contenu">

          <div class="panel panel-primary">

  <table class="table table-striped table-condensed">
<div class="special-head" style="border: 0px;">
<h3 class="panel-title"><center><img width="100"  class="img-circle" src="../ressources/membres/logo/<?php echo $userinfo['logo'];?>"  alt="logo"></center><span class="pull-left">



</span></h3>
</div>
<center><h4><?php echo '  '.$userinfo['nom'];  ?></h4></center>
<tbody>


</tbody>
</table>
<!-- <span  align="center"><a href="../moi/preview-profil.php?username=<?php //echo $username;?>&contenu=post" id="post" class="btn btn-info col-lg-3 col-xs-3 col-md-3 col-sm-3">POST &nbsp;&nbsp;</a>&nbsp;&nbsp;<a href="../moi/preview-profil.php?username=<?php //echo $username;?>&contenu=main" id="main" class="btn btn-danger col-lg-2 col-xs-2 col-md-2 col-sm-2">MENU &nbsp;&nbsp;</a>&nbsp;&nbsp;<a href="../moi/preview-profil.php?username=<?php// echo $username;?>&contenu=media" id="media" class="btn btn-success col-lg-3 col-xs-3 col-md-3 col-sm-3">MEDIAS &nbsp;&nbsp;</a>&nbsp;&nbsp;<a href="../moi/preview-profil.php?username=<?php // echo $username;?>&contenu=about" id="about" class="btn btn-primary col-lg-3 col-xs-3 col-md-3 col-sm-3">A PROPOS &nbsp;&nbsp;</a></span>  -->    <br><br>
</div>


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

$reqLimit = $bdd->prepare("SELECT * FROM publication WHERE idpost < ? AND idusershare = ?");
$reqLimit->execute(array($lastid, $id));
$coun = $reqLimit->rowcount();
if($coun > 0){
  ?>

<center><a href="../profil/profil.php?limit=<?php echo($lastid);?>&idadmin=<?php echo($id);?>" class="btn-danger btn-lg">Suivant -->></a></center>

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

