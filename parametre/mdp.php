<?php
include("../entete/entete.php");



  include("../conectionbd/connection.php");

                                         $tim = time();



if(isset($_SESSION['admin']) AND $_SESSION['admin']>0 ){



if(isset($_POST['conection']) AND isset($_POST['mdp']) AND isset($_POST['mdp_confirm'])){

$mdp = sha1($_POST['mdp']);
$mdp_confirm = sha1($_POST['mdp_confirm']);
$mdp_current = sha1($_POST['mdp_current']);


$erreur_mdp = array();


if(empty($_POST['mdp']) OR empty($_POST['mdp_confirm']) ){


$erreur_mdp[] ="veiller remplir les Trois champs pour mettre a jour votre Mot De Passe";

}

$redveri_mdp_current  = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
$redveri_mdp_current->execute(array($_SESSION['admin']));
$mdp_current_exist = $redveri_mdp_current->fetch();

if ($mdp_current_exist['mdp'] != $mdp_current) {

$erreur_mdp[] = "votre mot de passe Actuelle est incorect";

}


$redveri_mdp  = $bdd->prepare("SELECT * FROM admin WHERE mdp = ? AND id = ?");
$redveri_mdp->execute(array($mdp, $_SESSION['admin']));
$mdp_exist = $redveri_mdp->rowCount();





if($mdp_exist != 0)
{

$erreur_mdp[] = "votre nouveau mot de passe est identique a l'ancien. Veillez le changer.";

}






if ($mdp != $mdp_confirm) {

 $erreur_mdp[] =" Votre Mot De Passe doit etre identique a celui de confirmation";

}

if (strlen($mdp) < 8) {

 $erreur_mdp[] =" Votre Mot De Passe Ne doit pas contenir moins de 8 caracteres";

}

if (strlen($mdp) > 255) {

 $erreur_mdp[] =" Votre Mot De Passe Ne doit pas Depassé 255  caracteres";

}



if(count($erreur_mdp) == 0) {
  $miseajour_mdp = $bdd->prepare("UPDATE admin SET mdp = ?  WHERE id = ?");
  $miseajour_mdp->execute(array($mdp,  $_SESSION['admin']));

$bravo = "votre Mot De Passe A ete mis a jour avec succsses";

}


}




?>

<link rel="stylesheet" type="text/css" href="../Commande/style-form.css">
<br><br><br><br>
 <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">

  <?php
  if (isset($erreur_mdp) AND count($erreur_mdp) != 0 AND !isset($bravo)) { ?>
    <center><h4><b> Veiller CORRIGER L'(ES) ERREUR(s) suivante pour votre mise a jour </b></h4><br></center>


    <?php
              }
              else if(isset($bravo)){
echo '<div class="alert alert-danger"><center>';

echo "<h2>".$bravo."</h2>";

echo "<br><h3><a href='../parametre'>RETOUR AU PARAMATRE D'ADMINISTRATEUR </a></h3></center></div>";
              }

    if (isset($erreur_mdp) AND count($erreur_mdp) != 0) {
      echo '<div class="alert alert-danger">';
      foreach ($erreur_mdp as $erreur_mdp) {
        echo '<h4>'.$erreur_mdp .'</h4><br/>';
      }
      echo '</div>';

    }


    ?>

  <center>


     <div class="containe">
<?php if(!isset($bravo)){ ?>
 <!---heading---->
     <header class="heading"> Veillez Remplir Le Formulaire</header><hr>
    <!---Form starting---->

<form action="" method="post" id="confirm">
    <div class="row ">



     <!-----For Password and confirm password---->
          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">MDP Actuelle: </label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mdp_current" id="password" placeholder=" votre mot de passe Actuelle" class="form-control" required="">
                 </div>
          </div>
          </div>

            <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Nouveau MDP :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mdp" id="password" placeholder=" votre Nouveau mot de passe" class="form-control" required="">
                 </div>
          </div>
          </div>


            <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Confirmer Nouveau MDP :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mdp_confirm" id="password" placeholder=" Confirmer votre Nouveau mot de passe" class="form-control" required="">
                 </div>
          </div>
          </div>



         <div class="col-sm-12">
             <div class="col-sm-12">
              <br>
                 <input type="submit" class="btn btn-warning" name="conection" value="je me connecte" id="submit"> <span class="loader pull-right" style="display:none;" ><img src="../ressources/image/load/loader.gif" alt="loader" /></span>
           </div>
         </div>


          <script type="text/javascript">
            $("#confirm").on("submit", function(){

                  $('.loader').show();
            });
         </script>

     </div>
     <center><h3 style="color: #fff;"><b>Modification Du Mot De Passe </b></h3></center>


 </form>

  <?php }?>


</div>


</center>








</div>
<br><br><br><br><br><br><br>

<?php  include("../pied/pied.php"); ?>











<?php


}
else{
header("Location:../home");
}

?>





















