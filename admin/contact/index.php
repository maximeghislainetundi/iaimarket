<?php

include("../entete/entete_admin.php");

include("../../conectionbd/connection.php");
if(isset($_GET['id'])){

$id = intval($_GET['id']);
$reqartcle = $bdd->prepare("select * FROM clients WHERE id = ?");
$reqartcle->execute(array($id));
$count = $reqartcle->rowcount();
if ($count == 1) {
  $reqsms1 = $reqartcle->fetch();


  if (isset($_POST['contact'])) {
    $error = 0;
    $errTab = array("");

    $message = htmlspecialchars($_POST['message']);

 if (empty($message)) {
      $error = 1;
        $erreur = "Votre message Ne Doit Pas Etre Vide";
        array_push($errTab, $erreur);
    }



    if (strlen($message) > 400) {
      $error = 1;
        $erreur = "Votre message Ne Doit Pas Depassé 400 Caracteres";
        array_push($errTab, $erreur);
    }

$okbon = 0;

    if ($error == 0) {
$read = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
$read->execute(array($_SESSION['admin']));
$readmin = $read->fetch();

    $header="MIME-Version: 1.0\r\n";
                     $header.='From:'.$readmin['mail'].''."\n";
                     $header.='Content-Type:text/html; charset="uft-8"'."\n";
                     $header.='Content-Transfer-Encoding: 8bit';
                     $sms="
                     <html>
                        <body>
                           <div align='center'>
                           <h2>CONTACT COMMANDE</h2>
                           <h3>
                        ".$message."
                              </h3>
                           </div>
                        </body>
                     </html>
                     ";
                    $okbon = mail($reqsms1['mail'], "CONTACT COMMANDE D'ACHAT EN LIGNE", $sms, $header);

if($okbon != 0){
      echo "<script>alert('Votre Mail a été Envoyé avec Success .');
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";

      $ok = 1;

    }
    else{
      $erreur = "Une erreur s'est produite durant l'envoi du mail veillez reesayer";
        array_push($errTab, $erreur);
    }

    }



  }
}
else{
  header("Location:../home");
}



}
else{
  header("Location:../home");
}

?>
 <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">

<center><h1>Envoie De Mail à <?php echo $reqsms1['mail'];?> </h1></center>
<style type="text/css">
  .masque{
    display: none;
  }
</style>

  <center>
    <?php

 if (isset($error) AND $error == 1) {
      echo '<div class="alert alert-danger">';
      foreach ($errTab as $errTab) {
        echo '<h4>'.$errTab .'</h4><br/>';
      }
      echo '</div>';

    }


?>
    <form class="form-group" method="post" action="">
   <label class="pull-left" for="message">Message: </label>
<textarea id="message" class="form-control" name="message" placeholder="Texte" rows="3"></textarea><br>
<input type="submit" required="" name="contact" value="Envoyé" class="btn btn-warning form-control">
</form>



</center>

<?php
$reqsms1['idannonce'] =  $reqsms1['id'];







                                                            ?>



             <article  class="texte" id="<?php echo $reqsms1['idannonce'];?>">

              <div id="#lien<?php echo $reqsms1['idannonce'];?>">
              <?php

      include("../post/afichpost.php");

     ?>
    </div>

    </article>








</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php  include("../../pied/pied2.php"); ?>
