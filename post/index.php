<?php
include("../entete/entete.php");


if (!isset($_SESSION['admin'])) {
  echo "<script>
         redi();
      function redi(){
        document.location.href='../home';
      }</script>";
}
$erreur = "a";
include("../conectionbd/connection.php");

 if(isset($_POST['poster'])){

if(isset($_FILES['file']) OR isset($_POST['message']) ){

   $non ="non";





                     $tim = time();



   $message = htmlspecialchars($_POST['message']);
   $prix = intval($_POST['prix']);
   $nom = htmlspecialchars($_POST['nom']);
   $nat_article = htmlspecialchars($_POST['nat_article']);



include("message.php");













if(isset($_FILES['file']) AND !empty($_FILES['file'])){ //verification de lexistance du fichier a uploader
   //debit de l'upload
  $extensionfinal ='';
  $fichierfinal='';

  $compteur = count($_FILES["file"]["name"]);




           for( $key=0;$key<count($_FILES["file"]["name"]);$key++)  //debut de la boucle d'upload de fichier
           {
                //attribution des valeur aux variables
                $file_name = $key.$_FILES['file']['name'][$key];
                $file_size =$_FILES['file']['size'][$key];
                $file_tmp =$_FILES['file']['tmp_name'][$key];
                $file_type=$_FILES['file']['type'][$key];
                $taillemax = 1055555555555555555555555555555555555555540;
                      if($file_size > $taillemax){ // verification de la taille du fichier

                                  $erreur = "votre fichier ne doit pas depasse les 1055555555555555555555555555555555555555540 MO";

                      }  //fin de la verification de la taille du fichier

                  else{ //si la taille du fichier est valide on cotinue

                            $extentionvalide = array('png', 'gif', 'jpg', 'bmp', 'jpeg');

                            $extentiontelecharger = strtolower(substr(strrchr($_FILES['file']['name'][$key], '.'), 1 ));
                            $nom = $tim."hopital".$key;
                            if(in_array($extentiontelecharger, $extentionvalide)){ //verification de l'extention

                  $cheminfichier = "../ressources/publication/".$nom.".".$extentiontelecharger;


                  $chemin_nom_audio_video = "../ressources/publication/".$nom.".".$extentiontelecharger;

                  $chemin_nom_image = "../ressources/publication/".$nom.".jpg";
                       $ext = $nom.'.'.$extentiontelecharger.'';





                                      $deplacement = move_uploaded_file($file_tmp,$cheminfichier); //transfert du fichier vers me srever

                                      if($deplacement){ //si le fichier a ete transferer vers me server

       /*  echo shell_exec ($chemin_ffmpeg.' -i '.$chemin_nom_audio_video.' -vf "select=eq(pict_type\,I)" -vsync vfr '.$chemin_nom_image.' -hide_banner'); */


                                         include("../post/transfertdeficher.php");

                                            //dans la bd


                                        }  //fin si le fichier a ete transferer vers me server

                                        else{ //reaction dans le cas ou si le fichier na  paete transferer vers me server
                                                  $erreur = "erreur survenu lors du transfert du fichier";
                                        } //fin de la reaction dans le cas ou si le fichier na  paete transferer vers me server

                            } //fin de la verification de l'extention
                            else{ //dans le cas ou lextension es tincorect

                            $erreur = "L'un de vos fichier n'est pas au format desire nOUS ACCEPTONS les format png, jpg, jpeg, bmp et gif";

                            } //fin du cas ou lextension es tincorect



                      } //fin de si la taille du fichier est valide on cotinue






            }


   } //fin de l'upload


   else{


  echo "rien n'a fonctioner";
}



}







    }


?>









    <br><br>
<section class="col-lg-7 col-xs-12 col-md-7 col-sm-7 main-section" id="contenu">
   <center>
    <h3 align="center"><font style="vertical-align: inherit; font-weight: bold; text-decoration: underline;"><font style="vertical-align: inherit;">Bienvenue a Votre Interface De Publication</font></font></h3><hr>

    <?php

 if (isset($erreur) AND $erreur != "a") {
      echo '<div class="alert alert-danger">';

        echo '<h4>'.$erreur .'</h4><br/>';

      echo '</div>';

    }


?>
   <form action="" method="POST" enctype="multipart/form-data" >
    <label class="pull-left" for="nom">Nom Article: </label>
    <input class="form-control" placeholder="Le Nom De L'Article" id="nom" type="text" name="nom" >

    <label class="pull-left" for="prix">Prix Article: </label>
    <input class="form-control" placeholder="Le Prix De L'Article" id="prix" type="number" name="prix" >

    <label class="pull-left" for="message">Description: </label>
<textarea id="message" class="form-control" name="message" placeholder="Texte" rows="3"></textarea>
<label class="pull-left" for="nat_article">Selectionnez La Cathegorie: </label>
<select name="nat_article" id="nat_article" class="form-control">
  <option value="aliment">Alimentation</option>
  <option value="vestimentaire">Vestimentaire</option>
  <option value="electronique">Electronique</option>
  <option value="scolaire">Scolarite</option>
</select><br>
<span class="help-block"><span class="iputt" align="center"><label for="fichier" class=" form-control btn btn-warning btn-lg" style="cursor:pointer; ">Image</label>
<input type="file" class="btn btn-primary "  accept="Image" name="file[]" id="fichier" style="position:relative; top:-20000px;" /></span></span>

<center><button class="btn btn-info btn-lg form-control" id="publji" type="submit" name="poster" >publier</button></center><br>




 </form>



<div id="prev"></div><br><br><br><br><br><br>

<script>


(function() {
function createThumbnail(file) {
  

var reader = new FileReader();

reader.addEventListener('load', function() {
var imgElement = document.createElement('img');

imgElement.width = '250';
imgElement.height = '250';
imgElement.src = this.result;
imgElement.class = 'img-thumbnail';
$('#prev').html('&nbsp;&nbsp;&nbsp');
prev.appendChild(imgElement);



});
reader.readAsDataURL(file);
}


var allowedTypesnonsuporter = ['png', 'jpg', 'jpeg', 'gif', 'bmp'],
fileInput = document.querySelector('#fichier'),
prev = document.querySelector('#prev');

var allowedTypes = ['png', 'jpg', 'jpeg', 'gif', 'bmp'],
fileInput = document.querySelector('#fichier'),
prev = document.querySelector('#prev');




fileInput.addEventListener('change', function() {
var files = this.files,
filesLen = files.length,
imgType;


for (var i = 0; i < filesLen; i++) {
imgType = files[i].name.split('.');

imgType = imgType[imgType.length - 1];
if (allowedTypes.indexOf(imgType) != -1) {
createThumbnail(files[i]);

}

}
});




})();

</script>
<script>
function timer(n) {
$(".progress-bar").css("width", n + "%");
if(n < 200) {
setTimeout(function() {
timer(n + 3);

}, 300);
}
}
$(function (){
$("#valide").click(function() {
timer(0);
});
});
</script>


</center>
</section>




<?php  include("../pied/pied.php"); ?>


