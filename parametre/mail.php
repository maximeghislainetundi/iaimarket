<?php
include("../entete/entete.php");



  include("../conectionbd/connection.php");

                                         $tim = time();



if(isset($_SESSION['admin']) AND $_SESSION['admin']>0 ){



if(isset($_POST['conection']) AND isset($_POST['mail']) AND isset($_POST['mail_confirm'])){

$mail = htmlspecialchars($_POST['mail']);
$mail_confirm = htmlspecialchars($_POST['mail_confirm']);
$mdp_current = sha1($_POST['mdp_current']);


$erreur_mail = array();


if(empty($_POST['mail']) OR empty($_POST['mail_confirm']) ){


$erreur_mail[] ="veiller remplir les Trois champs pour mettre a jour votre Addresse Mail";

}

$redveri_mail_current  = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
$redveri_mail_current->execute(array($_SESSION['admin']));
$mail_current_exist = $redveri_mail_current->fetch();

if ($mail_current_exist['mdp'] != $mdp_current) {

$erreur_mail[] = "votre mot de passe Actuelle est incorect";

}


$redveri_mail  = $bdd->prepare("SELECT * FROM admin WHERE mail = ? AND id = ?");
$redveri_mail->execute(array($mail, $_SESSION['admin']));
$mail_exist = $redveri_mail->rowCount();





if($mail_exist != 0)
{

$erreur_mail[] = "votre nouveau Addresse Mail est identique a l'ancien. Veillez le changer.";

}






if ($mail != $mail_confirm) {

 $erreur_mail[] =" Votre Addresse Mail doit etre identique a celle de confirmation";

}


if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {

 $erreur_mail[] =" Votre Addresse Mail n'est pas valide ";

}

if (strlen($mail) < 3) {

 $erreur_mail[] =" Votre Addresse Mail Ne doit pas contenir moins de 3 caracteres";

}

if (strlen($mail) > 255) {

 $erreur_mail[] =" Votre Addresse Mail Ne doit pas Depassé 255  caracteres";

}



if(count($erreur_mail) == 0) {
  $miseajour_mail = $bdd->prepare("UPDATE admin SET mail = ?  WHERE id = ?");
  $miseajour_mail->execute(array($mail,  $_SESSION['admin']));

$bravo = "votre Addresse Mail A ete mis a jour avec succsses";

}


}




?>

<link rel="stylesheet" type="text/css" href="../Commande/style-form.css">
<br><br><br><br>
 <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">

  <?php
  if (isset($erreur_mail) AND count($erreur_mail) != 0 AND !isset($bravo)) { ?>
    <center><h4><b> Veiller CORRIGER L'(ES) ERREUR(s) suivante pour votre mise a jour </b></h4><br></center>


    <?php
              }
              else if(isset($bravo)){
echo '<div class="alert alert-danger"><center>';

echo "<h2>".$bravo."</h2>";

echo "<br><h3><a href='../parametre'>RETOUR AU PARAMATRE D'ADMINISTRATEUR </a></h3></center></div>";
              }

    if (isset($erreur_mail) AND count($erreur_mail) != 0) {
      echo '<div class="alert alert-danger">';
      foreach ($erreur_mail as $erreur_mail) {
        echo '<h4>'.$erreur_mail .'</h4><br/>';
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
                         <input type="password" name="mdp_current" id="password" placeholder=" votre Addresse Mail Actuelle" class="form-control" required="">
                 </div>
          </div>
          </div>

            <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Nouvelle Addresse e-mail :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mail" id="password" placeholder=" votre Nouvelle Addresse Mail" class="form-control" required="">
                 </div>
          </div>
          </div>


            <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Confirmer Nouveau Mail :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mail_confirm" id="password" placeholder=" Confirmer votre Nouvelle Addresse mail" class="form-control" required="">
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
     <center><h3 style="color: #fff;"><b>Modification De L' Addresse Mail </b></h3></center>


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





















