<?php
include("../entete/entete_admin.php");
if (!isset($_SESSION['admin'])) {
  header("location:../../home");
}
include("../../conectionbd/connection.php");


?>

<br><br><br>

<h1 align="center"><u>Bienvenu Dans Votre Panel D'adminitration</u><br><br></h1>

<h2 align="center">Veillez Consulter les pages du menu <i><b>Commandes clients</b></i>   pour voir s'il y a De Nouvelles Commandes</h2>

<?php  include("../../pied/pied2.php"); ?>

