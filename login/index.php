<?php

include("../entete/entete.php");

include("../conectionbd/connection.php");

$error = array("");
$total_error = 0;


if (isset($_SESSION['admin'])) {
    echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}


if(isset($_POST['conectconect'])){



            $username = htmlspecialchars($_POST['username']);

            $mdp = sha1($_POST['mdp']);




if(!empty($_POST['username'])  AND !empty($_POST['mdp'])){
}
else{
  $erreur = "tous les champs doivent etre Remplis";
array_push($error, $erreur);
$total_error = 1;

}

     $requser = $bdd->prepare("SELECT * FROM admin WHERE username = ? AND mdp = ?");
$requser->execute(array($username, $mdp));
$userexist = $requser->rowCount();


if($userexist == 0){
  $erreur = "Mauvais nom d'Utilisateur ou Mauvais Mot de Passe";
  array_push($error, $erreur);
$total_error = 1;



}





$active = "active";





if ($total_error == 0) {



$userinfo = $requser->fetch();




$_SESSION['admin'] = $userinfo['id'];

 echo "<script>
         redi();
      function redi(){
        document.location.href='../admin';
      }</script>";




}






}



?>
<link rel="stylesheet" type="text/css" href="../Commande/style-form.css">
<br><br><br>
 <div class="col-lg-8 col-xs-12 col-md-9 col-sm-10 main-section" id="contenu">


  <center>


<?php

if($total_error > 0){

  echo '<font color="red"><center><h2>';
  foreach ($error as $error) {
    # code...

echo $error.'<br><br>';
 }
 echo '</h2></center></font>';
}

?>
     <div class="containe">

 <!---heading---->
     <header class="heading"> Veillez Remplir Le Formulaire</header><hr>
    <!---Form starting---->

<form action="" method="post" id="confirm">
    <div class="row ">


     <!-----For eusername---->
        <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Utilisateur :</label></div>
                <div class="col-xs-8">
                     <input type="text" value="<?php if(isset($username)){echo $username;} ?>" required name="username" id="lname" placeholder="votre nom d'Utilisateur" class="form-control last">
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



         <div class="col-sm-12">
             <div class="col-sm-12">
              <br>
                 <input type="submit" class="btn btn-warning" name="conectconect" value="je me connecte" id="submit"> <span class="loader pull-right" style="display:none;" ><img src="../ressources/images_site/load/loader.gif" alt="loader" /></span>
           </div>
         </div>


          <script type="text/javascript">
            $("#confirm").on("submit", function(){

                  $('.loader').show();
            });
         </script>

     </div>
     <center><h3 style="color: #fff;"><b>Connexion du commerçant </b><a href="../register">&nbsp;&nbsp; <b>S'inscrire ?</b></a></h3></center>


 </form>


</div>


</center>








</div>
<br><br><br><br><br><br><br>

<?php  include("../pied/pied.php"); ?>
