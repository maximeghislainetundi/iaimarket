<?php
include("../entete/entete.php");
if (!isset($_SESSION['admin'])) {
  header("location:../home");
}
include("../conectionbd/connection.php");


?>

<br><br><br>
<div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">



  <center>
  <a href="username.php" class="btn-primary btn-lg"> Modifiez Le Nom D'Utilisateur</a> <br><br><br>

  <a href="mdp.php" class="btn-danger btn-lg"> Modifiez Le Mot De Passe</a><br><br><br>


<a href="mail.php" class="btn-warning btn-lg"> Modifiez L'Addresse Email </a><br><br>
</center>








</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php  include("../pied/pied.php"); ?>
