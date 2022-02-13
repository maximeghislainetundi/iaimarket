<?php
session_start();
if(isset($_SESSION['dejaafiche']) AND $_SESSION['dejaafiche'] != 0){

}else{
$_SESSION['dejaafiche'] = 0;
$_SESSION['dejaafiche'] = array('debu');
}

include("../conectionbd/connection.php");



        if (isset($_GET['recherche']) AND !empty($_GET['recherche'])) {


        	$lettre_remplace = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','È','É','Ê','Ë','è','é','ê','ë','ē','ĕ','Ė','ė','à','á','â','ã','ä','å','æ','ç','ì','í','î','ï');
        $lettre_nvelle_minuscule = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','S','t','u','v','w','x','y','z','e','e','e','e','e','e','e','e','e','e','e','e','a','a','a','a','a','a','a','c','i','i','i','i');
        $recherche_brute = htmlspecialchars(trim($_GET['recherche']));
        $recherche = str_replace($lettre_remplace, $lettre_nvelle_minuscule, $recherche_brute);
        $nombre_de_mots = str_word_count($recherche);

$nombre_de_publication = 0;
$array_lecteur = array();

        $recherche_separe = explode(' ', $recherche);

  foreach($recherche_separe as $recherche_separe)
        {

                       //debut req
$reqprin = $bdd->prepare('SELECT * FROM recherche WHERE recherche LIKE "'.$recherche_separe.'"');
$reqprin->execute(array($recherche_separe));
$compte = $reqprin->rowCount();

$deja = $reqprin->fetch();

$exact = 0;


if($compte != 0){
 while( $rqsearch_result = $reqprin->fetch()){
 	if (!in_array($rqsearch_result['idpost'], $array_lecteur)) {

  if( $nombre_de_publication < 10){

include("../recherche/afichresultat.php");
$nombre_de_publication = $nombre_de_publication + 1;

array_push($array_lecteur, $rqsearch_result['idpost']);
}

}

}

}
//fin depremire requete simple
//debut seg req

$reqprin = $bdd->prepare('SELECT * FROM recherche WHERE recherche LIKE "%'.$recherche_separe.'"');
$reqprin->execute(array($recherche_separe));
$compte = $reqprin->rowCount();



if($compte != 0){

 while( $rqsearch_result = $reqprin->fetch()){
if (!in_array($rqsearch_result['idpost'], $array_lecteur)) {


  if( $nombre_de_publication < 10){

include("../recherche/afichresultat.php");
$nombre_de_publication = $nombre_de_publication + 1;


array_push($array_lecteur, $rqsearch_result['idpost']);
}


}
}
}


//fin 3e requete simple
//debut 4e req

$reqprin = $bdd->prepare('SELECT * FROM recherche WHERE recherche LIKE "'.$recherche_separe.'%"');
$reqprin->execute(array($recherche_separe));
$compte = $reqprin->rowCount();



if($compte != 0){
 while( $rqsearch_result = $reqprin->fetch()){
if (!in_array($rqsearch_result['idpost'], $array_lecteur)) {

  if( $nombre_de_publication < 10){

include("../recherche/afichresultat.php");
$nombre_de_publication = $nombre_de_publication + 1;

array_push($array_lecteur, $rqsearch_result['idpost']);
}



}
}
}

//fin de 4e requete simple
//debut 5e req

$reqprin = $bdd->prepare('SELECT * FROM recherche WHERE recherche LIKE "%'.$recherche_separe.'%"');
$reqprin->execute(array($recherche_separe));
$compte = $reqprin->rowCount();



if($compte != 0){
 while( $rqsearch_result = $reqprin->fetch()){
 	if (!in_array($rqsearch_result['idpost'], $array_lecteur)) {

  if( $nombre_de_publication < 10){

include("../recherche/afichresultat.php");
$nombre_de_publication = $nombre_de_publication + 1;

array_push($array_lecteur, $rqsearch_result['idpost']);
}


}


}



        }


}
  #fin de l'existance et de la non viditer de la seach
        }

?>
