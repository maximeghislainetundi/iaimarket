<?php
include("../entete/entete.php");



  include("../conectionbd/connection.php");

                                         $tim = time();



if(isset($_SESSION['admin']) AND $_SESSION['admin']>0 ){



if(isset($_POST['conection']) AND isset($_POST['username']) AND isset($_POST['username_confirm'])){

$username = htmlspecialchars($_POST['username']);
$username_confirm = htmlspecialchars($_POST['username_confirm']);
$mdp_current = sha1($_POST['mdp_current']);


$erreur_username = array();


if(empty($_POST['username']) OR empty($_POST['username_confirm']) ){


$erreur_username[] ="veiller remplir les Trois champs pour mettre a jour votre nom d' Utilisateu";

}

$redveri_username_current  = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
$redveri_username_current->execute(array($_SESSION['admin']));
$username_current_exist = $redveri_username_current->fetch();

if ($username_current_exist['mdp'] != $mdp_current) {

$erreur_username[] = "votre mot de passe Actuelle est incorect";

}


$redveri_username  = $bdd->prepare("SELECT * FROM admin WHERE username = ? AND id = ?");
$redveri_username->execute(array($username, $_SESSION['admin']));
$username_exist = $redveri_username->rowCount();





if($username_exist != 0)
{

$erreur_username[] = "votre nouveau nom d' Utilisateu est identique a l'ancien. Veillez le changer.";

}






if ($username != $username_confirm) {

 $erreur_username[] =" Votre nom d' Utilisateu doit etre identique a celui de confirmation";

}

if (strlen($username) < 3) {

 $erreur_username[] =" Votre nom d' Utilisateu Ne doit pas contenir moins de 3 caracteres";

}

if (strlen($username) > 255) {

 $erreur_username[] =" Votre nom d' Utilisateu Ne doit pas Depassé 255  caracteres";

}



if(count($erreur_username) == 0) {
  $miseajour_username = $bdd->prepare("UPDATE admin SET username = ?  WHERE id = ?");
  $miseajour_username->execute(array($username,  $_SESSION['admin']));

$bravo = "votre nom d' Utilisateu A ete mis a jour avec succsses";

}


}




?>

<link rel="stylesheet" type="text/css" href="../Commande/style-form.css">
<br><br><br><br>
 <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">

  <?php
  if (isset($erreur_username) AND count($erreur_username) != 0 AND !isset($bravo)) { ?>
    <center><h4><b> Veiller CORRIGER L'(ES) ERREUR(s) suivante pour votre mise a jour </b></h4><br></center>


    <?php
              }
              else if(isset($bravo)){
echo '<div class="alert alert-danger"><center>';

echo "<h2>".$bravo."</h2>";

echo "<br><h3><a href='../parametre'>RETOUR AU PARAMATRE D'ADMINISTRATEUR </a></h3></center></div>";
              }

    if (isset($erreur_username) AND count($erreur_username) != 0) {
      echo '<div class="alert alert-danger">';
      foreach ($erreur_username as $erreur_username) {
        echo '<h4>'.$erreur_username .'</h4><br/>';
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
                         <input type="password" name="mdp_current" id="password" placeholder=" votre nom d' Utilisateur Actuelle" class="form-control" required="">
                 </div>
          </div>
          </div>

            <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Nouveau Utilisateur :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="username" id="password" placeholder=" votre Nouveau nom d' Utilisateur" class="form-control" required="">
                 </div>
          </div>
          </div>


            <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Confirmer Nouveau Utilisateur :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="username_confirm" id="password" placeholder=" Confirmer votre Nouveau nom d' Utilisateur" class="form-control" required="">
                 </div>
          </div>
          </div>



         <div class="col-sm-12">
             <div class="col-sm-12">
              <br>
                 <input type="submit" class="btn btn-warning" name="conection" value="je modifie" id="submit"> <span class="loader pull-right" style="display:none;" ><img src="../ressources/image/load/loader.gif" alt="loader" /></span>
           </div>
         </div>


          <script type="text/javascript">
            $("#confirm").on("submit", function(){

                  $('.loader').show();
            });
         </script>

     </div>
     <center><h3 style="color: #fff;"><b>Modification Du nom d' Utilisateur </b></h3></center>


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





















