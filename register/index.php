<?php  include("../entete/entete.php");

include("../conectionbd/connection.php");


  if (isset($_POST['register'])) {
    $error = 0;
    $errTab = array("");
    $mdp = sha1($_POST['mdp']);
    $mdpc = sha1($_POST['mdpc']);
    $mail = htmlspecialchars($_POST['mail']);
    $nom = htmlspecialchars($_POST['nom']);
    $username = htmlspecialchars($_POST['username']);
    $numero = $_POST['numero'];


    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $error = 1;
        $erreur = "Votre Adresse E-mail n'est pas valide";
        array_push($errTab, $erreur);
    }
      if (strlen($nom) < 2) {
      $error = 1;
        $erreur = "Votre Nom  Ne Doit Pas Etre Inferieur à 2 Caracteres";
        array_push($errTab, $erreur);
    }


if (empty($nom) OR empty($mail) OR empty($username) OR empty($numero) OR empty($mdp)) {
      $error = 1;
        $erreur = "veillez  Remplir Tous Les Champs";
        array_push($errTab, $erreur);
    }

 if ($mdp != $mdpc) {
      $error = 1;
        $erreur = "Vos Mots De Passe Ne Correspondent";
        array_push($errTab, $erreur);
    }


    if (strlen($mdp) > 255) {
      $error = 1;
        $erreur = "Votre Mots De Passe Ne Doit Pas Depassé 255 Caracteres";
        array_push($errTab, $erreur);
    }


    if (strlen($nom) > 255) {
      $error = 1;
        $erreur = "Votre Nom Ne Doit Pas Depassé 255 Caracteres";
        array_push($errTab, $erreur);
    }



      if (strlen($numero) > 255) {
      $error = 1;
        $erreur = "Votre Numero Ne Doit Pas Depassé 255 Caracteres";
        array_push($errTab, $erreur);
    }

          if (strlen($username) > 255) {
      $error = 1;
        $erreur = "Votre Nom D'Utilisateur Ne Doit Pas Depassé 255 Caracteres";
        array_push($errTab, $erreur);
    }

          if (strlen($username) < 3) {
      $error = 1;
        $erreur = "Votre Nom D'Utilisateur Ne Doit Pas Etre Inferieur à 3 Caracteres";
        array_push($errTab, $erreur);
    }


    if (!preg_match("#^[A-Za-z0_]{1,254}$#s", $username)) {

  $error = 1;
  $erreur= "Votre nom d'utilisateur n'est pas valide  il ne doit contenir des lettres de A à Z majuscule ou minuscules et ou des chiffres de 0 à 9 et ou le underscore ' _ '<br>";
       array_push($errTab, $erreur);
}
$veri = $bdd->prepare("SELECT username FROM admin WHERE username = ?");
$veri->execute(array($username));
$userexist = $veri->rowcount();
   if ($userexist > 0) {
      $error = 1;
        $erreur = "Votre Nom D'Utilisateur Est deja pris veillez le changer ou ajouter une specificite";
        array_push($errTab, $erreur);
    }


    if ($error == 0) {
      $tim = time();
      $default = "default.jpg";
      $couv = "default-couv.jpg";


        $lettre_remplace = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','È','É','Ê','Ë','è','é','ê','ë','ē','ĕ','Ė','ė','à','á','â','ã','ä','å','æ','ç','ì','í','î','ï');
        $lettre_nvelle_minuscule = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','S','t','u','v','w','x','y','z','e','e','e','e','e','e','e','e','e','e','e','e','a','a','a','a','a','a','a','c','i','i','i','i');
        $rechNom = str_replace($lettre_remplace, $lettre_nvelle_minuscule, $nom);
        $rechUsername = str_replace($lettre_remplace, $lettre_nvelle_minuscule, $username);
        $recherche = $rechNom.' '.$rechUsername;
      $insert = $bdd->prepare("INSERT INTO admin(nom, username, numero, mail, mdp, tim, logo, couverture) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
      $insert->execute(array($nom, $username, $numero, $mail, $mdp, $tim, $default, $couv));
      $nat_article = "utlilisateur";
      $reqinf = $bdd->prepare("SELECT id FROM admin WHERE nom = ? AND username = ? AND numero = ? AND mail = ? AND mdp = ? AND tim = ? AND logo = ?");
      $reqinf->execute(array($nom, $username, $numero, $mail, $mdp, $tim, $default));
      $pubt = $reqinf->fetch();

        $insertRecherche = $bdd->prepare("INSERT INTO recherche(recherche, username, idpost, idusershare) VALUES(?, ?, ?, ?)");
              $insertRecherche->execute(array($recherche, $nat_article, $pubt['id'], $pubt['id']));

            
      echo "<script>alert('Votre Compte a été Cree avec Success Veillez Vous Connectez.');
         redi();
      function redi(){
        document.location.href='../login';
      }</script>";

      $ok = 1;

    }



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
                     <label class="lastname">Nom complet:</label></div>
                <div class="col-xs-8">
                     <input type="text" value="<?php if(isset($nom)){echo $nom;}   ?>" required name="nom" id="nom" placeholder="votre nom Comme dans votre CNI" class="form-control last">
                </div>
             </div>
         </div>

             <!-----For name---->
        <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Nom d'utilisateur:</label></div>
                <div class="col-xs-8">
                     <input type="text" value="<?php if(isset($username)){echo $username;}   ?>" required name="username" id="username" placeholder="votre Nom d'utilisateur ne pas Depassé 20 Caracteres" class="form-control last">
                </div>
             </div>
         </div>

          <!-----For mail---->
        <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">E-mail:</label></div>
                <div class="col-xs-8">
                     <input type="emai" value="<?php if(isset($nom)){echo $mail;}   ?>" required name="mail" id="mail" placeholder="votre Addresse E-mail" class="form-control last">
                </div>
             </div>
         </div>


          <!-----For phone---->
        <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Numero mobile:</label></div>
                <div class="col-xs-8">
                     <input type="tel" value="<?php if(isset($numero)){echo $numero;}   ?>" required name="numero" id="numero" placeholder="votre Numero De Telephone" class="form-control last">
                </div>
             </div>
         </div>

              <!-----For Password and confirm password---->
          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">MDP :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mdp" id="password" placeholder=" votre mot de passe" class="form-control" required="">
                 </div>
          </div>
          </div>

               <!-----For Password and confirm password---->
          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Confirmer MDP :</label></div>
                  <div class="col-xs-8">
                         <input type="password" name="mdpc" id="password" placeholder=" votre mot de passe" class="form-control" required="">
                 </div>
          </div>
          </div>





         <div class="col-sm-12">
             <div class="col-sm-12">
              <br>
                 <input type="submit" class="btn btn-warning" name="register" value="je m'inscris" id="submit"> <span class="loader pull-right" style="display:none;" ><img src="../ressources/images_site/load/loader.gif" alt="loader" /></span>
           </div>
         </div>


          <script type="text/javascript">
            $("#confirm").on("submit", function(){

                  $('.loader').show();
            });
         </script>

     </div>
    </div>

 </form>




</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php  include("../pied/pied.php"); ?>
