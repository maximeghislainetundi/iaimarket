<?php  include("../entete/entete.php");

include("../conectionbd/connection.php");
if(isset($_GET['id'])){

$id = intval($_GET['id']);
$reqartcle = $bdd->prepare("select * FROM publication WHERE idpost = ?");
$reqartcle->execute(array($id));
$count = $reqartcle->rowcount();
if ($count == 1) {
  $reqsms1 = $reqartcle->fetch();

  $readminreq = $bdd->prepare("select * FROM admin WHERE id = ?");
  $readminreq->execute(array($reqsms1['idusershare']));
  $readmin = $readminreq->fetch();


  if (isset($_POST['commande'])) {
     $lieuAllow = array("L1A", "L1B", "L1C", "L1D", "L1F", "L2A", "L2B", "L2C", "L2D", "L2F", "GL3A", "GL3B", "GL3C", "SR3A", "SR3B", "SR3C");

    $error = 0;
    $errTab = array("");
    $nom = htmlspecialchars($_POST['nom']);
    $lieu = htmlspecialchars($_POST['lieu']);
    $quantite = intval($_POST['quantite']);


        if(!in_array($lieu, $lieuAllow)){
        $error = 1;
        $erreur = "Votre Destination n'est pas valide";
        array_push($errTab, $erreur);
    }


    if (strlen($nom) > 255) {
      $error = 1;
        $erreur = "Votre Nom Ne Doit Pas Depassé 255 Caracteres";
        array_push($errTab, $erreur);
    }


          if (strlen($quantite) > 255) {
      $error = 1;
        $erreur = "La Taille De Votre Quantité  Ne Doit Pas Depassé 255 Caracteres";
        array_push($errTab, $erreur);
    }

    if ($error == 0) {
      $tim = time();
      $insert = $bdd->prepare("INSERT INTO clients(idArticle, nom, idAdmin, quantite, tim, username, lieu) VALUES(?, ?, ?, ?, ?, ?, ?)");
      $insert->execute(array($id, $nom, $reqsms1['idusershare'], $quantite, $tim, $reqsms1['username'], $lieu));
      $message = "Vous avez une Commande de ".$reqsms1['nom']."<br> Allez Dans Votre Espace D'administation Pour plus D'information ";

        $header="MIME-Version: 1.0\r\n";
                     $header.='From:iaimarket93@gmail.com'."\n";
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
                    $okbon = mail($readmin['mail'], "Nouvel Commande Passé", $sms, $header);

      echo "<script>alert('Votre Commande a été Passé avec Success Veillez Patientez Que Les Administrateurs Viennent livrer Votre Commande.');
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";

      $ok = 1;

    }



  }
}
else{
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}



}
else{
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}

?>
<link rel="stylesheet" type="text/css" href="../Commande/style-form.css">
<br><br><br>
 <div class="col-lg-6 col-xs-12 col-md-6 col-sm-6 main-section" id="contenu">


  <center>


     <div class="containe">
    <?php

 if (isset($error) AND $error == 1) {
      echo '<div class="alert alert-danger">';
      foreach ($errTab as $errTab) {
        echo '<h4>'.$errTab .'</h4><br/>';
      }
      echo '</div>';

    }


?>
 <!---heading---->
     <header class="heading"> Veillez Remplir Le Formulaire De Commande:</header><hr>
    <!---Form starting---->

    <form action="" method="post" id="confirm">
    <div class="row ">


     <!-----For name---->
        <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Nom :</label></div>
                <div class="col-xs-8">
                     <input type="text" value="<?php if(isset($nom)){echo $nom;}   ?>" required name="nom" id="nom" placeholder=" Saisissez votre nom " class="form-control last">
                </div>
             </div>
         </div>


              <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Lieu De Livraison:</label></div>
                <div class="col-xs-8">
                    <select name="lieu" id="lieu" class="form-control last">

                      <optgroup label="NIVEAU 1">
                      <option value="L1A">L1A</option>
                      <option value="L1B">L1B</option>
                      <option value="L1C">L1C</option>
                      <option value="L1D">L1D</option>
                      <option value="L1E">L1E</option>
                      <option value="L1F">L1F</option>
                      </optgroup>

                      <optgroup label="NIVEAU 2">
                      <option value="L2A">L2A</option>
                      <option value="L2B">L2B</option>
                      <option value="L2C">L2C</option>
                      <option value="L2D">L2D</option>
                      <option value="L2E">L2E</option>
                      <option value="L2F">L2F</option>
                      </optgroup>

                      <optgroup label="NIVEAU 3">
                      <option value="GL3A">GL3A</option>
                      <option value="GL3B">GL3B</option>
                      <option value="GL3C">GL3C</option>
                      <option value="SR3A">SR3A</option>
                      <option value="SR3B">SR3B</option>
                      <option value="SR3C">SR3C</option>
                      </optgroup>





                    </select>
                </div>
             </div>
         </div>





           <!-----For quantite---->
        <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Quantité:</label></div>
                <div class="col-xs-8">
                     <input type="number" value="<?php if(isset($quantite)){echo $quantite;}   ?>" required name="quantite" id="quantite" placeholder="le nombre De produit a envoyer" class="form-control last">
                </div>
             </div>
         </div>



         <div class="col-sm-12">
             <div class="col-sm-12">
              <BR>
                 <input type="submit" class="btn btn-warning" name="commande" value="je Commande" id="submit"> <span class="loader pull-right" style="display:none;" ><img src="../ressources/images_site/load/loader.gif" alt="loader" /></span>
           </div>
         </div>


          <script type="text/javascript">
            $("#confirm").on("submit", function(){

                  $('.loader').show();
            });
         </script>

     </div>
     <center><h3 style="color: #fff;"><b>Commande De l'Article N° <?php echo $id; ?> </b></h3></center>


 </form>


</div>

<?php
$reqsms1['idannonce'] =  $reqsms1['idpost'];







                                                            ?>



             <article  class="texte" id="<?php echo $reqsms1['idannonce'];?>">

              <div id="#lien<?php echo $reqsms1['idannonce'];?>">
              <?php

      include("../home/afichpost.php");

     ?>
    </div>

    </article>
  <br><br>
</center>








</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php  include("../pied/pied.php"); ?>
